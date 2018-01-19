<?php
    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


    function get_data() 
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['file']['tmp_name'])) {
            $handle = fopen($_FILES['file']['tmp_name'], 'rb');
            $filecontent = fread($handle, filesize($_FILES['file']['tmp_name']));

            $xml = simplexml_load_string($filecontent);
            if ($xml === false) {
                echo "Failed loading XML: ";
                foreach(libxml_get_errors() as $error) {
                    echo "<br>", $error->message;
                }
            } else {
                $filtered_xml = [];
                foreach( $xml as $node ) {
                    if ($node->ma_quoc_tich == "VNM") {
                        $filtered_xml[] = $node;
                    }
                }
                return $filtered_xml;
            }
    
        } else {
            die("no file uploaded");
        }
    }
    function get_name($name) {

        $name = explode(" ", $name);
        $count = count($name);
        $_return_name['first_name'] = $name[$count - 1];
        unset($name[$count - 1]);
        $_return_name['last_name'] = trim(implode(" ", $name));
        return $_return_name;
    }
    function convert_data($unformated_data) 
    {
        $formated_data = [];
        foreach ($unformated_data as $node) {
            $name = get_name($node->ho_ten);
            $formated_data[] = [
                $node->ngay_den . " 12:00",
                $node->ngay_di_du_kien . " 12:00",
                ((string) $node->ngay_den == (string) $node->ngay_di_du_kien) ? "Đúng" : "Sai",
                (int) $node->so_phong,
                $name['last_name'],
                $name['first_name'],
                (string) $node->ngay_sinh,
                ($node->gioi_tinh == "F") ? "Nữ" : "Nam",
                "Chứng minh nhân dân",
                (string) $node->so_ho_chieu,
                NULL,
                "Kinh",
                NULL,
                "Du lịch",
                "Việt Nam",
                "TP. Hồ Chí Minh",
                NULL,
                NULL,
                NULL,
                NULL,
            ];
        }
        return $formated_data;
    }

    $data = convert_data(get_data()); // convert data from XML to Spreadsheet Array

    $spreadsheet = IOFactory::load("original.xlsx");

    $spreadsheet->getActiveSheet()->fromArray(
        $data,
        NULL,
        'A2'
    );

    $today = date("Y-m-d");


    // redirect output to client browser
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $today . '.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');

