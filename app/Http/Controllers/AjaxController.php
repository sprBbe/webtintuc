<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{LoaiTin, TheLoai};
use Illuminate\Support\Facades\Cache;

class AjaxController extends Controller
{
    public $minutes = 2000*60;
    public function getLoaiTin($idTheLoai)
    {
        if (Cache::has('ajax_loaitin'.$idTheLoai)) {
            $loaitin = Cache::get('ajax_loaitin');
        }
        else {
            $loaitin = LoaiTin::where('idTheLoai',$idTheLoai)->get();
            Cache::put('ajax_loaitin'.$idTheLoai, $loaitin , $this->minutes);
        }
        foreach ($loaitin as $lt) {
            echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
        }
    }
}
