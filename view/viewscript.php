<?php
$mysqli = new mysqli("localhost", "root", "MCW", "mcw");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
/*
	Another check you can do is did they submit the form? In your veiwdb.html page I add name="submit" to your submit button.
	You can now check ISSET($_POST["submit"]). This will tell you if someone used the right form, or accidently got to this page
*/ 
if (!isset($_REQUEST['StudentID'])) {
header( "Location: http://localhost/mcw/ins/inspers.html" );
}

/*
	You shouldn't use $_REQUEST unless you are not sure if the information is in a cookie, in the get, or in the post. You know you are using post so you can use $_POST['Table'] etc... The effects would be minimal but it is just good practice but kudos for assigning the information from the array to seperate variables.
*/
$Table = $_REQUEST['Table'] ; 
$Attribute = $_REQUEST['Attribute'] ;
$SearchText = $_REQUEST['SearchText'] ;

/*
	The only prepared statements i have done have be with datbase objects, not mysqli driver, so I may be wrong. But in PHP when you use double quotes you can access variables within the quotes. So for example:
	$name = "rob"
	double = "my name is $name"
	single = 'my name is $name'
	echo doube is my name is rob
	echo sing is my name is $name 
	
	I am not sure but that might be what is causing your error
*/
if ($view = $mysqli->prepare("SELECT $Attribute FROM $Table WHERE $Attribute = %$SearchText%;")) {

$view->execute();
printf("%s\n", $mysqli->info);

$view->close();

	}
/*
	use tabs! how do you expect me to read this :P
*/
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