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
        DB::table('Usuario')->delete();


        DB::table('Usuario')->insert(array(
            array('usr_username'=>'huadmin','rol_id'=> 1,'sede_id'=> 1,'usr_email'=>'james@gmail.com','usr_password'=> 'disolu12#', "usr_active" => true),
            array('usr_username'=>'testuser','rol_id'=> 2,'sede_id'=> 1,'usr_email'=>'stever@yahoo.com','usr_password'=> 'test', "usr_active" => true)
        ));
    }
}