<?php 
// db connection 
include 'config.php'; 
    // check  session is started
    if(!session_id()){ session_start(); }
    // check  session exists
    if(isset($_SESSION['user'])){
        //  exists
        header("location: {$URL}index.php");
    }else{ ?>
    <!--  not exists -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rating System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>Login</h1>
        </div>
        <div id="content">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" name="username" value="admin" />
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="password" name="password" value="admin" />
                </div>
                <input type="submit" class="btn" name="login" value="Login" />
            </form>
            <div class="login-details">
                <h4>Demo Login Details</h4>
                <span>Username : admin</span><br>
                <span>Password : admin</span>
            </div>
            <?php
                if(isset($_POST['login'])){
                    if(!isset($_POST['username']) || $_POST['username'] == ''){

                       echo '<div class="message error">Please Fill All The Fields.</div>';

                    }else if(!isset($_POST['password']) || $_POST['password'] == ''){

                        echo '<div class="message error">Please Fill All The Fields.</div>';

                    }else{
                        // validate values
                        $username = test_input(mysqli_real_escape_string($conn,$_POST["username"]));
                        $password = md5(test_input(mysqli_real_escape_string($conn,$_POST["password"])));
                            // check username and password
                        $sql = "SELECT username FROM users WHERE username = '$username' AND  password = '$password'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_assoc($result)) {
                                /* Start the session */
                                session_start();
                                /* Set session variables */
                                $_SESSION["user"] = $row['username'];

                                header("location: {$URL}index.php");
                            }

                        }else{
                            echo "<div class='message error'>Username and Password Not Matched.</div>";
                        }
                    }
                }
                // db close connection                
                mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>
<?php } ?>       
            
