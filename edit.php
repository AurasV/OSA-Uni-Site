<?php
$servername = "localhost";
$username = "root";
$password = "osasite";
$dbname = "AMD CPUs";
$conn = new mysqli($servername, $username, $password, $dbname);
$password = $_GET['password'];
$root_pass = "adddb";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo
"
<head>
    <title>
      CPU Picker V1.0
    </title>
    <link rel='icon' type='image/x-icon' href='AMD.ico'>
  </head>
";
//INSERT INTO `AMD CPUs`.Cpus (name,cores,tdp,smt,igpu,price,socket,series300,series400,series500,series600,seriesx39,seriest40,benchmark,p2p) VALUES
//('AMD Ryzen 3 1200',4,65,'No','No',295.0,'AM4','Yes','Yes','No','No','No','No',6317,21.41)
if($password == $root_pass)
{
echo "<h1>Insert new data</h1>";
echo 
"
<form action='add.php' method='get'>
Name: <input type='text' name='name'><br>
Cores: <input type='number' name='cores'><br>
TDP: <input type='number' name='tdp'><br>
SMT: <input type='text' name='smt'><br>
iGPU: <input type='text' name='igpu'><br>
Price: <input type='number' name='price'><br>
Socket: <input type='text' name='scoket'><br>
Series 300 compatibility: <input type='text' name='series300'><br>
Series 400 compatibility: <input type='text' name='series400'><br>
Series 500 compatibility: <input type='text' name='series500'><br>
Series 600 compatibility: <input type='text' name='series600'><br>
Series x399 compatibility: <input type='text' name='seriesx39'><br>
Series TRX40 compatibility: <input type='text' name='seriest40'><br>
Benchmark score: <input type='number' name='benchmark'><br>
<input type='submit'>
</form>


";}
else {
    echo "Wrong password";
    echo "<br> Click <a href = 'http://localhost/'> here </a> to go back to main page";
}
mysqli_close($conn);
?> 