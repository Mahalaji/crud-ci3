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
$route['newsdata']= 'user/news';
$route['newsadd']= 'user/newsadd';
$route['addnews']= 'user/addnews';
$route['newseditdata/(:num)']= 'user/newseditdata/$1';
$route['newsedit']= 'user/newsedit';
$route['newsrecycledata/(:num)']= 'user/newsrecycledata/$1';
$route['recyclenews']= 'user/recyclenews';
$route['newsdelete/(:num)']='user/newsdelete/$1';
$route['newsrestore/(:num)']= 'user/newsrestore/$1';
$route['pages']='user/pages';
$route['pagesadd']='user/pagesadd';
$route['addpages']='user/addpages';
$route['recyclepages']= 'user/recyclepages';
$route['pagesrecycledata/(:num)']= 'user/pagesrecycledata/$1';
$route['pageseditdata/(:num)'] ='user/pageseditdata/$1';
$route['pagesedit'] ='user/pagesedit';
$route['pagesdelete/(:num)'] = 'user/pagesdelete/$1';
$route['pagesrestore/(:num)'] = 'user/pagesrestore/$1';
$route['category'] = 'user/category';
$route['blogcategoryeditdata/(:num)'] = 'user/blogcategoryeditdata/$1';
$route['blogcategoryedit'] = 'user/blogcategoryedit';
$route['blogcategorydelete/(:num)'] = 'user/blogcategorydelete/$1';
$route['blogcategoryadd']='user/blogcategoryadd';
$route['categoryadd']='user/categoryadd';
$route['newscategory']='user/newscategory';
$route['newscategoryadd']='user/newscategoryadd';
$route['newscategoryadddata']='user/newscategoryadddata';
$route['newscategorydelete/(:num)']= 'user/newscategorydelete/$1';
$route['newscategoryeditdata/(:num)']='user/newscategoryeditdata/$1';
$route['newscategoryedit'] = 'user/newscategoryedit';
$route['blogsite']= 'user/blogsite';
$route['blogsdata'] = 'user/blogsshow';
$route['newsshow']='user/newsshow';
$route['blogs/(:any)/(:any)/(:num)'] = 'user/particularshow/$1/$2/$3';
$route['news/(:any)/(:any)/(:num)'] = 'user/particularnews/$1/$2/$3';
$route['generate_slug_ajax'] = 'news/generate_slug_ajax';
$route['blogss/(:any)']= 'user/categoryblog/$1';
$route['newss/(:any)'] = 'user/newss/$1';





