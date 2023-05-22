<?php
$languages_allowed = ['en', 'dk'];
$language = $_GET['lang'] ?? 'en';
if( ! in_array($language, $languages_allowed) ){
  $language = 'en';
}

$flag_dictionary=[
    'dk_flag'=>'&#127465&#127472',
    'en_flag'=>'🇬🇧',
];


$header_dictionary=[
'en_login'=> 'Login',
'dk_login'=> 'Log ind',
'en_flights'=> 'Flights',
'dk_flights'=> 'Fly',
'en_stays'=> 'Stays',
'dk_stays'=> 'Overnatninger',
'en_car_rental'=> 'Car Rental',
'dk_car_rental'=> 'Bil',
'en_campers'=> 'Campers',
'dk_campers'=> 'Telt og Autocamper',
'en_explore'=> 'Explore',
'dk_explore'=> 'Udforsk',
'en_restrictions'=> 'Travel Restrictions',
'dk_restrictions'=> 'Rejse restriktioner',

'en_trips'=> 'Trips',
'dk_trips'=> 'Ture',
'en_your_trips'=> 'Your Trips',
'dk_your_trips'=> 'Dine Ture',
'en_your_account'=> 'Your Account',
'dk_your_account'=> 'Din Konto',
'en_help_faq'=> 'Help/FAQ',
'dk_help_faq'=> 'Hjælp/Ofte stillede spørgsmål',
'en_sign_out'=> 'Sign out',
'dk_sign_out'=> 'Log ud',
];


$login_dictionary=[
  'en_p'=> 'Signup or login to add a picture, or login as admin and delete flights',
  'dk_p'=> 'Lav en bruger eller login for at tilføje et billede, eller login som admin og få muligheden for at slette fly',
];


$admin_dictionary=[
  'en_h3'=> 'You are now able to delete flights under the flight tab',
  'dk_h3'=> 'Det er nu muligt at slette fly, under "Fly"',
];


$app_dictionary=[
  'en_h1'=>'Welcome! Find a flexible flight for your next trip.',
  'dk_h1'=>'Velkommen! Find en fleksibel flybillet til din næste rejse.',
  'en_search'=>'Search',
  'dk_search'=>'Søg'
];

$trending_countries_dictionary=[
  'en_h2'=>'Trending countries',
  'dk_h2'=>'Populære lande',
  'en_p'=>'The most searched for countries on momondo',
  'dk_p'=>'De mest søgte lande på momondo'
];

$trending_cities_dictionary=[
  'en_h2'=>'Trending cities',
  'dk_h2'=>'Populære byer',
  'en_p'=>'The most searched for cities on momondo',
  'dk_p'=>'De mest søgte byer på momondo'
];

$travel_inspiration_dictionary= [
  'en_h2'=>'Travel Inpiration',
  'dk_h2'=>'Rejseinspiration',
  'en_button'=>'More inspiration',
  'dk_button'=>'Mere inspiration',
  'en_p' => 'Our latest travel tips, expert hacks and industry insights to help make your journey one to remember',
  'dk_p' => 'Vores nyeste rejseinspiration og eksperttips hjælper dig med at gøre din rejse uforglemmelig'
];

  $travel_article_dictionary= [
    'en_h4_1'=>'How the Least CO2 sorter works',
    'dk_h4_1'=>'Roadtripshacks der forbedre din rejse',
    'en_p_1'=>'Nov 12, 2020 - 4 mins',
    'dk_p_1'=>'sep. 19, 2022 - 8 min.',
    'en_h4_2'=>'The most underrated destinations across USA',
    'dk_h4_2'=>'Hvorfor er færger en miljøvenlig rejseform? Rejse miljøvenligt',
    'en_p_2'=>'Dec 10, 2021 - 10 mins',
    'dk_p_2'=>'sep. 16, 2022 - 4 min.',
    'en_h4_3'=>'An epic Florida road trip: not your usual suspects',
    'dk_h4_3'=>'Alt du behøver at vide om biltur med hunden',
    'en_p_3'=>'May 13, 2022 - 8 mins',
    'dk_p_3'=>'sep. 16, 2022 - 6 min.',
    'en_h4_4'=>'USA road trip: discover the canyon country of the American Southwest',
    'dk_h4_4'=>'Sådan tager du på strandferie med dit kæledyr',
    'en_p_4'=>'May 13, 2022 - 11 mins',
    'dk_p_4'=>'sep. 16, 2022 - 7 min.',
   
  ];

    $campers_dictionary= [
      'en_h2'=>'Find campervan hire deals.',
      'dk_h2'=>'Find de bedste tilbud på leje af Autocamper',
    ];

    $car_rental_dictionary= [
      'en_h2'=>'Find and compare the best car rental deals.',
      'dk_h2'=>'Find og sammenlign de bedste biludlejningstilbud',
    ];
    $stays_dictionary= [
      'en_h2'=>'Book a stay with free cancellation - search now.',
      'dk_h2'=>'Book et ophold med gratis mulighed for at aflyse - Søg nu',
    ];

?>