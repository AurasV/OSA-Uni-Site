<?php
$servername = "localhost";
$username = "root";
$password = "osasite";
$dbname = "AMD CPUs";
$usage = $_GET['usage'];
$chipset = $_GET['chipset'];
$conn = new mysqli($servername, $username, $password, $dbname);

//id name cores tdp smt igpu price socket series300 series400 series500 series600 seriesx39 seriest40 benchmark p2p
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
echo "<body background='wallpaper.jpg'>";
echo "<center><table bgcolor='white' border = 1> 
<thead>
<tr>
<th>Name</th>
<th>Numbers of Cores</th>
<th><a href= https://www.ibm.com/docs/en/sdse/6.4.0?topic=planning-simultaneous-multithreading target='_blank'>SMT (Multithreading)</a></th>
<th><a href= https://www.howtogeek.com/781784/what-is-integrated-graphics/ target='_blank'>iGPU</a></th>
<th>Price - eMag (RON)</th>
<th><a href= https://en.wikipedia.org/wiki/Thermal_design_power target='_blank'>TDP (W)</a></th>
<th>Cinebench Score</th>
<th>Price to Performance</th>
</tr>
</thead>";
echo "<tbody>";
if ($usage == "gaming")
  $result = mysqli_query($conn,"SELECT * FROM Cpus WHERE $chipset = 'Yes' ORDER BY p2p DESC ");
if ($usage == "workstation")
  $result = mysqli_query($conn,"SELECT * FROM Cpus WHERE $chipset = 'Yes' ORDER BY benchmark DESC");
if ($usage == "desktop")
  $result = mysqli_query($conn,"SELECT * FROM Cpus WHERE $chipset = 'Yes' ORDER BY price ASC");

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . "<a href='https://www.google.com/search?q={$row['name']} emag' target='_blank'>" . $row['name'] . "</a>" . "</td>";
echo "<td>" . $row['cores'] . "</td>";
echo "<td>" . $row['smt'] . "</td>";
echo "<td>" . $row['igpu'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "<td>" . $row['tdp'] . "</td>";
echo "<td>" . $row['benchmark'] . "</td>";
echo "<td>" . $row['p2p'] . "</td>";
echo "</tr>";
}
echo "</tbody>";
echo "</table></center>";
echo "</body>";
echo "<center><br> <br> *Click on the blue text for a more detailed explanation of what the term means <br> or a quick google link to buy the CPU</center>";
mysqli_close($conn);

?> 
