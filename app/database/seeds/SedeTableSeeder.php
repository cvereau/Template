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
        DB::table('Sede')->delete();


        DB::table('Sede')->insert(array(
            array('sede_nombre'=>'Sede Surco','sede_responsable'=> 'Rafael Berrospi','sede_direccion'=>'Av. El Polo 251'),
            array('sede_nombre'=>'Sede Villa María','sede_responsable'=> 'Cesar Vereau','sede_direccion'=>'Calle 2 n°196 Urb.La Florida')
        ));
    }
}