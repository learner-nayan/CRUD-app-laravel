<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $user = User::where('email', 'nayan@dada')->first();
//        if(!$user){
//            $user = [
//                'name'=> "nayan",
//                'email'=>"nayan@dada",
//                'password'=>"Hello@3720"
//            ];
//            User::create($user);
//        }else{
//            $user->isAdmin = true;
//            $user->update();
//        }

        User::updateOrCreate(
            ['email'=>'nayan@dada'],
            [
                'name'=>'nayan dada',
                'password'=>bcrypt('Hello@3720'),
                'isAdmin'=>true
            ]
        );
    }
}
