create database BikeShop

use BikeShop

--1. tài khoản: matk, maad, tentk, matkhau
create table taikhoan(
	matk int not null,
	maad int not null,
	tentk nvarchar(50),
	matkhau varchar(10),
	primary key (matk)
)

--2. khachhang: makh, matk, tenkh, ns, sdt, email, 
create table khachhang(
	makh int not null,
	matk int,
	tenkh nvarchar(50),
	ngaysinh datetime,
	sdt char(10),
	email nvarchar(50),
	primary key (makh),
	FOREIGN KEY (matk) REFERENCES taikhoan(matk)
)

--3. loại sản phẩm: malsp, tenlsp
create table loaisanpham(
	malsp int not null,
	tenlsp nvarchar(50),
	primary key (malsp)
)

--4. nhà sản xuất: mansx, tennsx 
create table nhasanxuat(
	mansx int not null,
	tennsx nvarchar(50),
	primary key (mansx)
)

--5. sản phẩm: masp, tensp, anh, mansx, malsp, soluong, size, mota, kieusp, dongianhap, dongiaxuat, trangthai
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

--6. hóa đơn: mahd, ngaylap, tongtien
create table hoadon(
	mahd int not null,
	ngaylap datetime,
	tongtien money,
	primary key (mahd)
)

--7. cthd: mahd, masp, makh, sl, dongia, thanhtien
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

--8. giỏ hàng:  mahd, masp, sl, thanhtien
create table giohang(
	mahd int,
	masp int,
	soluong money,
	thanhtien money,
	primary key (mahd, masp),
	FOREIGN KEY (masp) REFERENCES sanpham(masp),
	FOREIGN KEY (mahd) REFERENCES hoadon(mahd)
)
