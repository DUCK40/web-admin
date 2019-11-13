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

    </head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="">Admin</div>
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

            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">

                                </div>
                                <div class="widget-content-left  ml-3 header-user-info mt-1">
                                    <div class="widget-heading">
                                        <?php echo $_SESSION['name']; ?>
                                    </div>
                                    <div class="widget-subheading">
                                        <?php echo $_SESSION['department']; ?>
                                    </div>
                                </div>

                                <!-- <div class="container">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown"> setting
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
                                            <li role="presentation" class="divider"></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
                                        </ul>
                                    </div>
                                </div> -->

                                <!-- <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn dropdown-toggle">
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right ">
                                        <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                        <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                        <button type="button" tabindex="0" class="dropdown-item">Actions</button>
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <button type="button" tabindex="0" class="dropdown-item">Dividers</button>
                                    </div>
                                </div> -->

                                <div class="widget-content-right header-user-info ml-2">
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
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">

                            <li class="app-sidebar__heading ">Vendor</li>
                            <li>
                                <a href="listvendor.php" class="">
                                    <i class="">
                                    </i>List Vendor
                                </a>
                                <a href="registervendor.php" class="mm-active">
                                    <i class="">
                                    </i>Register New Vendor
                                </a>
                            </li>

                            <!-- <li class="app-sidebar__heading">UI Components</li>
                            <li>
                                <a href="#">
                                    <i class=""></i>
                                    Elements
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon"></i>
                                            Buttons
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon">
                                            </i>Dropdowns
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon">
                                            </i>Icons
                                        </a>
                                    </li>
                                </ul>
                            </li> -->


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
                                        <h5 class="card-title">Register New Vendor</h5>
                                        <button id='refcombo'> Refresh Combo </button><br><br>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail" class="">ชื่อร้าน</label>
                                                    <input name="shopname" id="shopname" placeholder="" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="exampleSelect" class="">ตลาด</label>
                                                    <select name="market" id="market" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="exampleText" class="">ที่อยู่ร้าน</label>
                                            <textarea name="address" id="address" class="form-control"></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="exampleSelect" class="">จังหวัด</label>
                                                    <select name="province" id="province" class="form-control">
                                                        <!-- <option value="" selected></option> -->
                                                        <!-- <option>กรุงเทพมหานคร</option>
                                                                <option>สมุทรปราการ</option>
                                                                <option>พิจิตร</option>
                                                                <option>กำแพงเพชร</option>
                                                                <option>ขอนแก่น</option> -->
                                                        <!-- ใส่ value ใน option -->
                                                    </select>
                                                </div>
                                            </div>

                                            
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="exampleSelect" class="">เขต/อำเภอ</label>
                                                    <select name="district" id="district" class="form-control">
                                                        <!-- <option value="" selected></option> -->
                                                        <!-- <option>ลาดกระบัง</option>
                                                    <option>วัฒนา</option>
                                                    <option>สะพานสูง</option>
                                                    <option>หนองแขม</option>
                                                    <option>หนองจอก</option> -->
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail" class="">รหัสไปรษณี</label>
                                                    <input name="postcode" id="postcode" placeholder="" type="text" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="" class="">ชื่อ</label>
                                                    <input name="firstname" id="firstname" placeholder="" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="" class="">นามสกุล</label>
                                                    <input name="lastname" id="lastname" placeholder="" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="" class="">เลขประจำตัวผู้เสียภาษี</label>
                                            <input name="uid" id="uid" placeholder="" type="text" class="form-control">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="" class="">อีเมล</label>
                                                    <input name="email" id="email" placeholder="" type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="" class="">เบอร์โทร</label>
                                                    <input name="tel" id="tel" placeholder="" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="" class="">รหัสผ่าน</label>
                                            <input name="password" id="password" placeholder="" type="text" class="form-control" value="1234">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="exampleSelect" class="">บริการ lalamove</label>
                                                    <select name="active_lalamove" id="active_lalamove" class="form-control">
                                                        <option value="0">ไม่ใช้บริการ</option>
                                                        <option value="1">ใช้บริการ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="exampleSelect" class="">เจ้าของ แพ็กเอง</label>
                                                    <select name="owner_pack" id="owner_pack" class="form-control">
                                                        <option value="0">ไม่แพ็กเอง</option>
                                                        <option value="1">แพ็กเอง</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="exampleSelect" class="">บริการรับที่บ้าน</label>
                                                    <select name="receive_from_home" id="receive_from_home" class="form-control">
                                                        <option value="0">ไม่ใช้บริการ</option>
                                                        <option value="1">ใช้บริการ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="exampleSelect" class="">เลือกภาคจุดส่งสินค้า</label>
                                                    <select name="region" id="region" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="exampleSelect" class="">ศูนย์บริการ</label>
                                                    <select name="servicecenter" id="servicecenter" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <button id='btn0' class="btn btn-primary btn-lg mt-3 mb-3">บันทึก</button>

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

                // //dropdown
                // $(".dropdown-toggle").dropdown();

                var admin_name = '<?php echo $_SESSION['name']; ?>'

                const url_global = 'http://203.150.52.242:4200';
                // const url_global = 'http://192.168.1.175:4200';
                // const url_global = 'https://apidev.foodproonline.com';
                // const url_global = 'http://203.150.52.247:4200';

                const escapeRegExp = (string) => {
                    return string.replace(/[^0-9A-Za-zก-ฮ๐-๙โเแไำะาๆฯใ\s]/g, '')
                }

                load_province()

                if ($('#province').val() == '001') {
                    $('#active_lalamove').prop('disabled', false);
                } else {
                    $('#active_lalamove').prop('disabled', true);
                    $('#owner_pack').prop('disabled', true);
                }

                $("#refcombo").click(function() {
                    load_province()
                    if ($('#province').val() == '001') {
                        $('#active_lalamove').prop('disabled', false);
                    } else {
                        $('#active_lalamove').prop('disabled', true);
                    }
                });

                function load_province() {
                    $('#province').empty()
                    $('#district').empty()
                    $.get(url_global + '/api/v1_0/master/getcomboprovince').done(function(data) {
                        var append = ""
                        if (data['STATUS'] == 1) {
                            var dataRes = data['RESULT']
                            if (dataRes.length != 0) {
                                for (var i = 0; i < dataRes.length; i++) {
                                    var PROVINCE_CODE = dataRes[i]['value']
                                    var PROVINCE_NAME_TH = dataRes[i]['label']

                                    append = append + "<option value='" + PROVINCE_CODE + "'>" + PROVINCE_NAME_TH + "</option>";
                                }

                                $('#province').append(append)
                                //alert(append)
                                load_district($('#province').val())

                                // if ($('#province').val() == '001') {
                                //     $('#active_lalamove').prop('disabled', false);
                                // } else {
                                //     $('#active_lalamove').prop('disabled', true);
                                //     $('#owner_pack').prop('disabled', true);
                                // }

                            } else {
                                alert("dataRes.length != 0 |||||| ไม่พบข้อมูล");
                            }
                        } else {
                            alert("Status ไม่เท่ากับ 1")
                        }
                    })
                }

                $('#province').change(function(v) {
                    //console.log(v.target.value);
                    // alert(v.target.value);
                    var province_code = v.target.value;
                    // console.log(province_code);

                    load_district(province_code)
                    $('#postcode').val('')

                    if ($('#province').val() == '001') {
                        $('#active_lalamove').prop('disabled', false);
                    } else {
                        $('#active_lalamove').prop('disabled', true);
                        $('#active_lalamove').val(0)
                        $('#owner_pack').prop('disabled', true);
                        $('#receive_from_home').prop('disabled', false);
                        $('#owner_pack').val(0)
                        $('#receive_from_home').val(0)
                        $('#region').prop('disabled', false);
                        $('#servicecenter').prop('disabled', false);
                    }
                });

                $('#active_lalamove').change(function(v) {
                    if ($('#active_lalamove').val() == 1) {
                        $('#owner_pack').prop('disabled', true);
                        $('#receive_from_home').prop('disabled', true);
                        $('#owner_pack').val(1)
                        $('#receive_from_home').val(1)
                        $('#region').prop('disabled', true);
                        $('#servicecenter').prop('disabled', true);

                        // $('#region').val(0)
                        // $('#servicecenter').val(0)

                    } else {
                        $('#owner_pack').prop('disabled', true);
                        $('#receive_from_home').prop('disabled', false);
                        $('#owner_pack').val(0)
                        $('#receive_from_home').val(0)
                        $('#region').prop('disabled', false);
                        $('#servicecenter').prop('disabled', false);
                    }
                });

                $('#receive_from_home').change(function() {
                    if ($('#receive_from_home').val() == 1) {
                        // $('#region').prop('disabled', true);
                        // $('#servicecenter').prop('disabled', true);
                        load_region2()
                    } else {
                        // $('#region').prop('disabled', false);
                        // $('#servicecenter').prop('disabled', false);
                        load_region()
                    }
                });


                function load_district(province_code) {
                    // alert(province_code)
                    $('#district').empty()
                    var url = url_global + '/api/v1_0/master/getcombodistrict/' + province_code
                    $.get(url).done(function(data) {
                        // console.log(data);
                        // var jsonData = JSON.parse(data);
                        var append = ""
                        if (data['STATUS'] == 1) {
                            var dataRes = data['RESULT']
                            if (dataRes.length != 0) {
                                for (var i = 0; i < dataRes.length; i++) {
                                    var DISTRICT_CODE = dataRes[i]['value']
                                    var DISTRICT_NAME_TH = dataRes[i]['label']

                                    append = append + "<option value='" + DISTRICT_CODE + "'>" + DISTRICT_NAME_TH + "</option>";
                                }
                                $('#district').append(append)
                                // load_postcode(dataRes[0]['value'])
                                load_postcode($('#district').val())
                                //alert(append)
                            } else {
                                alert("dataRes.length != 0 |||||| ไม่พบข้อมูล");
                            }
                        } else {
                            alert("Status ไม่เท่ากับ 1")
                        }
                    })
                }

                $('#district').change(function(v) {
                    //console.log(v.target.value);
                    // alert(v.target.value);
                    var district_code = v.target.value;
                    // console.log(province_code);

                    load_postcode(district_code)
                    $('#postcode').val('')
                });

                function load_postcode(district_code) {
                    var url = url_global + '/api/v1_0/master/getpostcode/' + district_code
                    $.get(url).done(function(data) {
                        // console.log(data);
                        // var jsonData = JSON.parse(data);
                        // var append = ""
                        if (data['STATUS'] == 1) {
                            var dataRes = data['RESULT']
                            if (dataRes.length != 0) {
                                // for (var i = 0; i < dataRes.length; i++) {
                                //     var POSTCODE = dataRes[i]['POSTCODE']
                                // }
                                $('#postcode').val(dataRes[0]['POSTCODE'])
                                //alert(append)
                            } else {
                                alert("dataRes.length != 0 |||||| ไม่พบข้อมูล");
                            }
                        } else {
                            alert("Status ไม่เท่ากับ 1")
                        }
                    })
                }

                load_region()

                function load_region() {
                    $('#region').empty()
                    $('#servicecenter').empty()
                    var url = 'http://ebooking.iel.co.th:3001/site/list/all'
                    $.get(url).done(function(data) {
                        // console.log(data);
                        // var jsonData = JSON.parse(data);
                        var appendRegion = ""
                        var appendSiteC = ""
                        var appendSiteN = ""
                        var appendSiteSE = ""
                        var appendSiteS = ""

                        if (data['status'] == 200) {
                            var dataRes = data['data']
                            // console.log(dataRes.length)
                            if (dataRes.length != 0) {
                                for (var i = 0; i < dataRes.length; i++) {
                                    appendRegion = appendRegion + "<option value='" + dataRes[i]['region'] + "'>" + dataRes[i]['region_name'] + "</option>";

                                    var siteData = dataRes[i]['sites']
                                    for (var j = 0; j < siteData.length; j++) {
                                        if (dataRes[i]['region'] == "C") {
                                            appendSiteC = appendSiteC + "<option value='" + siteData[j]['service_location_id'] + "'>" + siteData[j]['site_name'] + "</option>";
                                        } else if (dataRes[i]['region'] == "N") {
                                            appendSiteN = appendSiteN + "<option value='" + siteData[j]['service_location_id'] + "'>" + siteData[j]['site_name'] + "</option>";
                                        } else if (dataRes[i]['region'] == "SE") {
                                            appendSiteSE = appendSiteSE + "<option value='" + siteData[j]['service_location_id'] + "'>" + siteData[j]['site_name'] + "</option>";
                                        } else if (dataRes[i]['region'] == "S") {
                                            appendSiteS = appendSiteS + "<option value='" + siteData[j]['service_location_id'] + "'>" + siteData[j]['site_name'] + "</option>";
                                        }
                                    }
                                }

                                $('#region').append(appendRegion)
                                $('#servicecenter').append(appendSiteC)
                            } else {
                                alert("dataRes.length != 0 |||||| ไม่พบข้อมูล");
                            }
                        } else {
                            alert("Status ไม่เท่ากับ 200")
                        }

                        $('#region').change(function() {
                            $('#servicecenter').empty()
                            // alert($('#region').val())
                            if ($('#region').val() == "C") {
                                $('#servicecenter').append(appendSiteC)
                            } else if ($('#region').val() == "N") {
                                $('#servicecenter').append(appendSiteN)
                            } else if ($('#region').val() == "SE") {
                                $('#servicecenter').append(appendSiteSE)
                            } else if ($('#region').val() == "S") {
                                $('#servicecenter').append(appendSiteS)
                            }

                        });

                    })
                }


                function load_region2() {
                    $('#region').empty()
                    $('#servicecenter').empty()
                    var url = 'http://ebooking.iel.co.th:3001/site/list/all'
                    $.get(url).done(function(data) {
                        // console.log(data);
                        // var jsonData = JSON.parse(data);
                        var appendRegion = ""
                        var appendSiteC = ""

                        if (data['status'] == 200) {
                            var dataRes = data['data']
                            // console.log(dataRes)
                            if (dataRes.length != 0) {
                                for (var i = 0; i < dataRes.length; i++) {
                                    if (dataRes[i]['region'] == "C") {
                                        appendRegion = appendRegion + "<option value='" + dataRes[i]['region'] + "'>" + dataRes[i]['region_name'] + "</option>";
                                        var siteData = dataRes[i]['sites']
                                        for (var j = 0; j < siteData.length; j++) {
                                            if (siteData[j]['service_location_id'] == 'H2' || siteData[j]['service_location_id'] == 'H1') {
                                                appendSiteC = appendSiteC + "<option value='" + siteData[j]['service_location_id'] + "'>" + siteData[j]['site_name'] + "</option>";
                                            }
                                        }
                                    }
                                }

                                $('#region').append(appendRegion)
                                $('#servicecenter').append(appendSiteC)
                            } else {
                                alert("dataRes.length != 0 |||||| ไม่พบข้อมูล");
                            }
                        } else {
                            alert("Status ไม่เท่ากับ 200")
                        }

                        $('#region').change(function() {
                            $('#servicecenter').empty()
                            // alert($('#region').val())
                            if ($('#region').val() == "C") {
                                $('#servicecenter').append(appendSiteC)
                            } else if ($('#region').val() == "N") {
                                $('#servicecenter').append(appendSiteN)
                            } else if ($('#region').val() == "SE") {
                                $('#servicecenter').append(appendSiteSE)
                            } else if ($('#region').val() == "S") {
                                $('#servicecenter').append(appendSiteS)
                            }
                        });

                    })
                }


                load_market()

                function load_market() {
                    $('#market').empty()
                    $.get(url_global + '/api/v1_0/master/getcombomarket').done(function(data) {
                        var append = ""
                        if (data['STATUS'] == 1) {
                            var dataRes = data['RESULT']
                            if (dataRes.length != 0) {
                                for (var i = 0; i < dataRes.length; i++) {
                                    var MARKET_CODE = dataRes[i]['value']
                                    var MARKET_NAME_TH = dataRes[i]['label']

                                    append = append + "<option value='" + MARKET_CODE + "'>" + MARKET_NAME_TH + "</option>";
                                }

                                $('#market').append(append)
                                //alert(append)

                            } else {
                                alert("dataRes.length != 0 |||||| ไม่พบข้อมูล");
                            }
                        } else {
                            alert("Status ไม่เท่ากับ 1")
                        }
                    })
                }

                $("#btn0").click(function() {
                    var shopname = $('#shopname').val().trim();
                    var market = $('#market').val();
                    var address = $('#address').val().trim();
                    var province = $('#province').val();
                    var district = $('#district').val();
                    var postcode = $('#postcode').val();
                    var firstname = $('#firstname').val().trim();
                    var lastname = $('#lastname').val().trim();
                    var uid = $('#uid').val().trim();
                    var email = $('#email').val().trim();
                    var tel = $('#tel').val().trim();
                    var password = $('#password').val().trim();
                    var active_lalamove = $('#active_lalamove').val();
                    var owner_pack = $('#owner_pack').val();
                    var receive_from_home = $('#receive_from_home').val();
                    var dcName = $('#servicecenter option:selected').text();
                    var dcLocationId = $('#servicecenter').val();

                    if (shopname.trim().length > 0 && address.trim().length > 0 && province.trim().length > 0 && district.trim().length > 0 && postcode.trim().length > 0 && firstname.trim().length > 0 &&
                        lastname.trim().length > 0 && uid.trim().length > 0 && email.trim().length > 0 && tel.trim().length > 0 && password.trim().length > 0) {
                        // alert('okkkk');
                        var countstritemname = escapeRegExp(shopname)
                        if (countstritemname.length <= 20) {
                            $.post(url_global + "/api/v1_0/shop/admingenshop", {
                                "SHOP_NAME_TH": shopname,
                                "ADDRESS_NO": address,
                                "DISTRICT_CODE": district,
                                "PROVINCE_CODE": province,
                                "SHARE_LINK": "www.google.com",
                                "MARKET_CODE": market,
                                "SHOP_BD_CODE_REF": "",
                                "SHOP_EMAIL": email,
                                "SHOP_PHONE": tel,
                                "UID": uid,
                                "F_NAME": firstname,
                                "L_NAME": lastname,
                                "PASSWORD": password,
                                "IS_ACTIVE_LALAMOVE": active_lalamove,
                                "IS_OWNER_PACKING": owner_pack,
                                "IS_RECEIVE_FROM_HOME": receive_from_home,
                                "DC_NAME": dcName,
                                "DC_LOCATION_ID": dcLocationId,
                                "ADMIN_NAME": admin_name
                            }).done(function(data) {
                                if (data['STATUS'] == 1) {
                                    var dataRes = data['RESULT']
                                    if (dataRes == 'SUCCESS') {
                                        alert("บันทึกสำเร็จ")
                                        window.location = './listvendor.php'
                                    } else {
                                        alert("ไม่สำเร็จ แจ้งแอดมิน")
                                    }
                                } else {
                                    alert("ไม่สำเร็จ แจ้งแอดมิน")
                                }
                                // console.log(data)
                                // alert(data)
                            });
                            // alert('ok')
                            // alert(firstname)
                            // alert(lastname)
                        } else {
                            alert('ชื่อร้านไม่ควรเกิน 20 ตัวอักษร');
                            $('#shopname').focus();
                        }

                    } else {
                        if (shopname.trim().length == 0) {
                            alert('ใส่ ชื่อร้าน');
                            $('#shopname').focus();
                        } else if (address.trim().length == 0) {
                            alert('ใส่ ที่อยู่');
                            $('#address').focus();
                        } else if (province.trim().length == 0) {
                            alert('ใส่ จังหวัด');
                            $('#province').focus();
                        } else if (district.trim().length == 0) {
                            alert('ใส่ อำเภอ');
                            $('#district').focus();
                        } else if (firstname.trim().length == 0) {
                            alert('ใส่ ชื่อจริง');
                            $('#firstname').focus();
                        } else if (lastname.trim().length == 0) {
                            alert('ใส่ นามสกุล');
                            $('#lastname').focus();
                        } else if (uid.trim().length == 0) {
                            alert('ใส่ เลขภาษี');
                            $('#uid').focus();
                        } else if (email.trim().length == 0) {
                            alert('ใส่ อีเมล');
                            $('#email').focus();
                        } else if (tel.trim().length == 0) {
                            alert('ใส่ เบอร์');
                            $('#tel').focus();
                        } else if (password.trim().length == 0) {
                            alert('ใส่ พาสเวิด');
                            $('#password').focus();
                        }
                    }
                });
            })

            $('#btnlogout').click(function() {
                window.location = './logout.php'
            })
        </script>

</body>

</html>