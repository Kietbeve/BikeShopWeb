create table taikhoan(
	matk int IDENTITY(1,1) not null,
	maad int IDENTITY(1,1) not null,
	tentk nvarchar(50),
	matkhau varchar(10),
	primary key (matk)
)
create table khachhang(
	makh int IDENTITY(1,1) not null,
	matk int,
	tenkh nvarchar(50),
	ngaysinh datetime,
	sdt char(10),
	email nvarchar(50),
	primary key (makh),
	FOREIGN KEY (matk) REFERENCES taikhoan(matk),
	CONSTRAINT chk_sdt check (LEN(sdt) = 10 AND sdt NOT LIKE '%[^0-9]%'),
	CONSTRAINT chk_email check(email LIKE '%@%')
)
create table loaisanpham(
	malsp int IDENTITY(1,1) not null,
	tenlsp nvarchar(50),
	primary key (malsp)
)
create table nhasanxuat(
	mansx int not null,
	tennsx nvarchar(50),
	primary key (mansx)
)
create table sanpham(
	anh nvarchar(100), 
	masp int IDENTITY(1,1) not null,
	tensp nvarchar(50),
	malsp int,	
	mansx int,
	soluong int, 
	size char(3),
	kieusp nvarchar(50),
	mota text,
	dongianhap money,
	dongiaxuat money,
	trangthai char(1),
	primary key(masp),
	FOREIGN KEY (malsp) REFERENCES loaisanpham(malsp),
	FOREIGN KEY (mansx) REFERENCES nhasanxuat(mansx)
)
create table hoadon(
	mahd int not null,
	ngaylap datetime,
	tongtien money,
	primary key (mahd)
)
create table cthd(
	mahd int,
	masp int,
	makh int,
	soluong int,
	thanhtien money,
	primary key (mahd, masp),
	FOREIGN KEY (masp) REFERENCES sanpham(masp),
	FOREIGN KEY (mahd) REFERENCES hoadon(mahd),
	FOREIGN KEY (makh) REFERENCES khachhang(makh)
)
create table giohang(
	mahd int,
	masp int,
	soluong money,
	thanhtien money,
	primary key (mahd, masp),
	FOREIGN KEY (masp) REFERENCES sanpham(masp),
	FOREIGN KEY (mahd) REFERENCES hoadon(mahd)
)
create table lienhe(
	makh int,
	tieude nvarchar(150),
	noidung text,
	primary key(makh),
	FOREIGN KEY (makh) REFERENCES khachhang(makh),

)
