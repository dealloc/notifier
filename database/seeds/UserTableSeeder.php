<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = (new User)->create([
            'name'     => 'Administrator',
            'email'    => 'admin@notifier.info',
            'password' => bcrypt('secret'),
        ]);
    }
}
