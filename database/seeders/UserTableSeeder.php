<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = User::whereRole('admin')->count();
        if ($count <= 0) {
            $user=User::create([
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@languagelad.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
            ]);
        }
    }
}
