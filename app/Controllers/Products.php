<?php


namespace App\Controllers;


use App\Entities\Category;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use phpDocumentor\Reflection\Types\Null_;

class Products extends FrontController{

  public function productDetail($id){
    $product = (new ProductModel())->find($id);
    //    if($product){
    //      return 'Belə bir məhsul tapılmadı';
    //    }
    return view('front/quickview',['product' => $product]);
  }

  public function productSuggestions(){
    $request = $this->request;
    //    if(!$request->isAJAX())
    //      exit();
    $inputs = $request->getGet();
    $search = trim($inputs['search']);
    $keys = explode(' ',$search);
    $products = new ProductModel();
    $categories = [];
    if(isset($inputs['category']) && $inputs['category'] != 'all'){
      $category = (new CategoryModel())->where('id',$inputs['category'])->first();
      if($category->level == 2){
        array_push($categories,(int)$category->id);
      }else{
        $this->findSubCats((new CategoryModel())->where('id',$inputs['category'])->first(),$categories);
      }
      $products->whereIn('category_id',$categories);
    }
    $products->like('title',$search);
    if(count($keys) > 1){
      for($i = 0; $i < count($keys); $i++){
        if(count($categories)){
          $products->orGroupStart();
          $products->whereIn('category_id',$categories);
          $products->like('title',$keys[$i]);
          $products->groupEnd();
        }else
          $products->orLike('title',$keys[$i]);
      }

    }
    $products = $products->findAll(10);
    return view('front/suggestions',['products' => $products]);
  }

  public function product($id){
    $productModel = new ProductModel();
    $product = $productModel->select(['products.*','categories.name as category_name','categories.slug as category_slug','categories.parent_category_id','brands.name as brand_name'])
      ->join('categories','products.category_id = categories.id')
      ->join('brands','products.brand_id = brands.id')
      ->find($id);
    $relativeCategories = (new CategoryModel())->where('parent_category_id =',$product->parent_category_id)->findAll();
    $parentCategoryIds = array_map(function($cat){
      return $cat->id;
    },$relativeCategories);
    $relatedProducts = $productModel->whereIn('category_id',$parentCategoryIds)->findAll();

    return view('front/product',array_merge($this->data,['product' => $product,'relatedProducts' => $relatedProducts]));

  }


  public function findSubCats(Category $category,&$arr = []){
    $categories = (new CategoryModel())->where('parent_category_id',$category->id)->findAll();
    foreach($categories as $cat){
      if((int)$cat->level < 2){
        $this->findSubCats($cat,$arr);
      }elseif((int)$cat->level === 2){
        array_push($arr,(int)$cat->id);
      }
    }
  }


}