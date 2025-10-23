<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// thuoc tinh cua table sanpham trong db
    class Product extends Model
    {
        protected $table = 'sanpham'; // Tên bảng trong cơ sở dữ liệu
        protected $fillable = ['anh','masp','tensp', 'madm', 'mansx','soluong', 'size','mota', 'giaban', 'trangthai', 'tags'];

        // app/Models/Product.php
        public function danhmuc()
        {
            return $this->belongsTo(ProductCategory::class, 'madm', 'madm');
        }

    }

?>