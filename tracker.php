<?php
include 'includes/header.php';
?>
<?php 
/* Main page with two forms: Add New and Tracked Items */
require 'includes/dbh.inc.php';
?>


<!-- becauase no header -->

<div class="container">
    <div class="row" >
        <h1><strong>Tracker</strong></h1>


        <form action="includes/newFoodToTracked.inc.php" method="POST">
            <div class="group">
                <i class="fa fa-user prefix"></i>

                <input list= "foodlist" name="searchedFood" required placeholder="Search food to track" id="searchedFood"/ required>
                <datalist id="foodlist"></datalist>
                <input type="text" required id="autoUnit" placeholder="Unit" readonly name="unit"/>
                <input type="submit" name="add" value="Track!">
                <input id="clearbtn" type="reset" value="clear">
                <span class="highlight"></span>
                <span class="bar"></span>
                <a href='#add-a-food'>Can't find the food you want to track?</a>
            </div>
        </form>


        <div class="group">
            <i class="fa fa-user prefix"></i>


            <div id="trackedList">
                <h1>Currently Tracking</h1>

                <?php
                include "includes/button_gen.php";
                ?>

            </div>

        </div>

        <form action="includes/addNewFood.inc.php" method="post" autocomplete="off">

            <div class="group" id="add-a-food">
                <h1><strong>Add a food to the Database!</strong></h1>
                <i class="fa fa-user prefix"></i>

                <input type="text" autocomplete="on" name="foodname" placeholder="Foodname" required/>
                <input type="text" name="unit"  placeholder="Unit" required/>
                <button type="submit"class="button button-block" name="add">Add</button>
                <span class="highlight"></span>
                <span class="bar"></span>
            </div>
        </form>


    </div>
</div>


<script src="js/ajax_foodData.js"></script>




<script src="js/tracker.js"></script>

<?php
include 'includes/footer.php';
?>