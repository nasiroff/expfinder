<?php namespace Config;

// Create a new instance of our RouteCollection class.
use App\Controllers\Admin\Service;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use CodeIgniter\Model;
use CodeIgniter\Router\RouteCollection;

$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if(file_exists(SYSTEMPATH . 'Config/Routes.php')){
  require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->group('admin',['filter' => 'auth'],function($routes){
  $routes->get('/',"Admin/Home::index");
  $routes->get('product/server-side',"Admin\Product::serverSide");
  $routes->get("categories/server-side","Admin\Category::serverSide");
  $routes->get("services/server-side","Admin\Service::serverSide");
  $routes->get("brands/server-side","Admin\Brands::serverSide");
  $routes->get("partnerships/server-side","Admin\Partnership::serverSide");
  $routes->add("partnership/upload-photo","Admin\Partnership::uploadPhoto");
  $routes->post("partnerships/delete-photo","Admin/Partnership::deletePhoto");
  $routes->resource("specifications",['controller' => 'Admin\Specifications']);
  $routes->resource("product",['controller' => 'Admin\Product']);
  $routes->resource("categories",['controller' => 'Admin\Category']);
  $routes->resource("services",['controller' => 'Admin\Service']);
  $routes->resource("partnerships",['controller' => 'Admin\Partnership']);
  $routes->resource("brands",['controller' => 'Admin\Brands']);
  $routes->resource("contact",['controller' => 'Admin\Contacts']);
  $routes->add("product/upload-photo","Admin\Product::uploadPhoto");
  $routes->add("service/upload-photo","Admin\Service::uploadPhoto");
  $routes->post("brands/upload-photo","Admin\Brands::uploadPhoto");
  $routes->post("brands/delete-photo","Admin\Brands::deletePhoto");
  $routes->post("product/delete-photo","Admin/Product::deletePhoto");
  $routes->post("services/delete-photo","Admin/Service::deletePhoto");
  $routes->get('logout','Admin\Home::logout');
});

$routes->group('admin',function($routes){
  $routes->match(['get','post'],'login','Admin\Home::login',['filter' => 'noauth']);
  $routes->match(['get','post'],'registration','Admin\Home::registration',['filter' => 'noauth']);
  $routes->get('password-recover','Admin\Home::passwordRecover',['filter' => 'noauth']);
  $routes->get('activate','Admin\Home::activate');
});


$routes->get('/','Home::index');

$routes->post('abune_ol',"Home::doSubscribe");
$routes->get('product-detail/(:num)',"Products::productDetail/$1");
$routes->get('product-suggestions',"Products::productSuggestions");
$routes->get('mehsul/(:num)',"Products::product/$1");
$routes->get('haqqimizda',"Home::aboutUs");
$routes->get('elaqe',"Home::contactUs");
$routes->group('kateqoriyalar',function(RouteCollection $routes){
  $routes->get("(:any)", "Categories::index");
  $routes->get("", "Categories::index");
});
$routes->get('test',"Test::test");






$routes->get('makeSlug',function(){
  $categoryModel = new CategoryModel();
  $categories = $categoryModel->where('slug',null)->findAll();
  $search = array('ə',"ö","ü","ğ","ş","ç","ı","(",")");
  $replace = array('e','o','u','g','s','c','i'," "," ");
  $again = false;
  foreach($categories as $category){
    $counter = "";
    $txt = mb_strtolower($category->name,'UTF-8');
    $txt = str_replace($search,$replace,$txt);
    $txt = url_title($txt);

    A:
    if($again){
      $counter++;
      $again = false;
    }
    $category->slug = $txt . (empty($counter) ? '' : "-" . $counter);
    try{
      $categoryModel->save($category);
    }catch(\mysqli_sql_exception $exception){
      if($exception->getCode() === 1062){
        if($counter !== 0){
          $again = true;
          goto A;
        }
        $counter = 0;
        $again = true;
        goto A;
      }
    }
  }

});

$routes->get('make-cat-url',function(){

  $categoryModel = new CategoryModel();
  $categories = $categoryModel->findAll();
  foreach($categories as $category){
    if($category->parent_category_id == 0){
      $category->slug_url = $category->slug;
    }else{
      $category->slug_url = asd($category->parent_category_id, "/".$category->slug);
    }
    $categoryModel->save($category);
  }

});

$routes->get('get-array',function(){
  $categoryModel = new CategoryModel();
  $categories = $categoryModel->findAll();
  echo "<pre>";
  echo "[";
  echo "<br>";
  foreach($categories as $category){
    echo '&nbsp&nbsp&nbsp&nbsp[' . '<br>';
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'id' => '".$category->id."',";
    echo "<br>";
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'name' => '".$category->name."',";
    echo "<br>";
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'parent_id' => '".$category->parent_category_id."'";
    echo "<br>";
    echo "&nbsp&nbsp&nbsp&nbsp],";
    echo "<br>";
  }
  echo "]";

});

function asd($parentId, $curSlug = ""){

  $cat = (new CategoryModel())->find($parentId);
  if(intval($cat->parent_category_id) !== 0){
    return asd($cat->parent_category_id)."/".$cat->slug.$curSlug ;
  }
  return $cat->slug.$curSlug;
}

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if(file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')){
  require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
