<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Item;
use App\Models\ItemTransaction;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Item::factory(15)->create();
        Account::insert(
            [
                [
                    'first_name' => 'admin',
                    'last_name' => 'admin',
                    'email' => 'admin@gmail.com',
                    'display_picture_link' => 'awikwok',
                    'password' => '$2y$10$fn7584CC9yvx.S9VM5ULbOFvueIcIN4UJOIFo/ECkkFZYvFySRcrK', //123
                    'role_id' => 2,
                    'gender_id' => 2
                ],
                [
                    'first_name' => 'user',
                    'last_name' => 'user',
                    'email' => 'user@gmail.com',
                    'display_picture_link' => 'awikwok',
                    'password' => '$2y$10$fn7584CC9yvx.S9VM5ULbOFvueIcIN4UJOIFo/ECkkFZYvFySRcrK', //123
                    'role_id' => 1,
                    'gender_id' => 1
                ],
            ]
        );
        Role::insert(
            [
                [
                    'role_id' => 1,
                    'role_name' => 'user'
                ],
                [
                    'role_id' => 2,
                    'role_name' => 'admin'
                ]
            ]
        );
        Gender::insert(
            [
                [
                    'gender_id' => 1,
                    'gender_desc' => 'male'
                ],
                [
                    'gender_id' => 2,
                    'gender_desc' => 'female'
                ]
            ]
        );
        ItemTransaction::insert(
            [
                [
                    'item_id' => 1,
                    'account_id'=>1,
                    'quantity' =>3,
                ],
                [
                    'item_id' => 1,
                    'account_id'=>1,
                    'quantity' =>5,
                ],
                [
                    'item_id' => 7,
                    'account_id'=>1,
                    'quantity' =>6,
                ],
            ]
        );
    }
}
