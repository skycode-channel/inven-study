<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companys')->insert([
            'initial' => 'SC-Channel',
            'description' => 'SkyCode - Channel adalah perusahaan yang bergerak dibidang software',
            'name' => 'SkyCode - Channel',
            'address' => 'Jl KH. Agussalim no 12 - Kota Bekasi',
            'province' => 'Jawa Barat',
            'city' => 'Bekasi',
            'postal_code' => '17755',
            'web' => 'skynets.my.id',
            'email' => 'admin@skynets.id',
            'telephone' => '021-298833-000',
            'fax' => '021-298833-001',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
