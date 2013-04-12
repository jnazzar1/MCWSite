<?php
$mysqli = new mysqli("localhost", "root", "MCW", "mcw");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if (!isset($_REQUEST['StudentID'])) {
header( "Location: http://localhost/mcw/ins/inspers.html" );
}

$Table = $_REQUEST['Table'] ;
$Attribute = $_REQUEST['Attribute'] ;
$SearchText = $_REQUEST['SearchText'] ;

if ($view = $mysqli->prepare("SELECT $Attribute FROM $Table WHERE $Attribute = %$SearchText%;")) {

$view->execute();
printf("%s\n", $mysqli->info);

$view->close();

	}
switch ($Table)
{
case "Member":
echo "<table border='1'>
<tr>
<th>Full Name</th>
<th>StudentID</th>
<th>Birth Date</th>
<th>Death Date</th>
<th>Rank</th>
<th>Class Year</th>
<th>ROTC</th>
<th>Cell Number</th>
<th>Room Number</th>


</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['FullName'] . "</td>";
  echo "<td>" . $row['StudentID'] . "</td>";
  echo "<td>" . $row['BirthDate'] . "</td>";
  echo "<td>" . $row['DeathDate'] . "</td>";
  echo "<td>" . $row['Rank'] . "</td>";
  echo "<td>" . $row['ClassYear'] . "</td>";
  echo "<td>" . $row['ROTC'] . "</td>";
  echo "<td>" . $row['CellNumber'] . "</td>";
  echo "<td>" . $row['RoomNumber'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
break;

case "Equipment":
echo "<table border='1'>
<tr>
<th>Purchse Date</th>
<th>State</th>
<th>Death Date</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['PurchaseDate'] . "</td>";
  echo "<td>" . $row['State'] . "</td>";
  echo "<td>" . $row['DeathDate'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
break;

case "Training":
echo "<table border='1'>
<tr>
<th>Date</th>
<th>Duration</th>
<th>Description</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Date'] . "</td>";
  echo "<td>" . $row['Duration'] . "</td>";
  echo "<td>" . $row['Description'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
break;
}

$mysqli->close();
?>