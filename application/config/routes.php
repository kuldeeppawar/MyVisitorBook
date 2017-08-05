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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'home';//home
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//$route['product'] = 'product/index';
////---------------------------Search Product By keyword only-----------------------------------------------------
//$route['product/browse/keyword/(:any)']='product/index/0/$1'; 
//
//$route['product/browse/subcat/(:any)']='product/index/$1';
//
//$route['product/browse/cat/(:any)']='product/index/0/0/$1';
//
//$route['product/details/(:any)/(:any)']='product/productDetails/$1/$2';
//
//$route['product/details/(:any)']='product/productDetails/$1/0';

//--------------------------------------------------------------------------------------------------------------
//require_once( BASEPATH .'database/DB'. EXT );
//$db =& DB();
////---------------------------only subcategory---------------------------------------
//$result_subcat=$db->query("select * from category where parent_id<>'0' and is_active='1'");
//$row_subcat=$result_subcat->result();
//for($j=0;$j<count($row_subcat);$j++)
//{
//    //echo $row_subcat[$j]->id." ".$row_subcat[$j]->name."<br>";
//    $subcategory_name=  str_replace("'","",preg_replace("/^'|[^A-Za-z0-9\'-]|'$/",'', $row_subcat[$j]->name));
//    $route['product/browse/subcat/'.$subcategory_name."-".$row_subcat[$j]->id]='product/index/'.$row_subcat[$j]->id;
//}
////-----------------------------Subcategory And Keywords combination-------------------------------------
//$result_cat=$db->query("select * from category where parent_id<>'0' and is_active='1'");
//$row_cat=$result_cat->result();
//for($j=0;$j<count($row_cat);$j++)
//{
//    $category_name=  str_replace("'","",preg_replace("/^'|[^A-Za-z0-9\'-]|'$/",'', $row_cat[$j]->name));
//    $route['product/browse/subcat/'.$category_name."-".$row_subcat[$j]->id.'/keyword/(:any)']='product/index/'.$row_cat[$j]->id."/$1";
//}
////----------------------Products----------------------------------------------------------------------
//$result_product=$db->query("select * from product_details where is_active='1'");
//$row_product=$result_product->result();
//for($i=0;$i<count($row_product);$i++)
//{
//    $product_name=  str_replace("'","",preg_replace("/^'|[^A-Za-z0-9\'-]|'$/",'', $row_product[$i]->english_name));
//    $route['product/'.$product_name."-".$row_product[$i]->id]='product/productDetails/'.$row_product[$i]->id;
//}