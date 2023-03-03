  <?php

  include_once("sql.php");
$user = $pass = "";
function checkLog($data){
  $data= htmlspecialchars($data);
  $data= trim($data);
  $data=stripcslashes($data);
  return $data;
}


  if(isset($_POST['btn']))
  {
    $user = htmlentities(checkLog($_POST['fname']));
    $pass = checkLog($_POST['lname']);
    $stmt= mysqli_prepare($conn, "SELECT * FROM login WHERE name= ? and password= ? ");
    mysqli_stmt_bind_param($stmt, "ss", $user, $password);
    
    $result=mysqli_stmt_execute($stmt);
    if(mysqli_num_rows($result) == 1)
    {
    session_start();
    $_SESSION ['USER']= $user;
    $_SESSION ['PASSWORD']= $pass;
    header("Location: page2.php");
    }else {
      $message = '<div class="alert alert-secondary alert-dismissible fade show  col-3 mx-auto" role="alert">
    <strong> OOPS !!!</strong> You dont have Permission !
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
      echo $message;
    }

  }

  ?>


  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
      rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

      <title>HOME</title>
  </head>

  <body>
  <style>
      body{background-image: url('bccc.jpg');
            background-size: cover;
          background-attachment: fixed;
          background-repeat: no-repeat;};
     
  </style>
      
  <nav class="navbar navbar-expand-lg navbar-light  bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Amal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" 
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="page2.php">Calculate</a>
                <a class="nav-link" href="table.php">Insert info</a>
                <a class="nav-link" href="get.php">Get info</a>
                <a class="nav-link" href="try-relation.php">Mitarbeiter</a>
              
                
              </div>
            </div>
          </div>
        </nav>
        
<main class=" container  text-center mt-5 text-secondary" style="margin: auto; ">

<header class="page-header m-5  ">
  <h1 class="text-decoration-underline">LOG - IN</h1>
</header>
      
<section class="row-sm m-5 col-4 mx-auto border border-secondary rounded-3 shadow ">
  <form action="" method="POST" class=" m-5">
    <label class= "fs-4">Name:</label><br>
    <input type="text"  name="fname" placeholder= "Schreib hier"><br><br>
    <label class= "fs-4" for="lname">Password:</label><br>
    <input type="password"  name="lname" placeholder= "****************"><br><br>
    <input type="submit" value="Log in" name= "btn" class= "fs-4 p-1">
  </form> 
</section>
</main>

  </body>
  </html>