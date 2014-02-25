<?php

/**
 * Application routes
 * 
 * This is where you define all the routes for StonePHP
 * to tell the framework how to reponse to an given url
 */

use Stone\Routing\Route;

Route::get('/', 'BlogController.index');

Route::get('/view/&slug/?id', 'BlogController.view', array(
	'slug'	=> '[a-zA-Z0-9\-]+',
	'id'	=> '[0-9]+'
));