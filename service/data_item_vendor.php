<?php
$SHOP_CODE = $_REQUEST['SHOP_CODE'];
//$SHOP_CODE = 'V190624002';
//echo $SHOP_CODE;

echo __MAIN__($SHOP_CODE );

function __MAIN__($SHOP_CODE ){
    return getData($SHOP_CODE );
}

function getData($SHOP_CODE){
    require_once('connect.php');
    $conn = pg_connect("$host $port $dbname $credentials");

    //$SHOP_CODE = 'V190617005';
    //echo $SHOP_CODE;
    //$SHOP_CODE = $SHOP_CODE;
    
    $query = ' SELECT 
    "M_SHOP"."SHOP_NAME_TH",
    "M_GOODS"."GOODS_CODE", "M_GOODS"."GOODS_NAME_TH", 
    "G_CATEGORY"."CATE_NAME_TH",
    "G_SUBCATEGORY"."SUB_CATE_NAME_TH",
    "G_TYPECATEGORY"."TYPE_CATE_NAME_TH",
    "G_UNIT"."UNIT_NAME_TH",
    "M_GOODS"."SUM_WEIGHT",
    "G_SEND"."SEND_NAME_TH",
    "G_DIMENSION"."DIM_NAME_TH",
    "M_GOODS"."PRICE", 
    "M_GOODS"."IS_PROMOTE", 
    "M_GOODS"."IS_STOCK", 
    "M_GOODS"."SHARE_LINK", 
    "M_GOODS"."CREATE_BY"
        FROM "M_GOODS"
        INNER JOIN "G_CATEGORY" ON "M_GOODS"."CATE_CODE" = "G_CATEGORY"."CATE_CODE"
        INNER JOIN "G_SUBCATEGORY" ON "M_GOODS"."SUB_CATE_CODE" = "G_SUBCATEGORY"."SUB_CATE_CODE"
        INNER JOIN "G_UNIT" ON "M_GOODS"."UNIT_CODE" = "G_UNIT"."UNIT_CODE"
        INNER JOIN "G_SEND" ON "M_GOODS"."SEND_CODE" = "G_SEND"."SEND_CODE"
        INNER JOIN "G_DIMENSION" ON "M_GOODS"."DIM_CODE" = "G_DIMENSION"."DIM_CODE"
        INNER JOIN "M_SHOP" ON "M_GOODS"."SHOP_CODE" = "M_SHOP"."SHOP_CODE"
        INNER JOIN "G_TYPECATEGORY" ON "M_GOODS"."TYPE_CATE_CODE" = "G_TYPECATEGORY"."TYPE_CATE_CODE"
        WHERE "M_GOODS"."SHOP_CODE" = \''.$SHOP_CODE.'\' ';
        //return $query;
        //echo $query;

    $result = pg_query($conn, $query) or die('Error message: ' . pg_last_error());
    
    while ($row = pg_fetch_assoc($result)) {
        //var_dump($row);
        $SHOP_NAME_TH = $row['SHOP_NAME_TH'];
        $GOODS_CODE = $row['GOODS_CODE'];
        $GOODS_NAME_TH = $row['GOODS_NAME_TH'];
        $CATE_NAME_TH = $row['CATE_NAME_TH'];
        $SUB_CATE_NAME_TH = $row['SUB_CATE_NAME_TH'];
        $TYPE_CATE_NAME_TH = $row['TYPE_CATE_NAME_TH'];
        $UNIT_NAME_TH = $row['UNIT_NAME_TH'];
        $SUM_WEIGHT = $row['SUM_WEIGHT'];
        $SEND_NAME_TH = $row['SEND_NAME_TH'];
        $DIM_NAME_TH = $row['DIM_NAME_TH'];
        $PRICE = $row['PRICE'];
        $IS_PROMOTE = $row['IS_PROMOTE'];
        $IS_STOCK = $row['IS_STOCK'];
        $SHARE_LINK = $row['SHARE_LINK'];
        $CREATE_BY = $row['CREATE_BY'];


        $data[] = array("SHOP_NAME_TH"=>$SHOP_NAME_TH, "GOODS_CODE"=>$GOODS_CODE, "GOODS_NAME_TH"=>$GOODS_NAME_TH, "CATE_NAME_TH"=>$CATE_NAME_TH, "SUB_CATE_NAME_TH"=>$SUB_CATE_NAME_TH,
        "TYPE_CATE_NAME_TH"=>$TYPE_CATE_NAME_TH, "UNIT_NAME_TH"=>$UNIT_NAME_TH, "SUM_WEIGHT"=>$SUM_WEIGHT, "SEND_NAME_TH"=>$SEND_NAME_TH, "DIM_NAME_TH"=>$DIM_NAME_TH, 
        "PRICE"=>$PRICE, "IS_PROMOTE"=>$IS_PROMOTE, "IS_STOCK"=>$IS_STOCK, "SHARE_LINK"=>$SHARE_LINK, "CREATE_BY"=>$CREATE_BY,);

    }

    pg_free_result($result);
    pg_close($conn);

    $res = array("STATUS"=>1 ,"RESULT"=>$data);
    return json_encode($res, JSON_UNESCAPED_UNICODE);


    // $arr = array();

    // $arr[]= array("เอื้องสามปอย", "เค้กกล้วย", "S02", "D01", "120", "1 กล่อง");
    // $arr[]= array("เอื้องสามปอย", "เค้กนมสด", "S02", "D01", "120", "1 กล่อง");
    // $arr[]= array("เอื้องสามปอย", "เค้กมะพร้าว", "S02", "D01", "120", "1 กล่อง");
    // $arr[]= array("เอื้องสามปอย", "เค้กสตอเบอรี่", "S02", "D01", "120", "1 กล่อง");
    // $arr[]= array("เอื้องสามปอย", "เค้กส้ม", "S02", "D01", "120", "1 กล่อง");

    // $res = array("STATUS"=>1 ,"RESULT"=>$arr);
    // return json_encode($res, JSON_UNESCAPED_UNICODE);
}

?>