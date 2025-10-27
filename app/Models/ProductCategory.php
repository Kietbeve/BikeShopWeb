<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class ProductCategory extends Model
    {
        protected $table = 'danhmucsanpham'; // Tên bảng trong cơ sở dữ liệu
        protected $fillable = ['madm','tendm','malsp'];

        // hàm kiểm tra danh muc có tồn tại
        public function checkCategory($madm){
            return self::where('madm', $madm)->exists();
        }

        // hàm lấy tất cả danh mục
        public function getAllCategory(){
            return self::all();
        }
        //thêm danh muc mới
        public function addNewCategory(){
            return self::create();
        }
    }

?>