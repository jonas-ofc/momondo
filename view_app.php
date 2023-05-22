<?php 

$_page = 'flights';
$_css = 'style_app.css';

require_once __DIR__.'/comp_header.php';
 
$rights = 'guest';

if(isset($_SESSION['user_name'])){
    $rights = $_SESSION['rights'];
};

?>

<main>
<h1><?= $app_dictionary[$language.'_h1'] ?></h1>

<div id="flights_wrapper">
<div id="flight-search">
        
    <form onsubmit="getFlights(); return false">

    <div id="city-search" >

        <div id="from-container"  >
                <input name="from_airport" id="from_city" name="from_city" type="text" placeholder="From?" 
                maxlength="30"
                 oninput="showFromResults()">

                <div id="from-results" onclick="hideFromResults()" >
               
                </div>
        </div>

        <div id="shift-button">
            <button id="shift-cities" type="button" value="" onclick="shiftCities()">
            <img src="icon_shift.png" alt="shift cities"></button>
        </div>

        <div id="to-container"  >
                <input name="to_airport" id="to-input" type="text"  placeholder="To?" 
                maxlength="30"
                 oninput="showToResults()">

                <div id="to-results" onclick="hideToResults()">
               
                </div>
        </div>
        
        </div>
        <div id="date-container">
            <div id="date-from">
        <input class="date-input" type="text" placeholder="Ons. 31.8" maxlength="30">
        <div class="change-date">
            <button class="arrow-left" type="button"><img src="icon_left-arrow.png" alt=""></button>
            <button class="arrow-right" type="button"><img src="icon_left-arrow.png" alt=""></button>
         </div>
         </div>
         <div id="date-to">
        <input class="date-input" type="text" placeholder="Tors. 6.8" maxlength="30">
        <div class="change-date">
            <button class="arrow-left" type="button"><img src="icon_left-arrow.png" alt=""></button>
            <button class="arrow-right" type="button"><img src="icon_left-arrow.png" alt=""></button>
         </div>
         </div>
        </div>




        </div>
        <button id="flight-search-button">

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
viewBox="0 0 500 500">
<g id="UrTavla">
<circle cx="250" cy="250" r="245">
</circle>
<text style="color:rgb(255, 255, 255);" x="50%" y="50%" text-anchor="middle"  dy=".3em" ><?= $app_dictionary[$lang.'_search'] ?></text>
</g>
</svg>

</button>
    
  
    </form>
    </div>
</div>

    


</div>


<div id="searchedFlights" data-rights=<?=$rights?>>
   
   
</div>

<?php 

require_once __DIR__.'/comp_travel_insp.php';
require_once __DIR__.'/comp_trending_cities.php';
require_once __DIR__.'/comp_trending_contries.php';
?>



</main>
<script src="_app.js"></script>

<?php 

require_once __DIR__.'/comp_footer.php'

?>