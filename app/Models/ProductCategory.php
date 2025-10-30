<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class ProductCategory extends Model
    {
        protected $table = 'danhmucsanpham'; // Tên bảng trong cơ sở dữ liệu
        protected $fillable = ['madm','tendm','malsp'];

        public static function MadmAuto($malsp){            
            switch ($malsp) {
                case 1:
                    $TienTo = 'XD'; // xe đạp
                    break;
                case 2:
                    $TienTo = 'PT'; // phụ tùng
                    break;
                case 3:
                    $TienTo = 'PK'; // phụ kiện
                    break;
                default:
                    $TienTo = 'SP'; // mặc định
                    break;
            }
            $count = self::where('malsp', $malsp)->count();
            return $TienTo($count + 1);
        }
        

        // hàm kiểm tra danh muc có tồn tại
        public static function checkCategory($madm){
            return self::where('madm', $madm)->exists();
        }

        // hàm lấy tất cả danh mục
        public static function getAllCategory(){
            return self::all();
        }
        //thêm danh muc mới
        public static function addNewCategory(){
            return self::create();
        }
    }

?>