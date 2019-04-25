<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>Shopping</title>
<link rel="stylesheet" type="text/css" href="styleforshop.css">
<link href="themes/4/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="themes/4/js-image-slider.js" type="text/javascript"></script>
</head>

<body>
<!-----logo and nav over----->
<?php
include("topnav.php");
?>
<!-----logo and nav over----->

<!-----Middle div starts----->
<div class="middle">
	<div class="mid1">

    <img src="img/background_5.jpg" style="width:1024px; height:170px;">
    
	</div>
	
    <div class="mid2">
	
     <div id="sliderFrame">
     <br>
<br>
        <div id="slider">
            <img src="images/slider-1.jpg" />
            <img src="images/slider-2.jpg" />
            <img src="images/slider-3.jpg" />
            <img src="images/slider-4.jpg" />
        </div>
        <!--Custom navigation buttons on both sides-->
        <div class="group1-Wrapper">
            <a onclick="imageSlider.previous()" class="group1-Prev"></a>
            <a onclick="imageSlider.next()" class="group1-Next"></a>
        </div>
        <!--nav bar-->
        <div style="text-align:center;padding:20px;z-index:20;">
            <a onclick="imageSlider.previous()" class="group2-Prev"></a>
            <a id='auto' onclick="switchAutoAdvance()"></a>
            <a onclick="imageSlider.next()" class="group2-Next"></a>
        </div>
    </div>
    
        
    </div>
	
</div>
<div class="bottomfirst">
<img src="img/Banner_en.jpg" style="width:1024px; height:170px;">
</div>

<!-----Middle div ends----->
<?php
include("footer.php");
?>
<!----------------------------->
<div class="name">
<font style="font-size:16px; color:#FCFCFC;"><center>Developed by © Akash Sharma.</center></font>
</div>
 <script type="text/javascript">
        //The following script is for the group 2 navigation buttons.
        function switchAutoAdvance() {
            imageSlider.switchAuto();
            switchPlayPauseClass();
        }
        function switchPlayPauseClass() {
            var auto = document.getElementById('auto');
            var isAutoPlay = imageSlider.getAuto();
            auto.className = isAutoPlay ? "group2-Pause" : "group2-Play";
            auto.title = isAutoPlay ? "Pause" : "Play";
        }
        switchPlayPauseClass();
    </script>
</body>
</html>