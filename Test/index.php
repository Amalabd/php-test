<?php
// Start the session
//session_start();


include_once("sql.php");


if(isset($_POST['btn']))
{
  $user = $_POST['fname'];
  $pass = $_POST['lname'];

  $query="SELECT * FROM login WHERE name='$user' and password= '$pass' ";
  $result=mysqli_query($conn,$query);
  if(mysqli_num_rows($result)==1)
  {
  session_start();
  $_SESSION ['USER']= $user;
  $_SESSION ['PASSWORD']= $pass;
  header("Location: page2.php");
  }else {
    echo "Try again";
  }

}
  


 /*if($uname === $user && $pword === $pass)
 { session_start();
  $_SESSION ['USER']= $user;
  $_SESSION ['PASSWORD']= $pass;
  header("Location: page2.php");}
  //else { echo "Nochmal"};

}*/




?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>My-Index</title>
</head>
<body>



<style>
    body{background:rgba(255, 0, 0, 0.3);};
    text{align:center;};
</style>
    
<nav class="navbar navbar-expand-lg navbar-light .bg-secondary bg-secondary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Amal</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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

<?php
echo '<h1 class="m-4">Ich bin der Index</h1>';
echo " Welcome  " ; echo "<br>";echo "<br>";



//==========Registeration==========




?>



<h2>Dein Name ist:</h2>

<form action="" method="POST">
  <label>Name:</label><br>
  <input type="text"  name="fname" placeholder= "Schreib hier"><br>
  <label for="lname">Password:</label><br>
  <input type="password"  name="lname" placeholder= "**********"><br><br>
  <input type="submit" value="Log in" name= "btn">
</form> 

</body>
</html>