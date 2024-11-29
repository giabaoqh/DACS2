<!DOCTYPE html>
<html lang="en">
<?php


session_start();
error_reporting(0);
include("../connection/connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    
    // Sanitize inputs
    $uname = htmlspecialchars(trim($_POST['uname']));
    $fname = htmlspecialchars(trim($_POST['fname']));
    $lname = htmlspecialchars(trim($_POST['lname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];
    $phone = htmlspecialchars(trim($_POST['phone']));

    // Validation
    if (empty($uname) || empty($fname) || empty($lname) || empty($email) || empty($password) || empty($phone)) {
        $errors[] = "Vui lòng nhập đầy đủ thông tin.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Địa chỉ email không hợp lệ.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Mật khẩu phải có ít nhất 6 ký tự.";
    }

    if (!preg_match('/^[0-9]{10,15}$/', $phone)) {
        $errors[] = "Số điện thoại không hợp lệ.";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash mật khẩu
        $stmt = $db->prepare("UPDATE users SET username=?, f_name=?, l_name=?, email=?, phone=?, password=? WHERE u_id=?");
        $stmt->bind_param("ssssssi", $uname, $fname, $lname, $email, $phone, $hashed_password, $_GET['user_upd']);
        
        if ($stmt->execute()) {
            $success = "Người dùng đã cập nhật thành công.";
        } else {
            $errors[] = "Không thể cập nhật người dùng.";
        }
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
    <title>Cập nhật người dùng</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
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
              
                    </ul>
                
                    <ul class="navbar-nav my-lg-0">

                      
            
                        <li class="nav-item dropdown">
                           
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Thông báo</div>
                                    </li>
                                    
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Kiểm tra tất cả các thông báo</strong> <i class="fa fa-angle-right"></i> </a>
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
                        <li> <a href="all_users.php">  <span><i class="fa fa-user f-s-20 "></i></span><span>Khách hàng</span></a></li>
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
   
        <div class="page-wrapper" style="height:1200px;">
       
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
            </div>
            <div class="container-fluid">
                     <div class="row">
					 <div class="container-fluid">	
									<?php  
									        echo $error;
									        echo $success; 			
											?>
					    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Cập nhật người dùng</h4>
                            </div>
                            <div class="card-body">
							  <?php $ssql ="select * from users where u_id='$_GET[user_upd]'";
													$res=mysqli_query($db, $ssql); 
													$newrow=mysqli_fetch_array($res);?>
                                <form action='' method='post'  >
                                    <div class="form-body">
                                      
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Tên người dùng</label>
                                                    <input type="text" name="uname" class="form-control" value="<?php  echo $newrow['username']; ?>" placeholder="Tên người dùng">
                                                   </div>
                                            </div>
                                     
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Tên</label>
                                                    <input type="text" name="fname" class="form-control form-control-danger"  value="<?php  echo $newrow['f_name'];  ?>" placeholder="Tên">
                                                    </div>
                                            </div>
                                      
                                        </div>
                                    
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Họ</label>
                                                    <input type="text" name="lname" class="form-control" placeholder="Họ"  value="<?php  echo $newrow['l_name']; ?>">
                                                   </div>
                                            </div>
                                     
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" name="email" class="form-control form-control-danger"  value="<?php  echo $newrow['email'];  ?>" placeholder="example@gmail.com">
                                                    </div>
                                            </div>
                                        
                                        </div>
                                   
										 <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Mật khẩu</label>
                                                    <input type="text" name="password" class="form-control form-control-danger"   value="<?php  echo $newrow['password'];  ?>" placeholder="Mật khẩu">
                                                    </div>
                                                </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Số điện thoại</label>
                                                    <input type="text" name="phone" class="form-control form-control-danger"   value="<?php  echo $newrow['phone'];  ?>" placeholder="Số điện thoại">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Lưu"> 
                                        <a href="all_users.php" class="btn btn-inverse">Hủy</a>
                                    </div>
                                </form>
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