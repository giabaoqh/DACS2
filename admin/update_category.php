<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


if (isset($_POST['submit'])) {
    if (empty($_POST['c_name'])) {
        $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>field Required!</strong>
															</div>';
    } else {






        $mql = "update res_category set c_name ='$_POST[c_name]' where c_id='$_GET[cat_upd]'";
        mysqli_query($db, $mql);
        $success =     '<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Updated!</strong> Successfully.</br></div>';
    }
}


?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Cập nhật danh mục</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="main-wrapper">
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                <a class="navbar-brand" href="dashboard.php">
                        <span><img src="images/logo.png" alt="homepage" class="dark-logo" width="100px" height="40px" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">

                    <ul class="navbar-nav mr-auto mt-md-0">

                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                            <div class="dropdown-menu animated zoomIn">
                                <ul class="mega-dropdown-menu row">


                                    <li class="col-lg-3  m-b-30">
                                        <h4 class="m-b-20">LIÊN HỆ VỚI CHÚNG TÔI</h4>

                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-info">Gửi</button>
                                        </form>
                                    </li>
                                    <li class="col-lg-3 col-xlg-3 m-b-30">
                                        <h4 class="m-b-20">Kiểu danh sách</h4>

                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-lg-3 col-xlg-3 m-b-30">
                                        <h4 class="m-b-20">List style</h4>

                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-lg-3 col-xlg-3 m-b-30">
                                        <h4 class="m-b-20">List style</h4>

                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>

                    <ul class="navbar-nav my-lg-0">


                        <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Thông báo</div>
                                    </li>
                                    <li>
                                        <div class="message-center">

                                            <a href="#">
                                                <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Đây là tiêu đề</h5> <span class="mail-desc">Chỉ cần nhìn thấy quản trị viên mới của tôi!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>

                                            <a href="#">
                                                <div class="btn btn-primary btn-circle m-r-10"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Đây là một tiêu đề khác</h5> <span class="mail-desc">Chỉ là một lời nhắc nhở rằng bạn có sự kiện</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>

                                            <a href="#">
                                                <div class="btn btn-info btn-circle m-r-10"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Đây là tiêu đề</h5> <span class="mail-desc">Bạn có thể tùy chỉnh mẫu này theo ý muốn</span> <span class="time">9:08 AM</span>
                                                </div>
                                            </a>

                                            <a href="#">
                                                <div class="btn btn-primary btn-circle m-r-10"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Đây là một tiêu đề khác</h5> <span class="mail-desc">Chỉ cần nhìn thấy quản trị viên của tôi!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Kiểm tra tất cả các thông báo</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown">

                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">Bạn có 4 tin nhắn mới</div>
                                    </li>
                                    <li>
                                        <div class="message-center">

                                            <a href="#">
                                                <div class="user-img"> <img src="images/bookingSystem/user-icn.png" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>BaoNguyen</h5> <span class="mail-desc">Chỉ cần nhìn thấy quản trị viên của tôi!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>

                                            <a href="#">
                                                <div class="user-img"> <img src="images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>John Doe</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>

                                            <a href="#">
                                                <div class="user-img"> <img src="images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Mr. John</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span>
                                                </div>
                                            </a>

                                            <a href="#">
                                                <div class="user-img"> <img src="images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Michael Qin</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="left-sidebar">

            <div class="scroll-sidebar">

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Trang chủ</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                        <li class="nav-label">Log</li>
                        <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Khách hàng</span></a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Nhà hàng</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_restaurant.php">Tất cả nhà hàng</a></li>
                                <li><a href="add_category.php">Thêm danh mục</a></li>
                                <li><a href="add_restaurant.php">Thêm nhà hàng</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Thực đơn</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_menu.php">Tất cả thực đơn</a></li>
                                <li><a href="add_menu.php">Thêm thực đơn</a></li>


                            </ul>
                        </li>
                        <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Đơn đặt hàng</span></a></li>

                    </ul>
                </nav>

            </div>

        </div>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="container-fluid">
                        <?php
                        echo $error;
                        echo $success; ?>
                        <div class="col-lg-12">
                            <div class="card card-outline-primary">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">Cập nhật danh mục nhà hàng</h4>
                                </div>
                                <div class="card-body">
                                    <form action='' method='post'>
                                        <div class="form-body">
                                            <?php $ssql = "select * from res_category where c_id='$_GET[cat_upd]'";
                                            $res = mysqli_query($db, $ssql);
                                            $row = mysqli_fetch_array($res); ?>
                                            <hr>
                                            <div class="row p-t-20">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Danh mục</label>
                                                        <input type="text" name="c_name" value="<?php echo $row['c_name'];  ?>" class="form-control" placeholder="Tên danh mục">
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-actions">
                                                <input type="submit" name="submit" class="btn btn-primary" value="Lưu">
                                                <a href="add_category.php" class="btn btn-inverse">Hủy</a>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>









                </div>

            </div>

            <footer class="footer"> © 2024 Bảo-Minh </footer>

        </div>

    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>