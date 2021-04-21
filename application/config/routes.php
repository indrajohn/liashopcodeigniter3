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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//routes auth
$route['login'] = 'admin/LoginController/login';
$route['checklogin'] = 'admin/LoginController/checklogin';
$route['register'] = 'admin/LoginController/register';
$route['forgot-password'] = 'admin/LoginController/forgotPassword';


//routes admin
$route['admin/dashboard'] = 'admin/AdminController/dashboard';
$route['admin/category'] = 'admin/CategoryController/categoryList';
$route['admin/category/add-category'] = 'admin/CategoryController/categoryAdd';
$route['admin/category/edit-category/:num'] = 'admin/CategoryController/categoryEdit/$1';
$route['admin/category/delete-category/:num'] = 'admin/CategoryController/categoryDelete/$1';

$route['admin/sub-category'] = 'admin/SubCategoryController/subCategoryList';
$route['admin/sub-category/add-sub-category'] = 'admin/SubCategoryController/subCategoryAdd';
$route['admin/sub-category/edit-sub-category/:num'] = 'admin/SubCategoryController/subCategoryEdit/$1';
$route['admin/sub-category/delete-sub-category/:num'] = 'admin/SubCategoryController/subCategoryDelete/$1';

$route['admin/product'] = 'admin/ProductController/productList';
$route['admin/product/add-product'] = 'admin/ProductController/productAdd';
$route['admin/product/get_sub_category'] = 'admin/ProductController/get_sub_category';
$route['admin/product/edit-product/:num'] = 'admin/ProductController/productEdit/$1';
$route['admin/product/delete-product/:num'] = 'admin/ProductController/productDelete/$1';
//routes home
$route['about-us'] = 'Home/aboutUs';
$route['product'] = 'Home/product';
$route['contact-us'] = 'Home/contactUs';
$route['cart'] = 'Home/shopCart';
$route['checkout'] = 'Home/checkout';
$route['favourite'] = 'Home/favourite';
$route['product-details'] = 'Home/productDetails';
