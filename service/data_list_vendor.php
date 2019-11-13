<?php

echo __MAIN__();

function __MAIN__(){
    return getData();
}

function getData(){

    require_once('connect.php');
    $conn = pg_connect("$host $port $dbname $credentials");


    $query = ' SELECT "M_SHOP"."SHOP_CODE","M_SHOP"."SHOP_NAME_TH",
    "M_SHOP"."SHOP_ADDRESS_NO", "G_DISTRICT"."DISTRICT_NAME_TH",
    "G_PROVINCE"."PROVINCE_NAME_TH", "M_SHOP"."SHOP_EMAIL",
    "M_SHOP"."SHOP_PHONE" FROM "M_SHOP"
    INNER JOIN "G_PROVINCE" ON "M_SHOP"."PROVINCE_CODE" = "G_PROVINCE"."PROVINCE_CODE"
    INNER JOIN "G_DISTRICT" ON "M_SHOP"."DISTRICT_CODE" = "G_DISTRICT"."DISTRICT_CODE"
    WHERE "SHOP_STATUS" = 2 ';
    $result = pg_query($conn, $query) or die('Error message: ' . pg_last_error());
    
    // $row = pg_fetch_assoc($result);
    while ($row = pg_fetch_assoc($result)) {
        //var_dump($row);
        //echo($row[0]);
        // return $row['SHOP_ADDRESS_NO'];
        $SHOP_CODE = $row['SHOP_CODE'];
        $SHOP_NAME_TH = $row['SHOP_NAME_TH'];
        $SHOP_ADDRESS_NO = $row['SHOP_ADDRESS_NO'];
        $DISTRICT_NAME_TH = $row['DISTRICT_NAME_TH'];
        $PROVINCE_NAME_TH = $row['PROVINCE_NAME_TH'];
        $SHOP_EMAIL = $row['SHOP_EMAIL'];
        $SHOP_PHONE = $row['SHOP_PHONE'];
        $data[] = array("SHOP_CODE"=>$SHOP_CODE, "SHOP_NAME_TH"=>$SHOP_NAME_TH, "SHOP_ADDRESS_NO"=>$SHOP_ADDRESS_NO, "DISTRICT_NAME_TH"=>$DISTRICT_NAME_TH, 
         "PROVINCE_NAME_TH"=>$PROVINCE_NAME_TH, "SHOP_EMAIL"=>$SHOP_EMAIL, "SHOP_PHONE"=>$SHOP_PHONE);

    }

    pg_free_result($result);
    pg_close($conn);


    // $arr = array();
    // $arr[]= array("1", "ชัยชัย", "12345 อยู่นี่", "กำแพง", "eiei@gmail.com", "000-000-0000");
    // $arr[]= array("2", "นาย ป. เนื้อย่างไร้เทียมทาน", "103 ม.13 ต.ป่าขะ", "นครนายก", "matthaya@gmail.com", "062-764-9191");
    // $arr[]= array("3", "บริษัท อินโนโฟ จำกัด", "48/9 ต.หาดใหญ่", "สงขลา", "pariya1623@gmail.com", "086-296-1487");
    // $arr[]= array("4", "สวนมะม่วงแม่กุหลาบ", "3/11 ม.8 ต.เสม็ด", "ชลบุรี", "sirimaksaenwong@gmail.com", "098-284-0851");
    // $arr[]= array("5", "อรุณรุ่ง", "89/11 ม.1 ต.นาแขม", "ปราจีนบุรี", "fon08260@gmail.com", "092-651-4846");


    $res = array("STATUS"=>1 ,"RESULT"=>$data);
    return json_encode($res, JSON_UNESCAPED_UNICODE);

}