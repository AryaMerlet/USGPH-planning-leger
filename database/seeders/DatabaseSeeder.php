<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Silber\Bouncer\BouncerFacade as Bouncer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::firstOrCreate([
            'first_name' => 'Martin',
            'last_name' => 'Dupont',
            'email' => 'martin.dupont@usgph.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        Bouncer::assign('salarie')->to($user);

        $user2 = User::firstOrCreate([
            'first_name' => 'Lucas',
            'last_name' => 'Leroy',
            'email' => 'lucas.leroy@usgph.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        Bouncer::assign('salarie')->to($user2);

        $user3 = User::firstOrCreate([
            'first_name' => 'Alexandre',
            'last_name' => 'Moreau',
            'email' => 'alexandre.moreau@usgph.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        Bouncer::assign('salarie')->to($user3);

        $admin = User::firstOrCreate([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin.admin@usgph.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        Bouncer::assign('admin')->to($admin);

        $this->call([
            LieuSeeder::class,
            CategorieSeeder::class,
            TacheSeeder::class,
            PlanningSeeder::class,
            ArchiveSeeder::class,
            MotifSeeder::class,
        ]);
    }
}
