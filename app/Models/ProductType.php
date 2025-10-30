<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class ProductType extends Model
    {
        protected $table = 'loaisanpham'; // Tên bảng trong cơ sở dữ liệu
        protected $fillable = ['malsp','tenlsp'];

        // hàm kiểm tra danh muc có tồn tại
        public static function checkType($malsp){
            return self::where('malsp', $malsp)->exists();
        }
        // hàm lấy tất cả danh mục
        public static function getAllType(){
            return self::all();
        }
        //thêm danh muc mới
        public static function addNewType(){
            return self::create();
        }
    }

?>