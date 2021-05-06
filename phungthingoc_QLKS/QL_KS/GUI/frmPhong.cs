using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using QL_KS;
using System.Data.SqlClient;
namespace QL_KS.GUI
{
    public partial class frmPhong : Form
    {
        private DAL_Phong dal_Ph = new DAL_Phong();
        private EC_Phong ec_Ph = new EC_Phong();
        private DataTable tblPhong = new DataTable();
        private bool themmoi;
        DataTable dt;

        private void SetNull()
        {
            txtMaPhong.Text = "";
            txtSoPhong.Text = "";
            txtTrangThai.Text = "";
        }

        private void KhoaChucNang()
        {
            btnLamMoi.Enabled = false;
            btnLuu.Enabled = false;
            txtMaPhong.ReadOnly = true;
            txtSoPhong.ReadOnly = true;
            txtTrangThai.ReadOnly = true;
        }

        private void MoChucNang()
        {
            btnLamMoi.Enabled = true;
            btnLuu.Enabled = true;
            txtMaPhong.ReadOnly = false;
            txtSoPhong.ReadOnly = false;
            txtTrangThai.ReadOnly = false;
        }

        private void HienThi(string where)
        { dt = dal_Ph.TaoBang(where);
            dgvDanhSach.DataSource = dt;
        }
        public frmPhong()
        {
            InitializeComponent();
        }
        private void frmPhong_Load(object sender, EventArgs e)
        {
            HienThi("");
            KhoaChucNang();
        }

        private void btnLamMoi_Click(object sender, EventArgs e)
        {
            DataTable tbl = dal_Ph.TaoBang("");
            dgvDanhSach.DataSource = tbl;
        }
 
        private void btnXoa_Click(object sender, EventArgs e)
        {
            DialogResult xacnhan;
            xacnhan = MessageBox.Show("Bạn có chắc chắn muốn xóa không??", "Thông báo", MessageBoxButtons.OKCancel, MessageBoxIcon.Question);
            if (xacnhan == DialogResult.OK)
            {
                ec_Ph.MaPh = txtMaPhong.Text;
                if (dal_Ph.XoaTTPhong(ec_Ph) == 0)
                {

                    MessageBox.Show("Không thể xoá!!!", "Thông báo???", MessageBoxButtons.OKCancel, MessageBoxIcon.Error);
                }
                else
                {
                    dal_Ph.XoaTTPhong(ec_Ph);
                    MessageBox.Show("Đã xóa thành công!");
                    btnLamMoi_Click(sender, e);
                    SetNull();

                }
            }
        }

        private void btnSua_Click(object sender, EventArgs e)
        {
            dgvDanhSach.Enabled = false;
            //kich hoat cac chuc năng
            btnThem.Enabled = false;
            btnSua.Enabled = false;
            btnXoa.Enabled = false;

            btnLuu.Enabled = true;
            MoChucNang();
            txtMaPhong.ReadOnly = true;
            themmoi = false;
        }

        private void btnThem_Click(object sender, EventArgs e)
        {
            dgvDanhSach.Enabled = false;
            //kich hoat cac chuc nang
            btnSua.Enabled = false;
            btnXoa.Enabled = false;
            btnLamMoi.Enabled = false;
            txtMaPhong.Focus();
            MoChucNang();
            SetNull();
            themmoi = true;
        }
        private void btnLuu_Click(object sender, EventArgs e)
        {
            if (txtMaPhong.Text == "" || txtSoPhong.Text == "" || txtTrangThai.Text == "")
            {
                MessageBox.Show("Xin mời nhập thông tin đầy đủ");
                KhoaChucNang();
                return;
            }
            else
            {
                if (themmoi == true)/*đang ở trang thái thêm mới*/
                {
                    try
                    {
                        ec_Ph.MaPh = txtMaPhong.Text;
                        ec_Ph.SoPhong = txtSoPhong.Text;
                        ec_Ph.TrangThai = txtTrangThai.Text;


                        dal_Ph.ThemThongTin(ec_Ph);
                        MessageBox.Show("Đã thêm mới thành công");/*dòng thông báo*/
                        btnLamMoi_Click(sender, e);
                        MoChucNang();
                        btnThem.Enabled = true;
                        btnSua.Enabled = true;
                        btnThoat.Enabled = true;
                        btnXoa.Enabled = true;
                        SetNull();
                    }
                    catch
                    {
                        MessageBox.Show("Lỗi");
                        return;
                    }

                }
                else
                {
                    try
                    {
                        ec_Ph.MaPh = txtMaPhong.Text;
                        ec_Ph.SoPhong = txtSoPhong.Text;
                        ec_Ph.TrangThai = txtTrangThai.Text;
                        dal_Ph.SuaThongTin(ec_Ph);
                        MessageBox.Show("Đã sửa thành công");
                        btnLamMoi_Click(sender, e);
                        MoChucNang();
                        btnThem.Enabled = true;
                        btnSua.Enabled = true;
                        btnThoat.Enabled = true;
                        btnXoa.Enabled = true;
                        SetNull();
                    }
                    catch
                    {
                        MessageBox.Show("Lỗi");
                        return;
                    }
                }
                SetNull();
                KhoaChucNang();/*không cho thao tác*/
                HienThi("");
            }
            dgvDanhSach.Enabled = true;
        }

        private void dgvDanhSach_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            int dong = e.RowIndex;
            txtMaPhong.Text = dgvDanhSach.Rows[dong].Cells[0].Value.ToString();
            txtSoPhong.Text = dgvDanhSach.Rows[dong].Cells[1].Value.ToString();
            txtTrangThai.Text = dgvDanhSach.Rows[dong].Cells[2].Value.ToString();
        }

        private void btnThoat_Click(object sender, EventArgs e)
        {
            Close();
            Dispose();
        }

        private void txtTimMaPhong_Click(object sender, EventArgs e)
        {
            txtTimMaPhong.Text = "";
        }

        private void txtTimMaPhong_TextChanged(object sender, EventArgs e)
        {
            string st = string.Format("[MaPh] like '%{0}%'", txtTimMaPhong.Text);
            dt.DefaultView.RowFilter = st;
        }

        private void txtTimSoPhong_Click(object sender, EventArgs e)
        {
            txtTimSoPhong.Text = "";
        }

        private void txtTimSoPhong_TextChanged(object sender, EventArgs e)
        {
            string st = string.Format("[SoPhong] like '%{0}%'", txtTimSoPhong.Text);
            dt.DefaultView.RowFilter = st;
        }

        private void txtTimTrangThai_Click(object sender, EventArgs e)
        {
            txtTimTrangThai.Text = "";
        }

        private void txtTimTrangThai_TextChanged(object sender, EventArgs e)
        {
            string st = string.Format("[TrangThai] like '%{0}%'", txtTimTrangThai.Text);
            dt.DefaultView.RowFilter = st;
        }
    }
}
