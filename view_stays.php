<?php 
$_page = 'stays';
$_css = 'style_stays.css';
require_once __DIR__.'/comp_header.php'

?>

<main>

<div>
<h2><?= $stays_dictionary[$lang.'_h2']?></h2>
<img src="/hard_content/stays_search.png" alt="">
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