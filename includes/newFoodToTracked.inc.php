<?php

session_start();
include 'pdo_connect.php';



if(!isset($_SESSION['userid'])){

    $Message = urlencode('no session user available, please log in');
    header("location:../index.php?Message=".$Message);



}else {

    //labeling constants to prevent php complaints
    $ID ="foodID";


    $foodname = $_POST['searchedFood'];
    $unit = $_POST['unit'];
    $userID = $_SESSION['userid'];


    //extra mysql statement to find and store variables. mainly the food ID and units based off the food name. ------------ (find better way to get)
    $query = "select foodID, unit from food where foodname = '$foodname' and unit = '$unit'";
    $params = array();
    $foodData =  dataQuery($query, $params);


    if(sizeof($foodData)>0){

        $food_id = $foodData[0][$ID];

        $timestamp = 123;
        //$timestamp = date("Y-m-d h:i:sa", time());
        //**need timestamp formatting


        //checking for duplicates

        $query = "select foodID from tracked where userID = '$userID' AND foodID = '$food_id'";
        $params = array();
        $results = dataQuery($query, $params);

        if(sizeof($results)>0){

            //  echo "already being tracked";

            $Message = urlencode("$foodname is already being tracked!");
            header("location:../tracker.php?Message=".$Message);

        } else {
            $query = 'INSERT INTO tracked (foodID, userID, totalBought, totalwasted, consumption, boughtentries, wastedentries, entries, time1, time2)
                                        VALUES (?, ?,?, ?, ? ,? ,? ,? ,?, ? )';

            $params = array($food_id, $userID, 0, 0, 0, 0, 0, 0 , $timestamp, 0 );

            $results = dataQuery($query, $params);


            $Message = urlencode('Success! starting to track');
            header("location:../tracker.php?Message=".$Message);

        }


    }else{

        //echo "item exist";

        $Message = urlencode('Failed! item does not exist in the database, please add it first');
        header("location:../tracker.php?Message=".$Message);
    }

}

