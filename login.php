<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Developer Sourav Gupta</title>
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
            <div class="col-lg-6 mx-auto">
                <img class="hometopimage1" src="images/a.jpg" alt="Developer sourav gupta">
                <p class="loginrighttext">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error saepe eum aliquam quibusdam ducimus fugiat commodi explicabo, modi vel, iure molestias quas molestiae laudantium dignissimos accusantium ipsum at quisquam officiis.</p>
            </div>

            <div class="col-lg-6 mx-auto">
                <div class="logging-form">
                    <form action="login_process.php" method="POST">
                        <img class="loginimage" src="images/sgptagroup.png" width=90px height=90px alt="Developer sourav gupta">
                        <?php

                        if (isset($_GET['loginerror'])) {
                            $loginerror= $_GET['loginerror'];
                        }
                        if(!empty($loginerror)){
                            echo '<p class="errmsg"> Invalid login credentials, Please Try Again </p>';
                        }


                        ?>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username or Email Address</label>
                            <input type="text" class="form-control" id="formstyle" name="login_var" value="<?php if(!empty($loginerror)){ echo  $loginerror; } ?>" class="form-control" required="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="formstyle" name="password" class="form-control" required="">
                        </div>
                        <button type="submit" name="sublogin" class="btn btn-primary" id="entrybutton">Login</button>
                        <div class="forgotpass">
                            <a href="#">Forgot Password?</a>
                        </div>
                        <div class="loginsignup">
                            <P>Don't have an account? <a href="signup.php"> Sign up</a></P>
                        </div>
                    </form>
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
<script src="js/script.js"></script>

</html>