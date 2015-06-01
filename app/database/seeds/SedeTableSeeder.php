<?php
/**
 * Created by PhpStorm.
 * User: cvereau
 * Date: 01/06/2015
 * Time: 03:25 PM
 */

class SedeTableSeeder extends Seeder{

    public function run()
    {
        DB::table('sedes')->delete();


        DB::table('sedes')->insert(array(
            array('name'=>'Sede Surco','responsible'=> 'Rafael Berrospi','location'=>'Av. El polo 251'),
            array('name'=>'Sede Villa María','responsible'=> 'Cesar Vereau','location'=>'Calle 2 n°196 Urb.La Florida')
        ));
    }
}