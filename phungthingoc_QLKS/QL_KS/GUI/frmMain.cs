using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Diagnostics;

namespace QL_KS.GUI
{
    public partial class frmMain : Form
    {
        public static string _taikhoan = "";
        public frmMain()
        {
            InitializeComponent();
        }
        private void frmMain_Load(object sender, EventArgs e)
        {
            Form frmDN = new frmLogin();
            DialogResult tl;
            tl = frmDN.ShowDialog();
            if (tl != DialogResult.OK)
            {
                Application.Exit();
            }
        }
        private void btnKhachHang_Click(object sender, EventArgs e)
        {
            Form frmKH = new frmQuanLyKhachHang();
            frmKH.ShowDialog();
        }

        private void btnPhong_Click(object sender, EventArgs e)
        {
            Form frmPhong = new frmPhong();
            frmPhong.ShowDialog();
        }

        private void btnVatDung_Click(object sender, EventArgs e)
        {
            Form frmTB = new frmThietBi();
            frmTB.ShowDialog();
        }

        private void btnDichVu_Click(object sender, EventArgs e)
        {
            Form frmDV = new frmQuanLyDV();
            frmDV.ShowDialog();
        }

        private void btnThuePhong_Click(object sender, EventArgs e)
        {
            Form frmThue = new frmThuePhong();
            frmThue.ShowDialog();
        }

        private void btnSuDungDV_Click(object sender, EventArgs e)
        {
            Form frmSD = new frmSuDungDV();
            frmSD.ShowDialog();
        }

        private void btnThanhToan_Click(object sender, EventArgs e)
        {
            Form frmThanhToan = new frmThanhToan();
            frmThanhToan.ShowDialog();
        }

        private void btnNguoiDung_Click(object sender, EventArgs e)
        {
            Form frm = new frmNhanvien();
            frm.ShowDialog();
        }

        private void restart_Click(object sender, EventArgs e)
        {
            this.Close();
            Application.Restart();
        }

        private void exit_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void help_Click(object sender, EventArgs e)
        {
            Process.Start("http://quanlyks.herobo.com/");
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }
    }
}
