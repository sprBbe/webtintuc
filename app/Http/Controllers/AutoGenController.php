<?php

namespace App\Http\Controllers;

use App\Models\{TinTuc,LoaiTin,TheLoai};
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Cache;

class AutoGenController extends Controller
{
    public function autogen()
    {   
        $faker = Faker::create();
        for($i=1;$i<=10000;$i++){
            $tintuc = new TinTuc();
            $tintuc->TieuDe = $faker->realText(100,2);
            $tintuc->TieuDeKhongDau = changeTitle($tintuc->TieuDe);
            $tintuc->idLoaiTin = rand(1,37);
            $tintuc->TomTat = $faker->realText(140,2);
            $tintuc->NoiDung = $faker->realText(2000,2).
            "<br/><br/><img src='upload/tintuc/bo-hinh-nen-chat-luong-cao-".rand(1,101).".jpg' alt='IMG ERROR!' style='max-width: 100%;
            height: auto;'><br/><br/>".
            $faker->realText(2000,2);
            $tintuc->NoiBat = rand(0,1);
            $tintuc->SoLuotXem = rand(100,1000);
            $tintuc->Hinh="bo-hinh-nen-chat-luong-cao-".rand(1,101).".jpg"; 
            $tintuc->save();
            echo ('Thêm thành công!');}
        Cache::flush();
    }

}
