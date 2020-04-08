<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert(
            [
                [
                    'name' => 'User #1',
                    'email' => 'user1@gmail.com',
                    'password' => Hash::make('password'),
                ],
                [
                    'name' => 'User #2',
                    'email' => 'user2@gmail.com',
                    'password' => Hash::make('password'),
                ],
                [
                    'name' => 'User #3',
                    'email' => 'user3@gmail.com',
                    'password' => Hash::make('password'),
                ],
                [
                    'name' => 'User #4',
                    'email' => 'user4@gmail.com',
                    'password' => Hash::make('password'),
                ],
                [
                    'name' => 'User #5',
                    'email' => 'user5@gmail.com',
                    'password' => Hash::make('password'),
                ]
            ]
        );
        DB::table('user_profiles')->insert(
            [
                [
                    'user_id' => 1,
                    'nickname' => 'abramoff',
                    'name' => 'Alex',
                    'surname' => 'Abramov',
                    'sex' => 'male',
                    'consent_to_receive_email' => false,
                ],
                [
                    'user_id' => 2,
                    'nickname' => 'JohnDoe',
                    'name' => 'John',
                    'surname' => 'Doe',
                    'sex' => 'male',
                    'consent_to_receive_email' => true,
                ],
                [
                    'user_id' => 3,
                    'nickname' => 'joMar',
                    'name' => 'Johny',
                    'surname' => 'Mar',
                    'sex' => 'male',
                    'consent_to_receive_email' => false,
                ],
                [
                    'user_id' => 4,
                    'nickname' => 'pupkin',
                    'name' => 'Vasiliy',
                    'surname' => 'Pupkin',
                    'sex' => 'male',
                    'consent_to_receive_email' => true,
                ],
                [
                    'user_id' => 5,
                    'nickname' => 'SerjGoodman',
                    'name' => 'Sergey',
                    'surname' => 'Sidorov',
                    'sex' => 'male',
                    'consent_to_receive_email' => false,
                ]
            ]
        );
    }
}
