<?php
/* escape string to prevent sql injections */
$foodname = $mysqli->escape_string($_POST['foodname']);
$unit = $mysqli->escape_string($_POST['unit']);
/* Inserts data into the database*/
$result = $mysqli->query("SELECT * FROM food WHERE foodname='$foodname'") or die($mysqli->error());

//if the rows returned are more than 0, data exist
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = "Item already exists!";
    header("location: error.php");
}
else {
    $sql = "INSERT INTO food (foodname, unit) " 
            . "VALUES ('$foodname','$unit')";

    // Add data to the database
    if ( $mysqli->query($sql) ){
        $_SESSION['message'] = "Success";
        $message_body = 'Added!!!';
        header("location: success.php"); 
    }
    else {
        $_SESSION['message'] = 'Failed!';
        header("location: ../error/error.php");
    }

}