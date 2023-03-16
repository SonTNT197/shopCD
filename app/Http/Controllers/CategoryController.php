<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;
class CategoryController extends Controller
{
    private $cat;
    private $htmlSelect;
    public function __construct(){
        $this->cat = new Category();
        $this->htmlSelect = '';
    }

    function RecusiveCat($parent_id, $id = null, $text = ''){
        $category = $this->cat->getAll();
            foreach($category as $item){
                if($item->parent_id == $id){
                    if(!empty($parent_id) && $parent_id==$item->id){
                        $this->htmlSelect .= "<option value = '$item->id' selected>".$text.$item->name."</option>";
                    }else{
                        $this->htmlSelect .= "<option value = '$item->id'>".$text.$item->name."</option>";
                    }
                    $this->RecusiveCat($parent_id, $item->id, $text."-");
                }
            }
        return $this->htmlSelect;
    }

    public function list(Request $req){
        $keyword  = $req->keyword;
        $category = $this->cat->getAllCat($keyword);
        return view('category.list', compact('category'));
    }

    public function add(){
        $htmlSelect = $this->RecusiveCat(null);
        return view('category.add', compact('htmlSelect'));
    }

    public function postadd(Request $req){
        $rules = [
            'cat_name' => 'required|unique:category,name'
        ];
        $message = [
            'cat_name.required' => 'Category Name cannot be left blank!'
            ,'cat_name.unique' => 'Category already exists!'
        ];
        $req->validate($rules, $message);
        $catname   = strtoupper($req->cat_name);
        $parent_id = $req->parent_id;
        $create_at = now();
        $data = [$catname, $parent_id, $create_at];
        if(($this->cat->addCat($data))==null){
            return redirect()->route('category.list')->with('msg', 'Add successful category!');
        }else{
            return redirect()->back()-with('msg', 'Add failure category!');
        }
    }

    public function edit($id){
        $cat = $this->cat->getCat($id);
        $htmlSelect = $this->RecusiveCat($cat[0]->parent_id);
        return view('category.edit', compact('htmlSelect', 'cat'));
    }

    public function postedit(Request $req){
        $rules = [
            'cat_name' => 'required|unique:category,name'
        ];
        $message = [
            'cat_name.required' => 'Category Name cannot be left blank!'
            ,'cat_name.unique' => 'Category already exists!'
        ];
        $req->validate($rules, $message);
        $id         = $req->id;
        $catname    = strtoupper($req->cat_name);
        $parent_id  = $req->parent_id;
        $data = [$catname, $parent_id, $id];
        if(($this->cat->editCat($data))==null){
            return redirect()->route('category.list')->with('msg', 'Edit successful category!');
        }else{
            return redirect()->route('category.list')->with('msg', 'Edit failure category!');
        }
    }

    public function delete($id){
        $productID = DB::select("SELECT id from product WHERE cat_id = ?", [$id]);
        if($productID != null){
             return redirect()->route('category.list')->with('msg', 'Delete failure category because this categoty already included products!');
        }else{
            $this->cat->delCat($id);
            return redirect()->route('category.list')->with('msg', 'Delete successful category!');
        }
    }
}
