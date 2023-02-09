<?php
session_start();
include_once("sql.php");

//print_r($_POST);

//echo 'Session: ';
//echo $_SESSION['tan'];

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
                        <h2>Mitarbeiter</h2>
                    </div>
          <div class="container m-5">
          
          <div class="m-3">
          <form action="" method="POST">
            <label  class="form-label"><h5>Search with ID</h5></label><br>
            <input type="number" class="" name="pn" placeholder="Please ID number">
          </div>

       
          <div class="m-3">
          <input type="hidden" name="tan" value="<?php echo $_SESSION['tan']; ?>">
          <input type="submit" value="GET" name= "get">
          <input type="submit" value="GET2" name= "get2">
          </div>

  <?php
          
          

// if(empty ($_POST['pn'])){$_POST['pn'] = 0;};
           $pn=@$_POST['pn'];
           
 
 //======writing a query and select data from relational tables=======//
 //$sql = "SELECT b.Nam,a.Title FROM books a,library_mitarbeiter b WHERE a.mid=b.id AND a.Bno =$pn";
   $sql = "SELECT Nam, id FROM library_mitarbeiter WHERE id =$pn";
     if(isset($_POST['get']))
         {  
          if( $result = $conn->query($sql)){
 
                 while($row = $result->fetch_assoc()) {
                     echo  "<br> Mitarbeiter: ". $row["Nam"]. "<br>". "<br>";
                     echo "<a href= 'delete1.php?pid=".$row['id']."' class='btn btn-outline-danger' role='button' onclick= 'return confirm(\"really delete?\");' aria-pressed='true'>Delete</a>"." ";
                     echo "<a href= 'edit.php?ppd=".$row['id']."' class='btn btn-outline-success' role='button' aria-pressed='true'>Edit</a>";
                 }
               
             }else{ echo" ";}
              
        }



//====================================================================================
//=================(((((((((((((GET 2))))))))))))=====================================
//===================================================================================
       
      $sql1 = "SELECT * FROM books a,library_mitarbeiter b WHERE a.mid=b.id";

         
      if(isset($_POST['get2']) && $_SESSION['tan']==$_POST['tan'])
      {  

      if( $result = $conn->query($sql1)){

             while($row = $result->fetch_assoc()) {
             

              echo "<form action='' method='POST'>";

              echo "<br> book name : " . $row["Title"]. "<br> Mitarbeiter: ". $row["Nam"]. "<br> Email: ". $row["Email"]."<br> Phone: ". $row["Phone"]. "<br>";
              
              echo "<a href= 'delete1.php?pid=".$row["id"]."' class='btn btn-outline-danger' role='button' aria-pressed='true'>Delete</a>";
              
              echo"</form>";

              

         }//else{ echo" ";}


         $_SESSION['tan']++;

    }

  }


 ?>
<!-----------------------------Adding Form---------------------->
</form >
        <h5 class="m-3">Add a new record</h5>
                    
          
          
          <div class="m-3 ">
          <form action="" method="POST">
          <label>ID:</label><br>
            <input type="number" class=" form-control m-3" name="mitarbeiterid" >
            <label>Name:</label><br>
            <input type="text" class="form-control m-3" name="mitarbeitername" >
            <label>Email:</label><br>
            <input type="text" class="form-control m-3" name="mitarbeitermail" >
            <label>Phone:</label><br>
            <input type="number" class="form-control m-3" name="mitarbeiterfon" >
            <div class="m-3">
          <input type="submit" value="Submit" name= "mneu">
           </div>
           </form> 
          </div>
          </div>
          </div>

          
         

        
 <?php
//=================================================================================
//=================(((((((((((((ADDING))))))))))))=================================
//=================================================================================
       
       if(isset($_POST['mneu']))
       {    
            $id = $_POST['mitarbeiterid'];
            $name = $_POST['mitarbeitername'];
            $email = $_POST['mitarbeitermail'];
            $mobile = $_POST['mitarbeiterfon'];
            $sql = "INSERT INTO library_mitarbeiter (id,Nam,Email,Phone)
            VALUES ('$id','$name','$email','$mobile')";
            if (mysqli_query($conn, $sql)) {
               echo "<h5 class='m-5 text-success'>New record has been added successfully !</h5>";
            } else {
               echo "Error ";
            }
            
       }
       
       
       
       
 
   

?>

<script>
    if ( window.history.replaceState ) {
  //      window.history.replaceState( null, null, window.location.href );
    }
</script>


</body>
</html>