<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SeedFakeData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Storage::deleteDirectory(config('custompath.avatars'));
        Storage::deleteDirectory(config('custompath.domains'));
        Storage::deleteDirectory(config('custompath.providers'));

        $me = App\User::create(
            [
                'name' => env('DEMOUSER', 'Demo'),
                'email' => env('DEMOEMAIL', 'demouser@example.com'),
                'password' => bcrypt(env('DEMOPASS', 'password')),
                'is_verified' => 1,
                'role' => config('userrole.admin'),
            ]
        );

        $users = factory(App\User::class, 9)->create([
            'password' => bcrypt(env('DEMOPASS', 'password')),
        ]);

        $users->push($me);

        //$users = $me;

        $users->each(function($user){
            $customers = factory(App\Customer::class, 6)->create([
                'user_id' => $user->id
            ]);

            $providers = factory(App\Providers::class, 5)->create([
                'user_id' => $user->id
            ]);
            factory(App\Domains::class, 10)->create([
                'customer_id' => collect($customers)->random()->id,
                'domain_id' => collect($providers)->random()->id,
                'hosting_id' => collect($providers)->random()->id,
                'user_id' => $user->id
            ]);
        });
    }
}
