<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Dictionary;

class DictionariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach($users as $user) {
            $defined_keywords = factory(Dictionary::class, 10)->make();

            foreach($defined_keywords as $keyword) {
                $user->dictionaries()->save($keyword);
            }
        }
    }
}
