<?php

use App\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = array(
            array('id' => '1', 'code' => '11', 'name' => 'Aceh'),
            array('id' => '2', 'code' => '12', 'name' => 'Sumatera Utara'),
            array('id' => '3', 'code' => '13', 'name' => 'Sumatera Barat'),
            array('id' => '4', 'code' => '14', 'name' => 'Riau'),
            array('id' => '5', 'code' => '15', 'name' => 'Jambi'),
            array('id' => '6', 'code' => '16', 'name' => 'Sumatera Selatan'),
            array('id' => '7', 'code' => '17', 'name' => 'Bengkulu'),
            array('id' => '8', 'code' => '18', 'name' => 'Lampung'),
            array('id' => '9', 'code' => '19', 'name' => 'Kepulauan Bangka Belitung'),
            array('id' => '10', 'code' => '21', 'name' => 'Kepulauan Riau'),
            array('id' => '11', 'code' => '31', 'name' => 'Dki Jakarta'),
            array('id' => '12', 'code' => '32', 'name' => 'Jawa Barat'),
            array('id' => '13', 'code' => '33', 'name' => 'Jawa Tengah'),
            array('id' => '14', 'code' => '34', 'name' => 'Daerah Istimewa Yogyakarta'),
            array('id' => '15', 'code' => '35', 'name' => 'Jawa Timur'),
            array('id' => '16', 'code' => '36', 'name' => 'Banten'),
            array('id' => '17', 'code' => '51', 'name' => 'Bali'),
            array('id' => '18', 'code' => '52', 'name' => 'Nusa Tenggara Barat'),
            array('id' => '19', 'code' => '53', 'name' => 'Nusa Tenggara Timur'),
            array('id' => '20', 'code' => '61', 'name' => 'Kalimantan Barat'),
            array('id' => '21', 'code' => '62', 'name' => 'Kalimantan Tengah'),
            array('id' => '22', 'code' => '63', 'name' => 'Kalimantan Selatan'),
            array('id' => '23', 'code' => '64', 'name' => 'Kalimantan Timur'),
            array('id' => '24', 'code' => '65', 'name' => 'Kalimantan Utara'),
            array('id' => '25', 'code' => '71', 'name' => 'Sulawesi Utara'),
            array('id' => '26', 'code' => '72', 'name' => 'Sulawesi Tengah'),
            array('id' => '27', 'code' => '73', 'name' => 'Sulawesi Selatan'),
            array('id' => '28', 'code' => '74', 'name' => 'Sulawesi Tenggara'),
            array('id' => '29', 'code' => '75', 'name' => 'Gorontalo'),
            array('id' => '30', 'code' => '76', 'name' => 'Sulawesi Barat'),
            array('id' => '31', 'code' => '81', 'name' => 'Maluku'),
            array('id' => '32', 'code' => '82', 'name' => 'Maluku Utara'),
            array('id' => '33', 'code' => '91', 'name' => 'P A P U A'),
            array('id' => '34', 'code' => '92', 'name' => 'Papua Barat')
        );

        if (is_array($provinces) && count($provinces)) {
            Province::query()->insert($provinces);
        }
    }
}
