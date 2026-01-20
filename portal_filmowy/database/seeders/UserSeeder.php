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

        /* ======================
           KONTA TESTOWE (LOGOWALNE)
        ====================== */
        //Admin
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@portal.pl',
            'password' => Hash::make('admin123'),
            'is_active' => true,
        ]);
        $admin -> roles()->attach($adminRole);

        //Użytkownik 1
        $user1 = User::create([
            'name' => 'Jan Kowalski',
            'email' => 'jan@portal.pl',
            'password' => Hash::make('user123'),
            'is_active' => true,
        ]);
        $user1->roles()->attach($userRole);

        //Użytkownik 2
        $user2 = User::create([
            'name' => 'Anna Nowak',
            'email' => 'anna@portal.pl',
            'password' => Hash::make('user123'),
            'is_active' => true,
        ]);
        $user2->roles()->attach($userRole);


        /* ===========================
           ZWYKLI LOSOWI UŻYTKOWNICY
        ============================== */
        User::factory(100)->create()->each(function ($user) use ($userRole) {
            $user->roles()->attach($userRole);
        });
    }
}