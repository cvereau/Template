<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    /*
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');
    public function ValidateUser($username,$password){
        $matchingUser = User::where('username', '=', $username)->where('password','=', $password)->first();
        if($matchingUser){
            return $matchingUser;
        }
        else{
            return null;
        }
    }

    public function GetAllUsers()
    {
        $users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.role_id')
            ->join('sedes','users.sede_id','=','sedes.sede_id')
            ->select('users.user_id', 'roles.role_name', 'sedes.sede_name','users.username','users.password','users.email','users.active', 'users.created_at')
            ->get();

        return $users;
    }

    public function GetUserByUsername($username)
    {
        $matchingUser = User::where('username', '=', $username)->first();

        return $matchingUser;
    }

    public function GetUserById($id)
    {
        $matchingUser = User::where('user_id','=',$id)->first();

        return $matchingUser;
    }

    public function SaveUser($rawUser)
    {
        $existingUser = User::where('user_id','=', $rawUser['id'])->first();
        if (!$existingUser){
            $existingUser = new User;
        }
        $existingUser->username = $rawUser['username'];
        $existingUser->password = $rawUser['password'];
        $existingUser->role_id = $rawUser['rol'];
        $existingUser->sede_id = $rawUser['sede'];
        $existingUser->email = $rawUser['email'];
        $existingUser->active = $rawUser['active'];
        $existingUser->save();
        return true;
    }

    public function DeleteUser($userId)
    {
        $deleteUser = User::where('user_id','=',$userId)->first();
        if($deleteUser){
            $deleteUser->delete();
            return true;
        }
        return false;
    }
}
