<!-- Baza Danych -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wedkowanie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// SQL
$sql =  "SELECT `id`, `nazwa` FROM ryby";
$sql2 = "SELECT `id` , `akwen`, `wojewodztwo` FROM lowisko" ;
$result1 = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
?>