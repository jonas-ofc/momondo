<?php 
$_page = 'campers';
$_css = 'style_campers.css';
require_once __DIR__.'/comp_header.php'

?>

<main>


<div>
<h2><?= $campers_dictionary[$lang.'_h2']?></h2>
<img src="/hard_content/campers_search.png" alt="">
</div>

<?php
require_once __DIR__.'/comp_travel_insp.php';
require_once __DIR__.'/comp_trending_cities.php';
require_once __DIR__.'/comp_trending_contries.php';
?>
</main>

<?php 

require_once __DIR__.'/comp_footer.php'

?>