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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>Employee</title>
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
                  <a class="nav-link" href="try-relation.php">Mitarbeiter</a>
                
                  
                </div>
              </div>
            </div>
          </nav>


   <header class="page-header text-center m-5">
   <h2>Mitarbeiter</h2>
   </header>
    <main class="container col-lg-4 col-sm-8  mt-5 p-5 border border-secondary rounded-3 shadow" 
      style="background-color: rgba(255,255,255, 0.3);">
      
          <form action="" method="POST" class="border-bottom border-secondary pb-3">
          <label  class=""><h5>Search with ID</h5></label><br>
          <input type="number" class="" name="pn" placeholder="Request with ID number">
          <br><br>
          <input type="hidden" name="tan" value="<?php echo $_SESSION['tan']; ?>">
          <div class="justify-content-end d-flex" >
          <input type="submit" value="GET" name= "get" class="btn btn-secondary m-1">
          <input type="submit" value="GET2" name= "get2" class="btn btn-secondary m-1 ">
        </div>
        <p>
<?php 
function secure($data){
  $data= htmlentities($data);
  $data = trim($data);
  $data = stripcslashes($data);
  return $data;
}
 if(isset($_POST['get'])){  
      $pn= secure($_POST['pn']);
      $stmt=mysqli_prepare($conn, "SELECT Nam ,Email FROM library_mitarbeiter WHERE id =?");
          mysqli_stmt_bind_param($stmt, "s", $pn);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_bind_result($stmt,$nam,$mail);
          mysqli_stmt_fetch($stmt);
          if( !empty($nam)){
echo  "<br> Name: ". $nam. "<br>" . "Email : " .$mail. "<br>". "<br>";

echo "<a href= 'delete1.php?pid=".$nam.$mail."' class='btn btn-outline-danger' role='button' onclick= 'return confirm(\"really delete?\");' aria-pressed='true'>Delete</a>"." ";
echo "<a href= 'edit.php?ppd=".$nam.$mail."' class='btn btn-outline-success' role='button' aria-pressed='true'>Edit</a>";
           
               
             }else{ echo"NO DATA ";}
              
        }

?>

        </p>
        </form>

  <?php





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

          <form action="" method="POST">
          <label>ID:</label>
            <input type="number" class=" form-control m-3" name="mitarbeiterid" >
            <label>Name:</label>
            <input type="text" class="form-control m-3" name="mitarbeitername" >
            <label>Email:</label>
            <input type="text" class="form-control m-3" name="mitarbeitermail" >
            <label>Phone:</label>
            <input type="number" class="form-control m-3" name="mitarbeiterfon" >
            <div class="justify-content-end d-flex">
          <input type="submit" value="Submit" name= "mneu" class="btn btn-secondary  ">
           </div>
           </form> 
          
         
</main>

          
         

        
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