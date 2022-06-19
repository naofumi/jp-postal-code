<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostalCode;

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
        //
        //
        $allData = [];
        $handle = fopen(base_path() . "/database/seed_data/KEN_ALL.CSV", "r");
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
        {
            $new_data = array_map(function($value) {
                                        return iconv('SJIS', 'UTF-8', $value);
                                    }, $data);
            echo 'reading ' . $new_data[2] . "\n";
            // 1000行読んだらDBにinsertする
            if (sizeof($allData) == 1000) {
                echo "##### insert into database #######\n";
                PostalCode::insert($allData);
                $allData = [];
            }
            array_push($allData, [
                'postal_code' => $new_data[2],
                'prefecture' => $new_data[6],
                'city' => $new_data[7],
                'street' => $new_data[8]
            ]);
        }
        // 残りをinsert
        PostalCode::insert($allData);
        fclose($handle);
    }
}
