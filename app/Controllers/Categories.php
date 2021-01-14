<?php


namespace App\Controllers;


use App\Controllers\Admin\Service;
use App\Entities\Category;
use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use CodeIgniter\HTTP\Request;

class Categories extends FrontController{

  public function index(){
    $segments = $this->request->uri->getSegments();
    $segment = null;
    $category = null;
    if(count($segments) > 1){
      $segment = end($segments);
      $category = (new CategoryModel())->where('slug',$segment)->first();
    }
    $service = service('uri');

    $request = $this->request;
    $limit = !is_null($request->getGet('limit')) && !empty($request->getGet('limit')) ? $request->getGet('limit') : 30;
    $sort = !is_null($request->getGet('sort-price')) && !empty($request->getGet('sort-price')) ? $request->getGet('sort-price') : 'ASC';

    $productModel = new ProductModel();
    $products = null;
    if($category != null && $category->level == 2){
      $productModel->where('category_id',$category->id);
    }elseif($category != null && intval($category->level) <= 2){
      $arr = [];
      $this->findSubCats($category,$arr);
      $productModel->whereIn('category_id',$arr);
    }

    if(!is_null($request->getGet('brands')) && count($request->getGet('brands'))){
      $productModel->whereIn('brand_id',$this->request->getGet('brands'));
    }

    if(!is_null($minPrice = $request->getGet('min-price')) && !empty($minPrice) && !is_null($maxPrice =$request->getGet('max-price')) && !empty($maxPrice)){
      $productModel->where('price >', $minPrice)->where('price <', $maxPrice);
    }

    $products = $productModel->orderBy('price', $sort)->paginate($limit);

    $pager = $productModel->pager;

    $brands = (new BrandModel())->select(['id','name'])->findAll();
    $groupedCategoryCounts = (new ProductModel())->select([
      'count(products.id) as count_cat',
      'category_id',
      'categories.name',
      'categories.parent_category_id'
    ])->join('categories', 'categories.id = products.category_id')->groupBy('category_id')->findAll();

    $latestProducts = (new ProductModel())->orderBy('created_at', 'DESC')->findAll(5);

    $minAndMaxPrices = (new ProductModel())->select([
      'min(price) as min_price',
      'max(price) as max_price'
    ])->get()->getRowArray();


    return view('front/products',array_merge($this->data,['products' => $products,
      'pager' => $pager,
      'currentCategory' => $category,
      'groupedCategoryCounts' => $groupedCategoryCounts,
      'brands' => $brands,
      'minAndMaxPrice' => $minAndMaxPrices,
      'latestProducts' => $latestProducts
    ]));
  }


  public function findSubCats(Category $category,&$arr = []){
    $categories = (new CategoryModel())->where('parent_category_id',$category->id)->findAll();
    foreach($categories as $cat){
      if((int)$cat->level < 2){
        $this->findSubCats($cat,$arr);
      }elseif((int)$cat->level === 2){
        array_push($arr,$cat->id);
      }
    }
  }

}