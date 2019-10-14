<?php
session_start();
$sql = "SELECT * 
				FROM tracked a
				JOIN food b ON a.foodID = b.foodID
				WHERE userid = $_SESSION[userid]";
$result = $conn->query($sql);
?>

<div class="buttongen">
 
    <?php
    while($row = $result->fetch_assoc()){ 
        echo "<div class='update'>
            <form action='includes/update.inc.php' method='POST'>
                <input type='hidden' value='$row[trackedID]' name='trackedid'/>
                <span class='text'>$row[foodname]</span><br/>
                <input type='number' class='input' name='bought'/><br/>
                <input type='submit' name='boughtbtn' value='bought'/><br/>
            </form>
            <form action='includes/update.inc.php' method='POST'>
                <input type='hidden' value='$row[trackedID]' name='trackedid'/>
                <input type='number' class='input' name='wasted' /><br/>
                <input type='submit' name='wastedbtn' value='wasted'/><br/>
                <span class='text'>$row[consumption] $row[unit]</span>
            </form>
            <form action='includes/stop_tracking.inc.php' method='POST'>
                <input type='hidden' value='$row[trackedID]' name='trackedid'/>
                <input type='submit' name='stop_tracking' value='Stop Tracking' class='stopbtn'/>
            </form>
        </div>
        <br/>
        <span class='tracked-divide'>-----------------------------------</span>
        ";
    }  
    ?>
    
</div>
