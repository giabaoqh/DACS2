<!DOCTYPE html>
<html lang="en">
<?php

session_start(); 
error_reporting(0); 
include("connection/connect.php"); 
if (isset($_POST['submit'])) {
   $username = trim($_POST['username']);
   $firstname = trim($_POST['firstname']);
   $lastname = trim($_POST['lastname']);
   $email = trim($_POST['email']);
   $phone = trim($_POST['phone']);
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $address = trim($_POST['address']);

   $errors = [];

   // Kiểm tra các trường bắt buộc
   if (empty($username) || empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($password) || empty($cpassword) || empty($address)) {
       $errors[] = "Tất cả các trường phải được điền!";
   }

   // Kiểm tra mật khẩu khớp
   if ($password !== $cpassword) {
       $errors[] = "Mật khẩu không khớp!";
   }

   // Kiểm tra độ dài mật khẩu
   if (strlen($password) < 6) {
       $errors[] = "Mật khẩu phải có ít nhất 6 ký tự!";
   }

   // Kiểm tra độ dài số điện thoại
   if (strlen($phone) < 10) {
       $errors[] = "Số điện thoại không hợp lệ!";
   }

   // Kiểm tra định dạng email
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors[] = "Email không hợp lệ!";
   }

   // Kiểm tra username và email đã tồn tại
   $check_username = $db->prepare("SELECT username FROM users WHERE username = ?");
   $check_username->bind_param("s", $username);
   $check_username->execute();
   $check_username->store_result();

   if ($check_username->num_rows > 0) {
       $errors[] = "Tên người dùng đã tồn tại!";
   }

   $check_email = $db->prepare("SELECT email FROM users WHERE email = ?");
   $check_email->bind_param("s", $email);
   $check_email->execute();
   $check_email->store_result();

   if ($check_email->num_rows > 0) {
       $errors[] = "Email đã tồn tại!";
   }

   // Nếu không có lỗi, tiến hành thêm người dùng
   if (empty($errors)) {
       $hashed_password = password_hash($password, PASSWORD_DEFAULT);

       $stmt = $db->prepare("INSERT INTO users (username, f_name, l_name, email, phone, password, address) VALUES (?, ?, ?, ?, ?, ?, ?)");
       $stmt->bind_param("sssssss", $username, $firstname, $lastname, $email, $phone, $hashed_password, $address);

       if ($stmt->execute()) {
           echo "<script>alert('Người dùng đã được tạo thành công!');</script>";
           header("Location: login.php");
           exit;
       } else {
           $errors[] = "Không thể thêm người dùng. Vui lòng thử lại.";
       }
   }

   // Hiển thị lỗi nếu có
   if (!empty($errors)) {
       foreach ($errors as $error) {
           echo "<script>alert('$error');</script>";
       }
   }
}


?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Đăng kí</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> </head>
<body>
<div style=" background-image: url('images/img/pimg.jpg');">
         <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
               <div class="container">
                  <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                  <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/img/logo.png" alt="" width="100px" height="40px"> </a>                  <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                     <ul class="nav navbar-nav">
							<li class="nav-item"> <a class="nav-link active" href="index.php">Trang chủ <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Nhà hàng <span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Đăng nhập</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Đăng kí</a> </li>';
							}
						else
							{
									
									
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Đơn hàng của tôi</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Đăng xuất</a> </li>';
							}

						?>
							 
                        </ul>
                  </div>
               </div>
            </nav>
         </header>
         <div class="page-wrapper">
            
               <div class="container">
                  <ul>
                    
                    
                  </ul>
               </div>
            
            <section class="contact-page inner-page">
               <div class="container ">
                  <div class="row ">
                     <div class="col-md-12">
                        <div class="widget" >
                           <div class="widget-body">
                            
							  <form action="" method="post">
                                 <div class="row">
								  <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Tên đăng nhập</label>
                                       <input class="form-control" type="text" name="username" id="example-text-input"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Tên</label>
                                       <input class="form-control" type="text" name="firstname" id="example-text-input"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Họ</label>
                                       <input class="form-control" type="text" name="lastname" id="example-text-input-2"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Email</label>
                                       <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Số điện thoại</label>
                                       <input class="form-control" type="text" name="phone" id="example-tel-input-3"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Mật khẩu</label>
                                       <input type="password" class="form-control" name="password" id="exampleInputPassword1"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Xác nhận mật khẩu</label>
                                       <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2"> 
                                    </div>
									 <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">Địa chỉ giao hàng</label>
                                       <textarea class="form-control" id="exampleTextarea"  name="address" rows="3"></textarea>
                                    </div>
                                   
                                 </div>
                                
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <input type="submit" value="Đăng kí" name="submit" class="btn theme-btn"> </p>
                                    </div>
                                 </div>
                              </form>
                  
						   </div>
           
                        </div>
                     
                     </div>
                    
                  </div>
               </div>
            </section>
            
      
            <footer class="footer">
          <div class="container">

            <div class="row bottom-footer">
              <div class="container">
                <div class="row">
                  <div class="col-xs-12 col-sm-3 payment-options color-gray">
                    <h5>Tùy chọn thanh toán</h5>
                    <ul>
                      <li>
                        <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                      </li>
                      <li>
                        <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                      </li>
                      <li>
                        <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                      </li>
                      <li>
                        <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                      </li>
                      <li>
                        <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-xs-12 col-sm-4 address color-gray">
                    <h5>Địa chỉ</h5>
                    <p>245 Trần Đại Nghĩa</p>
                    <h5>Điện thoại: 0123456789</a></h5>
                  </div>
                  <div class="col-xs-12 col-sm-5 additional-info color-gray">
                    <h5>Thông tin bổ sung</h5>
                    <p>Tham gia cùng hàng ngàn nhà hàng khác được hưởng lợi từ việc hợp tác với chúng tôi.</p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </footer>

         
         </div>
       
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>