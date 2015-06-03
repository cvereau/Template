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
            array('sede_name'=>'Sede Surco','sede_responsible'=> 'Rafael Berrospi','sede_location'=>'Av. El polo 251'),
            array('sede_name'=>'Sede Villa María','sede_responsible'=> 'Cesar Vereau','sede_location'=>'Calle 2 n°196 Urb.La Florida')
        ));
    }
}