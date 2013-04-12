<?php
$mysqli = new mysqli("localhost", "root", "MCW", "mcw");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
if (!isset($_REQUEST['StudentID'])) {
header( "Location: http://localhost/mcw/ins/inspers.html" );
}

$StudentID = $_REQUEST['StudentID'] ;
$Name = $_REQUEST['Name'] ;
$BirthDate = $_REQUEST['BirthDate'] ;
$DeathDate = $_REQUEST['DeathDate'] ;
$Rank = $_REQUEST['Rank'] ;
$ClassYr = $_REQUEST['ClassYr'] ;
$ROTC = $_REQUEST['ROTC'] ;
$CellNum = $_REQUEST['CellNum'] ;
$RmNum = $_REQUEST['RmNum'] ;
//Specific Insert(meminfo)

if ($ins = $mysqli->prepare("INSERT INTO MemInfo(StudentID,Name,BirthDate,DeathDate,Rank,ClassYr,ROTC,CellNum,RmNum) VALUES ($StudentID,$Name,$BirthDate,$DeathDate,$Rank,$ClassYr,$ROTC,$CellNum,$RmNum);")) {

$ins->execute();
printf("%s\n", $mysqli->info);

$ins->close();

	}
$mysqli->close();
?>
<html>
IT SHOULD HAVE WORKED
</html>