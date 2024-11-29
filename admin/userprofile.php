<?php
include("../connection/connect.php");
session_start();
if(strlen($_SESSION['user_id']) == 0) { 
    header('location:../login.php');
    exit;
}

if(isset($_POST['update'])) {
    $form_id = intval($_GET['form_id']);
    $status = mysqli_real_escape_string($db, $_POST['status']);
    $remark = mysqli_real_escape_string($db, $_POST['remark']);

    $query = $db->prepare("INSERT INTO remark(frm_id, status, remark) VALUES (?, ?, ?)");
    $query->bind_param('iss', $form_id, $status, $remark);
    $query->execute();

    $sql = $db->prepare("UPDATE users_orders SET status = ? WHERE o_id = ?");
    $sql->bind_param('si', $status, $form_id);
    $sql->execute();

    echo "<script>alert('Form details updated successfully');</script>";
}
?>

<script language="javascript" type="text/javascript">
function f2() {
    window.close();
}
function f3() {
    window.print(); 
}
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thông tin khách hàng</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style type="text/css">
        .indent-small { margin-left: 5px; }
        .form-group.internal { margin-bottom: 0; }
        .panel-body { 
            background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
            font: 600 15px "Open Sans", Arial, sans-serif;
        }
        label.control-label { font-weight: 600; color: #777; }
        table { 
            width: 650px; 
            border-collapse: collapse; 
            margin: auto;
            margin-top: 50px;
        }
        tr:nth-of-type(odd) { background: #eee; }
        th { 
            background: #004684; 
            color: white; 
            font-weight: bold; 
        }
        td, th { 
            padding: 10px; 
            border: 1px solid #ccc; 
            text-align: left; 
            font-size: 14px;
        }
    </style>
</head>
<body>
<div style="margin-left:50px;">
    <form name="updateticket" id="updatecomplaint" method="post"> 
        <table border="0" cellspacing="0" cellpadding="0">
            <?php
            $stmt1 = $db->prepare("SELECT * FROM users_orders WHERE o_id = ?");
            $stmt1->bind_param('i', $_GET['newform_id']);
            $stmt1->execute();
            $ro = $stmt1->get_result()->fetch_assoc();

            $stmt2 = $db->prepare("SELECT * FROM users WHERE u_id = ?");
            $stmt2->bind_param('i', $ro['u_id']);
            $stmt2->execute();
            $result2 = $stmt2->get_result();

            while($row = $result2->fetch_assoc()) {
            ?>
            <tr>
                <td colspan="2"><b>Profile của <?php echo htmlspecialchars($row['f_name']); ?></b></td>
            </tr>
            <tr height="50">
                <td><b>Ngày đăng ký:</b></td>
                <td><?php echo htmlspecialchars($row['date']); ?></td>
            </tr>
            <tr height="50">
                <td><b>Tên:</b></td>
                <td><?php echo htmlspecialchars($row['f_name']); ?></td>
            </tr>
            <tr height="50">
                <td><b>Họ:</b></td>
                <td><?php echo htmlspecialchars($row['l_name']); ?></td>
            </tr>
            <tr height="50">
                <td><b>Email:</b></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
            </tr>
            <tr height="50">
                <td><b>Số điện thoại:</b></td>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
            </tr>
            <tr height="50">
                <td><b>Trạng thái:</b></td>
                <td>
                    <?php echo $row['status'] == 1 ? "<div class='btn btn-primary'>Hoạt động</div>" : "<div class='btn btn-danger'>Bị chặn</div>"; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input name="Submit2" type="submit" class="btn btn-danger" value="Đóng cửa sổ này" onclick="return f2();" style="cursor: pointer;" />
                </td>
            </tr>
            <?php } ?>
        </table>
    </form>
</div>
</body>
</html>
