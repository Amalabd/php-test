<?php

include_once("sql.php");

$id=$_GET["pid"];

$del= " DELETE FROM library_mitarbeiter WHERE id=$id";
$query= mysqli_query($conn,$del);


if($query){
    
    header("Location: try-relation.php");
    
    echo "<h3>Deleted Successfuly!</h3>";
}















?>
