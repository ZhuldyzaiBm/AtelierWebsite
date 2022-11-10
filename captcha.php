<?php
    session_start();
    // Generating random number
    $rand = mt_rand(1000, 9999);
    // Saving the $rand value to session
    $_SESSION["rand"] = $rand;
    //creating blach-white image
    $im = imageCreateTrueColor(90,50);
    // Setting the text color white
    $c = imageColorAllocate($im, 255, 255, 255);
    // Writing the resulting random number to the image
    imageTtfText($im, 20, -10, 10, 30, $c, __DIR__."/fonts/verdana.ttf", $rand);
    header("Content-type: image/png");
    // Displaying image
    imagePng($im);
    //Freeing up resources
    imageDestroy($im);
?>