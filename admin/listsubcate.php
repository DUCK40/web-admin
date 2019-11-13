<?php
session_start();
if(empty($_SESSION['name']) || $_SESSION['name'] != 'Super Admin'){
    header('Location: ../logout.php'); 
}
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

    <link href="../main.css" rel="stylesheet">

    <!-- data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- boostrap -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="">Admin Master</div>

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

                            <li class="app-sidebar__heading">SubCategory</li>
                            <li>
                                <a href="listsubcate.php" class="mm-active">
                                    <i class="">
                                    </i>List SubCategory
                                </a>
                                <a href="addsubcate.php" class="">
                                    <i class="">
                                    </i>Add SubCategory
                                </a>
                            </li>

                            <li class="app-sidebar__heading">TypeCategory</li>
                            <li>
                                <a href="listtypecate.php" class="">
                                    <i class="">
                                    </i>List TypeCategory
                                </a>
                                <a href="addtypecate.php" class="">
                                    <i class="">
                                    </i>Add TypeCategory
                                </a>
                            </li>

                            <li class="app-sidebar__heading">Unit</li>
                            <li>
                                <a href="listunit.php" class="">
                                    <i class="">
                                    </i>List Unit
                                </a>
                                <a href="addunit.php" class="">
                                    <i class="">
                                    </i>Add Unit
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="app-main__outer">
                <div class="app-main__inner">

                    <div class="tab-content">
                        <div class="row">
                            <div class="col">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">SubCategory</h5>

                                        <table id="example" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>CATE_CODE</th>
                                                    <th>SUB_CATE_CODE</th>
                                                    <th>หมวดหมู่ใหญ่</th>
                                                    <th>หมวดหมู่ย่อย ชื่อไทย</th>
                                                    <th>หมวดหมู่ย่อย ชื่ออังกฤษ</th>
                                                    <th>รูปโปรไฟล์</th>
                                                    <th>รูปแบรนเนอร์</th>
                                                </tr>
                                            </thead>

                                            <tbody id='tablebody'>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <input type="hidden" name="CATE_CODE" id="strcatecode">
                            <input type="hidden" name="SUB_CATE_CODE" id="strsubcatecode">
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
                            <input type="hidden" name="CATE_CODE" id="strcatecode2">
                            <input type="hidden" name="SUB_CATE_CODE" id="strsubcatecode2">
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


        <script type="text/javascript" src="../assets/scripts/main.js"></script>

        <!-- data table -->
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- boostrap -->
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



        <script>
            $(document).ready(function() {
                const url_global = 'http://203.150.52.242:4200';
                // const url_global = 'http://192.168.1.175:4200';
                // const url_global = 'https://apidev.foodproonline.com';
                // const url_global = 'http://203.150.52.247:4200';
                
                loadtable()
                function loadtable() {
                    $('#example').DataTable().destroy();
                    $('#example tbody').empty();

                    $.get(url_global + '/api/v1_0/master/gettablesubcate').done(function(jsonData) {
                        // var jsonData = JSON.parse(data)
                        // alert(JSON.stringify(jsonData['STATUS']))
                        // console.log(JSON.stringify(jsonData['RESULT']))
                        // console.log(jsonData)
                        var append = ""
                        if (jsonData['STATUS'] == 1) {
                            var dataRes = jsonData['RESULT']
                            var count = 1
                            if (dataRes.length != 0) {
                                for (var i = 0; i < dataRes.length; i++) {
                                    count = i + 1 //ลำดับ
                                    var CATE_CODE = dataRes[i]['CATE_CODE']
                                    var SUB_CATE_CODE = dataRes[i]['SUB_CATE_CODE']
                                    var CATE_NAME_TH = dataRes[i]['CATE_NAME_TH']
                                    var SUB_CATE_NAME_TH = dataRes[i]['SUB_CATE_NAME_TH']
                                    var SUB_CATE_NAME_EN = dataRes[i]['SUB_CATE_NAME_EN']
                                    var SUB_CATE_IMG_PATH = dataRes[i]['SUB_CATE_IMG_PATH']
                                    var SUB_CATE_IMG_BANNER = dataRes[i]['SUB_CATE_IMG_BANNER']
                                    var btnProfile = ''
                                    var btnBanner = ''

                                    if (SUB_CATE_IMG_PATH == null) {
                                        btnProfile = '<button class="btnUploadProfile btn-warning" type="button">Upload</button>'
                                    } else {
                                        btnProfile = '<button class="btnUploadProfile" type="button" disabled>Upload</button>'
                                    }

                                    if (SUB_CATE_IMG_BANNER == null) {
                                        btnBanner = '<button class="btnUploadBanner btn-warning" type="button">Upload</button>'
                                    } else {
                                        btnBanner = '<button class="btnUploadBanner" type="button" disabled>Upload</button>'
                                    }

                                    append = append + "<tr>"
                                    append = append + "<td class='order'>" + count + "</td>"
                                    append = append + "<td class='catecode'>" + CATE_CODE + "</td>"
                                    append = append + "<td class='subcatecode'>" + SUB_CATE_CODE + "</td>"
                                    append = append + "<td class='catenameth'>" + CATE_NAME_TH + "</td>"
                                    append = append + "<td class='subcatenameth'>" + SUB_CATE_NAME_TH + "</td>"
                                    append = append + "<td class='subcatenameen'>" + SUB_CATE_NAME_EN + "</td>"
                                    append = append + "<td class='btnProfile'>" + btnProfile + "</td>"
                                    append = append + "<td class='btnBanner'>" + btnBanner + "</td>"
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
                                        "targets": [0, 1, 2, 3, 4, 5],
                                        "className": "text-center"
                                    }]
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
                            var catecode = $(this).find('.catecode').text()
                            var subcatecode = $(this).find('.subcatecode').text()
                            var catenameth = $(this).find('.order').text()
                            var subcatenameth = $(this).find('.subcatenameth').text()
                            var subcatenameen = $(this).find('.subcatenameen').text()

                            $(this).find('.btnProfile').find('.btnUploadProfile').off('click').on('click', function() {
                                $("#btnModalUpProfile").click();
                                $('#modal-title').html(' ID: ' + order);
                                $('#modal-body').html(' เพิ่มภาพโปรไฟล์ ' + subcatenameth)
                                $('#strcatecode').val(catecode);
                                $('#strsubcatecode').val(subcatecode);
                            })

                            $(this).find('.btnBanner').find('.btnUploadBanner').off('click').on('click', function() {
                                $("#btnModalUpBanner").click();
                                $('#modal-title2').html(' ID: ' + order);
                                $('#modal-body2').html(' เพิ่มภาพแบรนเนอร์ ' + subcatenameth)
                                $('#strcatecode2').val(catecode);
                                $('#strsubcatecode2').val(subcatecode);
                            })
                        })
                    })
                }

                $('#UploadProfile').click(function(event) {
                    var url = url_global + '/api/v1_0/master/updatepicprofilesubcate/' + $('#strcatecode').val()
                    // alert('ddd')
                    event.preventDefault();

                    // Get form
                    var form = $('#fileUploadForm')[0];

                    // Create an FormData object 
                    var data = new FormData(form);

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

                        },
                        error: function(e) {

                            console.log("ERROR : ", e);

                        }
                    });
                    
                });

                $('#UpBanner').click(function(event) {
                    var url = url_global + '/api/v1_0/master/updatepicbannersubcate'
                    // alert('ddd')
                    event.preventDefault();

                    // Get form
                    var form = $('#fileUploadForm2')[0];

                    // Create an FormData object 
                    var data = new FormData(form);

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

                        },
                        error: function(e) {

                            console.log("ERROR : ", e);

                        }
                    });
                });

            })
        </script>

</body>
</html>