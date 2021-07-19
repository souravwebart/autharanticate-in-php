<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - Developer Sourav Gupta</title>
    <!-- Boostrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Custom css -->
    <link rel="stylesheet" href="css/style.css">



</head>

<body>
    <?php

    include_once('header.php');

    ?>
    <div class="container">
        <div class="row" id="logintop">

            <?php
            if (isset($_POST['signup'])) {
                extract($_POST);
                if (strlen($fname) < 3) { // Minimum 
                    $error[] = 'Please enter First Name using 3 charaters atleast.';
                }
                if (strlen($fname) > 20) {  // Max 
                    $error[] = 'First Name: Max length 20 Characters Not allowed';
                }
                if (!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname)) {
                    $error[] = 'Invalid Entry First Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
                }
                if (strlen($lname) < 3) { // Minimum 
                    $error[] = 'Please enter Last Name using 3 charaters atleast.';
                }
                if (strlen($lname) > 20) {  // Max 
                    $error[] = 'Last Name: Max length 20 Characters Not allowed';
                }
                if (!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname)) {
                    $error[] = 'Invalid Entry Last Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
                }
                if (strlen($username) < 3) { // Change Minimum Lenghth   
                    $error[] = 'Please enter Username using 3 charaters atleast.';
                }
                if (strlen($username) > 50) { // Change Max Length 
                    $error[] = 'Username : Max length 50 Characters Not allowed';
                }
                if (!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $username)) {
                    $error[] = 'Invalid Entry for Username. Enter lowercase letters without any space and No number at the start- Eg - myusername, okuniqueuser or myusername123';
                }
                if (strlen($email) > 50) {  // Max 
                    $error[] = 'Email: Max length 50 Characters Not allowed';
                }
                if (strlen($email) > 50) {  // Max 
                    $error[] = 'Email: Max length 50 Characters Not allowed';
                }
                if ($passwordConfirm == '') {
                    $error[] = 'Please confirm the password.';
                }
                if ($password != $passwordConfirm) {
                    $error[] = 'Passwords do not match.';
                }
                if (strlen($password) < 5) { // min 
                    $error[] = 'The password is 6 characters long.';
                }

                if (strlen($password) > 20) { // Max 
                    $error[] = 'Password: Max length 20 Characters Not allowed';
                }
                $sql = "select * from users where (username='$username' or email='$email');";
                $res = mysqli_query($dbc, $sql);
                if (mysqli_num_rows($res) > 0) {
                    $row = mysqli_fetch_assoc($res);

                    if ($username == $row['username']) {
                        $error[] = 'The usename is already exist';
                    }
                    if ($email == $row['email']) {
                        $error[] = 'The email is already exist';
                    }
                }
                if (!isset($error)) {
                    $date = date('Y-M-D');
                    $option = array("cost" => 4);
                    $password = password_hash($password, PASSWORD_BCRYPT, $option);
                    $result = mysqli_query($dbc, "INSERT into users value('', '$fname', '$lname', '$username', '$email', '$password','$date')");

                    if ($result) {
                        $done = 2;
                    } else {
                        $error = "Failed : Something went wrong";
                    }
                }
            }
            ?>
            <div class="col-lg-6 mx-auto">
                <img class="hometopimage1" src="images/a.jpg" alt="Developer sourav gupta">
                <p class="loginrighttext">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error saepe eum aliquam quibusdam ducimus fugiat commodi explicabo, modi vel, iure molestias quas molestiae laudantium dignissimos accusantium ipsum at quisquam officiis.</p>
            </div>



            <div class="col-lg-6 mx-auto">

                <?php

                if (isset($done)) {
                ?>
                    <div class="alert alert-success" id="registerdone">
                        <img class="registersucess" src="images/success.png" width=40px height=40px alt="signup success">
                        <strong>Success!</strong> You have been registered successfully. <br> <strong>If you want to access your account </strong><a href="login.php">Login Now</a></br>
                    </div>
                <?php
                } else {
                ?>

                    <div class="logging-form">

                        <?php
                        if (isset($error)) {
                            foreach ($error as $error) {
                                echo '<p class="errmsg"> &#x26A0;' . $error . ' </p>';
                            }
                        }
                        ?>
                        <form action="" method="POST">
                            <img class="loginimage" src="images/sgptagroup.png" widht=90px height=90px alt="Developer sourav gupta">
                            <div class="mb-3">
                                <label for="First Name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="formstyle" name="fname" value="<?php if (isset($error)) {
                                                                                                                echo $_POST['fname'];
                                                                                                            } ?>" required="">
                            </div>
                            <div class="mb-3">
                                <label for="Last Name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="formstyle" name="lname" value="<?php if (isset($error)) {
                                                                                                                echo $_POST['lname'];
                                                                                                            } ?>" required="">
                            </div>
                            <div class="mb-3">
                                <label for="Username" class="form-label">Username</label>
                                <input type="username" class="form-control" id="formstyle" name="username" value="<?php if (isset($error)) {
                                                                                                                        echo $_POST['username'];
                                                                                                                    } ?>" required="">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="formstyle" name="email" value="<?php if (isset($error)) {
                                                                                                                echo $_POST['email'];
                                                                                                            } ?>" required="">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="formstyle" name="password" required="">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="formstyle" name="passwordConfirm" required="">
                            </div>
                            <button type="submit" name="signup" class="btn btn-primary" id="entrybutton">Sign up</button>
                            <div class="loginsignup">
                                <P>Have an account? <a href="#"> Login Now</a></P>
                            </div>
                        </form>
                    <?php } ?>

                    </div>
            </div>
        </div>
    </div>
</body>
<script>
    setInterval(updateTime, 1000);

    function updateTime() {
        time1.innerHTML = new Date();
    }
</script>
<?php

include_once('footer.php');

?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="script.js"></script>

</html>