<?php
/*
Author: Jason Tang
Version: 3
*/
//starts session and links database credentials
session_start();
include "dbh.inc.php";

//selects specific tracked entry the user is trying to update.
$sql_t = "SELECT *
        FROM tracked 
        WHERE trackedID = $_POST[trackedid]";

$tracked_table = $conn->query($sql_t);
//puts the results of the query into an associatice array
$tracked = $tracked_table->fetch_assoc();

//---------------------BOUGHT--------------------------------------
if(isset($_POST['boughtbtn'])){
    
    if($_POST['bought'] != ""){
    //stores the user inputs into sql injection safe variables
    $trackedid = mysqli_real_escape_string($conn, $_POST['trackedid']);
    $bought = mysqli_real_escape_string($conn, $_POST['bought']);

    //sql code to update the totalbought.
    $sqli = "UPDATE tracked
            SET totalbought = totalbought + $bought
            WHERE trackedID=$trackedid";
    //query the database
    $res = mysqli_query($conn,$sqli);
    
    /*
    In the case that the user didn't waste any last time, there will be one more 'boughtentries' than 'wastedentries'.
    
    If that is the case, the program will increment 'wastedentries' and 'entries' to denote that there was 0 waste for the last cycle.
    
    Otherwise, the program will only increment 'boughtentries' and will leave incrementing the other two to when the user inputs a waste entry.
    */
    $bwcompare = $tracked['boughtentries'] - $tracked['wastedentries'];
    if($bwcompare > 0){
       
        //Because there was no waste entry to increment entries for the last cycle, this 'bought' input 
        //increments 'entries' to complete the last cycle. 
        $sqli = "UPDATE tracked
            SET entries = entries + 1
            WHERE trackedID = $trackedid";
        $res = mysqli_query($conn,$sqli);
        
        //updates consumption while assuming the 'wasted' for last cycle was 0
        //and disregarding the 'bought' addition for the start of the new cycle.
        $sqli = "UPDATE tracked
            SET consumption = (totalbought - totalwasted - $bought)/entries
            WHERE trackedID = $trackedid";
        $res = mysqli_query($conn,$sqli);

        //Increments 'boughtentries', starting this cycle.
        $sqli = "UPDATE tracked
            SET boughtentries = boughtentries + 1
            WHERE trackedID = $trackedid";
        $res = mysqli_query($conn,$sqli);
    } else {
        
        //The last cycle was ended. 
        //'boughtentries' is incremented and a new cycle begins.
        $sqli = "UPDATE tracked
            SET boughtentries = boughtentries + 1
            WHERE trackedID = $trackedid";
        $res = mysqli_query($conn,$sqli);
    }

    //returns to the tracker page
    header("location:../tracker.php");
} else{
        $Message = urlencode("There was no input!");
            header("location:../tracker.php?Message=".$Message);

    }
}

//---------------------------WASTED-------------------------------------
if(isset($_POST['wastedbtn'])){
    if($_POST['wasted'] != "") {
    //stores the user inputs into sql injection safe variables
    $trackedid = mysqli_real_escape_string($conn, $_POST['trackedid']);
    $wasted = mysqli_real_escape_string($conn, $_POST['wasted']);

    //sql code to update the totalwasted.
    $sqli = "UPDATE tracked
            SET totalwasted = totalwasted + $wasted
            WHERE trackedID = $trackedid";

    //query the database
    $res = mysqli_query($conn,$sqli);

    /*
    In the case that the user input waste multiple times in one cycle, $bwcompares will return 0 because the entries are even and the cycle is complete.
    
    If that is the case, the program will simply update consumption with new 'totalwasted' amount without incrementing any entries.
    
    Otherwise, the program will act normally by incrementing both 'wastedentries' and 'entries', completing the current cycle and update the consumption.
    */
    $bwcompare = $tracked['boughtentries'] - $tracked['wastedentries'];
    if($bwcompare == 0){

        //SQL code to update the consumption. Will stop at that because this is not the first waste
        //entry this cycle.
        $sqli = "UPDATE tracked
            SET consumption = (totalbought - totalwasted)/entries
            WHERE trackedID = $trackedid";
        $res = mysqli_query($conn,$sqli);

    } else {
        
        //increments 'entries', completing this cycle.
        $sqli = "UPDATE tracked
            SET entries = entries + 1
            WHERE trackedID = $trackedid";
        $res = mysqli_query($conn,$sqli);

        //
        $sqli = "UPDATE tracked
            SET consumption = (totalbought - totalwasted)/entries
            WHERE trackedID = $trackedid";
        $res = mysqli_query($conn,$sqli);

        $sqli = "UPDATE tracked
            SET wastedentries = wastedentries + 1
            WHERE trackedID = $trackedid";

        $res = mysqli_query($conn,$sqli);
    }

    //returns to the tracker page
    header("location:../tracker.php");
} else {
        $Message = urlencode("There is no input!");
            header("location:../tracker.php?Message=".$Message);
    }
}
?>