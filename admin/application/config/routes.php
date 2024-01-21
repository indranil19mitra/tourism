<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'myadmin_controller';
$route['login'] = 'myadmin_controller/login';
$route['state'] = 'myadmin_controller/state';
$route['place'] = 'myadmin_controller/place';
$route['tour_category'] = 'myadmin_controller/tour_category';
$route['tours'] = 'myadmin_controller/tours';
$route['destination'] = 'myadmin_controller/tour_destination';
$route['tour-about'] = 'myadmin_controller/tour_about';
$route['tour-itinerary'] = 'myadmin_controller/tour_itinerary';
$route['tour-inclu-exclus'] = 'myadmin_controller/tour_inclusions_exclusions';
$route['tour-other-info'] = 'myadmin_controller/tour_other_info';
$route['tour-photos'] = 'myadmin_controller/tour_photos';
$route['tour-booking-details'] = 'myadmin_controller/tour_booking_details';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
