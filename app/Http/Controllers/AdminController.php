<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use DB;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    private $admin;
    private $order;
    public function __construct(){
        $this->admin  = new Admin();
        $this->order  = new Orders();
    }

    public function home(){
        $tongcus   = DB::select("SELECT count(id) as tong from customers");
        $tongorder = DB::select("SELECT count(id) as tong from orders");
        $tongpro   = DB::select("SELECT count(id) as tong from product");
        $ordertoday= $this->order->orderstoday();
        // dd($ordertoday);
        return view('admin.home', compact('tongcus', 'tongorder', 'tongpro', 'ordertoday'));
    }


    public function listadmin(){
        $admins = $this->admin->getlistAdmin();
        return view('admin.list', compact('admins'));
    }

    public function add(){
        return view('admin.add');
    }

    public function postadd(Request $req){
        $rules = [
            'fullname' => 'required|regex:/^[a-z A-Z]*$/'
            ,'email'   => 'required|unique:admins,email|email'
            ,'password'=> 'required|regex:/(?=(.*[0-9]))(?=.*[a-z])(?=(.*)).{8,}/'
            ,'phone'   => 'required|regex:/^[0-9]{10,15}$/'
        ];
        $message = [
            'required'        => 'This field is required!'
            ,'fullname.regex' => 'Fullname cannot inlude number and special characters!'
            ,'email.unique'   => 'This email already exists!'
            ,'email.email'    => 'Email is not in the correct format!'
            ,'password.regex' => 'Password must contain at least 8 characters including alphanumeric characters!'
            ,'Phone.regex'    => 'Incorrect phone number!'
        ];

        $req->validate($rules, $message);

        $data = [
            ucwords($req->fullname)
            ,$req->email
            ,bcrypt($req->password)
            ,$req->phone
        ];

        if(($this->admin->addAdmin($data))==null){
            return redirect()->route('admin.list')->with('msg', 'Creation Account success!');
        }else{
            return redirect()->route('admin.list')->with('msg', 'Creation Account failed!');
        }
    }

    public function editadmin($id){
        $admin   = $this->admin->getadmin($id);
        return view('admin.edit', compact('admin'));
    }

    public function posteditadmin(Request $req){
        $id = $req->id;
        $admin   = $this->admin->getadmin($id);

        $rules = [
            'password_old'     => 'required'
            ,'password'        => 'required|regex:/(?=(.*[0-9]))(?=.*[a-z])(?=(.*)).{8,}/'
            ,'password_confirm'=> 'required|same:password'
        ];
        $message = [
            'password_old.required' => 'Old password is required!'
            ,'password.required'    => 'New password is required!'
            ,'password.regex'       => 'Password must contain at least 8 characters including alphanumeric characters!'
            ,'password_confirm.required' => 'New password confirm is required!'
            ,'password_confirm.same'     => 'New password must the same!'
        ];
        $req->validate($rules, $message);
        $password_new = bcrypt($req->password);
        $password_old = $req->password_old;
        $password     = $admin[0]->password;
        $data         = [$password_new, $id];
        if((Hash::check($req->password_old, $admin[0]->password))==true && $this->admin->editAdmin($data)==null){
            return redirect()->route('admin.list')->with('msg', 'Change password success!');
        }else{
            return redirect()->route('admin.edit', $admin[0]->id)->with('msg', 'Old Password incorrect!');
        }
    }

    public function delete($id){
        if($this->admin->delAdmin($id)==null){
            return redirect()->route('admin.list')->with('msg', 'Delete account success!');
        }else{
            return redirect()->route('admin.list')->with('msg', 'Delete account failed!');
        }
    }
}
