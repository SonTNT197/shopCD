<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Orders extends Model
{
    use HasFactory;
    public function getorders($key_select, $key_word){
        $condition = "1=1";
        if($key_select == 1 &&  $key_word != null ){
            $newkey     = str_replace(' ', '%', $key_word);
            $condition .= " AND id LIKE '%{$newkey}%'";
        }

        if($key_word != null && $key_select == 2){
            $newkey     = str_replace(' ', '%', $key_word);
            $condition .= " AND cus_id LIKE '%{$newkey}%'";
        }

        if($key_word != null && $key_select == 3){
            $newkey     = str_replace(' ', '%', $key_word);
            $condition .= " AND ord_status LIKE '%{$newkey}%'";
        }

        $orders = DB::select("SELECT * FROM orders WHERE $condition");
        return $orders;
    }

    public function getdetail($id){
        $ordetail = DB::select("SELECT P.pro_name, Pi.img_first, Od.pro_price, Od.quantity, (Od.pro_price*Od.quantity) as total
        from orderDetail Od
        inner join orders O on O.id = Od.ord_id
        inner join product P on P.id = Od.pro_id
        inner join proimage Pi on P.id = Pi.pro_id
        where O.id = ?", [$id]);
        return $ordetail;
    }

    public function getorder($id){
        $orders = DB::select("SELECT O.id, C.fullname, C.phone, C.email, O.ord_date, O.ord_status, O.address, O.methodpay from orders O
        inner join customers C on O.cus_id = C.id  WHERE O.id =?", [$id]);
        return $orders;
    }

    public function totalorder($id){
        $subtotal = DB::select("SELECT sum(Od.pro_price*Od.quantity) as subtotal from orderDetail Od
        inner join orders O on O.id = Od.ord_id
        inner join customers C on C.id = O.cus_id
        where O.id = ?", [$id]);
        return $subtotal;
    }

    public function upstatus($data){
        DB::update("UPDATE orders SET ord_status = ? Where id =?", $data);
    }

    public function orderstoday(){
        $ordertoday = DB::select("SELECT * from orders WHERE date_format(ord_date,'%Y-%m-%d') = date_format(now(), '%Y-%m-%d')");
        return $ordertoday;
    }

    public function createorders($data){
        DB::insert("INSERT orders(id, cus_id, ord_date, ord_status, address, methodpay) values (?,?,?,?,?,?)", $data);
    }

    public function createorderDetail($data){
        DB::insert("INSERT into orderDetail(ord_id, pro_id, pro_price, quantity) values(?,?,?,?)", $data);
    }

    public function delcart($cus_id){
        DB::delete("DELETE from tblcart where cus_id = ?", [$cus_id]);
    }
}
