    <?php

    include '../connection.php';

    $nameErr = $userErr = $pswdErr = "";
    $welcome_line = "";
    $sendData = true;
    $fullname = $username = $password = "";

    if(isset($_POST["submit"])){

        if(empty($_POST['fullname'])){
            $nameErr = "Name is required";
            $sendData = false;
        }else{
            $fullname = $_POST['fullname'] ;
        }

        if(empty($_POST['username'])){
            $userErr = "Username is required";
            $sendData = false;
        }else{
            $username = $_POST['username'];
        }

        if(empty($_POST['password'])){
            $pswdErr = "Password is required";
            $sendData = false;
        }else{
            $password = $_POST['password'];
        }

        if($sendData){

            $sql = "INSERT INTO users (fname, username, pswd) 
            VALUES ('$fullname', '$username', '$password')";

    $res = true;
    try{
    if(mysqli_query($conn, $sql)){
        
        $welcome_line = "Welcome";
        header("location: ../Login/login.php");
        echo "<script>alert('Registration Successful')</script>";
    }
    else{
        $res=false;
        
        throw new Exception();
    }
    }
    catch(Exception $e){
        $welcome_line = "Please enter unique username!";
    }
        }
    }


    ?>



    <html>
        <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <link rel="stylesheet" href="register.css">
            <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
            <script src="register.js"></script>

            <style>
            .page{
        margin-top: 50px;
    }
    h2{
        color: #11866b;
        font-size: 50px;
    }

    .form{
    margin-top: 10px;
    padding: 10px 15px;
    }

    .main{
        width: 40%;
        margin: 20px auto;
    }

    #fname,#uname, #pswd{
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
                        <lord-icon src="https://cdn.lordicon.com/dxjqoygy.json" trigger="loop" style="width:100px;height:100px">
                        </lord-icon>
                        <h2>CREATE ACCOUNT</h2><br><?php echo "<h4 style='color:red'>".$welcome_line."</h4>";?>
                        <div class="form">
                            <form action="" method="post">
                                <label for="fname">Full Name</label>
                                <br>
                                <input type="text" id="fname" name="fullname" placeholder="Enter Your Name">
                                <span class="error"><?php echo $nameErr;?></span>
                                <br><br>
                                <label for="uname">Username</label>
                                <br>
                                <input type="text" id="uname" name="username" placeholder="Enter Username">
                                <span class="error"><?php echo $userErr;?></span>
                                <br><br>
        
                                <label for="pswd">Password</label>
                                <br>
                                <input type="password" id="pswd" name="password" placeholder="Enter Password">
                                <span class="error"><?php echo $pswdErr;?></span>
                                <br>
                                <input type="checkbox" onclick="showPswd()" style="margin-top: 10px;"> Show Password
                                <br><br>
        
                                <button type="submit" name = "submit" class="btn btn-primary">Register</button>
                            </form>
                            <p>Already have an account? <a href="../login/Login.php"><b>Log in</b></a></p>
                        </div>
                    </div>
            </div>

            
        </body>
    </html>