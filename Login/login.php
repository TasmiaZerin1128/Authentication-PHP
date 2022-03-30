    <?php

    include "../connection.php";

    session_start();

    $userErr = $pswdErr = "";
    $username = $password = "";
    $send = true;
    $mismatch="";

    if(isset($_POST["submit"])){
        if(empty($_POST['username'])){
            $userErr = "Please enter username";
            $send = false;
        }
        else{
            $username = $_POST['username'];
        }
        if(empty($_POST['password'])){
            $send = false;
            $pswdErr = "Please enter password";
        }
        else{
            $password = $_POST['password'];
        }

        if($send){
            $sql = "SELECT * FROM users WHERE username='$username' and pswd='$password'";
            $result = mysqli_query($conn,$sql);

            $count = mysqli_num_rows($result);


            if($count==1){
                $mismatch="Details matched";
                $row = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $row['username'];
                header("location: ../welcome.php");
            }
            else{
                $mismatch="Username or password incorrect!";
            }
        }

    }

    ?>

    <html>
        <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <link rel="stylesheet" href="login.css">
            <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
            <script src="login.js"></script>

            <style>
            .page{
                margin-top: 20px;
            }
            h2{
                color: #11866b;
                font-size: 50px;
            }

            .form{
                margin-top: 10px;
                padding: 10px 15px;
                box-shadow: 5px;
                border-color: #11866b;
            }

            .input{
                border-radius: 5px;
                box-shadow: 5px;
                border-color: #11866b;
            }

            .main{
                width: 40%;
                margin: 80px auto;
            }

            #uname, #pswd{
                padding: 8px;
            }
            p a,a:hover, a:active, a:visited{
                text-decoration: none;
                color: #11866b;
            }
            .btn-primary,.btn-primary:hover, .btn-primary:active, .btn-primary:visited{
                background-color: #11866b;
                border:  #11866b !important;
            }
            </style>

        </head>
        <body>
            <div class="page" style="width: 100%">
                    <div class="main">
                        <lord-icon src="https://cdn.lordicon.com/pithnlch.json" trigger="loop" style="width:100px;height:100px">
                        </lord-icon>
                        <h2>WELCOME BACK</h2><br><?php echo "<h4 style='color:red'>".$mismatch."</h4>";?>
                        <div class="form">
                            <form action="" method="post">
        
                                <label for="uname">Username</label>
                                <br>
                                <input type="text" class="input" id="uname" name="username" placeholder="Enter Username">
                                <span class="error"><?php echo $userErr;?></span>
                                <br><br>
        
                                <label for="pswd">Password</label>
                                <br>
                                <input type="password" class="input" id="pswd" name="password" placeholder="Enter Password">
                                <span class="error"><?php echo $pswdErr;?></span>
                                <br>
                                <input type="checkbox" onclick="showPswd()" style="margin-top: 10px;"> Show Password
                                <br><br>
        
                                <button type="submit" name="submit" class="btn btn-primary">Log In</button>
                            </form>
                            <p>Don't have an account? <a href="../Register/register.php"><b>Register Now</b></a></p>
                        </div>
                    </div>
            </div>
        </body>
    </html>