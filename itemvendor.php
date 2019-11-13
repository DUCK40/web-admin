<?php

session_start();
if (empty($_SESSION['name'])) {
    header('Location: ./login.php');
}
// echo $_SESSION['name'];

$SHOP_CODE = $_REQUEST['SHOP_CODE'];
$SHOP_NAME = $_REQUEST['SHOP_NAME'];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin FoodPro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Wide selection of forms controls, using the Bootstrap 4 code base, but built with React.">
    <meta name="msapplication-tap-highlight" content="no">

    <link href="./main.css" rel="stylesheet">

    <!-- data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="">Admin</div>

            </div>

            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <?php echo $_SESSION['name']; ?>
                                    </div>
                                    <div class="widget-subheading">
                                        <?php echo $_SESSION['department']; ?>
                                    </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <button id="btnlogout" type="button" class="btn-shadow p-1 btn btn-danger btn-sm show-toastr-example">
                                        <i class="text-white pr-1 pl-1">Logout</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>

                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">

                            <!-- <li class="app-sidebar__heading">Home</li> -->

                            <li>
                                <a href="listvendor.php" class="">
                                    <img src="./assets/images/home.png" width="25" height="25" alt="">
                                    <i class=""></i>
                                    &nbsp; Home
                                </a>
                            </li>


                            <li class="app-sidebar__heading">Item Vendor</li>
                            <li>
                                <!-- <a href="Item_Vendor.php?SHOP_CODE=" class="mm-active"> -->
                                <a id='btnListItem' class="mm-active">
                                    <i class="">
                                    </i>Item Vendor
                                </a>
                            </li>
                            <li>
                                <!-- <a href="Add_Item.php?SHOP_CODE=" class=""> -->
                                <a id='btnAddItem' class="">
                                    <i class="">
                                    </i> Add New Item
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="app-main__outer" style="margin-top:-15px;">
                <div class="app-main__inner">
                    <div class="tab-content">
                        <!-- <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel"> -->
                        <div class="row">
                            <div class="col">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h1><span id="vendorname"></span></h1>

                                        <table id="example" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <!-- <th>ชื่อร้าน</th> -->
                                                    <th>ลำดับ</th>
                                                    <th>ชื่อสินค้า</th>
                                                    <th>Category</th>
                                                    <th>Sub Category</th>
                                                    <th>Type Category</th>
                                                    <th>หน่วยการขาย</th>
                                                    <th>น้ำหนัก (kg)</th>
                                                    <th>กาารขนส่ง</th>
                                                    <th>ขนาดกล่อง</th>
                                                    <th>ราคา</th>
                                                    <th>Is Stock</th>
                                                    <!-- <th>แก้ไขสินค้า</th> -->
                                                    <th>เพิ่มรูปสินค้า</th>
                                                    <th>คำบรรยายสินค้า</th>
                                                    <th>เพิ่ม Dimension</th>
                                                </tr>
                                            </thead>
                                            <tbody id='tablebody'>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div id="divbtnAddNewItem" class="row">
                                    <div class="col">
                                            <button id="btnAddNewItem" class="btn btn-primary btn-lg">เพิ่มสินค้าใหม่</button>
                                    </div>
                                </div> -->

                        <!-- </div>    -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="btnModalUpImg" style='display:none;'>
            เพิ่มรูปสินค้า
        </button>
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p id="modal-body"></p>
                        <form id='fileUploadForm' method="post" enctype="multipart/form-data">
                            เลือกรูปภาพ : <input type="file" name="IMG" accept="image/x-png,image/jpeg"><br>
                            <input type="hidden" name="SHOP_CODE" id="strshopcode">
                            <input type="hidden" name="CATE_CODE" id="strcatecode">
                            <input type="hidden" name="SUB_CATE_CODE" id="strsubcode">
                            <input type="hidden" name="TYPE_CATE_CODE" id="strtypecode">
                            <input type="hidden" name="ADMIN_NAME" id="admin_name"><br>

                            <input id="UpImg" type="button" value="Upload Image" class="btn btn-primary">
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" id="btnModalDesc" style='display:none;'>
            เพิ่มคำบรรยาย
        </button>
        <!-- The Modal -->
        <div class="modal" id="myModal2">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title2"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p id="modal-body2"></p>
                        <!-- <form id='fileUploadForm2' method="post" enctype="multipart/form-data"> -->
                        <!-- Select a file: <input type="file" name="IMG" accept="image/x-png,image/jpeg"><br> -->
                        <textarea rows="15" cols="60" id='txtdesc'></textarea>
                        <input type="hidden" name="SHOP_CODE" id="strshopcode2">
                        <input type="hidden" name="CATE_CODE" id="strcatecode2">
                        <input type="hidden" name="SUB_CATE_CODE" id="strsubcode2">
                        <input type="hidden" name="TYPE_CATE_CODE" id="strtypecode2">

                        <input id="UpDesc" type="button" value="Upload Description" class="btn btn-primary">
                        <!-- </form> -->
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal3" id="btnModalDim" style='display:none;'>
            เพิ่ม Dimension
        </button>
        <!-- The Modal -->
        <div class="modal" id="myModal3">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title3"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p id="modal-body2"></p>

                        <input type="hidden" name="GOODS_CODE" id="strgoodcode">

                        <div class="row">
                            <div class="col-md-4">
                                <label for="exampleEmail" class="">กว้าง (เซนติเมตร) <br>
                                    <font color='red'>*(Dimension X)</font>
                                </label>
                                <input name="dimx" id="dimx" placeholder="" type="number" class="form-control" min="0" value="1">
                            </div>

                            <div class="col-md-4">
                                <label for="exampleEmail" class="">ยาว (เซนติเมตร) <br>
                                    <font color='red'>*(Dimension Y)</font>
                                </label>
                                <input name="dimy" id="dimy" placeholder="" type="number" class="form-control" min="0" value="1">
                            </div>

                            <div class="col-md-4">
                                <label for="exampleEmail" class="">สูง (เซนติเมตร) <br>
                                    <font color='red'>*(Dimension Z)</font>
                                </label>
                                <input name="dimz" id="dimz" placeholder="" type="number" class="form-control" min="0" value="1">
                            </div>
                        </div>

                        <br>
                        <input id="UpDim" type="button" value="บันทึก" class="btn btn-primary">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>



        <script type="text/javascript" src="./assets/scripts/main.js"></script>

        <!-- data table -->
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- boostrap -->
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        <!-- <script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script> -->

        <!-- <script>
    $(document).ready(function() {
       var table = $('#example').DataTable({
            "ajax": "data_item_vendor.json",
            "columnDefs": [ 
                {
                    "targets": -1,
                    "data": null,
                    "defaultContent": "<button id='btnDetail'>ดูรายละเอียด</button>"
                }
            ]
        });
    });


    $('#example tbody').on( 'click', '#btnDetail', function () {
        alert('btnDetail ดูรายละเอียดสินค้า')
    } );

    $('#divbtnAddNewItem').on( 'click', '#btnAddNewItem', function () {
        alert('btnAddNewItem เพิ่มสินค้าใหม่')
    } );

