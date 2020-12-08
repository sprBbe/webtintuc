<?php

namespace Database\Seeders;

use App\Models\TinTuc;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TinTucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i<10; $i++){
            $tieude = $faker->realText(80, 2);
            $tieudekhongdau = changeTitle($tieude);
        $tintucs[] =
            [
                'TieuDe' => $tieude,
                'TieuDeKhongDau' => $tieudekhongdau,
                'idLoaiTin' => rand(1, 37),
                'TomTat' => $faker->realText(125, 2),
                'NoiDung' => $faker->realText(2000, 2) .
                    "<br/><br/><img src='upload/tintuc/bo-hinh-nen-chat-luong-cao-" . rand(1, 101) . ".jpg' alt='IMG ERROR!' style='max-width: 100%;
                height: auto;'><br/><br/>" .
                    $faker->realText(2000, 2),
                'NoiBat' => rand(0, 1),
                'SoLuotXem' => rand(100, 1000),
                'Hinh' => "bo-hinh-nen-chat-luong-cao-" . rand(1, 101) . ".jpg",
            ];
        }
            foreach ($tintucs as $tintuc) {
                TinTuc::create($tintuc);
            }


    }
}
