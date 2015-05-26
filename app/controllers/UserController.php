<?php

class UserController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('users.index');
    }

    public function getAllUsers()
    {
        //we get all the users from the database
        $users = User::all();
        $test = User::with('role')->find(3)->role;
        //return the list of users in json
        return Response::json(array(
            'error' => false,
            'users' => $users->toArray(),
            'user' => $test
        ),
        200
        )->setCallback(Input::get('callback'));
    }


}
