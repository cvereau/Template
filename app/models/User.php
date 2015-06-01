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
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.id', 'roles.name', 'users.username','users.password','users.email','users.active', 'users.created_at')
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
        $matchingUser = User::where('id','=',$id)->first();

        return $matchingUser;
    }

    public function SaveUser($rawUser)
    {
        $existingUser = User::where('id','=', $rawUser['id'])->first();
        if (!$existingUser){
            $existingUser = new User;
        }
        $existingUser->username = $rawUser['username'];
        $existingUser->password = $rawUser['password'];
        $existingUser->role_id = $rawUser['rol'];
        $existingUser->email = $rawUser['email'];
        $existingUser->active = $rawUser['active'];
        $existingUser->save();
        return true;
    }

    public function DeleteUser($userId)
    {
        $deleteUser = User::where('id','=',$userId)->first();
        if($deleteUser){
            $deleteUser->delete();
            return true;
        }
        return false;
    }
}
