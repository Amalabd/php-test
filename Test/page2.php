<?php
// Start the session
session_start();
$tt= $_SESSION['USER'];

if(!empty(filter_input (INPUT_POST, "fname")))
{
 $_SESSION['USER'] = filter_input (INPUT_POST, "fname");
} 

if(empty($_SESSION['USER'])){
  header("Location: index.php");
}

if(isset($_POST['bttn'])){
  session_unset();
  header("Location: index.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Page-2</title>
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
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
          data-bs-tarPOST="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              <a class="nav-link" href="page2.php">Calculate   </a>
              <a class="nav-link" href="table.php">Insert info</a>
              <a class="nav-link" href="get.php">Get info</a>
              <a class="nav-link" href="try-relation.php">Mitarbeiter</a>
            
              
            </div>
          </div>
        </div>
      </nav>

<?php

//....... Lösung für Undefined index......
/*
if(isset($_POST["first"])){$value1=$_POST["first"];}else{$_POST["first"]= 0 ;};
if(isset($_POST["second"])){$value2=$_POST["second"];}else{$_POST["second"]= 0 ;};
if(isset($_POST["sel"])){$value2=$_POST["second"];}else{$_POST["sel"]= 0 ;};
if(isset($result)){$value2=$_POST["second"];}else{$result= 0 ;};
*/
///.......................
function calc($data){
  $data = htmlspecialchars($data);
  $data= trim($data);
  $data = stripcslashes($data);
  return $data;
}

$value1=0 ;
$value2=0 ;
$result=0;

if(isset($_POST["sel"]) ){
  $value1= calc($_POST["first"]) ;
$value2= calc($_POST["second"]) ;



switch ($_POST["sel"]) {
    case "+": $result= $value1+$value2;
    break;
    case "-": $result= $value1-$value2;
    break;
    case "*": $result= $value1*$value2;
    break;
    case "/": $result= $value1/$value2;
    break;
}}
  
?>

<header class="m-5 text-center">
<?php echo "<h1>Hallo <span class='fst-italic text-success'>$tt</span> </h1>" ;    ?>
</header>

<main class="container col-lg-4 col-sm-8 text-center mt-5 p-5 border border-secondary rounded-3 shadow" 
      style="background-color: rgba(255,255,255, 0.3);">

  <section>
    <h3 class="text-decoration-underline mb-5">Calculator</h3>
  </section>    

<section>
<form method="post"  action="">

<p>First Value:<br/>
<input type="number" id="first" name="first" class='rounded-3'></p>

<select name="sel" class="btn btn-secondary fw-bold  ">
<option  value="+">+</option>
<option  value="-">-</option>
<option  value="*">*</option>
<option  value="/">/</option>
</select>

<p>Second Value:<br/>
<input type="number" id="first" name="second" class='rounded-3'></p>

<button type="submit" name="answer" class="btn btn-secondary">
  <i class="fa fa-calculator" aria-hidden="true"></i> Calculate
</button><br>
<?php 
echo "<i class='fa fa-sort-desc fs-2 text-secondary' aria-hidden='true'></i>"."<br>"."<br>". "<span class='border rounded-3 border-secondary p-2'>$result</span>" ."<br>". "<br>";

echo '<a href="index.php" class="link-success"> Zurück zum Index </a>'.'<br>'. '<br>';
?>
   
<button type="submit" name= "bttn" class="btn btn-secondary"> Log Out  <i class="fa fa-sign-out" aria-hidden="true"></i></button>
</form>
</section>
</main>
</body>
</html>