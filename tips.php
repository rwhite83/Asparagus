<?php
  include_once 'includes/header.php';
?>


		    
        <div class="tips">
                <div class="container"  id="tipcontainer">
                    <h1 class="titleTip"><strong>Tips</strong></h1>
                    <div class="mySlides">
                        <img id="tipimg" src="images/1.jpg" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img id="tipimg" src="images/2.jpg" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img id="tipimg" src="images/3.jpg" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img id="tipimg" src="images/4.jpg" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img id="tipimg" src="images/5.jpg" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img id="tipimg" src="images/6.jpg" style="width:100%">
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                    <div class="caption-container">
                      <p id="caption"></p>
                    </div>
                    
                    <div class="rowimg">
                      <div class="column">
                        <img class="demo cursor" src="images/1.jpg" style="width:100%" onclick="currentSlide(1)" alt="Save and eat leftovers">
                      </div>
                      <div class="column">
                        <img class="demo cursor" src="images/2.jpg" style="width:100%" onclick="currentSlide(2)" alt="Store food in the right places">
                      </div>
                      <div class="column">
                        <img class="demo cursor" src="images/3.jpg" style="width:100%" onclick="currentSlide(3)" alt="Do not over serve food">
                      </div>
                      <div class="column">
                        <img class="demo cursor" src="images/4.jpg" style="width:100%" onclick="currentSlide(4)" alt="Try canning if you can">
                      </div>
                      <div class="column">
                        <img class="demo cursor" src="images/5.jpg" style="width:100%" onclick="currentSlide(5)" alt="Do not be too scared of best before date(smell and sight is more reliable)">
                      </div>    
                      <div class="column">
                        <img class="demo cursor" src="images/6.jpg" style="width:100%" onclick="currentSlide(6)" alt="Stop shopping too much in the first place!">
                      </div>
                      
                    </div>
                    
</div>
<!-- <h1>Save and eat leftovers</h1><p></p>
          -->

    



<script src="js/tips.js"></script>



<?php
  include_once 'includes/footer.php';
 ?>
