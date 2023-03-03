<?php

include_once("sql.php");

//$select= mysqli_query($conn," SELECT * FROM library_mitarbeiter WHERE id=$id");
  //$row= mysqli_fetch_array($select);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit</title>
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
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  <a class="nav-link" href="page2.php">Page2</a>
                  <a class="nav-link" href="table.php">Page3</a>
                  <a class="nav-link" href="get.php">Page4</a>
                  <a class="nav-link" href="try-relation.php">Page5</a>
                
                  
                </div>
              </div>
            </div>
          </nav>


          <div class="container m-5">
          
          <div class="m-3">

          
          <form action=" " method="post">
          <label><h5 class="m-3">Edit here :</h5> </label> 
          <input type="text" name ="mm" >
            <input type= "submit" value= "Edit" name= "up" class='btn btn-outline-success'>

</form>


 </div>
          </div>


<?php


  if(isset($_POST["up"])){
  $id=$_GET["ppd"];
  $usr= $_POST["mm"];
  

    $update= "UPDATE library_mitarbeiter SET Nam='$usr' WHERE id=$id";
    if (mysqli_query($conn, $update)) {
      echo "<h5 class='text-success m-5'>The record has been updated successfully! :)</h5>";
      echo "<input type= 'submit' value= 'Back'  onclick= 'location.href=\"try-relation.php\";' class='btn btn-outline-success m-5'>";
   }else{ echo "NOt!!";}
  }

  ?>


          </body>
</html>