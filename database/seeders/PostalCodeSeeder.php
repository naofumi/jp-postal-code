<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostalCode;

class PostalCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataStash = []; // バッチでinsertするための一時保存場所
        $handle = fopen(base_path() . "/database/seed_data/KEN_ALL.CSV", "r");
        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE)
        {
            $utf8Row = array_map(function($value) {
                                        return iconv('SJIS', 'UTF-8', $value);
                                    }, $row);
            echo 'reading postal code: ' . $utf8Row[2] . "\n";
            // 1000行読んだらDBにinsertする
            if (sizeof($dataStash) == 1000) {
                echo "##### inserting 1000 entries into database #######\n";
                PostalCode::insert($dataStash);
                $dataStash = [];
            }
            array_push($dataStash, [
                'postal_code' => $utf8Row[2],
                'prefecture' => $utf8Row[6],
                'city' => $utf8Row[7],
                'street' => $utf8Row[8]
            ]);
        }
        // 残りをinsert
        echo "##### inserting remaining " . sizeof($dataStash) . " entries into database #######\n";
        PostalCode::insert($dataStash);
        fclose($handle);
        echo "##### Success #####";
    }
}
