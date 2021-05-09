using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace QL_KS.GUI
{
    public partial class frmQuanLyKhachHang : Form
    {
        DAL_KhachHang KhachHang = new DAL_KhachHang();
        EC_KhachHang customer = new EC_KhachHang();
        DataTable dt = new DataTable();
        bool themmoi = false;
        public void SetNull()
        {
            cbMaKH.Text = "";
            txtName.Text = "";
            txtSDT.Text = "";
            txtDiaChi.Text = "";
            txtCMND.Text = "";
        }
        public void MoDieuKhien()
        {
            txtName.ReadOnly = false;
            txtDiaChi.ReadOnly = false;
            txtSDT.ReadOnly = false;
            txtCMND.ReadOnly = false;
            dgvKhachHang.Enabled = false;
        }
        public void KhoaDieuKhien()
        {
            txtName.ReadOnly = true;
            txtDiaChi.ReadOnly = true;
            txtSDT.ReadOnly = true;
            txtCMND.ReadOnly = true;
            dgvKhachHang.Enabled = true;
        }
        public void Value()
        {
            customer.MaKH = cbMaKH.Text;
            customer.TenKH = txtName.Text;
            customer.NgaySinh = dtp.Value.Year.ToString() + "-" + dtp.Value.Month.ToString() + "-" + dtp.Value.Day.ToString();
            customer.SoDT = txtSDT.Text;
            customer.GT = cbGT.Text;
            customer.DiaChi = txtDiaChi.Text;
            customer.CMND = txtCMND.Text;
        }
        public frmQuanLyKhachHang()
        {
            InitializeComponent();
        }

        private void frmQuanLyKhachHang_Load(object sender, EventArgs e)
        {
            KhoaDieuKhien();
            btnSave.Enabled = false;
            dt = KhachHang.getAllKhachHang();
            dgvKhachHang.DataSource = dt;
        }

        private void dgvKhachHang_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            try
            {
                int dong = e.RowIndex;
                cbMaKH.Text = dgvKhachHang.Rows[dong].Cells[0].Value.ToString();
                txtName.Text = dgvKhachHang.Rows[dong].Cells[1].Value.ToString();
                dtp.Text = dgvKhachHang.Rows[dong].Cells[2].Value.ToString();
                cbGT.Text = dgvKhachHang.Rows[dong].Cells[3].Value.ToString();
                txtSDT.Text = dgvKhachHang.Rows[dong].Cells[4].Value.ToString();
                txtCMND.Text = dgvKhachHang.Rows[dong].Cells[5].Value.ToString();
                txtDiaChi.Text = dgvKhachHang.Rows[dong].Cells[6].Value.ToString();
            }
            catch { }

        }
        private void btnDel_Click(object sender, EventArgs e)
        {
            DialogResult traloi;
            Value();
            traloi = MessageBox.Show("Bạn có muốn xóa???", "Questions", MessageBoxButtons.OKCancel, MessageBoxIcon.Question);
            if (traloi == DialogResult.OK)
            {
                KhachHang.Xoa(customer);
                btnRefresh_Click(null, null);
            }
        }

        private void btnEdit_Click(object sender, EventArgs e)
        {
            MoDieuKhien();
            themmoi = false;
            btnAdd.Enabled = false;
            btnDel.Enabled = false;
            btnSave.Enabled = true;
            btnRefresh.Enabled = true;

        }

        private void btnAdd_Click(object sender, EventArgs e)
        {
            MoDieuKhien();
            themmoi = true;
            btnEdit.Enabled = false;
            btnDel.Enabled = false;
            btnSave.Enabled = true;
            btnRefresh.Enabled = true;
            SetNull();
        }

        private void btnThoat_Click(object sender, EventArgs e)
        {
            DialogResult traloi;
            traloi = MessageBox.Show("Bạn có muốn thoát", "Thông Báo", MessageBoxButtons.OKCancel, MessageBoxIcon.Question);
            if (traloi == DialogResult.OK) this.Close();
        }

        private void btnSave_Click(object sender, EventArgs e)
        {
            if (themmoi)
            {
                EC_KhachHang a = new EC_KhachHang();
                a.MaKH = cbMaKH.Text.Trim();
                a.TenKH = txtName.Text.Trim();
                a.NgaySinh = dtp.Value.Year.ToString() + "-" + dtp.Value.Month.ToString() + "-" + dtp.Value.Day.ToString();
                a.GT = cbGT.Text.Trim();
                a.SoDT = txtSDT.Text.Trim();
                a.CMND = txtCMND.Text.Trim();
                a.DiaChi = txtDiaChi.Text.Trim();
             
                if (cbMaKH.Text != "")
                {
                    if (KhachHang.Them(a) > 0)
                    {
                        MessageBox.Show("Thêm Mới Thành Công !!!", "Thông Báo", MessageBoxButtons.OK);
                        dt = KhachHang.getAllKhachHang();
                        dgvKhachHang.DataSource = dt;
                    }
                    else
                    {
                        MessageBox.Show("Khong them duoc !!!", "Thông Báo", MessageBoxButtons.OK);
                    }
                }
                else
                {
                    MessageBox.Show("Bạn chưa nhập thông tin MaKH!!!", "Thông Báo", MessageBoxButtons.OK);
                    return;
                }
            }
            else
            {
                EC_KhachHang a = new EC_KhachHang();
                a.MaKH = cbMaKH.Text.Trim();
                a.TenKH = txtName.Text.Trim();
                a.NgaySinh = dtp.Value.Year.ToString() + "-" + dtp.Value.Month.ToString() + "-" + dtp.Value.Day.ToString();
                a.GT = cbGT.Text.Trim();
                a.SoDT = txtSDT.Text.Trim();
                a.CMND = txtCMND.Text.Trim();
                a.DiaChi = txtDiaChi.Text.Trim();
                if (KhachHang.Sua(a) != 0)
                {
                    MessageBox.Show("Đã Sửa Thành Công !!!", "Thông Báo", MessageBoxButtons.OK);
                    dt = KhachHang.getAllKhachHang();
                    dgvKhachHang.DataSource = dt;
                }
                else
                {
                    MessageBox.Show("khong sua duoc !!!", "Thông Báo", MessageBoxButtons.OK);
                }
            }
            btnRefresh_Click(null, null);
            KhoaDieuKhien();
        }

        private void btnRefresh_Click(object sender, EventArgs e)
        {
            dt = KhachHang.getAllKhachHang();
            dgvKhachHang.DataSource = dt;
            KhoaDieuKhien();
            btnAdd.Enabled = true;
            btnDel.Enabled = true;
            btnSave.Enabled = false;
            btnEdit.Enabled = true;
        }

        private void txt_timkiem_TextChanged(object sender, EventArgs e)
        {
            string st = string.Format("[tenKH] like '%{0}%'", txt_timkiem.Text);
            dt.DefaultView.RowFilter = st;
        }

        private void txt_timkiem_Click(object sender, EventArgs e)
        {
            txt_timkiem.Clear();
        }
    }
}
