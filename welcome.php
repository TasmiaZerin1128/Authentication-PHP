   <?php
      include('connection.php');
      session_start();
   ?>
   <html>

   <head>
   <title>Welcome </title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <script src="https://cdn.lordicon.com/lusqsztk.js"></script>

   <style>
         .page{
               margin-top: 50px;
         }
         .main{
               width: 20%;
               margin: 80px auto;
               padding: 15px;
         }
         .btn-primary,.btn-primary:hover, .btn-primary:active, .btn-primary:visited{
               background-color: #11866b;
               border:  #11866b !important;
         }
         h2 a, a:hover, a:active, a:visited{
            text-decoration: none;
            color: #11866b;
         }
   </style>
   </head>

   <body>
      <div class="page" style="width: 100%">
         <div class="main">
            <lord-icon src="https://cdn.lordicon.com/tqywkdcz.json" trigger="loop" style="width:250px;height:250px">
            </lord-icon>
            <h4>Welcome <?php echo "<h1>".$_SESSION['username']."</h1>"; ?></h4>
            <br><br><br>
            <h2><a href = "Login/login.php">Sign Out</a></h2>
         </div>
      </div>
   </body>

   </html>
