<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{

    private $cat;
    private $pro;
    private $htmlSelect;
    public function __construct(){
        $this->pro = new Product();
        $this->cat = new Category();
        $this->htmlSelect = '';
    }


    function RecusiveCat($cat_id, $id=0, $text = ''){
        $category = $this->cat->getAll();
            foreach($category as $item){
                if($item->parent_id == $id){
                    if(!empty($cat_id) && $cat_id==$item->id){
                        $this->htmlSelect .= "<option value = '$item->id' selected>".$text.$item->name."</option>";
                    }else{
                        $this->htmlSelect .= "<option value = '$item->id'>".$text.$item->name."</option>";
                    }
                    $this->RecusiveCat($cat_id, $item->id, $text."-");
                }
            }
        return $this->htmlSelect;
    }

    public function add(){
        $htmlSelect = $this->RecusiveCat(null);
        return view('product.add', compact('htmlSelect'));
    }

    public function postadd(Request $req){

        $rules = [
            'pro_id'       => 'required|unique:product,id|max:8'
            ,'pro_name'    => 'required|max:100'
            ,'cat_id'      => 'required'
            ,'pro_price'   => 'required|regex:/^\d*(\.\d+)?$/'
            ,'pro_quantity'=>'required|regex:/^[0-9]*$/'
            ,'img_1'       => 'nullable|file|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp,avif|max:5120'
            ,'img_2'       => 'nullable|file|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp,avif|max:5120'
            ,'img_3'       => 'nullable|file|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp,avif|max:5120'
            ,'size'        => 'nullable|max:100'
            ,'brand'       => 'nullable|max:100'
            ,'origin'      => 'nullable|max:50'
            ,'type'        => 'nullable|max:50'
            ,'dimention'   => 'nullable|max:50'
            ,'description' => 'nullable|max:500'
       ];
       $message = [
            'pro_id.required'   => 'Product ID must not be left blank!'
            ,'pro_id.unique'    => 'Product ID already exists!'
            ,'pro_id.max'       => 'Product ID is no larger than 8 characters!'
            ,'pro_name.required'=> 'Product name must not be left blank!'
            ,'pro_name.max'     => 'Product ID is no larger than 100 characters!'
            ,'cat_id.required'  => 'Please select Category name!'
            ,'pro_price.required'   => 'Product price must not be left blank!'
            ,'pro_price.regex'      => 'Product price must be float!'
            ,'pro_quantity.regex'   => 'Product quantity must be integer!'
            ,'pro_quantity.required'=> 'Product quantity must not be left blank!'
            ,'image'                => 'Product image must be image file!'
            ,'mimes'                => 'Product image must be image file!'
            ,'img_1.max'            => 'Product image file no lagger than 5MB!'
            ,'img_2.max'            => 'Product image file no lagger than 5MB!'
            ,'img_3.max'            => 'Product image file no lagger than 5MB!'
            ,'max'                  => ':attribute is no larger than :max characters!'
       ];
       $req->validate($rules, $message);
       $pro_id      = strtoupper($req->pro_id);
       $pro_name    = $req->pro_name;
       $pro_price   = $req->pro_price;
       $cat_id      = $req->cat_id;
       $pro_quantity= $req->pro_quantity;
       $size        = $req->size;
       $brand       = $req->brand;
       $origin      = $req->origin;
       $type        = $req->type;
       $dimention   = $req->dimention;
       $description = $req->description;

       $path_1 = '';
       $path_2 = '';
       $path_3 = '';


       if($req->hasFile('img_1')){
        $file_1        = $req->file('img_1');
        $fileName_1    = time().'.'.$file_1->getClientOriginalName();
        $path_1        = $file_1->storeAs('public/fileUpload', $fileName_1);
        $path_1        = $path = Storage::url($path_1);
       };

       if($req->hasFile('img_2')){
        $file_2        = $req->file('img_2');
        $fileName_2    = time().'.'.$file_2->getClientOriginalName();
        $path_2        = $file_2->storeAs('public/fileUpload', $fileName_2);
        $path_2        = $path = Storage::url($path_2);
       };

       if($req->hasFile('img_3')){
        $file_3        = $req->file('img_3');
        $fileName_3    = time().'.'.$file_3->getClientOriginalName();
        $path_3        = $file_3->storeAs('public/fileUpload', $fileName_3);
        $path_3        = $path = Storage::url($path_3);
       };
       $create_at     = now();
       $dataproduct   = [$pro_id, $pro_name, $pro_price, $cat_id, $pro_quantity, $create_at];
       $dataprodesc   = [$pro_id, $size, $brand, $origin, $type, $dimention, $description ];
       $dataproimage  = [$pro_id, $path_1, $path_2, $path_3];

       if(($this->pro->addproduct($dataproduct))==null
            && ($this->pro->addprodesc($dataprodesc))==null
            && ($this->pro->addproimage($dataproimage))==null){
            return redirect()->route('product.list')->with('msg', 'Add successfully Product!');
       }else{
            return redirect()->route('product.list')->with('msg', 'Add fail Product!');
       }
    }

    public function list(Request $req){
        $keyword   = $req->keyword;
        $paginate  = $this->pro->getlistpro($keyword);

        // dd($pro);
        // $paginate = new LengthAwarePaginator($product, 8, 5);
        // dd($paginate);
        // $paginate->withPath('/admin/product/list');
        return view('product.list', compact('paginate'));
    }


    public function edit($id){
        $pro = $this->pro->getpro($id);
        $htmlOption = $this->RecusiveCat($pro[0]->cat_id);
        return view('product.edit', compact('pro', 'htmlOption'));
    }

    public function postedit(Request $req){
        $id     = $req->id;
        $path   = $this->pro->getimgpro($id);
        $path_1 = $path[0]->img_first;
        $path_2 = $path[0]->img_second;
        $path_3 = $path[0]->img_third;

        $rules = [
            // 'pro_id'       => 'required|unique:product,id|max:8'
            'pro_name'    => 'required|max:100'
            ,'cat_id'      => 'required'
            ,'pro_price'   => 'required|regex:/^\d*(\.\d+)?$/'
            ,'pro_quantity'=>'required|regex:/^[0-9]*$/'
            ,'img_1'       => 'nullable|file|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp,avif|max:5120'
            ,'img_2'       => 'nullable|file|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp,avif|max:5120'
            ,'img_3'       => 'nullable|file|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp,avif|max:5120'
            ,'size'        => 'nullable|max:100'
            ,'brand'       => 'nullable|max:100'
            ,'origin'      => 'nullable|max:50'
            ,'type'        => 'nullable|max:50'
            ,'dimention'   => 'nullable|max:50'
            ,'description' => 'nullable|max:500'
       ];
       $message = [
            // 'pro_id.required'   => 'Product ID must not be left blank!'
            // ,'pro_id.unique'    => 'Product ID already exists!'
            // ,'pro_id.max'       => 'Product ID is no larger than 8 characters!'
            'pro_name.required'=> 'Product name must not be left blank!'
            ,'pro_name.max'     => 'Product ID is no larger than 100 characters!'
            ,'cat_id.required'  => 'Please select Category name!'
            ,'pro_price.required'   => 'Product price must not be left blank!'
            ,'pro_price.regex'      => 'Product price must be float!'
            ,'pro_quantity.regex'   => 'Product quantity must be integer!'
            ,'pro_quantity.required'=> 'Product quantity must not be left blank!'
            ,'image'                => 'Product image must be image file!'
            ,'mimes'                => 'Product image must be image file!'
            ,'img_1.max'            => 'Product image file no lagger than 5MB!'
            ,'img_2.max'            => 'Product image file no lagger than 5MB!'
            ,'img_3.max'            => 'Product image file no lagger than 5MB!'
            ,'max'                  => ':attribute is no larger than :max characters!'
       ];
       $req->validate($rules, $message);
       $pro_id      = $req->pro_id;
       $pro_name    = $req->pro_name;
       $pro_price   = $req->pro_price;
       $cat_id      = $req->cat_id;
       $pro_quantity= $req->pro_quantity;
       $size        = $req->size;
       $brand       = $req->brand;
       $origin      = $req->origin;
       $type        = $req->type;
       $dimention   = $req->dimention;
       $description = $req->description;


       if($req->hasFile('img_1')){
        $file_1        = $req->file('img_1');
        $fileName_1    = time().'.'.$file_1->getClientOriginalName();
        $path_1        = $file_1->storeAs('public/fileUpload', $fileName_1);
        $path_1        = $path = Storage::url($path_1);
       };

       if($req->hasFile('img_2')){
        $file_2        = $req->file('img_2');
        $fileName_2    = time().'.'.$file_2->getClientOriginalName();
        $path_2        = $file_2->storeAs('public/fileUpload', $fileName_2);
        $path_2        = $path = Storage::url($path_2);
       };

       if($req->hasFile('img_3')){
        $file_3        = $req->file('img_3');
        $fileName_3    = time().'.'.$file_3->getClientOriginalName();
        $path_3        = $file_3->storeAs('public/fileUpload', $fileName_3);
        $path_3        = $path = Storage::url($path_3);
       };

       $dataproduct   = [$pro_name, $pro_price, $cat_id, $pro_quantity, $id];
       $dataprodesc   = [$size, $brand, $origin, $type, $dimention, $description, $id];
       $dataproimage  = [$path_1, $path_2, $path_3, $id];

        if(($this->pro->upproduct($dataproduct))==null
           && ($this->pro->upprodesc($dataprodesc))==null
           && ($this->pro->upproimage($dataproimage))==null){
            return redirect()->route('product.list')->with('msg', 'Edit successfully Product!');
        }else{
            return redirect()->route('product.list')->with('msg', 'Edit fail Product!');
        }
    }

    public function delete($id){
        $sales = DB::select("SELECT ord_id from orderDetail WHERE pro_id = ?", [$id]);
        if($sales != null){
            return redirect()->back()->with('msg', 'Delete fail because this product is sale!');
        }else{
            $this->pro->delprodesc($id);
            $this->pro->delproimage($id);
            $this->pro->delproduct($id);
            return redirect()->route('product.list')->with('msg', 'Delete successfully Product!');
        }
    }

    public function detail($id){
        $product  = $this->pro->getpro($id);
        $proimage = $this->pro->getimgpro($id);
        // dd($product);
        return view('product.detail', compact('product', 'proimage'));
    }

}
