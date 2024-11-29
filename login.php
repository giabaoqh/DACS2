<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

  <link rel="stylesheet" href="css/login.css">

  <style type="text/css">
    #buttn {
      color: #fff;
      background-color: #5c4ac7;
    }
  </style>


  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animsition.min.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
  <header id="header" class="header-scroll top-header headrom">
    <nav class="navbar navbar-dark">
      <div class="container">
        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
        <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/img/logo.png" alt="" width="100px" height="40px"> </a>        <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
          <ul class="nav navbar-nav">
            <li class="nav-item"> <a class="nav-link active" href="index.php">Trang chủ <span class="sr-only">(current)</span></a> </li>
            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Nhà hàng <span class="sr-only"></span></a> </li>


            <?php
            if (empty($_SESSION["user_id"])) // if user is not login
            {
              echo '<li class="nav-item"><a href="login.php" class="nav-link active">Đăng nhập</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Đăng kí</a> </li>';
            } else {


              echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Đơn hàng của tôi</a> </li>';
              echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Đăng xuất</a> </li>';
            }

            ?>

          </ul>

        </div>
      </div>
    </nav>

  </header>
  <div style=" background-image: url('images/img/pimg.jpg');">

    <?php
    include("connection/connect.php");
    error_reporting(0);
    session_start();
    if (isset($_POST['submit'])) {
      $username = trim($_POST['username']);
      $password = $_POST['password'];
      $message = "";
  
      if (!empty($username) && !empty($password)) {
          // Sử dụng câu lệnh chuẩn bị để ngăn chặn SQL Injection
          $stmt = $db->prepare("SELECT u_id, password FROM users WHERE username = ?");
          $stmt->bind_param("s", $username);
          $stmt->execute();
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();
  
          if ($row && password_verify($password, $row['password'])) {
              // Mật khẩu khớp
              $_SESSION["user_id"] = $row['u_id'];
              header("Location: index.php");
              exit;
          } else {
              $message = "Tên người dùng hoặc mật khẩu không hợp lệ!";
          }
      } else {
          $message = "Vui lòng điền vào tất cả các trường!";
      }
  
      if (!empty($message)) {
          echo "<script>alert('$message');</script>";
      }
  }
    ?>


    <div class="pen-title">
      <
        </div>

        <div class="module form-module">
          <div class="toggle">

          </div>
          <div class="form">
            <h2>Đăng nhập vào tài khoản của bạn</h2>
            <span style="color:red;"><?php echo $message; ?></span>
            <span style="color:green;"><?php echo $success; ?></span>
            <form action="" method="post">
              <input type="text" placeholder="Username" name="username" />
              <input type="password" placeholder="Password" name="password" />
              <input type="submit" id="buttn" name="submit" value="Login" />
            </form>
          </div>

          <div class="cta">Chưa đăng ký?<a href="registration.php" style="color:#5c4ac7;"> Tạo một tài khoản</a></div>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>




        <div class="container-fluid pt-3">
          <p></p>
        </div>



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



</body>

</html>