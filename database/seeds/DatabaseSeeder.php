<?php

use Illuminate\Database\Seeder;
use Illuminate\Datebase\Migrations;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('ToDoTableSeeder');

        $this->command->info('ToDo table seeded!');
    }
}

class ToDoTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ToDo')->delete();

	for($i=0 ;  $i<10 ; $i++){
        DB::table('ToDo')->insertGetId([
            'todo' => str_random(10),
            'flug' => 'false',
        ]);
	}
    }

}
