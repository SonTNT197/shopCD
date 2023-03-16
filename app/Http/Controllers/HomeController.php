<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use DB;
class HomeController extends Controller
{
    private $pro;
    private $order;
    public function __construct()
    {
        $this->pro   = new Product();
        $this->order = new Orders();
    }
    public function homepage(){
        $products = DB::select("SELECT Pr.id, Pr.pro_name, C.name, P.diment, P.brand, P.size, Pi.img_first from prodesc P
        inner join proimage Pi on Pi.pro_id = P.pro_id
        inner join product Pr on Pr.id = P.pro_id
        inner join category C on Pr.cat_id = C.id
        WHERE Pr.id like '%SD%'");
        // dd($products);
        return view('home_byNamVu.home', compact('products'));
    }
    public function shop(){

        $data=$this->pro->getAll();

        foreach ($data as $value) {
            $sum=0;
            $getstar=$this->pro->stardata($value->pro_id);
            if (count($getstar)>0) {
                for ($i=0; $i < count($getstar); $i++) {
                    $sum+=$getstar[$i]->star;
                }
                $sum=$sum/count($getstar);
                $sum=round($sum,2);
            }
            $value->sum=$sum;// push to array data
        }

        return view('home_byNamVu.shop',compact('data'));
    }
    public function floppydisk(){
        return view('home_byNamVu.floppydisk');
    }
    public function test(){
        session()->flush();
        return view('home_byNamVu.test');
    }
    public function getProduct($id,Request $req){

        if (Auth::guard('customers')->check()==0) {
            session()->put('link',url()->current());
        }
        $data=$this->pro->getP($id);
        $data=$data[0];
        $reviewdata=$this->pro->getreview($id);
        $cusid=Auth::guard('customers')->id();
        if($req->ajax()){

            $rs=$this->pro->addtoCart($req->prod,$cusid);
            $tot=$this->pro->nbrcart($cusid);
            session()->put('cart',$tot);
            return response()->json($tot);
        }
       //
        return view('home_byNamVu.product',compact('data','reviewdata'));

    }
   public function cart(){

        $cusid=Auth::guard('customers')->id();
        $data=$this->pro->cartdata($cusid);
        $checklogin=Auth::guard('customers')->check();
        return view('home_byNamVu.cart',compact('data'));
   }

   public function postcart(Request $req){
        $data=$req->all();
        $user_id=$data['user_id'];

        $updata=[];
        $pro_id=[];
        $count=(count($data)-2)/2;
        for ($i=0; $i < $count ; $i++) {
            array_push($updata,$data[$i]);
            array_push($pro_id,$data['p'.$i]);
        }
        $this->pro->upcartdata($updata,$pro_id,$user_id);

        return redirect()->route('user.orderinfo');
   }
   //del cart
   public function delcart($pro_id,$cus_id){
        $this->pro->deletecart($pro_id,$cus_id);
        $tot=$this->pro->nbrcart($cus_id);
        session()->put('cart',$tot);
        return redirect()->back();
   }
   //order
   public function order(){
        if(Auth::guard('customers')->check()){
            $cus_id = Auth::guard('customers')->id();
            $orders = DB::select("SELECT * from orders Where cus_id = ?", [$cus_id]);
            // dd($orders);
            return view('home_byNamVu.orderinfo', compact('orders'));
        }

        // dd($orders);

   }

   //search
   public function search(Request $req){
        if ($req->ajax()) {
            $key=$req->search;
            if (strlen($key)>1) {
                $rs=$this->pro->search_pro($key);
                $output='';

                for ($i=0; $i <count($rs) ; $i++) {
                    $output .='<a style="text-decoration: none" href="/shop/product/'.$rs[$i]->id.'">
                    <div class="cardsearch">
                    <div>
                        <img src="'.$rs[$i]->img_first.'" alt="" height="100px">
                        </div>
                        <div class="propertisesearch">
                            <h2>'.$rs[$i]->pro_name.'</h2>
                            <p>Category: '.$rs[$i]->name.'</p>
                            <p>Price: '.$rs[$i]->pro_price.'$</p>
                        </div>
                    </div>
                    </a>';
                }
                if ($output=='') {
                    return false;
                }
                return response()->json($output);
            }

        }
    }
    //post review
    public function postreview($pro_id,$cus_id,Request $req){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data=[
            $pro_id,
            $cus_id,
            $req->vote,
            $req->cusinp,
            $date=date('Y-m-d H:i:s',time())
        ];
        $this->pro->updatacmt($data);

        return redirect()->back();
    }

    public function confirmdone($id){
        $data = [1, $id];
        if($this->order->upstatus($data)){
            return redirect()->back()->with('mesconfirm', 'Confirm your order success!');
        }else{
            return redirect()->back()->with('mesconfirm', 'Confirm your order failed!');
        };
    }

    public function confirmcan($id){
        $data = [3, $id];
        if($this->order->upstatus($data)){
            return redirect()->back()->with('mesconfirm', 'Confirm your order success!');
        }else{
            return redirect()->back()->with('mesconfirm', 'Confirm your order failed!');
        };
    }

    public function detailofcus($id){
        $orderdetail = $this->order->getdetail($id);
        $order       = $this->order->getorder($id);
        $total       = $this->order->totalorder($id);
        return view('home_byNamVu.oddetail', compact('orderdetail', 'order', 'total'));
    }
}
