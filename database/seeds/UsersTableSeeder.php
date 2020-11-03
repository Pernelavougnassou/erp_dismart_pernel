<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('role_user')->truncate();

        $adminRole = Role::where('nom_role', 'admin')-> first();
        $clientRole = Role::where('nom_role', 'client')-> first();

        $admin = User::create([
            'nom' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        $client = User::create([
            'nom' => 'Client User',
            'email' => 'client@client.com',
            'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $client->roles()->attach($clientRole);
    }
}
