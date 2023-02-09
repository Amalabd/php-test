<?php
include_once("sql.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Get-Daten</title>
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
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  <a class="nav-link" href="page2.php">Calculate</a>
                  <a class="nav-link" href="table.php">Insert info</a>
                  <a class="nav-link" href="get.php">Get info</a>
                  <a class="nav-link" href="try-relation.php">Mitarbeiter</a>
                
                  
                </div>
              </div>
            </div>
          </nav>


          <div class="page-header m-5">
                        <h2>Process</h2>
                    </div>
          <div class="container m-5">
          
          <div class="m-3">
          <form action="" method="POST">
            <label  class="form-label">Process-no</label>
            <input type="number" class="form-control" name="pn" placeholder="Please enter the Process number">
          </div>

          <div class="m-3">
            <p></p>
            <div class="m-3">
          <input type="submit" value="GET" name= "get">
          </div>



        <?php
          
          echo "Name : ";
          if(empty ($_POST['pn'])){$_POST['pn'] = 0;};
          $pn=$_POST['pn'];

        //======writing a query and select data from tables=======//
        $sql = "SELECT Fname FROM studenten WHERE Sd= $pn ";
  
        if(isset($_POST['get']))
        {  

            //======make a query and get the reslt======= I always got an error so I used (if statment)//
           if( $result = $conn->query($sql)){
            //======fetch the data from the result in an associative array=======//
                //$resf= mysqli_fetch_assoc($result);

       
                while($row = $result->fetch_assoc()) {
                    echo  $row["Fname"];
                }
              
            }else{ echo" ";}
             
       }
       



    // === to close the connection=====
    //mysqli_close($conn);

?>




</body>
</html>