</script> -->

        <script>
            $(document).ready(function() {

                var admin_name = '<?php echo $_SESSION['name']; ?>'
                var SHOP_CODE = '<?php echo $SHOP_CODE; ?>'
                var SHOP_NAME = '<?php echo $SHOP_NAME; ?>'
                console.log("123456789"+SHOP_NAME)

                $('#vendorname').html("<font color='blue'>" + SHOP_NAME + "</font>")

                const url_global = 'http://127.0.0.1:4200';


                // const url_global = 'http://203.150.52.242:4200';
                // const url_global = 'http://192.168.1.175:4200';
                // const url_global = 'https://apidev.foodproonline.com';
                // const url_global = 'http://203.150.52.247:4200';

                $("#btnAddItem").click(function() {
                    // alert($('#vendorname').text())
                    window.location = './additem.php?SHOP_CODE=' + SHOP_CODE + '&SHOP_NAME=' + SHOP_NAME
                });

                $("#btnListItem").click(function() {
                    // alert($('#vendorname').text())
                    window.location = './itemvendor.php?SHOP_CODE=' + SHOP_CODE + '&SHOP_NAME=' + SHOP_NAME
                });

                loadtable_itemvendor()

                function loadtable_itemvendor() {
                    $('#example').DataTable().destroy();
                    $('#example tbody').empty();
                    $.get(url_global + '/api/v1_0/master/getlistitemshop/' + SHOP_CODE).done(function(jsonData) {
                        // var jsonData = JSON.parse(data)
                        // alert(JSON.stringify(jsonData['STATUS']))
                        // alert(JSON.stringify(jsonData['RESULT']))
                        // console.log(JSON.stringify(jsonData['RESULT']))
                        // console.log(jsonData)
                        var append = ""
                        if (jsonData['STATUS'] == 1) {
                            var dataRes = jsonData['RESULT']

                            // var shopnameshow = dataRes[0]['SHOP_NAME_TH']
                            // $('#vendorname').html("<font color='blue'>" + shopnameshow + "</font>")
                            var count = 1
                            if (dataRes.length != 0) {
                                for (var i = 0; i < dataRes.length; i++) {
                                    count = i + 1
                                    var SHOP_NAME_TH = dataRes[i]['SHOP_NAME_TH']
                                    var GOODS_CODE = dataRes[i]['GOODS_CODE']
                                    var GOODS_NAME_TH = dataRes[i]['GOODS_NAME_TH']
                                    var CATE_NAME_TH = dataRes[i]['CATE_NAME_TH']
                                    var SUB_CATE_NAME_TH = dataRes[i]['SUB_CATE_NAME_TH']
                                    var TYPE_CATE_NAME_TH = dataRes[i]['TYPE_CATE_NAME_TH']
                                    var UNIT_NAME_TH = dataRes[i]['UNIT_NAME_TH']
                                    var SUM_WEIGHT = dataRes[i]['SUM_WEIGHT']
                                    var SEND_NAME_TH = dataRes[i]['SEND_NAME_TH']
                                    var DIM_NAME_TH = dataRes[i]['DIM_NAME_TH']
                                    var PRICE = dataRes[i]['PRICE']
                                    var IS_PROMOTE = dataRes[i]['IS_PROMOTE']
                                    var IS_STOCK = dataRes[i]['IS_STOCK']
                                    var SHARE_LINK = dataRes[i]['SHARE_LINK']
                                    var CREATE_BY = dataRes[i]['CREATE_BY']
                                    var IMG = dataRes[i]['IMG']
                                    var CATE_CODE = dataRes[i]['CATE_CODE']
                                    var SUB_CATE_CODE = dataRes[i]['SUB_CATE_CODE']
                                    var TYPE_CATE_CODE = dataRes[i]['TYPE_CATE_CODE']
                                    var DESC = dataRes[i]['DESC']
                                    var DIMX = dataRes[i]['GOODS_DIM_X']

                                    // var btn0 = "<button class='btnEdit'> แก้ไขสินค้า </button>"
                                    var btn1 = ""
                                    var btn2 = ""
                                    let btn3 = ""

                                    if (DIMX == null) {
                                        btn3 = "<button class='btnDim btn btn-danger'> Dimension </button>"
                                    } else {
                                        btn3 = "<button class='btnDim btn btn-success'> Dimension </button>"
                                    }

                                    if (IMG < 4) {
                                        btn1 = "<button class='btnAddImg'> เพิ่มรูปสินค้า (" + IMG + ") </button>"
                                    } else {
                                        btn1 = "<button class='btnAddImg' disabled> เพิ่มรูปสินค้า (" + IMG + ") </button>"
                                    }

                                    if (DESC != null) {
                                        if (DESC.length == 0) {
                                            btn2 = "<button class='btnDesc btn btn-danger'> เพิ่มคำบรรยาย </button>"
                                        } else {
                                            btn2 = "<button class='btnDesc btn btn-success'> เพิ่มคำบรรยาย </button>"
                                        }
                                    } else {
                                        btn2 = "<button class='btnDesc btn btn-danger'> เพิ่มคำบรรยาย </button>"
                                    }

                                    append = append + "<tr>"
                                    // append = append + "<td class='shop_name_th'>" + SHOP_NAME_TH + "</td>"
                                    append = append + "<td>" + count + "</td>"
                                    append = append + '<td class="goods_name_th"><a href="/web-admin-foodpro/edititemvender.php?SHOP_CODE=' + SHOP_CODE +'&GOODS_CODE=' + GOODS_CODE +' ">' + GOODS_NAME_TH + '</a><input class="goodcode" type="hidden" value="' + SHOP_CODE + '"></td>'

                                    // append = append + "<td class='goods_name_th'>" + GOODS_NAME_TH + "<input class='goodcode' type='hidden' value='" + GOODS_CODE + "'></td>"
                                    append = append + "<td class='strcate'>" + CATE_NAME_TH + "<input class='catecode' type='hidden' value='" + CATE_CODE + "'></td>"
                                    append = append + "<td class='strsub'>" + SUB_CATE_NAME_TH + "<input class='subcode' type='hidden' value='" + SUB_CATE_CODE + "'></td>"
                                    append = append + "<td class='strtype'>" + TYPE_CATE_NAME_TH + "<input class='typecode' type='hidden' value='" + TYPE_CATE_CODE + "'></td>"
                                    append = append + "<td>" + UNIT_NAME_TH + "</td>"
                                    append = append + "<td>" + SUM_WEIGHT + "</td>"
                                    append = append + "<td>" + SEND_NAME_TH + "</td>"
                                    append = append + "<td>" + DIM_NAME_TH + "</td>"
                                    append = append + "<td>" + PRICE + "</td>"
                                    append = append + "<td>" + IS_STOCK + "</td>"
                                    // append = append + "<td class='btn0'>" + btn0 + "</td>"
                                    append = append + "<td class='btn1'>" + btn1 + "</td>"
                                    append = append + "<td class='btn2'>" + btn2 + "</td>"
                                    append = append + "<td class='btn3'>" + btn3 + "</td>"
                                    append = append + "</tr>"
                                }

                                //alert(append)
                                // console.log(append);
                                // alert(SHOP_NAME_TH);
                                // console.log(SHOP_NAME_TH);

                                $('#tablebody').append(append)

                                var table = $('#example').DataTable({
                                    'paging': false,
                                    'columnDefs': [{
                                            "targets": [0, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
                                            "className": "text-center"
                                        },
                                        {
                                            "targets": 1,
                                            "className": "text-center",
                                            "width": "10%"
                                        },
                                        {
                                            "targets": 2,
                                            "className": "text-center",
                                            "width": "8%"
                                        },
                                        {
                                            // "targets": [-1],
                                            // "visible": false,
                                            // "searchable": false
                                        },
                                    ]
                                })

                            } else {
                                // alert("dataRes.length == 0 |||||| ไม่พบข้อมูล");
                                alert("ร้านนี้ยังไม่มีสินค้า")
                                var table = $('#example').DataTable();
                            }
                        } else {
                            alert('STATUS ไม่เท่ากับ 1')
                            var table = $('#example').DataTable()
                        }



                        $('#example').find('tbody').find('tr').each(function() {
                            // var shop_name_th = $(this).find('.shop_name_th').text()
                            var goods_name_th = $(this).find('.goods_name_th').text()
                            var goodcode = $(this).find('.goods_name_th').find('.goodcode').val()

                            var catecode = $(this).find('.strcate').find('.catecode').val()
                            var subcode = $(this).find('.strsub').find('.subcode').val()
                            var typecode = $(this).find('.strtype').find('.typecode').val()

                            // $(this).find('.btn0').find('.btnEdit').off('click').on('click', function() {
                            //     alert("แก้ไขสินค้า " + goods_name_th)
                            // })

                            $(this).find('.btn1').find('.btnAddImg').off('click').on('click', function() {
                                // alert("แก้ไขสินค้า " + goods_name_th)
                                // alert(SHOP_CODE)
                                // alert(catecode)
                                // alert(subcode)
                                // alert(typecode)

                                // $('#modal-body').html(shopname)
                                $('#strshopcode').val(SHOP_CODE);
                                $('#strcatecode').val(catecode);
                                $('#strsubcode').val(subcode);
                                $('#strtypecode').val(typecode);
                                $('#admin_name').val(admin_name);

                                $("#btnModalUpImg").click();
                                $('#modal-title').html('ชื่อสินค้า: ' + goods_name_th);
                                // alert($('#strshopcode').val())
                                // alert($('#strcatecode').val())
                                // alert($('#strsubcode').val())
                                // alert($('#strtypecode').val())
                            })

                            $(this).find('.btn2').find('.btnDesc').off('click').on('click', function() {
                                //alert("แก้ไขร้าน33 " + shopname)
                                $('#strshopcode2').val(SHOP_CODE);
                                $('#strcatecode2').val(catecode);
                                $('#strsubcode2').val(subcode);
                                $('#strtypecode2').val(typecode);

                                $("#btnModalDesc").click();
                                $('#txtdesc').val('')
                                $('#modal-title2').html('ชื่อสินค้า: ' + goods_name_th);

                                $.get(url_global + '/api/v1_0/shop/getitemdesc/' + SHOP_CODE + "/" + catecode + "/" + subcode + "/" + typecode).done(function(jsonData) {
                                    // console.log(jsonData)
                                    if (jsonData['STATUS'] == 1) {
                                        var dataRes = jsonData['RESULT']
                                        // $('#vendorname').html("<font color='blue'>" + dataRes[0]['SHOP_NAME_TH'] + "</font>")

                                        if (dataRes.length != 0) {
                                            $('#txtdesc').val(dataRes[0]['GOODS_DESC_TH'])
                                        } else {
                                            $('#txtdesc').val('')
                                        }
                                    }
                                })
                            })

                            $(this).find('.btn3').find('.btnDim').off('click').on('click', function() {
                                // alert(goodcode)
                                $('#strgoodcode').val(goodcode);
                                $("#btnModalDim").click();
                                $('#modal-title3').html('เพิ่ม Dimension สินค้า : ' + goods_name_th);

                                $.get(url_global + '/api/v1_0/master/updatedimension/' + goodcode).done(function(jsonData) {
                                    console.log(jsonData)
                                    if (jsonData['STATUS'] == 1) {
                                        var dataRes = jsonData['RESULT']
                                        // $('#vendorname').html("<font color='blue'>" + dataRes[0]['SHOP_NAME_TH'] + "</font>")

                                        if (dataRes.length != 0) {
                                            if (dataRes[0]['GOODS_DIM_X'] == null) {
                                                $('#dimx').val(0)
                                            } else {
                                                $('#dimx').val(dataRes[0]['GOODS_DIM_X'])
                                            }

                                            if (dataRes[0]['GOODS_DIM_Y'] == null) {
                                                $('#dimy').val(0)
                                            } else {
                                                $('#dimy').val(dataRes[0]['GOODS_DIM_Y'])
                                            }

                                            if (dataRes[0]['GOODS_DIM_Z'] == null) {
                                                $('#dimz').val(0)
                                            } else {
                                                $('#dimz').val(dataRes[0]['GOODS_DIM_Z'])
                                            }
                                        } else {
                                            // $('#txtdesc').val('')
                                        }
                                    }
                                })

                            })

                        })

                    })
                }

                $('#UpDim').click(function(event) {
                    let dimx = $('#dimx').val()
                    let dimy = $('#dimy').val()
                    let dimz = $('#dimz').val()
                    let goodcode = $('#strgoodcode').val()

                    if (dimx.length > 0 && dimy.length > 0 && dimz.length > 0) {
                        $.post(url_global + '/api/v1_0/master/updatedimension', {
                            "GOODS_CODE": goodcode,
                            "GOODS_DIM_X": dimx,
                            "GOODS_DIM_Y": dimy,
                            "GOODS_DIM_Z": dimz,
                            "ADMIN_NAME": admin_name,
                            "SHOP_CODE": SHOP_CODE

                        }).done(function(data) {
                            // console.log(data)
                            if (data['STATUS'] == 1) {
                                var dataRes = data['RESULT']
                                if (dataRes == 'SUCCESS') {
                                    alert("บันทึกสำเร็จ")
                                    location.reload();
                                } else {
                                    alert("ไม่สำเร็จ แจ้งแอดมิน")
                                }
                            } else {
                                alert("ไม่สำเร็จ แจ้งแอดมิน")
                            }
                        })
                    } else {
                        if (dimx.length == 0) {
                            alert('ไม่มี แกน X');
                            $('#dimx').focus();
                        } else if (dimy.length == 0) {
                            alert('ไม่มี แกน Y');
                            $('#dimy').focus();
                        } else if (dimz.length == 0) {
                            alert('ไม่มี แกน Z');
                            $('#dimz').focus();
                        }
                    }
                });

                $('#UpDesc').click(function(event) {
                    // alert('dsfsdsf')
                    var strshopcode2 = $('#strshopcode2').val();
                    var strcatecode2 = $('#strcatecode2').val();
                    var strsubcode2 = $('#strsubcode2').val();
                    var strtypecode2 = $('#strtypecode2').val();
                    var txtdesc = $('#txtdesc').val().trim();

                    if (txtdesc.length <= 500) {
                        $.post(url_global + "/api/v1_0/shop/getitemdesc", {
                            "CATE_CODE": strcatecode2,
                            "SUB_CATE_CODE": strsubcode2,
                            "SHOP_CODE": strshopcode2,
                            "TYPE_CATE_CODE": strtypecode2,
                            "GOODS_DESC_TH": txtdesc,
                            "ADMIN_NAME": admin_name

                        }).done(function(data) {
                            if (data['STATUS'] == 1) {
                                var dataRes = data['RESULT']
                                if (dataRes == 'SUCCESS') {
                                    alert("บันทึกสำเร็จ")
                                    location.reload();
                                } else {
                                    alert("ไม่สำเร็จ แจ้งแอดมิน")
                                }
                            } else {
                                alert("ไม่สำเร็จ แจ้งแอดมิน")
                            }
                            // console.log(data)
                            // alert(data)
                        });
                    } else {
                        alert('ตัวอักษรเกิน 500')
                    }
                });

                $('#UpImg').click(function(event) {
                    var url = url_global + '/api/v1_0/shop/uploadpicshopitem'
                    // alert('ddd')
                    event.preventDefault();

                    // Get form
                    var form = $('#fileUploadForm')[0];

                    // Create an FormData object 
                    var data = new FormData(form);

                    // If you want to add an extra field for the FormData
                    // data.append("CustomField", "This is some extra data, testing");

                    // disabled the submit button
                    // $("#btnSubmit").prop("disabled", true);

                    $.ajax({
                        type: "POST",
                        enctype: 'multipart/form-data',
                        url: url,
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function(data) {
                            // console.log(data);
                            // console.log(data['STATUS']);
                            if (data['STATUS'] == 1) {
                                if (data['RESULT'] == 'SUCCESS') {
                                    alert("บึกทึกรูปภาพสำเร็จ");
                                    location.reload();
                                } else {
                                    alert("ผิดพลาด");
                                }
                            } else {
                                alert("ผิดพลาด");
                            }

                            // $("#result").text(data);
                            // console.log("SUCCESS : ", data);
                            // $("#btnSubmit").prop("disabled", false);

                        },
                        error: function(e) {

                            // $("#result").text(e.responseText);
                            console.log("ERROR : ", e);
                            // $("#btnSubmit").prop("disabled", false);

                        }
                    });
                });

            })

            $('#btnlogout').click(function() {
                window.location = './logout.php'
            })
        </script>

</body>

</html>