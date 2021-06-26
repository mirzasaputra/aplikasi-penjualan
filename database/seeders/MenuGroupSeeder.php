<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuGroup;
use Carbon\Carbon;

class MenuGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuGroup::insert([
            [
                'name' => 'Dashboards',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Applications',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Settings',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
