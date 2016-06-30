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
        $this->call('QuestionsTableSeeder');

        $this->command->info('Questions table seeded!');	
    }
}

class QuestionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('Questions')->delete();
	
	for($i=0 ;  $i<10 ; $i++){
        DB::table('Questions')->insert([
            'id' => '0',
            'name' => str_random(10),
            'question' => str_random(10),
        ]);
	}
    }

}
