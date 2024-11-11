<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'welcome/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['create']='user/insert_data';
$route['get']='user/loginvalidation';
$route['userdata']='user/userdata';
$route['usereditdata/(:num)']='user/usereditdata/$1';
$route['update']='user/userupdatedata';
$route['userdeletedata/(:num)']='user/userdeletedata/$1';
$route['userregister']= 'user/insert_data';
$route['userpass/(:num)']='user/userpass/$1';
$route['profile']= 'user/profile';
$route['logout']= 'user/logout';
$route['blog']= 'user/blog';
$route['blogadd']= 'user/blogadd';
$route['add']= 'user/add';
$route['blogrecycle']= 'user/blogrecycle';
$route['blogrecycledata/(:num)']= 'user/blogrecycledata/$1';
$route['blogdelete/(:num)']= 'user/blogdelete/$1';
$route['blogeditdata/(:num)']= 'user/blogeditdata/$1';
$route['edit']= 'user/edit';
$route['profile']= 'user/profile';
$route['dashboard']= 'user/welcome';
$route['blogrestore/(:num)']= 'user/blogrestore/$1';
$route['adminpass']= 'user/adminpass';
$route['updateprofile']= 'user/updateprofile';
$route['updateadminprofile']='user/updateadminprofile';
$route['blogsite']= 'user/blogsite';
$route['blogviewabout']='user/blogviewabout';




