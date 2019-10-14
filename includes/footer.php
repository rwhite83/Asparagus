<style>

    .footer-text{
        color: white;
        font-size: 125%;
        font-family: "georgia";
        line-height: 150%;
        text-shadow:
        -1px -1px 2px #000,
        1px -1px 2px #000,
        -1px 1px 2px #000,
        1px 1px 2px #000;
    }
    
</style>

<?php

if($_SESSION) {
    echo "<div class='fb-share-button' data-href='https://asparagus.fun' data-layout='button_count' 
        data-size='large' data-mobile-iframe='true'><a target='_blank' 
        href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fasparagus.fun%2F&amp;src=sdkpreparse' 
        class='fb-xfbml-parse-ignore'>Share</a></div>";
    echo "<span class='footer-text'>You are logged in as '".$_SESSION['username']." (<a href='includes/logout.inc.php'>logout</a>)</span>";
}
else {
    echo "<div class='fb-share-button' data-href='https://asparagus.fun' data-layout='button_count' 
        data-size='large' data-mobile-iframe='true'><a target='_blank' 
        href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fasparagus.fun%2F&amp;src=sdkpreparse' 
        class='fb-xfbml-parse-ignore'>Share</a></div>";
	echo "<span class='footer-text'>Welcome to Asparagus</span>";
}

?>

</body>
</html>
