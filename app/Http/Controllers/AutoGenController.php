<?php

namespace App\Http\Controllers;

use App\Models\{TinTuc,LoaiTin,TheLoai};
use Illuminate\Http\Request;

class AutoGenController extends Controller
{
    public function autogen()
    {   
        for($i=1;$i<=10;$i++){
        $tintuc = new TinTuc();
        $tintuc->TieuDe = "Lorem ipsum dolor sit amet, adipiscing elit. Morbi porta, id consectetur pharetra libero.";
        $tintuc->TieuDeKhongDau = changeTitle($tintuc->TieuDe);
        $tintuc->idLoaiTin = rand(1,37);
        $tintuc->TomTat = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta ipsum at nisl tincidunt vestibulum. Sed faucibus libero et condimentum malesuada. Praesent vel lacus dictum.";
        $tintuc->NoiDung = "<p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce et molestie augue. Nulla congue pharetra feugiat. Duis accumsan imperdiet hendrerit. Nulla lectus augue, facilisis vel dignissim vel, mattis sit amet neque. Donec elementum velit nisi, vitae tempus ipsum finibus quis. Cras velit ipsum, sagittis id neque sed, ultrices tempus lorem. Pellentesque feugiat, nunc placerat tempor dapibus, elit urna gravida augue, eget feugiat nulla erat sit amet est. Pellentesque tempor arcu gravida nibh finibus sagittis.
        </p>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur quam mi, aliquam nec fermentum vel, vulputate id nulla. Fusce ac urna consequat, facilisis quam vel, auctor justo. In non leo ac ipsum fermentum feugiat. Etiam pharetra leo id justo dignissim, vel accumsan orci consectetur. Quisque sed eros viverra, vehicula purus sed, fermentum neque. Maecenas sollicitudin mi libero, ac viverra enim gravida cursus. Duis id bibendum sapien. Ut leo dolor, commodo eu facilisis ut, malesuada non metus. Maecenas vel ullamcorper magna. Phasellus pharetra neque at ultricies mollis.
        </p>
        <img src='upload/tintuc/8.jpg' alt='IMG ERROR!'><br/>
        Phasellus non mi et ligula molestie bibendum ac eget lectus. Fusce at turpis id mi posuere volutpat. Etiam efficitur commodo turpis eu posuere. Cras id libero molestie, feugiat enim et, sodales mauris. Nam pulvinar nulla quis diam congue suscipit. Ut pharetra vestibulum elit at porttitor. Suspendisse nec fermentum dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
        </p>
        <p>Morbi quis felis nisl. Aliquam eget viverra ipsum. Vivamus sit amet orci mauris. Ut sed quam nunc. Quisque blandit est vel accumsan placerat. Curabitur eu eros eget justo condimentum tristique at eu sapien. Nunc feugiat risus sit amet mauris sodales, et euismod ligula vehicula. Sed pretium sodales ex, eu tristique sapien fermentum a. Morbi eu pulvinar elit, ac sodales justo. Praesent in tempor orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce.
        </p>";
        $tintuc->NoiBat = rand(0,1);
        $tintuc->SoLuotXem = rand(100,1000);
        $tintuc->Hinh="bbe.jpg"; 
        $tintuc->save();
        echo ('Thêm thành công!');}
    }
}
