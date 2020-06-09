<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->delete();
        DB::table('questions')->delete();
        DB::table('users')->delete();

        // $this->call(UserSeeder::class);
        //Create users, and for each user create 1 to 5 question(s)
        factory(\App\User::class, 3)->create()
            ->each(function ($u) {
                $u->questions()
                    ->saveMany(
                        factory(\App\Question::class, rand(1, 5))->make()
                    )
                    //For each question, create random number of answers between 1 and 5 answer(s)
                    ->each(function ($question) {
                        //make() - creates and return array of data, create() method save data to database
                        $question->answers()->saveMany(factory(\App\Answer::class, rand(1,5))->make());
                    });
            });
    }
}
