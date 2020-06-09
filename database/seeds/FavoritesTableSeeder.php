<?php

use App\Question;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorites')->delete();

        //Get ids of all users
        $users = User::pluck('id')->all();
        $numberOfusers = count($users);

        //Make every single question to be favorited at least one user
        foreach (Question::all() as $question) {
            for ($i = 0; $i < rand(0, $numberOfusers); $i++) {
                $user = $users[$i];

                $question->favorites()->attach($user);;
            }
        }
    }
}
