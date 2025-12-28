<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder{
    public function run():void{
        User::truncate();

        $adminRole = Role::where('name','admin')->first();
        $userRole = Role::where('name','user')->first();


        //Admin
        $admin = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@portal.pl',
        ]);
        $admin -> roles()->attach($adminRole);

        //Zwykli użytkownicy
        User::factory(200)->create()->each(function ($user) use ($userRole) {
            $user->roles()->attach($userRole);
        });
    }
}