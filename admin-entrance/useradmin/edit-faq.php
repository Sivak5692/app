<!-- <?php
include('server.php');
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

    if (count($record == 1)) {
        $n = mysqli_fetch_array($record);
        $firstname = $n['firstname'];
        $lastname = $n['lastname'];
        $email = $n['email'];
        $password = $n['password'];
        $address = $n['address'];
        // $usertype = $n['usertype'];
    }

}
?> -->
<?php 
    $faq_text = "";
    $update_post = "";
    $save_post = "";
?>
 <?php error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);?>

<!DOCTYPE html>
<html>
<head>
    <title>EDIT FAQ</title>
    <link rel="stylesheet" type="text/css" href="../style.css">

    <!-- 添加控制show-users的样式代码 -->
    <link rel="stylesheet" type="text/css" href="../useradmin/style.css">
    <link rel="stylesheet" type="text/css" href="../useradmin/nav.css">

    <link rel="stylesheet" type="text/css" href="../useradmin/searchbox/style.css">
    <script type="text/javascript" src="../useradmin/searchbox/function.js"></script>

    <!-- ckeditor -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
    <!-- Styling for public area -->
    <link rel="stylesheet" href="../static/css/admin_styling.css">
</head>
<body>
<div class="header">
    <!-- start: Header Menu Team logo -->
    <div class="logo">
        <img src="logo.jpg" style="float: left;width: 75px;height: 75px;">
        <span style="float:left;color:white;padding:20px 20px;position:relative;font-family: Arial;font-size: 24px;margin-top: 10px;">ADMIN-DOMISEP</span>
    </div>
    <!-- end: Header Menu Team logo -->
    <ul class="top-nav" style="width: 75%;float: left;display: inline-block;">
        <?php $row = mysqli_fetch_array($results) ?>
         <li><a href="show-user.php">User Management</a></li>
        <li><a href="create_admin.php">Add Admin</a></li>
        <li><a href="edit-myprofile.php">Edit Profile</a></li>
        <li><a href="edit-faq.php">Edit FAQ</a></li>
        <li><a href="edit-condition.php">Privacy&Terms</a></li>
       
        <li><a href="change_password.php?edit=<?php echo $row['id']; ?>" >Change Password</a></li>
        <li><img src="../images/boss.png" style="margin:0px 10px 0px 100px;"></li>
        <div style="margin: 2px 2px;">
            <?php  if (isset($_SESSION['first_name'])) : ?>
                <strong style="font-size: x-large;"><?php echo $_SESSION['first_name']; ?></strong>
                <small>
                    <i  style="color: #888;margin-right: 1px;">(<?php echo ucfirst($_SESSION['type']); ?>)</i>
                    <a href="../../index.php?logout='1'" style="color: red;font-size: large;">logout</a>
                 
                </small>

            <?php endif ?>
        </div>
        <?php ?>
    </ul>
</div>
<!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
    <div class="container content">

        <!-- Middle form - to create and edit FAQ  -->
        <div class="action create-post-div">
            <h1 class="page-title" style="text-align: center;">Create/Edit FAQ</h1>
            <form method="post" enctype="multipart/form-data" action="server.php" style="border: 1px solid green;" >
                <textarea name="faq_text" id="body" cols="60" rows="30"><?php echo $faq_text; ?></textarea>
                <div class="input-group">

                <!-- if editing post, display the update button instead of create button -->
                <?php if ($update_post == true): ?> 
                    <button type="submit" class="btn" name="update_post">UPDATE</button>
                <?php else: ?>
                    <button type="submit" class="btn" name="save_post">Save Post</button>
                <?php endif ?>
                </div>
            </form>
        </div>
        <!-- // Middle form - to create and edit FAQ -->
    </div>
<div class="footer">
    <h5 style="text-align: center; font-family: Hei; ">User Admin - 2019 © DOMISEP all rights reserved!</h5>
</div>
</body>
</html>

<script>
    CKEDITOR.replace('body');
</script>
