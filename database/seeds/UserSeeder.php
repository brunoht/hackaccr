<?php

use App\Services\SeederService;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SeederService::seed(App\User::class, 'mobile', [
            [
                "name" => "Bruno",
                "mobile" => "47992055398",
            ],
            [
                "name" => "Client",
                "email" => "client",
                "mobile" => "1199999999",
            ],
        ]);
    }
}
