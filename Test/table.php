<?php
include_once("sql.php");
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

    <title>Daten-tabel</title>
</head>
<body>
    
    <style>
        body{background-image: url('bccc.jpg');
          background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;};
          
        text{align:center;};
    </style>
        
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Amal</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" 
              aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  <a class="nav-link" href="page2.php">Calculate</a>
                  <a class="nav-link" href="table.php">Insert info</a>
                  <a class="nav-link" href="get.php">Get info</a>
                  <a class="nav-link" href="get2.php">Get 2</a>
                  <a class="nav-link" href="try-relation.php">Mitarbeiter</a>
                
                  
                </div>
              </div>
            </div>
          </nav>

          <header class="page-header text-center m-5">
                        <h2>Contact Form</h2>
        </header>
          <main class="container col-lg-4 col-sm-8 mt-5 p-5 border border-secondary rounded-3 shadow" 
      style="background-color: rgba(255,255,255, 0.3);">
          
          <section class="m-3">
          <form action="" method="POST">
            <label class="form-label">ID-no</label>
            <input type="number" class="form-control" name="id" placeholder="Please enter your ID">
         <br>
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Please enter your name">
          
        <br>
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Please enter your Email">
         <br>
          
            <label  class="form-label">Mobile</label>
            <input type="number" class="form-control" name="mobile" placeholder="Please enter your Mobile">
            <br><br>
         
         <div class=" justify-content-end d-flex">
          <input type="submit" value="Submit" name= "submit" class="btn btn-secondary ">
        </div>
           </form> 
        </section>
        </main>


        

<?php 

$id = $name = $email =$mobile = "";
function formTest($data){
  $data = htmlentities($data);
  $data = trim($data);
  $data = stripcslashes($data);
  return $data;
 }

 if(isset($_POST['submit'])){
  $id = formTest($_POST['id']);
  $name = formTest($_POST['name']);
  $email = filter_var(formTest($_POST['email']), FILTER_VALIDATE_EMAIL);
  $mobile = formTest($_POST['mobile']);
  $stmt = mysqli_prepare($conn, "INSERT INTO studenten (Sd,Fname,Email,Mobile) VALUES (?, ? ,? ,?)");
  mysqli_stmt_bind_param($stmt, "ssss", $id, $name, $email, $mobile);

  if(mysqli_stmt_execute($stmt)){
    $message = '<div class="alert alert-success alert-dismissible fade show  col-3 mx-auto" role="alert">
    <strong>Congratulation</strong> New record has been added successfully !
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    echo $message;
  }else{
    $message = '<div class="alert alert-danger alert-dismissible fade show col-3 mx-auto" role="alert">
    <strong>OOPS!! </strong> Error !
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    echo $message;
  }
 }

////////////////////////////
/*
if(isset($_POST['submit']))
{    
     $id = $_POST['id'];
     $name = $_POST['name'];
     $email = $_POST['email'];
     $mobile = $_POST['mobile'];
     $sql = "INSERT INTO studenten (Sd,Fname,Email,Mobile)
     VALUES ('$id','$name','$email','$mobile')";
     if (mysqli_query($conn, $sql)) {
        echo "<h5>New record has been added successfully !</h5>";
     } else {
        echo "Error ";
     }
     mysqli_close($conn);
}

*/


?>


</body>
</html>