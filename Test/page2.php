<?php
// Start the session
session_start();
//error_reporting (E_ALL ^ E_NOTICE);
if(!empty(filter_input (INPUT_POST, "fname")))
{
 $_SESSION['USER'] = filter_input (INPUT_POST, "fname");
} 
if(empty($_SESSION['USER'])){
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Page-2</title>
</head>
<body>

<?php
// Set session variables


//if(session_unset){}

?>
    
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
              <a class="nav-link" href="page2.php">Calculate   </a>
              <a class="nav-link" href="table.php">Insert info</a>
              <a class="nav-link" href="get.php">Get info</a>
              <a class="nav-link" href="try-relation.php">Mitarbeiter</a>
            
              
            </div>
          </div>
        </div>
      </nav>

<?php
//....Getting the name.....

$tt= $_SESSION['USER'];

echo "<h2 class='m-5'>Hallo :</h2>" ;   echo"<span class='m-5'> $tt </span>";




    echo '<br>';
?>
<div class="m-5">
      <h3>Calculate Here</h3>


<form method="get"  action="">
<p>First Value:<br/>
<input type="number" id="first" name="first"></p>
<p>Second Value:<br/>
<input type="number" id="first" name="second"></p>
<select name="sel">
<option  value="+">+</option>
<option  value="-">-</option>
<option  value="*">*</option>
<option  value="/">/</option>
</select>
<button type="submit" name="answer">Calculate</button>
</form>

</div>
<?php

//....... Lösung für Undefined index......

if(isset($_GET["first"])){$vr1=$_GET["first"];}else{$_GET["first"]= 0 ;};
if(isset($_GET["second"])){$vr2=$_GET["second"];}else{$_GET["second"]= 0 ;};
if(isset($_GET["sel"])){$vr2=$_GET["second"];}else{$_GET["sel"]= 0 ;};
if(isset($re)){$vr2=$_GET["second"];}else{$re= 0 ;};

///.......................

$vr1=$_GET["first"];
$vr2=$_GET["second"];
$re;




switch ($_GET["sel"]) {
    case "+": $re= $vr1+$vr2;
    break;
    case "-": $re= $vr1-$vr2;
    break;
    case "*": $re= $vr1*$vr2;
    break;
    case "/": $re= $vr1/$vr2;
    break;
}
echo "<span class='m-5'>Result ist:  </span>" , $re ; 
echo '<br>';echo '<br>';


 


echo '<a href="index.php"> Zurück zum Index </a>' ;echo '<br>';echo '<br>';

if(isset($_POST['bttn'])){
  //unset($_SESSION['USER']);
  //unset($_SESSION['PASSWORD']);
  session_unset();
  header("Location: index.php");

 
}
?>
<form action="" method="POST">
<input type="submit"  value="Log out" name= "bttn">
</form>
</body>
</html>