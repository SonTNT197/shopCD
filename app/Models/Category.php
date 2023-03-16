<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Category extends Model
{
    use HasFactory;
    public function getAllCat($keyword){
        $condition = '';
        if($keyword == null){
             $cat = DB::select("SELECT C.id, C.name, C.parent_id, C.create_at, C.update_at from category C where C.parent_id = 0
                union SELECT B.id, B.name, A.name, B.create_at, B.update_at FROM category A, category B WHERE A.id = B.parent_id");
        }else{
            $newkey    = str_replace(' ', '%', $keyword);
            $condition .= "'%{$newkey}%'";
            $cat = DB::select("SELECT C.id, C.name, C.parent_id, C.create_at, C.update_at from category C where C.parent_id = 0 AND C.name Like $condition
                union SELECT B.id, B.name, A.name, B.create_at, B.update_at FROM category A, category B WHERE A.id = B.parent_id AND B.name like $condition ");
        }

        return $cat;
    }

    public function getAll(){
        $cat = DB::select("SELECT * from category");
        return $cat;
    }

    public function getCat($id){
        $cat = DB::select("SELECT * FROM category WHERE id = ?", [$id]);
        return $cat;
    }

    public function addCat($data){
        DB::insert("INSERT INTO category(name, parent_id, create_at) values(?, ?, ?)", $data);
    }

    public function editCat($data){
        DB::update("UPDATE category SET name = ?, parent_id = ? WHERE id = ?", $data);
    }

    public function delCat($id){
        DB::delete("DELETE FROM category WHERE id = ?", [$id]);
    }
}
