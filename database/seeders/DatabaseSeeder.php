<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'first_name' => 'Emily',
            'last_name' => 'Smith',
            'image' => 'https://plus.unsplash.com/premium_vector-1682269284255-8209b981c625?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'email' => 'emily.smith@example.com',
        ]);

        User::factory(10)->create();
        $this->call(ProductSeeder::class);
    }
}
