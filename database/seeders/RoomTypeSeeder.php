<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seed room type
        $roomTypes = [
            'Pria', 'Wanita', 'Campur'
        ];

        foreach ($roomTypes as $type) {
            \App\Models\RoomType::create([
                'type_name' => $type,
                'description' => 'Kamar ' . $type
            ]);
        }
    }
}
