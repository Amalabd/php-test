<meta charset="utf-8" />

<?php
//== I had a connection error so i used this line======
$db_port = '3307';
//====================================================
$host= 'localhost';
$username='root';
$password= '';
$DB_name= 'todo';

// ==== Create Connection========
$conn= mysqli_connect($host, $username, $password, $DB_name, $db_port);
       //mysqli_set_charset($conn, "utf8");
  
       mysqli_select_db($conn, "todo") or die ("no database");       
// ======= Check Connection============
       if(!$conn){
echo mysqli_connect_error("Connection error") . mysqli_connect_error();

}//else {echo "Successful connection";}
       
        

       



function close_db(){
    global $conn;
    mysql_close($conn);
}



if (empty($_SESSION['tan']))
{
  $_SESSION['tan']=0;
}

?>