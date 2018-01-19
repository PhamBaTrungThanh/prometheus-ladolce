<?php
    require 'vendor/autoload.php';
        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\IOFactory;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

        $spreadsheet = IOFactory::load("original.xlsx");

        $spreadsheet->setActiveSheetIndex(0);
        $dataArray = $spreadsheet->getActiveSheet()
        ->rangeToArray(
            'A2:T3',     // The worksheet range that we want to retrieve
            NULL,        // Value that should be returned for empty cells
            TRUE,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
            FALSE,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
            TRUE         // Should the array be indexed by cell row and cell column
        );

        var_dump($dataArray);

        $writer = new Xlsx($spreadsheet);
        $writer->save("result.xlsx");