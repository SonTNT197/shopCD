<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Statistic extends Model
{
    use HasFactory;
    public function getproselling(){
        $listprosell = DB::select("SELECT P.id, P.pro_name, C.name as category, sum(Od.quantity) as totalquantity from product P
        inner join orderDetail Od on P.id = Od.pro_id
        inner join category C on P.cat_id = C.id
        inner join orders O on Od.ord_id = O.id
        where O.ord_status = 1 group by P.id order by(totalquantity) desc");
        return  $listprosell;
    }

    public function getprorevenue(){
        $listprorevenue = DB::select("SELECT P.id, P.pro_name, C.name as category, sum(Od.pro_price*Od.quantity) as Doanhthu from product P
        inner join orderDetail Od on P.id = Od.pro_id
        inner join category C on P.cat_id = C.id
        inner join orders O on Od.ord_id = O.id
         where O.ord_status = 1 group by P.id  order by(Doanhthu) desc");
        return $listprorevenue;
    }

    public function getcusrevenue(){
        $listcusrevenue = DB::select("SELECT C.id, C.fullname, C.email, C.phone, sum(Od.pro_price*Od.quantity) as Doanhthu from customers C
        inner join orders O on O.cus_id = C.id
        inner join orderDetail Od on Od.ord_id = O.id
        where O.ord_status = 1 group by C.id order by(Doanhthu) desc");
        return $listcusrevenue;
    }



    public function getlistday($keyword){
        $listODday = DB::select("SELECT O.id, C.fullname, O.ord_date, sum(Od.pro_price*Od.quantity) as total from orders O
        inner join orderDetail Od on Od.ord_id = O.id
        inner join customers C on C.id = O.cus_id
        where O.ord_status = 1 and date_format(O.ord_date,'%Y-%m-%d') = '$keyword' group by O.id");
        return $listODday;
    }

    public function getsubtotalday($keyword){
        $subtotalday = DB::select("SELECT sum(Od.pro_price*Od.quantity) as subtotal from orders O
        inner join orderDetail Od on Od.ord_id = O.id
        where O.ord_status = 1 and date_format(O.ord_date,'%Y-%m-%d') = '$keyword'");
        return $subtotalday;
    }

    public function getlistmonth($keyword){
        $listODmonth = DB::select("SELECT O.id, C.fullname, O.ord_date, sum(Od.pro_price*Od.quantity) as total from orders O
        inner join orderDetail Od on Od.ord_id = O.id
        inner join customers C on C.id = O.cus_id
        where O.ord_status = 1 and date_format(O.ord_date,'%Y-%m') = '$keyword' group by O.id");
        return $listODmonth;
    }

    public function getsubtotalmonth($keyword){
        $subtotalmonth = DB::select("SELECT sum(Od.pro_price*Od.quantity) as subtotal from orders O
        inner join orderDetail Od on Od.ord_id = O.id
        where O.ord_status = 1 and date_format(O.ord_date,'%Y-%m') = '$keyword'");
        return $subtotalmonth;
    }

}
