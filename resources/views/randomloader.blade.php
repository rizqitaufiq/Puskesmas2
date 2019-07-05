<?php
    $bg = array('Preloader_1.gif', 'Preloader_2.gif', 'Preloader_3.gif', 'Preloader_4.gif', 
    'Preloader_5.gif', 'Preloader_6.gif', 'Preloader_7.gif', 'Preloader_8.gif',
    'Preloader_9.gif', 'Preloader_10.gif' ); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>
<style>
    /* Paste this css to your style sheet file or under head tag */
    /* This only works with JavaScript, 
    if it's not present, don't show loader */
    .no-js #loader { display: none;  }
    .js #loader { 
        display: block; 
        position: absolute; 
        }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 1001;
        background: url(../ela/images/loader-128x/<?php echo $selectedBg; ?>) center no-repeat #fff;
    }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
    //paste this code under head tag or in a seperate js file.
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
</script>