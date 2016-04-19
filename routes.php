<?php

$router->map('GET', '/', 'Acme\Controllers\PageController@getShowHomePage', 'home');

$router->map('GET', '/register', 'Acme\Controllers\RegisterController@getShowRegisterPage', 'register');

$router->map('POST', '/register', 'Acme\Controllers\RegisterController@postShowRegisterPage', 'register_post');

$router->map('GET', '/login', 'Acme\Controllers\RegisterController@getShowLoginPage', 'login');

//$router->map('GET', '/page-not-found', 'Acme\controllers\PageController@getShow404', '404');

// Educational purpose
$router->map('GET', '/yellow', 'Acme\Controllers\PageController@getShowLoginPage', 'yellow');

$router->map('GET', '/testdb', 'Acme\Controllers\RegisterController@getTestDB', 'testdb');

$router->map('GET', '/test', function(){
  $user = Acme\models\User::find(1);
  $testimonials = $user->testimonials()->get();

  echo $user->first_name;
  echo "<br>";
  print_r($testimonials);
});

$router->map('GET', '/slug', function(){
  $slug = new Cocur\Slugify\Slugify();
  echo $slug->slugify('About Acme');
});

$router->map('GET', '/[*]', 'Acme\Controllers\PageController@getShowPage', 'generic_page');
