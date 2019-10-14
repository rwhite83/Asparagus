<?php
session_start();
//This is just for database connection
include 'dbh.inc.php';

try {
    $conn = new PDO("mysql:host=$dbserverName;dbname=$dbname", $dbuserName, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackedID = $_POST['trackedid'];
    // sql to delete a record
    $sql = "DELETE FROM tracked WHERE trackedID = $trackedID";

    // use exec() because no results are returned
    $conn->exec($sql);
    $Message = urlencode('Record deleted successfully');
    header("location:../tracker.php?Message=".$Message);

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>