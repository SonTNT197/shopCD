<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Session;


class Product extends Model
{
    use HasFactory;
    public function addproduct($data){
        DB::insert("INSERT INTO product(id, pro_name, pro_price, cat_id, pro_quantity, create_at) values(?, ?, ?, ?, ?, ?)", $data);
    }

    public function addprodesc($data){
        DB::insert("INSERT INTO prodesc(pro_id, size, brand, origin, type, diment, descrip) values(?,?,?,?,?,?,?)", $data);
    }

    public function addproimage($data){
        DB::insert("INSERT INTO proimage(pro_id, img_first, img_second, img_third) values(?,?,?,?)", $data);
    }

    public function getlistpro($keyword){
        $condition = "1=1";
        if($keyword != null){
            $newkey    = str_replace(' ', '%', $keyword);
            $condition .= " AND (P.pro_name or P.id or C.name like '%{$newkey}%')";
        }
        $pro = DB::select("SELECT P.id, P.pro_name, C.name, P.pro_price, P.pro_quantity, P.create_at from product P
        inner join category C on C.id = P.cat_id WHERE $condition");
        return $pro;
    }

    public function getpro($id){
        $pro = DB::select("SELECT P.id, P.pro_status, P.pro_name, P.cat_id, P.pro_price, P.pro_quantity, D.size, D.brand, D.origin, D.type, D.diment, D.descrip
        from product P
        inner join prodesc D on P.id = D.pro_id WHERE P.id = ?", [$id]);
        return $pro;
    }

    public function getimgpro($id){
        $pro = DB::select("SELECT * FROM proimage WHERE pro_id = ?", [$id]);
        return $pro;
    }

    public function upproduct($data){
        DB::update("UPDATE product SET pro_name=?, pro_price=?, cat_id=?, pro_quantity=? WHERE id = ?", $data);
    }

    public function upprodesc($data){
        DB::update("UPDATE prodesc SET size=?, brand=?, origin=?, type=?, diment=?, descrip=? WHERE pro_id = ?", $data);
    }

    public function upproimage($data){
        DB::update("UPDATE proimage SET img_first=?, img_second=?, img_third=? WHERE pro_id = ?", $data);
    }

    public function delproduct($id){
        DB::delete("DELETE FROM product WHERE id = ?", [$id]);
    }

    public function delprodesc($id){
        DB::delete("DELETE FROM prodesc WHERE pro_id = ?", [$id]);
    }

    public function delproimage($id){
        DB::delete("DELETE FROM proimage WHERE pro_id = ?", [$id]);
    }


    // phan nam lam
    public function getAll(){
        $data = DB::select("SELECT * FROM product pr INNER JOIN proimage pm on pr.id=pm.pro_id inner join prodesc pd on pd.pro_id=pr.id");
        return $data;
    }
    public function getP($id){
        return DB::select("SELECT * FROM product pr INNER JOIN proimage pm on pr.id=pm.pro_id inner join prodesc pd on pd.pro_id=pr.id inner join category ca on ca.id=pr.cat_id where pr.id=?",[$id]);
    }
    public function addtoCart($pro_id,$user_id){

        $all=DB::select("SELECT * FROM tblcart where 1=1");//select all data in tblcart
        $total=DB::select("SELECT SUM(quantity) as tot from tblcart where 1=1"); // total quantity
        //check id in tblcart if have then add more quantity
        for ($i=0; $i < count($all); $i++) {

            if ($pro_id==$all[$i]->pro_id && $user_id==$all[$i]->cus_id) {

                $data=[
                    $all[$i]->quantity + 1
                    ,$pro_id
                    ,$user_id
                ];
                DB::update("UPDATE tblcart set quantity=? where pro_id=? and cus_id=?",$data);
                return true;
            }
        }
        // add to tblcart
        $price=DB::select("SELECT pro_price FROM product where id=?",[$pro_id]);

        $data=[
            $user_id,
            $pro_id,
            $price[0]->pro_price,
        ];

        DB::insert("INSERT INTO tblcart(cus_id,pro_id,pro_price,quantity) values (?,?,?,1)",$data);

        return true;
    }
    // number in cart icon
    public function nbrcart($cus_id){
        $total=DB::select("SELECT SUM(quantity) as tot from tblcart where cus_id=?",[$cus_id]);
        return $total[0]->tot;
    }
    public function cartdata($id){

        return DB::select("SELECT pi.img_first,pr.pro_name,ct.name,ca.pro_id,ca.pro_price,ca.quantity,ca.cus_id from tblcart ca
        inner join proimage pi on pi.pro_id=ca.pro_id
        inner join product pr on pr.id=ca.pro_id
        inner join category ct on ct.id=pr.cat_id where ca.cus_id=?",[$id]);

    }
    public function upcartdata($updata,$pro_id,$user_id){

        for ($i=0; $i < count($updata) ; $i++) {
            $data=[
                $updata[$i],
                $pro_id[$i],
                $user_id
            ];
            DB::update('UPDATE tblcart set quantity=? where pro_id=? and cus_id=?',$data);
        }
    }
    public function deletecart($proid,$cusid){
        $data=[
            $proid,$cusid
        ];
        DB::delete('DELETE FROM tblcart WHERE pro_id=? and cus_id=?',$data);
    }

    public function search_pro($key){
        $key=str_replace(' ','%',$key);
        $data=DB::select("SELECT pr.id,pi.img_first,pr.pro_name,pr.pro_price,ca.name from product pr
        inner join category ca on pr.cat_id=ca.id
        inner join proimage pi on pi.pro_id=pr.id where pr.pro_name like '%{$key}%'");
        return $data;
    }
    // comment area
    public function updatacmt($data){
        DB::insert('INSERT INTO tblreview(pro_id,cus_id,star,cmt_text,post_at) VALUES (?,?,?,?,?)',$data);
    }
    public function getreview($cus_id){
        return DB::select('SELECT cu.fullname,re.star,re.cmt_text,re.post_at FROM product pr 
        inner join tblreview re on re.pro_id=pr.id
        inner join customers cu on re.cus_id=cu.id
        where pr.id=?',[$cus_id]);
    }
    public function stardata($id){
        return DB::select('SELECT star from tblreview where pro_id=?',[$id]);
    }
}
