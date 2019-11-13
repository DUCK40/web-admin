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
                                <a href="listsubcate.php" class="">
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
                                <a href="listunit.php" class="mm-active">
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
                                        <h5 class="card-title">Unit</h5>

                                        <table id="example" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>UNIT_CODE</th>
                                                    <th>หน่วยการขาย</th>
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

                    $.get(url_global + '/api/v1_0/master/gettableunit').done(function(jsonData) {
                        var append = ""
                        if (jsonData['STATUS'] == 1) {
                            var dataRes = jsonData['RESULT']
                            var count = 1
                            if (dataRes.length != 0) {
                                for (var i = 0; i < dataRes.length; i++) {
                                    count = i + 1 //ลำดับ
                                    var UNIT_CODE = dataRes[i]['UNIT_CODE']
                                    var UNIT_NAME_TH = dataRes[i]['UNIT_NAME_TH']

                                    append = append + "<tr>"
                                    append = append + "<td class='order'>" + count + "</td>"
                                    append = append + "<td class='unitcode'>" + UNIT_CODE + "</td>"
                                    append = append + "<td class='unitnameth'>" + UNIT_NAME_TH + "</td>"
                                    append = append + "</tr>"
                                }

                                $('#tablebody').append(append)

                                var table = $('#example').DataTable({
                                    'paging': false,
                                    // language: {
                                    //     searchPlaceholder: "ค้นหา..."
                                    // },
                                    'columnDefs': [{
                                        "targets": [0, 1, 2],
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

                    })
                }

            })
        </script>


</body>

</html>