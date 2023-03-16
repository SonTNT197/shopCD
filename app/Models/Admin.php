<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DB;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'email',
        'password',
        'remember_token',
        'fullname',
        'phone',
        'create_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getadmin($id){
        $user = DB::select("SELECT * FROM admins Where id = ?", [$id]);
        return $user;
    }

    public function editAdmin($data){
        DB::update("UPDATE admins SET  password=? WHERE id = ?", $data);
    }

    public function getlistAdmin(){
        $admins = DB::select("SELECT * FROM admins");
        return $admins;
    }

    public function addAdmin($data){
        DB::insert("INSERT INTO admins(fullname, email, password, phone) values(?,?,?,?)", $data);
    }

    public function delAdmin($id){
        DB::delete("DELETE FROM admins WHERE id = ?", [$id]);
    }
}

