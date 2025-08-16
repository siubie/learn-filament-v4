<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cityData = [
            'Alberta' => ['Calgary', 'Edmonton', 'Red Deer', 'Lethbridge', 'Medicine Hat'],
            'British Columbia' => ['Vancouver', 'Victoria', 'Surrey', 'Burnaby', 'Richmond'],
            'Manitoba' => ['Winnipeg', 'Brandon', 'Steinbach', 'Thompson', 'Portage la Prairie'],
            'New Brunswick' => ['Saint John', 'Moncton', 'Fredericton', 'Dieppe', 'Riverview'],
            'Newfoundland and Labrador' => ['St. John\'s', 'Corner Brook', 'Mount Pearl', 'Conception Bay South', 'Paradise'],
            'Northwest Territories' => ['Yellowknife', 'Hay River', 'Inuvik', 'Fort Smith', 'Behchokò'],
            'Nova Scotia' => ['Halifax', 'Cape Breton', 'Dartmouth', 'Truro', 'New Glasgow'],
            'Nunavut' => ['Iqaluit', 'Rankin Inlet', 'Arviat', 'Baker Lake', 'Cambridge Bay'],
            'Ontario' => ['Toronto', 'Ottawa', 'Hamilton', 'London', 'Windsor', 'Kitchener', 'Mississauga'],
            'Prince Edward Island' => ['Charlottetown', 'Summerside', 'Stratford', 'Cornwall', 'Montague'],
            'Quebec' => ['Montreal', 'Quebec City', 'Laval', 'Gatineau', 'Longueuil', 'Sherbrooke'],
            'Saskatchewan' => ['Saskatoon', 'Regina', 'Prince Albert', 'Moose Jaw', 'Swift Current'],
            'Yukon' => ['Whitehorse', 'Dawson City', 'Watson Lake', 'Haines Junction', 'Mayo'],
        ];

        foreach ($cityData as $provinceName => $cities) {
            $province = Province::where('name', $provinceName)->first();

            if ($province) {
                foreach ($cities as $cityName) {
                    City::create([
                        'province_id' => $province->id,
                        'name' => $cityName,
                    ]);
                }
            }
        }
    }
}
