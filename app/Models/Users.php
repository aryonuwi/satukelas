<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Auth\Authorizable;

class Users extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'age',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */
    protected $hidden = [
        'id',
    ];

    public function insertDB($data)
    {
        return DB::table('users')
                    ->insertGetId($data);
    }

    public function updateDB($data, $id)
    {
        return DB::table('users')
                    ->where('id',$id)
                    ->update($data);
    }

    public function getUsers()
    {
        return DB::table('users')
                    ->select('id','name','age','createdAt')
                    ->where('status','1')
                    ->get()
                    ->all();
    }

    public function getUser($id)
    {
        return DB::table('users')
                    ->select('id','name','age','createdAt')
                    ->where('id',$id)
                    ->where('status','1')
                    ->get()
                    ->all();
    }

    public function deletePermanet($id)
    {
        return DB::table('users')
                    ->where('id',$id)
                    ->delete();
    }

}
