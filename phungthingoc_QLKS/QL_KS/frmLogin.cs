using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using QL_KS.GUI;
namespace QL_KS
{
    public partial class frmLogin : Form
    {
        private DAL_TaiKhoan tk = new DAL_TaiKhoan();
        public frmLogin()
        {
            InitializeComponent();
        }

        private void frmLogin_Load(object sender, EventArgs e)
        {
            txtUsername.Text = Properties.Settings.Default.user;
        }

        private void btn_DangNhap_Click(object sender, EventArgs e)
        {
            string pass = tk.LayPass(txtUsername.Text);
            if (pass != "")
            {
                if (txtPassword.Text == pass)
                {
                    frmMain._taikhoan = txtUsername.Text;
                    Properties.Settings.Default.user = txtUsername.Text;
                    Properties.Settings.Default.Save();
                    DialogResult = DialogResult.OK;
                    this.Close();
                }
                else
                {
                    MessageBox.Show("Sai Mã nhân viên hoặc mật khẩu.");
                }
            }
            else
            {
                MessageBox.Show("Sai Mã nhân viên hoặc mật khẩu.");
            }
        }

        private void btnThoat_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void chkHienMK_CheckedChanged(object sender, EventArgs e)
        {
            if (chkHienMK.Checked == true)
            {
                txtPassword.UseSystemPasswordChar = false;
            }
            else
            {
                txtPassword.UseSystemPasswordChar = true;
            }
        }

        private void frmLogin_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.Enter) btn_DangNhap_Click(null, null);
        }

        private void txtPassword_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.Enter) btn_DangNhap_Click(null, null);
        }

        private void frmLogin_FormClosing(object sender, FormClosingEventArgs e)
        {
            //Application.Exit();
        }

        private void txtUsername_TextChanged(object sender, EventArgs e)
        {

        }
    }
}
