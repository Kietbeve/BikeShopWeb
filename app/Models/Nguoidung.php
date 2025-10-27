<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;//sd hash

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nguoidung extends Model
{
        protected $table = 'nguoidung'; // Tên bảng trong cơ sở dữ liệu
        protected $fillable = ['tennd','taikhoan', 'matkhau','chucvu'];

        public function checkInputLogin($taikhoan, $matkhau){
            self::select('tennd','chucvu')
                    ->where('taikhoan', $taikhoan)
                    ->where('matkhau', $matkhau)
                    ->first();                    
        }
        //NgayTao: 27/10/25 NguoiTao: TuanKiet
        //static de goi Model::phuongthuc
        //trangthai: da chay dc ms mat khau ma hoa 123
        //chuoi mk da ma hoa: '$2y$10$b7bguMrZOkFMCQDaE4WrWu4Aj5YRiT4s4mgtw9wg7AqkzQ1KqyiG.'
        public static function checkLogin($taikhoan, $matkhau){
                $admin=self::select('tennd','chucvu','matkhau')
                    ->where('taikhoan', $taikhoan)
                    ->first(); 
                if($admin && Hash::check($matkhau,$admin->matkhau) && $admin->chucvu=='admin'){
                        return $admin;
                }
                return null;
        }
}
