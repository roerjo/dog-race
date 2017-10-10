<?php

$router->get('', 'RaceController@index');
$router->post('scores', 'RaceController@add');
$router->post('scores/reset', 'RaceController@delete');

$router->post('team/new', 'TeamController@add');

$router->post('dog/new', 'DogController@add');
