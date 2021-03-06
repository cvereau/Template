<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Eloquent::unguard();

        $this->call('SedeTableSeeder');
        $this->call('RoleTableSeeder');
        $this->call('UserTableSeeder');

        $this->command->info('Tables seeded!');
	}

}
