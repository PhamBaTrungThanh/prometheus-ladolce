<?php 
    require 'vendor/autoload.php';
    function get_data($raw = false) 
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
                
            }
            if ($raw) {
                return $xml;
            } else {
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