<?php
session_start();
if (empty($_SESSION['name'])) {
    header('Location: ./login.php');
}
// echo $_SESSION['name'];
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
    <!-- boostrap -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

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

                            <li class="app-sidebar__heading">Vendor</li>
                            <li>
                                <a href="listvendor.php" class="mm-active">
                                    <i class="">
                                    </i>List Vendor
                                </a>
                                <a href="registervendor.php" class="">
                                    <i class="">
                                    </i>Register New Vendor
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
                                        <h5 class="card-title">List Vendor</h5>

                                        <table id="example" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>ชื่อร้าน</th>
                                                    <th>ที่อยู่ร้าน</th>
                                                    <th>เขต/อำเภอ</th>
                                                    <th>จังหวัด</th>
                                                    <th>อีเมล</th>
                                                    <th>เบอร์โทร</th>
                                                    <!-- <th>แก้ไขร้านค้า</th> -->
                                                    <th>สถานะร้านค้า</th>
                                                    <th>Upload Profile</th>
                                                    <th>Upload Banner</th>
                                                    <th>เพิ่มบัญชีร้านค้า</th>
                                                    <th>สินค้าในร้าน</th>
                                                </tr>
                                            </thead>

                                            <tbody id='tablebody'>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </div>    -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="btnModalUpProfile" style='display:none;'>
            Upload Profile
        </button>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Upload Profile &nbsp;&nbsp;&nbsp;</h4>
                        <h4 class="modal-title" id="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h5>
                            <p id="modal-body"></p>
                        </h5>
                        <form id='fileUploadForm' method="post" enctype="multipart/form-data">
                            เลือกรูปภาพโปรไฟล์ : <input type="file" name="IMG" accept="image/x-png,image/jpeg"><br>
                            <input type="hidden" name="SHOP_CODE" id="strshopcode"><br>
                            <input type="hidden" name="ADMIN_NAME" id="admin_name"><br>
                            <input id="UploadProfile" type="button" value="UPLOAD PEOFILE" class="btn btn-primary">
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" id="btnModalUpBanner" style='display:none;'>
            Upload Banner
        </button>

        <!-- The Modal -->
        <div class="modal" id="myModal2">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Upload Banner &nbsp;&nbsp;&nbsp;</h4>
                        <h4 class="modal-title" id="modal-title2"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h5>
                            <p id="modal-body2"></p>
                        </h5>
                        <form id='fileUploadForm2' method="post" enctype="multipart/form-data">
                            เลือกรูปภาพแบนเนอร์ : <input type="file" name="IMG" accept="image/x-png,image/jpeg"><br>
                            <input type="hidden" name="SHOP_CODE" id="strshopcode2"><br>
                            <input type="hidden" name="ADMIN_NAME" id="admin_name2"><br>
                            <input id="UpBanner" type="button" value="UPLOAD BANNER" class="btn btn-primary">
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal3" id="btnBankAccount" style='display:none;'>
            Bank Account
        </button>

        <!-- The Modal -->
        <div class="modal" id="myModal3">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Bank Account &nbsp;&nbsp;&nbsp;</h4>
                        <h4 class="modal-title" id="modal-title3"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h5>
                            <p id="modal-body3"></p>
                        </h5>
                        <!-- <form id='fileUploadForm3' method="post" enctype="multipart/form-data"> -->
                        <div class="position-relative form-group"><label for="exampleSelect" class="">ธนาคาร</label>
                            <select name="bank" id="bank" class="form-control">
                            </select>
                        </div>
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">ชื่อบัญชี</label>
                            <input name="accname" id="accname" placeholder="" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">เลขที่บัญชี</label>
                            <input name="accno" id="accno" placeholder="" type="text" class="form-control">
                        </div>

                        <input id="shopcode" type="hidden">

                        <input id="UpBank" type="button" value="บันทึก" class="btn btn-primary">
                        <!-- </form> -->
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
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

                const url_global = 'http://203.150.52.242:4200';
                // const url_global = 'http://192.168.1.175:4200';
                // const url_global = 'https://apidev.foodproonline.com';
                // const url_global = 'http://203.150.52.247:4200';

                loadtable_listvendor()

                function loadtable_listvendor() {
                    $('#example').DataTable().destroy();
                    $('#example tbody').empty();

                    $.get(url_global + '/api/v1_0/master/getlistshop').done(function(jsonData) {
                        // var jsonData = JSON.parse(data)
                        // alert(JSON.stringify(jsonData['STATUS']))
                        // console.log(JSON.stringify(jsonData['RESULT']))
                        console.log(jsonData)
                        var append = ""
                        if (jsonData['STATUS'] == 1) {
                            var dataRes = jsonData['RESULT']
                            var count = 1
                            if (dataRes.length != 0) {
                                for (var i = 0; i < dataRes.length; i++) {
                                    count = i + 1 //ลำดับ
                                    var SHOP_CODE = dataRes[i]['SHOP_CODE'] // SHOPCODE
                                    var SHOP_NAME_TH = dataRes[i]['SHOP_NAME_TH'] // ชื่อร้าน
                                    var SHOP_ADDRESS_NO = dataRes[i]['SHOP_ADDRESS_NO'] // ที่อยู่
                                    var DISTRICT_NAME_TH = dataRes[i]['DISTRICT_NAME_TH'] // อำเภอ
                                    var PROVINCE_NAME_TH = dataRes[i]['PROVINCE_NAME_TH'] // จังหวัด
                                    var SHOP_EMAIL = dataRes[i]['SHOP_EMAIL'] // อีเมล
                                    var SHOP_PHONE = dataRes[i]['SHOP_PHONE'] // เบอร์โทร
                                    var SHOP_STATUS = dataRes[i]['SHOP_STATUS']
                                    var SHOP_IMG_PATH_PROFILE = dataRes[i]['SHOP_IMG_PATH_PROFILE']
                                    var SHOP_IMG_PATH_BANNER = dataRes[i]['SHOP_IMG_PATH_BANNER']
                                    var ITEM = dataRes[i]['ITEM']
                                    var B_CODE = dataRes[i]['B_CODE']
                                    // var btn0 = "<button class='btnEdit'> แก้ไข </button>" //แก้ไขร้าน
                                    var strStatus = ''
                                    var btnProfile = '' //Upload Profile
                                    var btnBanner = '' //Upload Banner
                                    var btnAccount = ''
                                    var btnViewItem = '' //สินค้าในร้าน

                                    if (SHOP_STATUS == 2) {
                                        strStatus = '<font color="green">ใช้งาน</font>'

                                        if (SHOP_IMG_PATH_PROFILE == 0) {
                                            btnProfile = '<button class="btnUploadProfile btn btn-warning " type="button">Upload</button>'
                                        } else {
                                            btnProfile = '<button class="btnUploadProfile btn btn-secondary " btn btn-warning type="button" disabled>Upload</button>'
                                        }

                                        if (SHOP_IMG_PATH_BANNER == 0) {
                                            btnBanner = '<button class="btnUploadBanner btn btn-warning " type="button">Upload</button>'
                                        } else {
                                            btnBanner = '<button class="btnUploadBanner btn btn-secondary " btn btn-warning type="button" disabled>Upload</button>'
                                        }

                                        if (ITEM > 0) {
                                            btnViewItem = "<button class='btnItem btn btn-info btn-block'> ดูสินค้า </button>"
                                        } else {
                                            btnViewItem = "<button class='btnItem btn btn-danger btn-block'> ดูสินค้า </button>"
                                        }

                                        if (B_CODE == null) {
                                            btnAccount = '<button class="btnAddBank btn btn-success" type="button">Bank</button>'
                                        } else {
                                            btnAccount = '<button class="btnAddBank btn btn-secondary" type="button" disabled>Bank</button>'
                                        }

                                    } else {
                                        strStatus = '<font color="red">ไม่ใช้งาน</font>'
                                        btnProfile = "<button class='btn btn-secondary ' type='button' disabled>Upload</button>"
                                        btnBanner = "<button class='btn btn-secondary ' type='button' disabled>Upload</button>"
                                        btnViewItem = "<button class='btnItem btn btn-secondary btn-block' disabled> ดูสินค้า </button>"
                                        btnAccount = '<button class="btnAddBank btn btn-secondary" type="button" disabled>Bank</button>'
                                    }

                                    append = append + "<tr>"
                                    append = append + "<td class='order'>" + count + "</td>"

                                    append = append + '<td class="shopname"><a href="/web-admin-foodpro/editvendor.php?shop_code=' + SHOP_CODE + '">' + SHOP_NAME_TH + '</a><input class="shopcode" type="hidden" value="' + SHOP_CODE + '"></td>'
                                    append = append + "<td class='address'>" + SHOP_ADDRESS_NO + "</td>"
                                    append = append + "<td class='district'>" + DISTRICT_NAME_TH + "</td>"
                                    append = append + "<td class='province'>" + PROVINCE_NAME_TH + "</td>"
                                    append = append + "<td class='email'>" + SHOP_EMAIL + "</td>"
                                    append = append + "<td class='tel'>" + SHOP_PHONE + "</td>"
                                    append = append + "<td class='strStatus'>" + strStatus + "</td>"
                                    append = append + "<td class='btnProfile'>" + btnProfile + "</td>" // Upload Profile
                                    append = append + "<td class='btnBanner'>" + btnBanner + "</td>" // Upload Banner
                                    append = append + "<td class='btnBank'>" + btnAccount + "</td>"
                                    // append = append + "<td class='btn0'>" + btn0 + "</td>"
                                    append = append + "<td class='btnViewItem'>" + btnViewItem + "</td>" //สินค้าในร้าน
                                    append = append + "</tr>"
                                }

                                //alert(append)
                                // console.log(append);

                                $('#tablebody').append(append)

                                var table = $('#example').DataTable({
                                    'paging': false,
                                    // language: {
                                    //     searchPlaceholder: "ค้นหา..."
                                    // },
                                    'columnDefs': [{
                                            "targets": [0, 3, 4, 5, 6, 7, 8, 9, 10],
                                            "className": "text-center"
                                        },
                                        {
                                            "targets": 1,
                                            "className": "text-center",
                                            "width": "15%"
                                        },
                                        {
                                            "targets": 2,
                                            "className": "text-center",
                                            "width": "10%"
                                        }
                                    ]
                                })

                            } else {
                                alert("dataRes.length != 0 |||||| ไม่พบข้อมูล");
                                var table = $('#example').DataTable()
                            }
                        } else {
                            alert("STATUS ไม่เท่ากับ 1");
                            var table = $('#example').DataTable()
                        }


                        $('#example').find('tbody').find('tr').each(function() {
                            var order = $(this).find('.order').text()
                            var shopname = $(this).find('.shopname').text()
                            var address = $(this).find('.address').text()
                            var district = $(this).find('.district').text()
                            var province = $(this).find('.province').text()
                            var email = $(this).find('.email').text()
                            var tel = $(this).find('.tel').text()

                            var shopcode = $(this).find('.shopname').find('.shopcode').val()

                            $(this).find('.btnProfile').find('.btnUploadProfile').off('click').on('click', function() {
                                $("#btnModalUpProfile").click();
                                $('#modal-title').html(' ID: ' + order);
                                $('#modal-body').html(' ร้าน ' + shopname)
                                $('#strshopcode').val(shopcode);
                                $('#admin_name').val(admin_name);
                            })

                            $(this).find('.btnBanner').find('.btnUploadBanner').off('click').on('click', function() {
                                $("#btnModalUpBanner").click();
                                $('#modal-title2').html(' ID: ' + order);
                                $('#modal-body2').html(' ร้าน ' + shopname)
                                $('#strshopcode2').val(shopcode);
                                $('#admin_name2').val(admin_name);
                            })

                            $(this).find('.btnBank').find('.btnAddBank').off('click').on('click', function() {
                                $("#btnBankAccount").click();
                                $('#shopcode').val(shopcode);
                                // alert($('#shopcode').val())
                                $('#modal-body3').html(' เพิ่มบัญชีร้าน ' + shopname)

                            })

                            $(this).find('.btnViewItem').find('.btnItem').off('click').on('click', function() {
                                // alert("ดูสินค้าร้าน " + shopname)
                                location.href = "./itemvendor.php?SHOP_CODE=" + shopcode + "&SHOP_NAME=" + shopname
                                // alert(shopcode)
                                // location.href = "./service/data_item_vendor.php?SHOP_CODE="+ shopcode
                            })
                        })
                    })
                }

                load_bank()

                function load_bank() {
                    $('#bank').empty()
                    $.get(url_global + '/api/v1_0/master/getcombobank').done(function(data) {
                        var append = ""
                        if (data['STATUS'] == 1) {
                            var dataRes = data['RESULT']
                            if (dataRes.length != 0) {
                                for (var i = 0; i < dataRes.length; i++) {
                                    var BANK_CODE = dataRes[i]['value']
                                    var BANK_NAME_TH = dataRes[i]['label']

                                    append = append + "<option value='" + BANK_CODE + "'>" + BANK_NAME_TH + "</option>";
                                }

                                $('#bank').append(append)

                            } else {
                                alert("dataRes.length != 0 |||||| ไม่พบข้อมูล");
                            }
                        } else {
                            alert("Status ไม่เท่ากับ 1")
                        }
                    })
                }

                $('#UpBank').click(function() {
                    // alert($('#shopcode').val())
                    var shopcode = $('#shopcode').val()
                    var bank = $('#bank').val()
                    var accname = $('#accname').val().trim()
                    var accno = $('#accno').val().trim()

                    if (accname.trim().length > 0 && accno.trim().length > 0) {
                        $.post(url_global + "/api/v1_0/master/addshoppayment", {
                            "SHOP_CODE": shopcode,
                            "BANK_CODE": bank,
                            "ACC_NAME": accname,
                            "ACC_NO": accno,
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
                        if (accname.trim().length == 0) {
                            alert('ใส่ ชื่อบัญชี');
                            $('#accname').focus();
                        } else if (accno.trim().length == 0) {
                            alert('ใส่ เลขที่บัญชี');
                            $('#accno').focus();
                        }
                    }
                })


                $('#UploadProfile').click(function(event) {
                    var url = url_global + '/api/v1_0/shop/uploadpicshopprofile'
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

                    // console.log(form)
                    // console.log(data)

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


                $('#UpBanner').click(function(event) {
                    var url = url_global + '/api/v1_0/shop/uploadpicshopbanner'
                    // alert('ddd')
                    event.preventDefault();

                    // Get form
                    var form = $('#fileUploadForm2')[0];

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