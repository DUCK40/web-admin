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



                            <li>
                                <a href="listvendor.php" class="">
                                    <img src="./assets/images/home.png" width="25" height="25" alt="">
                                    <i class=""></i>
                                    &nbsp; Home
                                </a>
                            </li>


                            <li class="app-sidebar__heading">Item Vendor</li>
                            <li>
                                <!-- <a href="Item_Vendor.php?SHOP_CODE=" class=""> -->
                                <a id='btnLItem' class="">
                                    <i class="">
                                    </i>Item Vendor

                                </a>
                            </li>
                            <li>
                                <!-- <a href="Add_Item.php?SHOP_CODE=" class="mm-active"> -->
                                <a id='btnAddItem' class="mm-active">
                                    Edit Item
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
                                        <button id='refcombo1'> Refresh Combo Cate </button>
                                        <!-- <button id='refcombo2'> Refresh Combo Send </button> -->
                                        <!-- <button id='refcombo3'> Refresh Combo Dim </button> -->
                                        <button id='refcombo4'> Refresh Combo Unit </button><br><br>



                                        <!-- ////////////////////////////////////// -->


                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class="">ชื่อสินค้า</label>
                                            <input name="itemname" id="itemname" placeholder="" type="text" class="form-control">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="exampleSelect" class="">Category</label>
                                                    <select name="category" id="category" class="form-control">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="exampleSelect" class="">Sub Category</label>
                                                    <select name="subcategory" id="subcategory" class="form-control">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="exampleSelect" class="">Type Category</label>
                                                    <select name="typecategory" id="typecategory" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                      

                                       

                                     

                                        <div class="position-relative form-group"><label for="exampleSelect" class="">ประเภทการขนส่ง</label>
                                            <select name="send" id="send" class="form-control">
                                            </select>
                                        </div>

                                        <!-- <div class="row">
                                            <div class="col-md-4">
                                                <label for="exampleEmail" class="">กว้าง (เซนติเมตร) <font color='red'>*(Dimension X)</font> </label>
                                                <input name="dimx" id="dimx" placeholder="" type="number" class="form-control" min="0" value="1">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="exampleEmail" class="">ยาว (เซนติเมตร) <font color='red'>*(Dimension Y)</font> </label>
                                                <input name="dimy" id="dimy" placeholder="" type="number" class="form-control" min="0" value="1">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="exampleEmail" class="">สูง (เซนติเมตร) <font color='red'>*(Dimension Z)</font> </label>
                                                <input name="dimz" id="dimz" placeholder="" type="number" class="form-control" min="0" value="1">
                                            </div>
                                        </div> -->

                                        <!-- <div class="position-relative form-group"><label for="exampleSelect" class="">ขนาดกล่อง</label>
                                            <select name="dim" id="dim" class="form-control">
                                            </select>
                                        </div> -->

                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class="">ราคา</label>
                                            <input name="price" id="price" placeholder="" type="number" class="form-control" min="1" value="1">
                                        </div>

                                        <div class="position-relative form-group"><label for="exampleSelect" class="">หน่วยการขาย</label>
                                            <select name="unit" id="unit" class="form-control">
                                            </select>
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class="">น้ำหนัก (กิโลกรัม)</label>
                                            <input name="weight" id="weight" placeholder="" type="number" class="form-control" min="0" value="1">
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class="">น้ำหนัก (กิโลกรัม)</label>
                                            <input name="weight" id="weight" placeholder="" type="number" class="form-control" min="0" value="1">
                                        </div>

                                        <button id='btn0' class="btn btn-primary btn-lg mt-3 mb-3">บันทึก</button>


                                        <!-- ////////////////////////////////////// -->
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- </div> -->

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



        <script>
            $(document).ready(function() {

                var admin_name = '<?php echo $_SESSION['name']; ?>'
                var SHOP_CODE = '<?php echo $SHOP_CODE; ?>'
                var SHOP_NAME = '<?php echo $SHOP_NAME; ?>'

                console.log("123456789" + SHOP_CODE)

                const url_global = 'http://203.150.52.242:4200';
                // const url_global = 'http://192.168.1.175:4200';
                // const url_global = 'https://apidev.foodproonline.com';
                // const url_global = 'http://203.150.52.247:4200';

                // alert(SHOP_CODE);
                $('#vendorname').html("<font color='blue'>" + SHOP_NAME + "</font>")

                // disable scrollmouse in text type number
                $(document).on("wheel", "input[type=number]", function(e) {
                    $(this).blur();
                });

                load_category()
                load_send()
                load_unit()
                // load_dim()


//////////////////////////////////////////////////////
function getItemDetail(shopCode) {
                    $.get(url_global + `/api/v1_0/shop/detail/${shopCode}`).done(function(data) {
                        console.log(data)
                        const shop = data.RESULT
                        $('#shopname').val(shop.SHOP_NAME_TH)
                        $('#market').val(shop.MARKET_CODE)
                        $('#address').val(shop.SHOP_ADDRESS_NO)
                        $('#province').val(shop.PROVINCE_CODE)
                        $('#district').val(shop.DISTRICT_CODE)
                        $('#postcode').val();
                        $('#shopcreateby').val(shop.SHOP_CREATE_BY)
                        $('#firstname').val(shop.MEM_FNAME_TH)
                        $('#lastname').val(shop.MEM_LNAME_TH)
                        $('#uid').val(shop.SHOP_UID)
                        $('#email').val(shop.SHOP_EMAIL)
                        $('#tel').val(shop.SHOP_PHONE)
                        $('#active_lalamove').val()
                        $('#owner_pack').val()
                        $('#receive_from_home').val(shop.IS_RECEIVE_FROM_HOME)
                        $('#servicecenter option:selected').text()
                        $('#servicecenter').val()

                        load_province(shop.PROVINCE_CODE, shop.DISTRICT_CODE)
                        location_dc(shop.DC_LOCATION_ID)
                    })
                }


//////////////////////////////////////////////////////////

                $("#btnLItem").click(function() {
                    // alert($('#vendorname').text())
                    window.location = './itemvendor.php?SHOP_CODE=' + SHOP_CODE
                });

                $("#refcombo1").click(function() {
                    load_category()
                });
                // $("#refcombo2").click(function() {
                //     load_send()
                // });
                // $("#refcombo3").click(function() {
                //     load_dim()
                // });
                $("#refcombo4").click(function() {
                    load_unit()
                });

                const escapeRegExp = (string) => {
                    return string.replace(/[^0-9A-Za-zก-ฮ๐-๙โเแไำะาๆฯใ\s]/g, '')
                }

                // function load_dim() {
                //     $('#dim').empty()
                //     $.get(url_global + '/api/v1_0/master/getdim').done(function(data) {
                //         var append = ""
                //         if (data['STATUS'] == 1) {
                //             var dataRes = data['RESULT']
                //             if (dataRes.length != 0) {
                //                 for (var i = 0; i < dataRes.length; i++) {
                //                     var DIM_CODE = dataRes[i]['value']
                //                     var DIM_NAME_TH = dataRes[i]['label']

                //                     append = append + "<option value='" + DIM_CODE + "'>" + DIM_NAME_TH + "</option>";
                //                 }

                //                 $('#dim').append(append)

                //             } else {
                //                 alert("dataRes.length != 0 |||||| ไม่พบข้อมูล");
                //             }
                //         } else {
                //             alert("Status ไม่เท่ากับ 1")
                //         }
                //     })
                // }

                function load_unit() {
                    $('#unit').empty()
                    $.get(url_global + '/api/v1_0/master/getcombounit').done(function(data) {
                        var append = ""
                        if (data['STATUS'] == 1) {
                            var dataRes = data['RESULT']
                            if (dataRes.length != 0) {
                                for (var i = 0; i < dataRes.length; i++) {
                                    var UNIT_CODE = dataRes[i]['value']
                                    var UNIT_NAME_TH = dataRes[i]['label']

                                    append = append + "<option value='" + UNIT_CODE + "'>" + UNIT_NAME_TH + "</option>";
                                }

                                $('#unit').append(append)

                            } else {
                                alert("dataRes.length != 0 |||||| ไม่พบข้อมูล");
                            }
                        } else {
                            alert("Status ไม่เท่ากับ 1")
                        }
                    })
                }

                function load_send() {
                    $('#send').empty()
                    $.get(url_global + '/api/v1_0/master/getcombosend').done(function(data) {
                        var append = ""
                        if (data['STATUS'] == 1) {
                            var dataRes = data['RESULT']
                            if (dataRes.length != 0) {
                                for (var i = 0; i < dataRes.length; i++) {
                                    var SEND_CODE = dataRes[i]['value']
                                    var SEND_NAME_TH = dataRes[i]['label']

                                    append = append + "<option value='" + SEND_CODE + "'>" + SEND_NAME_TH + "</option>";
                                }

                                $('#send').append(append)

                            } else {
                                alert("dataRes.length != 0 |||||| ไม่พบข้อมูล");
                            }
                        } else {
                            alert("Status ไม่เท่ากับ 1")
                        }
                    })
                }

                function load_category() {
                    $('#category').empty()
                    $('#subcategory').empty()
                    $.get(url_global + '/api/v1_0/master/getcombocate').done(function(data) {
                        var append = ""
                        if (data['STATUS'] == 1) {
                            var dataRes = data['RESULT']
                            if (dataRes.length != 0) {
                                for (var i = 0; i < dataRes.length; i++) {
                                    var CATE_CODE = dataRes[i]['value']
                                    var CATE_NAME_TH = dataRes[i]['label']

                                    append = append + "<option value='" + CATE_CODE + "'>" + CATE_NAME_TH + "</option>";
                                }

                                $('#category').append(append)

                                load_sub_cate($('#category').val())

                            } else {
                                alert("dataRes.length != 0 |||||| ไม่พบข้อมูล");
                            }
                        } else {
                            alert("Status ไม่เท่ากับ 1")
                        }
                    })
                }

                $('#category').change(function(v) {
                    //console.log(v.target.value);
                    // alert(v.target.value);
                    var cate_code = v.target.value;
                    // console.log(province_code);
                    load_sub_cate(cate_code)
                });

                function load_sub_cate(cate_code) {
                    $('#subcategory').empty()
                    $.get(url_global + '/api/v1_0/master/getcombosubcate/' + cate_code).done(function(data) {
                        var append = ""
                        if (data['STATUS'] == 1) {
                            var dataRes = data['RESULT']
                            if (dataRes.length != 0) {
                                for (var i = 0; i < dataRes.length; i++) {
                                    var SUB_CATE_CODE = dataRes[i]['value']
                                    var SUB_CATE_NAME_TH = dataRes[i]['label']

                                    append = append + "<option value='" + SUB_CATE_CODE + "'>" + SUB_CATE_NAME_TH + "</option>";
                                }

                                $('#subcategory').append(append)
                                load_type_cate(cate_code, $('#subcategory').val())
                                // load_district($('#province').val())

                            } else {
                                alert("dataRes.length != 0 |||||| ไม่พบข้อมูล");
                            }
                        } else {
                            alert("Status ไม่เท่ากับ 1")
                        }
                    })
                }

                $('#subcategory').change(function(v) {
                    //console.log(v.target.value);
                    // alert(v.target.value);
                    var cate_code = $('#category').val()
                    //alert(cate_code)
                    var sub_cate_code = v.target.value;
                    // console.log(province_code);
                    load_type_cate(cate_code, sub_cate_code)
                });

                function load_type_cate(cate_code, sub_cate_code) {
                    $('#typecategory').empty()
                    $.get(url_global + '/api/v1_0/master/getcombotypecate/' + cate_code + '/' + sub_cate_code).done(function(data) {
                        // alert(cate_code)
                        // alert(sub_cate_code)
                        // console.log(data)
                        var append = ""
                        if (data['STATUS'] == 1) {
                            var dataRes = data['RESULT']
                            if (dataRes.length != 0) {
                                for (var i = 0; i < dataRes.length; i++) {
                                    var SUB_CATE_CODE = dataRes[i]['value']
                                    var SUB_CATE_NAME_TH = dataRes[i]['label']

                                    append = append + "<option value='" + SUB_CATE_CODE + "'>" + SUB_CATE_NAME_TH + "</option>";
                                }

                                $('#typecategory').append(append)

                                // load_district($('#province').val())

                            } else {
                                alert("dataRes.length != 0 |||||| ไม่พบข้อมูล");
                            }
                        } else {
                            // alert("Status ไม่เท่ากับ 1")
                            append = append + "<option value='0' selected='true' disabled='disabled'>-- ไม่พบข้อมูล แจ้งแอดมินให้เพิ่มข้อมูล --</option>";
                            $('#typecategory').append(append)
                        }
                    })
                }

                $("#btn0").click(function() {
                    var itemname = $('#itemname').val().trim();
                    var category = $('#category').val();
                    var subcategory = $('#subcategory').val();
                    var typecategory = $('#typecategory').val();
                    var unit = $('#unit').val();
                    var send = $('#send').val();
                    // var dim = $('#dim').val();
                    var price = $('#price').val().trim();
                    var weight = $('#weight').val().trim();
                    var dim = 'D01';
                    var dimx = $('#dimx').val();
                    var dimy = $('#dimy').val();
                    var dimz = $('#dimz').val();

                    var shopcode = SHOP_CODE
                    // alert(shopcode)
                    var countstritemname = escapeRegExp(itemname)
                    // console.log(countstritemname)
                    // console.log(countstritemname.length)

                    if (itemname.trim().length > 0 && typecategory != 0 && price != 0 && weight != 0 && dimx.length > 0 && dimy.length > 0 && dimz.length > 0) {
                        //     // alert("ok")
                        if (countstritemname.length <= 20) {
                            $.post(url_global + "/api/v1_0/shop/shopitem", {
                                "CATE_CODE": category,
                                "SUB_CATE_CODE": subcategory,
                                "UNIT_CODE": unit,
                                "SEND_CODE": send,
                                "GOODS_NAME_TH": itemname,
                                "DIM_CODE": dim,
                                "SHOP_CODE": shopcode,
                                "PRICE": price,
                                "IS_PROMOTE": 0,
                                "IS_STOCK": 1,
                                "SHARE_LINK": "www.google.com",
                                "TYPE_CATE_CODE": typecategory,
                                "SUM_WEIGHT": weight,
                                "CREATE_BY": admin_name,
                                "GOODS_DIM_X": dimx,
                                "GOODS_DIM_Y": dimy,
                                "GOODS_DIM_Z": dimz

                            }).done(function(data) {
                                if (data['STATUS'] == 1) {
                                    var dataRes = data['RESULT']
                                    if (dataRes == 'SUCCESS') {
                                        alert("บันทึกสำเร็จ")
                                        window.location = './itemvendor.php?SHOP_CODE=' + shopcode + '&SHOP_NAME=' + SHOP_NAME
                                    } else {
                                        alert("ไม่สำเร็จ แจ้งแอดมิน")
                                    }
                                } else {
                                    alert("ไม่สำเร็จ แจ้งแอดมิน")
                                }
                                // console.log(data)
                                // alert(data)
                            });
                            // alert('ไม่เกิน20')
                        } else {
                            alert('ชื่อสินค้าเกิน 20 ตัวอักษร')
                            $('#itemname').focus();
                        }
                    } else {
                        // alert("0000")
                        if (itemname.trim().length == 0) {
                            alert('ไม่มี ชื่อสินค้า');
                            $('#itemname').focus();
                        } else if (typecategory == 0) {
                            alert('แจ้งแอดมิน ให้เพิ่มข้อมูล');
                        } else if (price == 0) {
                            alert('ไม่มี ราคา');
                            $('#price').focus();
                        } else if (weight == 0) {
                            alert('ไม่มี น้ำหนัก');
                            $('#weight').focus();
                        } else if (dimx.length == 0) {
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
                })

            })

            $('#btnlogout').click(function() {
                window.location = './logout.php'
            })
        </script>

</body>

</html>