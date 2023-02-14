<?php
$servername = "localhost";
$username = "root";
$password = "osasite";
$dbname = "AMD CPUs";
$conn = new mysqli($servername, $username, $password, $dbname);
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
$name = $_GET['name'];
$cores = $_GET['cores'];
$tdp = $_GET['tdp'];
$smt = $_GET['smt'];
$igpu = $_GET['igpu'];
$price = $_GET['price'];
$socket = $_GET['scoket'];
$series300 = $_GET['series300'];
$series400 = $_GET['series400'];
$series500 = $_GET['series500'];
$series600 = $_GET['series600'];
$seriesx39 = $_GET['seriesx39'];
$seriest40 = $_GET['seriest40'];
$benchmark = $_GET['benchmark'];
$p2p = $price / $benchmark;
$p2p = round($p2p, 3);
//name,cores,tdp,smt,igpu,price,socket,series300,series400,series500,series600,seriesx39,seriest40,benchmark,p2p
//INSERT INTO `AMD CPUs`.Cpus (name,cores,tdp,smt,igpu,price,socket,series300,series400,series500,series600,seriesx39,seriest40,benchmark,p2p) VALUES
//('AMD Ryzen 3 1200',4,65,'No','No',295.0,'AM4','Yes','Yes','No','No','No','No',6317,21.41),
$sql = "INSERT INTO `AMD CPUs`.Cpus (name,cores,tdp,smt,igpu,price,socket,series300,series400,series500,series600,seriesx39,seriest40,benchmark,p2p) VALUES
('$name',$cores,$tdp,'$smt','$igpu',$price,'$socket','$series300','$series400','$series500','$series600','$seriesx39','$seriest40',$benchmark,$p2p)
";
if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully. <br> Click <a href = 'http://localhost/'> here </a> to go back to the main page";
} else{
    echo "ERROR: Something went wrong <br> Click <a href = 'http://localhost/'> here </a> to go back to the main page ";
}

mysqli_close($conn);
?>  