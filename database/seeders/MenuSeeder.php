<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;
use League\Csv\Reader;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $csvFile = database_path('seeders/Menus.csv');

        $csv = Reader::createFromPath($csvFile, 'r');
        $csv->setHeaderOffset(0);

        $records = $csv->getRecords();

        foreach ($records as $record) {
            MenuItem::create([
                'name' => $record['name'],
                'category' => $record['category'],
                'image' => $record['image'],
                'description' => $record['description'],
                'price' => $record['price'],
            ]);
        }
    }
}
