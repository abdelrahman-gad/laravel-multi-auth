<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
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
        $adminRole = Role::where('name','admin')->first();
        $userRole = Role::where('name','user')->first();
        $authorRole = Role::where('name','author')->first();
       
        $admin= User::create( [
            'name' => 'Admin User',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('adminadmin')
        ]);
        $author= User::create( [
            'name' => 'Author User',
            'email'=>'author@gmail.com',
            'password'=>Hash::make('password')
        ]);   
        $user= User::create( [
            'name' => 'Generic User',
            'email'=>'user@gmail.com',
            'password'=>Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);

    }
}
