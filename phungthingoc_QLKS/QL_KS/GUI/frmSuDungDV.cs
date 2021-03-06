using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.SqlClient;
namespace QL_KS.GUI
{
    public partial class frmSuDungDV : Form
    {
        DataTable dt;
        private DAL_SuDungDichVu DAL_SuDung = new DAL_SuDungDichVu();
        private EC_SuDungDichVu EC_SuDung = new EC_SuDungDichVu();
        private int _dong;
        private bool _chon = false;
        private bool _them = false;
        private bool _xoa = false;
        private bool _koload = true;
        private string _Gia;
        public frmSuDungDV()
        {
            InitializeComponent();
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            if (!_chon)
            {
                labNgay.Text = DateTime.Today.ToShortDateString();
                labGio.Text = DateTime.Now.ToLongTimeString();
            }
        }

        private void frmSuDungDV_Load(object sender, EventArgs e)
        {
            _koload = false;
            var source = new AutoCompleteStringCollection();
            DataTable tb = DAL_SuDung.getPhong();
            cboPhong.DataSource = tb;
            cboPhong.DisplayMember = "MaPh";
            cboPhong.ValueMember = "MaPh";
            for (int _i = 0; _i < tb.Rows.Count; _i++) source.Add(tb.Rows[_i]["SoPhong"].ToString());
            cboPhong.AutoCompleteCustomSource = source;

            tb = DAL_SuDung.getDV();
            cboDichVu.DataSource = tb;
            cboDichVu.DisplayMember = "TenDV";
            cboDichVu.ValueMember = "MaDV";
            for (int _i = 0; _i < tb.Rows.Count; _i++) source.Add(tb.Rows[_i]["TenDV"].ToString());
            cboDichVu.AutoCompleteCustomSource = source;
            dt = DAL_SuDung.getDanhSach();
            dgvDanhSach.DataSource = dt;
            if (dgvDanhSach.RowCount != 0) btnXoa.Enabled = true;
            _koload = true;
        }

        private void dgvDanhSach_CellEnter(object sender, DataGridViewCellEventArgs e)
        {
            if (_koload) timer1.Enabled = false;
            cboDichVu.SelectedIndex = -1;
            cboDichVu.Text = dgvDanhSach.Rows[e.RowIndex].Cells["TenDV"].Value.ToString();
            cboPhong.SelectedIndex = -1;
            cboPhong.Text = dgvDanhSach.Rows[e.RowIndex].Cells["TenPhong"].Value.ToString();
            txtHoaDon.Text = dgvDanhSach.Rows[e.RowIndex].Cells["MaHD"].Value.ToString();
            string s = dgvDanhSach.Rows[e.RowIndex].Cells["ThoiGian"].Value.ToString();
            labNgay.Text = s.Substring(0, 11);
            labGio.Text = s.Substring(11, s.Length - 11);
            _dong = e.RowIndex;
        }

        private void cboPhong_TextChanged(object sender, EventArgs e)
        {
            if (_them)
            {
                txtHoaDon.Text = DAL_SuDung.getMaHD("0101");
            }
        }

        private void cboPhong_Validated(object sender, EventArgs e)
        {
            if (cboPhong.SelectedValue == null)
            {
                MessageBox.Show("Không có Phòng");
                cboPhong.Focus();
            }
            txtHoaDon.Text = DAL_SuDung.getMaHD(cboPhong.Text);
            //if (txtHoaDon.Text == "")
            //{
            //    MessageBox.Show("Phòng chưa được thuê");
            //    cboPhong.Focus();
            //}
        }

        private void cboDichVu_Validated(object sender, EventArgs e)
        {
            if (cboDichVu.SelectedValue == null)
            {
                MessageBox.Show("Không có Dich vụ");
                cboDichVu.Focus();
            }
        }

        private void btnReset_Click(object sender, EventArgs e)
        {
            timer1_Tick(null, null);
            dgvDanhSach.DataSource = DAL_SuDung.getDanhSach();
            btnThem.Enabled = true;
            btnSua.Enabled = false;
            cboDichVu.Enabled = false;
            cboPhong.Enabled = false;
            dtpThoiGian.ResetText();
            txtTimPhong.Clear();
            txtTimDV.Clear();
            timer1.Enabled = true;
        }

        private void cboDichVu_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (_koload && cboDichVu.SelectedValue != null)
            {
                DAL_DichVu DV = new DAL_DichVu();
                _Gia = DV.GetGia(cboDichVu.SelectedValue.ToString());
            }
        }

        private void btnThem_Click(object sender, EventArgs e)
        {
            timer1_Tick(null, null);
            timer1.Enabled = false;
            cboPhong.Enabled = true;
            cboDichVu.Enabled = true;
            btnSua.Enabled = false;
            btnThem.Enabled = false;
            btnXoa.Enabled = false;            
            cboPhong.ResetText();
            cboDichVu.ResetText();
            txtHoaDon.ResetText();
            _them = true;
           
        }

        private void btnLuu_Click(object sender, EventArgs e)
        {
            
        }

        private void btnXoa_Click(object sender, EventArgs e)
        {
            _xoa = true;
            string temp = dgvDanhSach.Rows[_dong].Cells["ThoiGian"].Value.ToString();
            dtpThoiGian.Text = temp;
            //EC_SuDung.ThoiGian = dtpThoiGian.Text + temp.Substring(10, temp.Length - 10);
            EC_SuDung.MaDV = cboDichVu.SelectedValue.ToString();
            EC_SuDung.MaHD = txtHoaDon.Text;
            DAL_SuDung.delSuDung(EC_SuDung);
            dgvDanhSach.DataSource = DAL_SuDung.getDanhSach();
            timer1.Enabled = true;
            dtpThoiGian.ResetText();
            if (dgvDanhSach.RowCount == 0) btnXoa.Enabled = false;
            _xoa = false;
        }

        private void txtTimPhong_Click(object sender, EventArgs e)
        {
            txtTimPhong.Text = "";
        }

        private void txtTimDV_Click(object sender, EventArgs e)
        {
            txtTimDV.Text = "";
        }

        private void txtTimPhong_TextChanged(object sender, EventArgs e)
        {
            string st = string.Format("[SoPhong] like '%{0}%'", txtTimPhong.Text);
            dt.DefaultView.RowFilter = st;
        }

        private void txtTimDV_TextChanged(object sender, EventArgs e)
        {
            string st = string.Format("[TenDV] like '%{0}%'", txtTimDV.Text);
            dt.DefaultView.RowFilter = st;
        }

        private void labNgay_Click(object sender, EventArgs e)
        {

        }

        private void btn_Luu_Click(object sender, EventArgs e)
        {
            EC_SuDung.MaDV = cboDichVu.SelectedValue.ToString();
            EC_SuDung.MaHD = txtHoaDon.Text;

            dtpThoiGian.Text = labNgay.Text;
            EC_SuDung.ThoiGian = DateTime.Now;
            EC_SuDung.Gia = _Gia;

            DAL_SuDung.addSuDung(EC_SuDung);
            dgvDanhSach.DataSource = DAL_SuDung.getDanhSach();
            _them = false;
            btnSua.Enabled = false;
            btnThem.Enabled = true;
            timer1.Enabled = true;
            cboPhong.Enabled = false;
            cboDichVu.Enabled = false;
        }

        private void btnThoat_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void cboPhong_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void txtHoaDon_TextChanged(object sender, EventArgs e)
        {

        }
    }
}
