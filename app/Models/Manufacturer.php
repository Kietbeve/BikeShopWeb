<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class Manufacturer extends Model
    {
        protected $table = 'nhasanxuat'; // Tên bảng trong cơ sở dữ liệu
        protected $fillable = ['mansx','tennsx','sdt','email','diachi'];

        // hàm lấy tất cả nsx
        public static function getAllManufacturer(){
            return self::all();
        }
        
    }

?>