<?php


use App\Models\CategoryModel;

define("ADMIN_VIEW_PAGE","admin/pages/");
define("ADMIN_VIEW_LAYOUT","admin/layout/");
define("ADMIN_VIEW_PART","admin/parts/");
define("ADMIN_VIEW_FRAGMENT","admin/fragments/");


if(!function_exists('adminUrl')){

  function adminUrl($url = ""){
    return base_url("admin" . (!is_null($url) && !empty($url) ? "/" . $url : ""));
  }
}

if(!function_exists('moveImage')){
  function moveImage($request,$class){
    $file = $request->getFile('image');
    $imgName = $file->getRandomName();


    if(is_object($class)){
      $class = explode('\\',get_class($class));
      $class = strtolower(end($class));
    }

    $path = "uploads/images/{$class}/";

    if($file->move($path,$imgName)){
      return $path . $imgName;
    }

    return false;
  }
}

if(!function_exists('makeSlug')){
  function makeSlug(string $txt){
    $search = array('ə',"ö","ü","ğ","ş","ç","ı","(",")");
    $replace = array('e','o','u','g','s','c','i'," "," ");
    $txt = mb_strtolower($txt,'UTF-8');
    $txt = str_replace($search,$replace,$txt);
    return url_title($txt);

  }
}


