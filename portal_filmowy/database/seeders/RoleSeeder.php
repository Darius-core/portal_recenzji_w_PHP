<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder{
    public function run(): void
    {
        // 1. Wyłącz sprawdzanie kluczy obcych
        Schema::disableForeignKeyConstraints();

        // 3. Włącz sprawdzanie kluczy obcych z powrotem
        Schema::enableForeignKeyConstraints();

        // 4. Stwórz rekordy
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
    }
}