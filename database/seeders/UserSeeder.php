<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array('u_id' => '1','name' => 'Ashen Udithamal','email' => 'udithamal.lk@gmail.com','email_verified_at' => NULL,'username' => 'ashen','password' => bcrypt(123),'remember_token' => NULL,'deleted_at' => NULL,'created_at' => '2021-07-31 00:04:09','updated_at' => '2021-07-31 00:04:09'),
            array('u_id' => '2','name' => 'Charith Abeysinghe','email' => 'cpclans@gmail.com','email_verified_at' => NULL,'username' => 'charith','password' => bcrypt(123),'remember_token' => NULL,'deleted_at' => NULL,'created_at' => '2021-08-02 00:04:09','updated_at' => '2021-08-02 00:04:09')
        );

        User::insert($users);
    }
}
