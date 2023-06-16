<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =[
          [
              'name' =>'Administrator',
              'username' => 'admin',
              'password' =>bcrypt('123456'),
              'level' =>1,
              'email' =>'widiwaeoke@gmail.com'
          ],
          [
            'name' =>'pimpinan',
            'username' => 'pimpinan',
            'password' =>bcrypt('123456'),
            'level' =>2,
            'email' =>'widhitubel2018@gmail.com'
          ],
            [
                'name' =>'petugas',
                'username' => 'petugas',
                'password' =>bcrypt('123456'),
                'level' =>3,
                'email' =>'sulistyowidhi@gmail.com'
            ],
        ];
        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}
