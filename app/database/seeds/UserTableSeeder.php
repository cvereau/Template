<?php
/**
 * Created by PhpStorm.
 * User: cvereau
 * Date: 5/3/15
 * Time: 12:04 PM
 */

class UserTableSeeder extends Seeder{

    public function run()
    {
        DB::table('users')->delete();


        DB::table('users')->insert(array(
            array('username'=>'huadmin','role_id'=> 1,'sede_id'=> 1,'email'=>'james@gmail.com','password'=> 'disolu12#', "active" => true),
            array('username'=>'testuser','role_id'=> 2,'sede_id'=> 1,'email'=>'stever@yahoo.com','password'=> 'test', "active" => true)
        ));
    }
}