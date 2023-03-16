<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Session;
use App\Models\Admin;
use App\Models\Customers;
use App\Models\Product;

class UserController extends Controller
{
    private $custom;
    private $admin;
    private $string;
    private $pro;
    public function __construct(){
        $this->custom = new Customers();
        $this->admin  = new Admin();
        $this->string = "";
        $this->pro    = new Product();
    }

    public function login(){
        return view('admin.account');
    }

    //tạo mã khách hàng
    // function random($length){
    //     $char = "00112233445566778899";
    //     $char = "ABCD0340250123123456789";
    //     $size = strlen($char);
    //     for($i=0; $i<$length; $i++){
    //         $this->string .= $char[rand(0, $size-1)];
    //     }
    //     return $this->string;
    // }

    public function postlogin(Request $req){
        $rules = [
            'loginMail'  => 'required'
            ,'loginPass' => 'required'
        ];
        $mesage = [
            'loginMail.required' => 'This field email is required!'
            ,'loginMail.required' => 'This field email is required!'
        ];
        $req->validate($rules, $mesage);
        $email          = $req->loginMail;
        $password       = $req->loginPass;
        $remember_token = $req->has('remember')?true:false;
        $admin          = Auth::guard('admins')->attempt(['email' => $email, 'password' => $password], $remember_token);
        $customer       = Auth::guard('customers')->attempt(['email' => $email, 'password' => $password], $remember_token);
        if($admin==true && $customer==false){
            return redirect()->route('admin.home');
        }else if($admin==false && $customer==true){

            //check nbr cart to show in icon
            $cusid=Auth::guard('customers')->id();
            $tot=$this->pro->nbrcart($cusid);
            // phan if session link de get back ve link mua ban
            if ($tot>0) {
                session()->put('cart',$tot);
            }
            if (session('link')) {
                return redirect(session('link'));
            }


            return redirect()->route('user.home');
        }else{
            return redirect()->back()->with('msg', ('This Account not exists!'));
        }
    }

    public function logout(){
        Auth::guard('customers')->logout();
        //--muc xoa cac session by NAMVU
        Session::forget('cat');
        //--end
        return redirect()->route('user.home');
    }

    public function logoutadmin(){
        Auth::guard('admins')->logout();
        return redirect()->route('user.home');
    }

    public function register(){
        return view('admin.register');
    }

    public function postregis(Request $req){

        $rules = [
            'userName'   => 'required|regex:/[^!@#$%^&*()]*$/'
            ,'userMail'  => 'required|email|unique:customers,email'
            ,'userPass'  => 'required|min:6'
            ,'userRePass'=> 'required|same:userPass'
            ,'userphone' => 'required|regex:/^[0-9]{10,15}$/'
        ];
        $mesage = [
            'required'           => 'This field is required!'
            ,'userName.regex'    => 'Username must be not including special characters!'
            ,'userMail.email'    => 'This email not exists!'
            ,'userMail.unique'   => 'This email already exists!'
            ,'userPass.min'      => 'Password must be more than 6 characters!'
            ,'userRePass'        => 'Password not the same!'
            ,'userphone.regex'   => 'Number phone incorrect!'
        ];
        $req->validate($rules, $mesage);

        $fullname = ucwords($req->userName);
        $email    = $req->userMail;
        $phone    = $req->userphone;
        $pass     = $req->userPass;
        $password = bcrypt($pass);
        $create_at= now();
        $data = [$fullname, $email, $password, $phone, $create_at];

        if(($this->custom->regist($data))==null){
            return redirect()->route('user.login')->with('msg', 'Register Users successfully!');
        }else{
            return redirect()->route('user.login')->with('msg', 'Register Users fail!');
        }
    }

    // about us
    public function aboutus(){
        return view('admin.aboutus');
    }

    //customer list trong admin
    public function listcustomers(Request $req){
        $condition = "1=1";
        $key       = $req->key_word;
        // dd($key);
        if($key != null){
            $new_key   = str_replace(' ', '%', $key);
            $condition .= " AND C.fullname LIKE '%{$new_key}%'";
        };
        $customers = DB::select("SELECT * from customers C WHERE $condition");
        return view('customer.list', compact('customers'));
    }
}
