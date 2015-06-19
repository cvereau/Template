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
    protected $table = 'Usuario';

    protected $primaryKey = 'usr_id';

    /*
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');
    public function ValidateUser($username,$password,$sede){
        $matchingUser = User::where('usr_username', '=', $username)->where('usr_password','=', $password)->where('sede_id','=', $sede)->first();
        if($matchingUser){
            return $matchingUser;
        }
        else{
            return null;
        }
    }

    public function GetAllUsers()
    {
        $users = DB::table('Usuario')
            ->join('Rol', 'Usuario.rol_id', '=', 'Rol.rol_id')
            ->join('Sede', 'Usuario.sede_id', '=', 'Sede.sede_id')
            ->select('Usuario.usr_id', 'Rol.rol_nombre', 'Sede.sede_nombre', 'Usuario.usr_username','Usuario.usr_password','Usuario.usr_email','Usuario.usr_active', 'Usuario.created_at')
            ->get();

        return $users;
    }

    public function GetUserByUsername($username)
    {
        $matchingUser = User::where('usr_username', '=', $username)->first();

        return $matchingUser;
    }

    public function GetUserById($id)
    {
        $matchingUser = User::where('usr_id','=',$id)->first();

        return $matchingUser;
    }

    public function SaveUser($rawUser)
    {
        $existingUser = User::where('usr_id','=', $rawUser['id'])->first();
        if (!$existingUser){
            $existingUser = new User;
        }
        $existingUser->usr_username = $rawUser['username'];
        $existingUser->usr_password = $rawUser['password'];
        $existingUser->rol_id = $rawUser['rol'];
        $existingUser->sede_id = $rawUser['sede'];
        $existingUser->usr_email = $rawUser['email'];
        $existingUser->usr_active = $rawUser['active'];
        $existingUser->save();
        return true;
    }

    public function DeleteUser($userId)
    {
        $deleteUser = User::where('usr_id','=',$userId)->first();
        if($deleteUser){
            $deleteUser->delete();
            return true;
        }
        return false;
    }
}
