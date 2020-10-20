<?php

namespace App\Http\Controllers;

use App\Models\{TinTuc,LoaiTin,TheLoai};
use Illuminate\Http\Request;

class AutoGenController extends Controller
{
    public function autogen()
    {   
        for($i=1;$i<=100;$i++){
            $tintuc = new TinTuc();
            $tintuc->TieuDe = substr(file_get_contents('https://loripsum.net/api/1/short/plaintext'),0,65);
            $tintuc->TieuDeKhongDau = changeTitle($tintuc->TieuDe);
            $tintuc->idLoaiTin = rand(1,37);
            $tintuc->TomTat = substr(file_get_contents('https://loripsum.net/api/1/short/plaintext'),0,150);
            $tintuc->NoiDung = file_get_contents('https://loripsum.net/api/2/long/plaintext').
            "<br/><br/><img src='upload/tintuc/bo-hinh-nen-chat-luong-cao-".rand(1,101).".jpg' alt='IMG ERROR!' style='max-width: 100%;
            height: auto;'><br/><br/>".
            file_get_contents('https://loripsum.net/api/2/long/plaintext');
            $tintuc->NoiBat = rand(0,1);
            $tintuc->SoLuotXem = rand(100,1000);
            $tintuc->Hinh="bo-hinh-nen-chat-luong-cao-".rand(1,101).".jpg"; 
            $tintuc->save();
            echo ('Thêm thành công!');}
    }
}
