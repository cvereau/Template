<?php

class Role extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    public function GetAllRoles()
    {
        //we get all the users from the database
        $roles = Role::all();
        //return the list of roles
        return $roles;
    }
}
