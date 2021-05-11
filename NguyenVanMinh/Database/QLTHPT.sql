USE [QLHocSinhTHPT]
GO
/****** Object:  Table [dbo].[DIEM]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[DIEM](
	[STT] [int] IDENTITY(1,1) NOT NULL,
	[MaHocSinh] [varchar](6) NOT NULL,
	[MaMonHoc] [varchar](6) NOT NULL,
	[MaHocKy] [varchar](3) NOT NULL,
	[MaNamHoc] [varchar](6) NOT NULL,
	[MaLop] [varchar](10) NOT NULL,
	[Diem] [float] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[STT] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[GIAOVIEN]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[GIAOVIEN](
	[MaGiaoVien] [varchar](6) NOT NULL,
	[TenGiaoVien] [nvarchar](30) NOT NULL,
	[DiaChi] [nvarchar](50) NOT NULL,
	[DienThoai] [varchar](15) NOT NULL,
	[MaMonHoc] [varchar](6) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[MaGiaoVien] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[HANHKIEM]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[HANHKIEM](
	[MaHanhKiem] [varchar](6) NOT NULL,
	[TenHanhKiem] [nvarchar](30) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[MaHanhKiem] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[HOCKY]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[HOCKY](
	[MaHocKy] [varchar](3) NOT NULL,
	[TenHocKy] [nvarchar](30) NOT NULL,
	[HeSo] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[MaHocKy] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[HOCLUC]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[HOCLUC](
	[MaHocLuc] [varchar](6) NOT NULL,
	[TenHocLuc] [nvarchar](30) NOT NULL,
	[DiemCanDuoi] [float] NOT NULL,
	[DiemCanTren] [float] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[MaHocLuc] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[HOCSINH]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[HOCSINH](
	[MaHocSinh] [varchar](6) NOT NULL,
	[HoTen] [nvarchar](30) NOT NULL,
	[GioiTinh] [bit] NULL,
	[NgaySinh] [datetime] NULL,
	[NoiSinh] [nvarchar](50) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[MaHocSinh] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[KETQUA]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[KETQUA](
	[MaKetQua] [varchar](6) NOT NULL,
	[TenKetQua] [nvarchar](30) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[MaKetQua] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[KQ_CA_NAM_TONG_HOP]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[KQ_CA_NAM_TONG_HOP](
	[MaHocSinh] [varchar](6) NOT NULL,
	[MaLop] [varchar](10) NOT NULL,
	[MaNamHoc] [varchar](6) NOT NULL,
	[MaHocLuc] [varchar](6) NOT NULL,
	[MaHanhKiem] [varchar](6) NOT NULL,
	[DTBCaNam] [float] NOT NULL,
	[MaKetQua] [varchar](6) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[MaHocSinh] ASC,
	[MaLop] ASC,
	[MaNamHoc] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[KQ_HOC_KY_TONG_HOP]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[KQ_HOC_KY_TONG_HOP](
	[MaHocSinh] [varchar](6) NOT NULL,
	[MaLop] [varchar](10) NOT NULL,
	[MaHocKy] [varchar](3) NOT NULL,
	[MaNamHoc] [varchar](6) NOT NULL,
	[MaHocLuc] [varchar](6) NOT NULL,
	[MaHanhKiem] [varchar](6) NOT NULL,
	[DTBMonHocKy] [float] NULL,
PRIMARY KEY CLUSTERED 
(
	[MaHocSinh] ASC,
	[MaHocKy] ASC,
	[MaLop] ASC,
	[MaNamHoc] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[KHOILOP]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[KHOILOP](
	[MaKhoiLop] [varchar](6) NOT NULL,
	[TenKhoiLop] [nvarchar](30) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[MaKhoiLop] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[LOAINGUOIDUNG]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[LOAINGUOIDUNG](
	[MaLoai] [varchar](6) NOT NULL,
	[TenLoaiND] [nvarchar](30) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[MaLoai] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[LOP]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[LOP](
	[MaLop] [varchar](10) NOT NULL,
	[TenLop] [nvarchar](30) NOT NULL,
	[MaKhoiLop] [varchar](6) NOT NULL,
	[MaNamHoc] [varchar](6) NOT NULL,
	[SiSo] [int] NOT NULL,
	[MaGiaoVien] [varchar](6) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[MaLop] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[MONHOC]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[MONHOC](
	[MaMonHoc] [varchar](6) NOT NULL,
	[TenMonHoc] [nvarchar](30) NOT NULL,
	[SoTiet] [int] NOT NULL,
	[HeSo] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[MaMonHoc] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[NAMHOC]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[NAMHOC](
	[MaNamHoc] [varchar](6) NOT NULL,
	[TenNamHoc] [varchar](30) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[MaNamHoc] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[NGUOIDUNG]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[NGUOIDUNG](
	[MaND] [varchar](6) NOT NULL,
	[MaLoai] [varchar](6) NOT NULL,
	[TenND] [nvarchar](30) NOT NULL,
	[TenDNhap] [varchar](30) NOT NULL,
	[MatKhau] [varchar](30) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[MaND] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[PHANCONG]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[PHANCONG](
	[STT] [int] IDENTITY(1,1) NOT NULL,
	[MaNamHoc] [varchar](6) NOT NULL,
	[MaLop] [varchar](10) NOT NULL,
	[MaMonHoc] [varchar](6) NOT NULL,
	[MaGiaoVien] [varchar](6) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[STT] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[PHANLOP]    Script Date: 5/9/2021 10:08:30 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[PHANLOP](
	[MaNamHoc] [varchar](6) NOT NULL,
	[MaKhoiLop] [varchar](6) NOT NULL,
	[MaLop] [varchar](10) NOT NULL,
	[MaHocSinh] [varchar](6) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[MaNamHoc] ASC,
	[MaKhoiLop] ASC,
	[MaLop] ASC,
	[MaHocSinh] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
INSERT [dbo].[GIAOVIEN] ([MaGiaoVien], [TenGiaoVien], [DiaChi], [DienThoai], [MaMonHoc]) VALUES (N'GV0001', N'Nguyen Hoang Anh', N'Tran Hung Dao, Ha Noi', N'0975058876', N'MH0001')
INSERT [dbo].[GIAOVIEN] ([MaGiaoVien], [TenGiaoVien], [DiaChi], [DienThoai], [MaMonHoc]) VALUES (N'GV0002', N'Phan Thi Huong', N'Que Vo, Bac Ninh', N'0976630315', N'MH0002')
INSERT [dbo].[GIAOVIEN] ([MaGiaoVien], [TenGiaoVien], [DiaChi], [DienThoai], [MaMonHoc]) VALUES (N'GV0003', N'Huynh Ha Ly', N'Yen Dung, Bac Giang', N'0699015456', N'MH0003')
INSERT [dbo].[GIAOVIEN] ([MaGiaoVien], [TenGiaoVien], [DiaChi], [DienThoai], [MaMonHoc]) VALUES (N'GV0004', N'Tran Van Toan', N'Nhu Ngoc, DongAnh', N'0845241566', N'MH0004')
INSERT [dbo].[GIAOVIEN] ([MaGiaoVien], [TenGiaoVien], [DiaChi], [DienThoai], [MaMonHoc]) VALUES (N'GV0005', N'Huynh Tuc Tri', N'Cau Giay, Ha Noi', N'0123456789', N'MH0005')
INSERT [dbo].[GIAOVIEN] ([MaGiaoVien], [TenGiaoVien], [DiaChi], [DienThoai], [MaMonHoc]) VALUES (N'GV0006', N'Le Thi Minh ', N' Tran Binh, Ha Nam', N'0123456789', N'MH0006')
GO
INSERT [dbo].[HANHKIEM] ([MaHanhKiem], [TenHanhKiem]) VALUES (N'HK0001', N'Tot')
INSERT [dbo].[HANHKIEM] ([MaHanhKiem], [TenHanhKiem]) VALUES (N'HK0002', N'Kha')
INSERT [dbo].[HANHKIEM] ([MaHanhKiem], [TenHanhKiem]) VALUES (N'HK0003', N'Trung binh')
INSERT [dbo].[HANHKIEM] ([MaHanhKiem], [TenHanhKiem]) VALUES (N'HK0004', N'Yeu')
GO
INSERT [dbo].[HOCKY] ([MaHocKy], [TenHocKy], [HeSo]) VALUES (N'HK1', N'Hoc ky 1', 1)
INSERT [dbo].[HOCKY] ([MaHocKy], [TenHocKy], [HeSo]) VALUES (N'HK2', N'Hoc ky 2', 2)
GO
INSERT [dbo].[HOCLUC] ([MaHocLuc], [TenHocLuc], [DiemCanDuoi], [DiemCanTren]) VALUES (N'HL0001', N'Gioi', 8, 10)
INSERT [dbo].[HOCLUC] ([MaHocLuc], [TenHocLuc], [DiemCanDuoi], [DiemCanTren]) VALUES (N'HL0002', N'Kha', 6.5, 7.9)
INSERT [dbo].[HOCLUC] ([MaHocLuc], [TenHocLuc], [DiemCanDuoi], [DiemCanTren]) VALUES (N'HL0003', N'Trung binh', 5, 6.4)
INSERT [dbo].[HOCLUC] ([MaHocLuc], [TenHocLuc], [DiemCanDuoi], [DiemCanTren]) VALUES (N'HL0004', N'Yeu', 3.5, 4.9)
INSERT [dbo].[HOCLUC] ([MaHocLuc], [TenHocLuc], [DiemCanDuoi], [DiemCanTren]) VALUES (N'HL0005', N'Kem', 0, 3.4)
GO
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0001', N'Nguyen Van Tu', 0, CAST(N'2005-01-02T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0002', N'Nguyen Van Tuan', 0, CAST(N'2005-02-03T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0003', N'Nguyen Van Tung', 0, CAST(N'2005-03-04T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0004', N'Nguyen Van Huy', 0, CAST(N'2005-04-05T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0005', N'Nguyen Thi Ha', 1, CAST(N'2005-05-06T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0006', N'Nguyen Thi Van', 1, CAST(N'2004-06-01T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0007', N'Nguyen Van Hung', 0, CAST(N'2004-07-03T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0008', N'Nguyen Van Anh', 0, CAST(N'2004-08-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0009', N'Nguyen Hong Nhung', 1, CAST(N'2004-09-08T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0010', N'Nguyen Tu Duyen', 1, CAST(N'2004-10-09T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0011', N'Nguyen Van Tuong', 0, CAST(N'2004-11-12T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0012', N'Nguyen Van Khanh', 0, CAST(N'2003-12-11T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0013', N'Nguyen Van Toan', 0, CAST(N'2003-12-06T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0014', N'Nguyen Thi Mai', 1, CAST(N'2003-11-05T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0015', N'Nguyen Thi Thu ', 1, CAST(N'2003-10-08T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0016', N'Nguyen Van Trung', 0, CAST(N'2003-12-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0017', N'Nguyen Van Tuy', 0, CAST(N'2003-11-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0018', N'Nguyen Van Nam', 0, CAST(N'2003-10-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0019', N'Nguyen Van Long', 0, CAST(N'2003-09-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0020', N'Nguyen Van Luan', 0, CAST(N'2003-08-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0021', N'Nguyen Van Huy', 0, CAST(N'2003-07-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0022', N'Nguyen Van Dao', 0, CAST(N'2003-06-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0023', N'Nguyen Van Doan', 0, CAST(N'2003-05-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0024', N'Nguyen Van Quang', 0, CAST(N'2003-05-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0025', N'Nguyen Van Quan', 0, CAST(N'2003-05-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0026', N'Nguyen Van Hai', 0, CAST(N'2003-05-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0027', N'Nguyen Van Huan', 0, CAST(N'2003-05-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0028', N'Nguyen Thi Hien', 1, CAST(N'2003-05-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0029', N'Nguyen Thi Oanh', 1, CAST(N'2003-12-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0030', N'Nguyen Thi Giang', 1, CAST(N'2003-11-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0031', N'Nguyen Thi Hoai', 1, CAST(N'2003-10-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0032', N'Nguyen Thi Lan', 1, CAST(N'2003-11-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0033', N'Nguyen Thi Ngoc', 1, CAST(N'2003-12-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0034', N'Nguyen Thi Nguyet', 1, CAST(N'2003-11-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0035', N'Nguyen Thi Tinh', 1, CAST(N'2003-10-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0036', N'Nguyen Thi Tuyet', 1, CAST(N'2003-11-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0037', N'Nguyen Thi Lam', 1, CAST(N'2003-12-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0038', N'Nguyen Van Cuong', 0, CAST(N'2003-11-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0039', N'Nguyen Van Hieu', 0, CAST(N'2003-10-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0040', N'Nguyen Van Duong', 0, CAST(N'2003-12-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0041', N'Nguyen Van Phan', 0, CAST(N'2003-11-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0042', N'Nguyen Van An', 0, CAST(N'2003-12-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0043', N'Nguyen Van Thuc', 0, CAST(N'2003-11-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0044', N'Nguyen Van Duc', 0, CAST(N'2003-11-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0045', N'Nguyen Van Long', 0, CAST(N'2003-11-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0046', N'Nguyen Van Dung', 0, CAST(N'2003-11-07T00:00:00.000' AS DateTime), N'Ha Noi')
INSERT [dbo].[HOCSINH] ([MaHocSinh], [HoTen], [GioiTinh], [NgaySinh], [NoiSinh]) VALUES (N'HS0047', N'Nguyen Van Quyet', 0, CAST(N'2003-05-07T00:00:00.000' AS DateTime), N'Ha Noi')
GO
INSERT [dbo].[KETQUA] ([MaKetQua], [TenKetQua]) VALUES (N'KQ0001', N'Len lop')
INSERT [dbo].[KETQUA] ([MaKetQua], [TenKetQua]) VALUES (N'KQ0002', N'Thi lai')
INSERT [dbo].[KETQUA] ([MaKetQua], [TenKetQua]) VALUES (N'KQ0003', N'Ren luyen he')
INSERT [dbo].[KETQUA] ([MaKetQua], [TenKetQua]) VALUES (N'KQ0004', N'O lai')
GO
INSERT [dbo].[KHOILOP] ([MaKhoiLop], [TenKhoiLop]) VALUES (N'KHOI10', N'Khoi 10')
INSERT [dbo].[KHOILOP] ([MaKhoiLop], [TenKhoiLop]) VALUES (N'KHOI11', N'Khoi 11')
INSERT [dbo].[KHOILOP] ([MaKhoiLop], [TenKhoiLop]) VALUES (N'KHOI12', N'Khoi 12')
GO
INSERT [dbo].[LOAINGUOIDUNG] ([MaLoai], [TenLoaiND]) VALUES (N'LND001', N'Ban giam hieu')
INSERT [dbo].[LOAINGUOIDUNG] ([MaLoai], [TenLoaiND]) VALUES (N'LND002', N'Giao vien')
GO
INSERT [dbo].[LOP] ([MaLop], [TenLop], [MaKhoiLop], [MaNamHoc], [SiSo], [MaGiaoVien]) VALUES (N'LOP1011920', N'10A1', N'KHOI10', N'NH1920', 39, N'GV0001')
INSERT [dbo].[LOP] ([MaLop], [TenLop], [MaKhoiLop], [MaNamHoc], [SiSo], [MaGiaoVien]) VALUES (N'LOP1012021', N'10A1', N'KHOI10', N'NH2021', 35, N'GV0006')
INSERT [dbo].[LOP] ([MaLop], [TenLop], [MaKhoiLop], [MaNamHoc], [SiSo], [MaGiaoVien]) VALUES (N'LOP1021920', N'10A2', N'KHOI10', N'NH1920', 38, N'GV0002')
INSERT [dbo].[LOP] ([MaLop], [TenLop], [MaKhoiLop], [MaNamHoc], [SiSo], [MaGiaoVien]) VALUES (N'LOP1022021', N'10A2', N'KHOI10', N'NH2021', 36, N'GV0005')
INSERT [dbo].[LOP] ([MaLop], [TenLop], [MaKhoiLop], [MaNamHoc], [SiSo], [MaGiaoVien]) VALUES (N'LOP1031920', N'10A3', N'KHOI10', N'NH1920', 35, N'GV0003')
INSERT [dbo].[LOP] ([MaLop], [TenLop], [MaKhoiLop], [MaNamHoc], [SiSo], [MaGiaoVien]) VALUES (N'LOP1032021', N'10A3', N'KHOI10', N'NH2021', 34, N'GV0004')
INSERT [dbo].[LOP] ([MaLop], [TenLop], [MaKhoiLop], [MaNamHoc], [SiSo], [MaGiaoVien]) VALUES (N'LOP1111920', N'11A1', N'KHOI11', N'NH1920', 40, N'GV0004')
INSERT [dbo].[LOP] ([MaLop], [TenLop], [MaKhoiLop], [MaNamHoc], [SiSo], [MaGiaoVien]) VALUES (N'LOP1112021', N'11A1', N'KHOI11', N'NH2021', 37, N'GV0003')
INSERT [dbo].[LOP] ([MaLop], [TenLop], [MaKhoiLop], [MaNamHoc], [SiSo], [MaGiaoVien]) VALUES (N'LOP1121920', N'11A2', N'KHOI11', N'NH1920', 38, N'GV0005')
INSERT [dbo].[LOP] ([MaLop], [TenLop], [MaKhoiLop], [MaNamHoc], [SiSo], [MaGiaoVien]) VALUES (N'LOP1122021', N'11A2', N'KHOI11', N'NH2021', 38, N'GV0002')
INSERT [dbo].[LOP] ([MaLop], [TenLop], [MaKhoiLop], [MaNamHoc], [SiSo], [MaGiaoVien]) VALUES (N'LOP1211920', N'12A1', N'KHOI12', N'NH1920', 38, N'GV0006')
INSERT [dbo].[LOP] ([MaLop], [TenLop], [MaKhoiLop], [MaNamHoc], [SiSo], [MaGiaoVien]) VALUES (N'LOP1212021', N'12A1', N'KHOI12', N'NH2021', 39, N'GV0001')
GO
INSERT [dbo].[MONHOC] ([MaMonHoc], [TenMonHoc], [SoTiet], [HeSo]) VALUES (N'MH0001', N'Toan Hoc', 90, 2)
INSERT [dbo].[MONHOC] ([MaMonHoc], [TenMonHoc], [SoTiet], [HeSo]) VALUES (N'MH0002', N'Vat Ly', 60, 1)
INSERT [dbo].[MONHOC] ([MaMonHoc], [TenMonHoc], [SoTiet], [HeSo]) VALUES (N'MH0003', N'Hoa Hoc', 60, 1)
INSERT [dbo].[MONHOC] ([MaMonHoc], [TenMonHoc], [SoTiet], [HeSo]) VALUES (N'MH0004', N'Sinh Hoc', 60, 1)
INSERT [dbo].[MONHOC] ([MaMonHoc], [TenMonHoc], [SoTiet], [HeSo]) VALUES (N'MH0005', N'Ngu Van', 90, 2)
INSERT [dbo].[MONHOC] ([MaMonHoc], [TenMonHoc], [SoTiet], [HeSo]) VALUES (N'MH0006', N'Lich Su', 45, 1)
GO
INSERT [dbo].[NAMHOC] ([MaNamHoc], [TenNamHoc]) VALUES (N'NH1920', N'2019 - 2020')
INSERT [dbo].[NAMHOC] ([MaNamHoc], [TenNamHoc]) VALUES (N'NH2021', N'2020 - 2021')
GO
INSERT [dbo].[NGUOIDUNG] ([MaND], [MaLoai], [TenND], [TenDNhap], [MatKhau]) VALUES (N'ND0001', N'LND001', N'Admin', N'admin', N'admin')
INSERT [dbo].[NGUOIDUNG] ([MaND], [MaLoai], [TenND], [TenDNhap], [MatKhau]) VALUES (N'ND0002', N'LND002', N'Nguyen Van Minh', N'gv', N'1')
GO
SET IDENTITY_INSERT [dbo].[PHANCONG] ON 

INSERT [dbo].[PHANCONG] ([STT], [MaNamHoc], [MaLop], [MaMonHoc], [MaGiaoVien]) VALUES (1, N'NH1920', N'LOP1011920', N'MH0001', N'GV0001')
INSERT [dbo].[PHANCONG] ([STT], [MaNamHoc], [MaLop], [MaMonHoc], [MaGiaoVien]) VALUES (2, N'NH1920', N'LOP1021920', N'MH0002', N'GV0002')
INSERT [dbo].[PHANCONG] ([STT], [MaNamHoc], [MaLop], [MaMonHoc], [MaGiaoVien]) VALUES (3, N'NH1920', N'LOP1211920', N'MH0003', N'GV0003')
INSERT [dbo].[PHANCONG] ([STT], [MaNamHoc], [MaLop], [MaMonHoc], [MaGiaoVien]) VALUES (4, N'NH1920', N'LOP1121920', N'MH0004', N'GV0004')
INSERT [dbo].[PHANCONG] ([STT], [MaNamHoc], [MaLop], [MaMonHoc], [MaGiaoVien]) VALUES (5, N'NH2021', N'LOP1012021', N'MH0005', N'GV0005')
INSERT [dbo].[PHANCONG] ([STT], [MaNamHoc], [MaLop], [MaMonHoc], [MaGiaoVien]) VALUES (6, N'NH2021', N'LOP1212021', N'MH0006', N'GV0006')
SET IDENTITY_INSERT [dbo].[PHANCONG] OFF
GO
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI10', N'LOP1011920', N'HS0001')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI10', N'LOP1011920', N'HS0002')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI10', N'LOP1011920', N'HS0003')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI10', N'LOP1011920', N'HS0004')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI10', N'LOP1011920', N'HS0005')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI10', N'LOP1011920', N'HS0006')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI10', N'LOP1011920', N'HS0007')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI10', N'LOP1011920', N'HS0008')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI10', N'LOP1011920', N'HS0009')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI10', N'LOP1011920', N'HS0010')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI11', N'LOP1111920', N'HS0021')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI11', N'LOP1111920', N'HS0022')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI11', N'LOP1111920', N'HS0023')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI11', N'LOP1111920', N'HS0024')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI11', N'LOP1111920', N'HS0025')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI11', N'LOP1111920', N'HS0026')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI11', N'LOP1111920', N'HS0027')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI11', N'LOP1111920', N'HS0028')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI11', N'LOP1111920', N'HS0029')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI11', N'LOP1111920', N'HS0030')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI12', N'LOP1211920', N'HS0041')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI12', N'LOP1211920', N'HS0042')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI12', N'LOP1211920', N'HS0043')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI12', N'LOP1211920', N'HS0044')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI12', N'LOP1211920', N'HS0045')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI12', N'LOP1211920', N'HS0046')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH1920', N'KHOI12', N'LOP1211920', N'HS0047')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI10', N'LOP1022021', N'HS0011')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI10', N'LOP1022021', N'HS0012')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI10', N'LOP1022021', N'HS0013')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI10', N'LOP1022021', N'HS0014')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI10', N'LOP1022021', N'HS0015')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI10', N'LOP1022021', N'HS0016')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI10', N'LOP1022021', N'HS0017')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI10', N'LOP1022021', N'HS0018')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI10', N'LOP1022021', N'HS0019')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI10', N'LOP1022021', N'HS0020')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI11', N'LOP1122021', N'HS0031')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI11', N'LOP1122021', N'HS0032')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI11', N'LOP1122021', N'HS0033')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI11', N'LOP1122021', N'HS0034')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI11', N'LOP1122021', N'HS0035')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI11', N'LOP1122021', N'HS0036')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI11', N'LOP1122021', N'HS0037')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI11', N'LOP1122021', N'HS0038')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI11', N'LOP1122021', N'HS0039')
INSERT [dbo].[PHANLOP] ([MaNamHoc], [MaKhoiLop], [MaLop], [MaHocSinh]) VALUES (N'NH2021', N'KHOI11', N'LOP1122021', N'HS0040')
GO
ALTER TABLE [dbo].[DIEM]  WITH CHECK ADD  CONSTRAINT [F_DIEM_HK] FOREIGN KEY([MaHocKy])
REFERENCES [dbo].[HOCKY] ([MaHocKy])
GO
ALTER TABLE [dbo].[DIEM] CHECK CONSTRAINT [F_DIEM_HK]
GO
ALTER TABLE [dbo].[DIEM]  WITH CHECK ADD  CONSTRAINT [F_DIEM_HS] FOREIGN KEY([MaHocSinh])
REFERENCES [dbo].[HOCSINH] ([MaHocSinh])
GO
ALTER TABLE [dbo].[DIEM] CHECK CONSTRAINT [F_DIEM_HS]
GO
ALTER TABLE [dbo].[DIEM]  WITH CHECK ADD  CONSTRAINT [F_DIEM_LOP] FOREIGN KEY([MaLop])
REFERENCES [dbo].[LOP] ([MaLop])
GO
ALTER TABLE [dbo].[DIEM] CHECK CONSTRAINT [F_DIEM_LOP]
GO
ALTER TABLE [dbo].[DIEM]  WITH CHECK ADD  CONSTRAINT [F_DIEM_MH] FOREIGN KEY([MaMonHoc])
REFERENCES [dbo].[MONHOC] ([MaMonHoc])
GO
ALTER TABLE [dbo].[DIEM] CHECK CONSTRAINT [F_DIEM_MH]
GO
ALTER TABLE [dbo].[DIEM]  WITH CHECK ADD  CONSTRAINT [F_DIEM_NH] FOREIGN KEY([MaNamHoc])
REFERENCES [dbo].[NAMHOC] ([MaNamHoc])
GO
ALTER TABLE [dbo].[DIEM] CHECK CONSTRAINT [F_DIEM_NH]
GO
ALTER TABLE [dbo].[GIAOVIEN]  WITH CHECK ADD  CONSTRAINT [F_GV_MH] FOREIGN KEY([MaMonHoc])
REFERENCES [dbo].[MONHOC] ([MaMonHoc])
GO
ALTER TABLE [dbo].[GIAOVIEN] CHECK CONSTRAINT [F_GV_MH]
GO
ALTER TABLE [dbo].[KQ_CA_NAM_TONG_HOP]  WITH CHECK ADD  CONSTRAINT [F_KQCN_HKIEM] FOREIGN KEY([MaHanhKiem])
REFERENCES [dbo].[HANHKIEM] ([MaHanhKiem])
GO
ALTER TABLE [dbo].[KQ_CA_NAM_TONG_HOP] CHECK CONSTRAINT [F_KQCN_HKIEM]
GO
ALTER TABLE [dbo].[KQ_CA_NAM_TONG_HOP]  WITH CHECK ADD  CONSTRAINT [F_KQCN_HL] FOREIGN KEY([MaHocLuc])
REFERENCES [dbo].[HOCLUC] ([MaHocLuc])
GO
ALTER TABLE [dbo].[KQ_CA_NAM_TONG_HOP] CHECK CONSTRAINT [F_KQCN_HL]
GO
ALTER TABLE [dbo].[KQ_CA_NAM_TONG_HOP]  WITH CHECK ADD  CONSTRAINT [F_KQCN_HS] FOREIGN KEY([MaHocSinh])
REFERENCES [dbo].[HOCSINH] ([MaHocSinh])
GO
ALTER TABLE [dbo].[KQ_CA_NAM_TONG_HOP] CHECK CONSTRAINT [F_KQCN_HS]
GO
ALTER TABLE [dbo].[KQ_CA_NAM_TONG_HOP]  WITH CHECK ADD  CONSTRAINT [F_KQCN_KQ] FOREIGN KEY([MaKetQua])
REFERENCES [dbo].[KETQUA] ([MaKetQua])
GO
ALTER TABLE [dbo].[KQ_CA_NAM_TONG_HOP] CHECK CONSTRAINT [F_KQCN_KQ]
GO
ALTER TABLE [dbo].[KQ_CA_NAM_TONG_HOP]  WITH CHECK ADD  CONSTRAINT [F_KQCN_LOP] FOREIGN KEY([MaLop])
REFERENCES [dbo].[LOP] ([MaLop])
GO
ALTER TABLE [dbo].[KQ_CA_NAM_TONG_HOP] CHECK CONSTRAINT [F_KQCN_LOP]
GO
ALTER TABLE [dbo].[KQ_CA_NAM_TONG_HOP]  WITH CHECK ADD  CONSTRAINT [F_KQCN_NH] FOREIGN KEY([MaNamHoc])
REFERENCES [dbo].[NAMHOC] ([MaNamHoc])
GO
ALTER TABLE [dbo].[KQ_CA_NAM_TONG_HOP] CHECK CONSTRAINT [F_KQCN_NH]
GO
ALTER TABLE [dbo].[KQ_HOC_KY_TONG_HOP]  WITH CHECK ADD  CONSTRAINT [F_KQHK_HK] FOREIGN KEY([MaHocKy])
REFERENCES [dbo].[HOCKY] ([MaHocKy])
GO
ALTER TABLE [dbo].[KQ_HOC_KY_TONG_HOP] CHECK CONSTRAINT [F_KQHK_HK]
GO
ALTER TABLE [dbo].[KQ_HOC_KY_TONG_HOP]  WITH CHECK ADD  CONSTRAINT [F_KQHK_HKIEM] FOREIGN KEY([MaHanhKiem])
REFERENCES [dbo].[HANHKIEM] ([MaHanhKiem])
GO
ALTER TABLE [dbo].[KQ_HOC_KY_TONG_HOP] CHECK CONSTRAINT [F_KQHK_HKIEM]
GO
ALTER TABLE [dbo].[KQ_HOC_KY_TONG_HOP]  WITH CHECK ADD  CONSTRAINT [F_KQHK_HL] FOREIGN KEY([MaHocLuc])
REFERENCES [dbo].[HOCLUC] ([MaHocLuc])
GO
ALTER TABLE [dbo].[KQ_HOC_KY_TONG_HOP] CHECK CONSTRAINT [F_KQHK_HL]
GO
ALTER TABLE [dbo].[KQ_HOC_KY_TONG_HOP]  WITH CHECK ADD  CONSTRAINT [F_KQHK_HS] FOREIGN KEY([MaHocSinh])
REFERENCES [dbo].[HOCSINH] ([MaHocSinh])
GO
ALTER TABLE [dbo].[KQ_HOC_KY_TONG_HOP] CHECK CONSTRAINT [F_KQHK_HS]
GO
ALTER TABLE [dbo].[KQ_HOC_KY_TONG_HOP]  WITH CHECK ADD  CONSTRAINT [F_KQHK_LOP] FOREIGN KEY([MaLop])
REFERENCES [dbo].[LOP] ([MaLop])
GO
ALTER TABLE [dbo].[KQ_HOC_KY_TONG_HOP] CHECK CONSTRAINT [F_KQHK_LOP]
GO
ALTER TABLE [dbo].[KQ_HOC_KY_TONG_HOP]  WITH CHECK ADD  CONSTRAINT [F_KQHK_NH] FOREIGN KEY([MaNamHoc])
REFERENCES [dbo].[NAMHOC] ([MaNamHoc])
GO
ALTER TABLE [dbo].[KQ_HOC_KY_TONG_HOP] CHECK CONSTRAINT [F_KQHK_NH]
GO
ALTER TABLE [dbo].[LOP]  WITH CHECK ADD  CONSTRAINT [F_LOP_GV] FOREIGN KEY([MaGiaoVien])
REFERENCES [dbo].[GIAOVIEN] ([MaGiaoVien])
GO
ALTER TABLE [dbo].[LOP] CHECK CONSTRAINT [F_LOP_GV]
GO
ALTER TABLE [dbo].[LOP]  WITH CHECK ADD  CONSTRAINT [F_LOP_KL] FOREIGN KEY([MaKhoiLop])
REFERENCES [dbo].[KHOILOP] ([MaKhoiLop])
GO
ALTER TABLE [dbo].[LOP] CHECK CONSTRAINT [F_LOP_KL]
GO
ALTER TABLE [dbo].[LOP]  WITH CHECK ADD  CONSTRAINT [F_LOP_NH] FOREIGN KEY([MaNamHoc])
REFERENCES [dbo].[NAMHOC] ([MaNamHoc])
GO
ALTER TABLE [dbo].[LOP] CHECK CONSTRAINT [F_LOP_NH]
GO
ALTER TABLE [dbo].[NGUOIDUNG]  WITH CHECK ADD  CONSTRAINT [F_ND_LND] FOREIGN KEY([MaLoai])
REFERENCES [dbo].[LOAINGUOIDUNG] ([MaLoai])
GO
ALTER TABLE [dbo].[NGUOIDUNG] CHECK CONSTRAINT [F_ND_LND]
GO
ALTER TABLE [dbo].[PHANCONG]  WITH CHECK ADD  CONSTRAINT [F_PC_NH] FOREIGN KEY([MaNamHoc])
REFERENCES [dbo].[NAMHOC] ([MaNamHoc])
GO
ALTER TABLE [dbo].[PHANCONG] CHECK CONSTRAINT [F_PC_NH]
GO
ALTER TABLE [dbo].[PHANCONG]  WITH CHECK ADD  CONSTRAINT [P_PC_GV] FOREIGN KEY([MaGiaoVien])
REFERENCES [dbo].[GIAOVIEN] ([MaGiaoVien])
GO
ALTER TABLE [dbo].[PHANCONG] CHECK CONSTRAINT [P_PC_GV]
GO
ALTER TABLE [dbo].[PHANCONG]  WITH CHECK ADD  CONSTRAINT [P_PC_LOP] FOREIGN KEY([MaLop])
REFERENCES [dbo].[LOP] ([MaLop])
GO
ALTER TABLE [dbo].[PHANCONG] CHECK CONSTRAINT [P_PC_LOP]
GO
ALTER TABLE [dbo].[PHANCONG]  WITH CHECK ADD  CONSTRAINT [P_PC_MH] FOREIGN KEY([MaMonHoc])
REFERENCES [dbo].[MONHOC] ([MaMonHoc])
GO
ALTER TABLE [dbo].[PHANCONG] CHECK CONSTRAINT [P_PC_MH]
GO
ALTER TABLE [dbo].[PHANLOP]  WITH CHECK ADD  CONSTRAINT [F_PL_HS] FOREIGN KEY([MaHocSinh])
REFERENCES [dbo].[HOCSINH] ([MaHocSinh])
GO
ALTER TABLE [dbo].[PHANLOP] CHECK CONSTRAINT [F_PL_HS]
GO
ALTER TABLE [dbo].[PHANLOP]  WITH CHECK ADD  CONSTRAINT [F_PL_KHOI] FOREIGN KEY([MaKhoiLop])
REFERENCES [dbo].[KHOILOP] ([MaKhoiLop])
GO
ALTER TABLE [dbo].[PHANLOP] CHECK CONSTRAINT [F_PL_KHOI]
GO
ALTER TABLE [dbo].[PHANLOP]  WITH CHECK ADD  CONSTRAINT [F_PL_LOP] FOREIGN KEY([MaLop])
REFERENCES [dbo].[LOP] ([MaLop])
GO
ALTER TABLE [dbo].[PHANLOP] CHECK CONSTRAINT [F_PL_LOP]
GO
ALTER TABLE [dbo].[PHANLOP]  WITH CHECK ADD  CONSTRAINT [F_PL_NH] FOREIGN KEY([MaNamHoc])
REFERENCES [dbo].[NAMHOC] ([MaNamHoc])
GO
ALTER TABLE [dbo].[PHANLOP] CHECK CONSTRAINT [F_PL_NH]
GO
