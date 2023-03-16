<?php

include_once("sql.php");

$id = $_GET["id"];
list($nam, $mail)= explode("-" , urldecode($id));

// prepare the SQL statement with a placeholder for the parameter
$del = "DELETE FROM library_mitarbeiter WHERE Nam= ? AND Email = ?";
$stmt = mysqli_prepare($conn, $del);

// bind the parameter to the statement
mysqli_stmt_bind_param($stmt, "ss", $nam, $mail);

// execute the statement
$query = mysqli_stmt_execute($stmt);

if ($query) {
    header("Location: try-relation.php");
    echo "<h3>Deleted Successfully!</h3>";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>