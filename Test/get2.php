<?php
include_once("sql.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>Get-Daten</title>
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
                        <h2>Process -2- </h2>
        </header>
          <main  class="container col-lg-4 col-sm-8 mt-5 p-5 border border-secondary rounded-3 shadow" 
      style="background-color: rgba(255,255,255, 0.3);">
          
         
          <form action="" method="POST" class="p-3">
            <label  class="form-label">Process-no</label>
            <input type="number" name="no" min="1" max="100" id="no" class="rounded-3">
            <br>
            <p id="res"> </p>
            <br>
          <div class="justify-content-end d-flex">
          <input type="submit" value="GET" name= "get" class="btn btn-secondary fw-bold  ">
        </div>
        <p>
 <?php  
function secure($data){
   $data=htmlentities($data);
   $data=trim($data);
   $data= stripcslashes($data);
          return $data;
  }

if(isset($_POST['get']))
  {  
$no= secure($_POST['no']);  


  
    }


 ?>
  </p>




  </form>
 </main>

 
<script>
var no= document.getElementById('no');
var res = document.getElementById('res');
no.addEventListener('input' , function(event){
  if(no.value < 999){
  var inputValue = event.target.value;
  res.textContent = 'Your selection was :' + inputValue;}
  else{res.textContent = 'Your selection was : Invalid';}
})


</script>
</body>
</html>
