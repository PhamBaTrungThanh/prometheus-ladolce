<?php

    require_once("functions.php");

    use Spatie\ArrayToXml\ArrayToXml;
    
    $data = get_data(true);
    $filtered_xml = [];
    foreach( $data as $node ) {
        if ($node->ma_quoc_tich != "VNM") {
            $filtered_xml[] = $node;
        }
    }
    $deleting_node = $data->xpath("/KHAI_BAO_TAM_TRU/THONG_TIN_KHACH[ma_quoc_tich='VNM']");
    while ($data->xpath("/KHAI_BAO_TAM_TRU/THONG_TIN_KHACH[ma_quoc_tich='VNM']")) {
        unset($data->xpath("/KHAI_BAO_TAM_TRU/THONG_TIN_KHACH[ma_quoc_tich='VNM']")[0][0]);
    }
    header('Content-type: text/xml');
    header('Content-Disposition: attachment; filename="' . date("Y-m-d") . '.xml"');
    
    echo $data->saveXML();


    //echo $xml;