<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// thuoc tinh cua table sanpham trong db
    class Product extends Model
    {
        protected $table = 'sanpham'; // Tên bảng trong cơ sở dữ liệu
        protected $fillable = ['anh','masp','tensp', 'madm', 'mansx','soluong', 'size','mota', 'giaban', 'trangthai', 'tags'];
        public $timestamps = false;
        // app/Models/Product.php
        public function danhmuc()
        {
            return $this->belongsTo(ProductCategory::class, 'madm', 'madm');
        }

        // HÀM LẤY SẢN PHẨM THEO MÃ LOẠI (ví dụ: malsp = 1 là bicycle)
        // return self::with(['danhmuc' => function ($query) {
        //     $query->select('madm', 'malsp', 'tendm');
        // }])
        // ->whereHas('danhmuc', function ($query) use ($malsp) {
        //     $query->where('malsp', $malsp);
        // })
        // ->select('masp', 'tensp', 'giaban', 'anh', 'madm')
        // ->get();
        public static function getByLoai($malsp)
        {
            return self::with('danhmuc')
                ->whereHas('danhmuc', function ($query) use ($malsp) {
                    $query->where('malsp', $malsp);
                })
                ->select('madm')
                ->get();
        }

        public static function getByMadm($madm)
        {
            return self::where('madm', $madm)->select('masp')->get();// có thể thêm thuộc tính hiển thị vào select
        }
    
        // Lấy tất cả sản phẩm
        public static function getAllProducts()
        {
            return self::all();
        }

        // Kiểm tra sản phẩm tồn tại
        public static function checkProduct($masp)
        {
            return self::where('masp', $masp)->exists();
        }

        // Kiểm tra danh mục có tồn tại trong bảng sản phẩm
        public static function checkCategory($madm)
        {
            return self::where('madm', $madm)->exists();
        }

        // Thêm sản phẩm mới
        public static function addNewProduct(array $data)
        {
            return self::create($data);
        }
    }


?>