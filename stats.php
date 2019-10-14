<?php
  include_once 'includes/header.php';
?>

<?php

    if(isset($_SESSION['loggedin-user'])){
        $loggeduser = $_SESSION['loggedin-user'];
        echo $loggeduser . " Check your History!";
    }
?>
<div class="container">
  <div class="stats">
  <br/>  
  <h1 id="titlestats"><strong>Stats</strong></h1>
  

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>


<div id="container" style="min-width: 310px; max-width: 100%; height: 400px; margin: 0 auto">
</div>
<div id="container1" style="min-width: 310px; max-width: 100%; height: 400px; margin: 0 auto">
</div>
<div id="container2" style="min-width: 310px; max-width: 100%; height: 400px; margin: 0 auto">
</div>
<script src="js/stats.js"></script>
  
  </div>


<?php
  include'includes/footer.php';
 ?>
