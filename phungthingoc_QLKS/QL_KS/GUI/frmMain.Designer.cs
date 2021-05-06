namespace QL_KS.GUI
{
    partial class frmMain
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(frmMain));
            this.mnuChucNang = new System.Windows.Forms.MenuStrip();
            this.account = new System.Windows.Forms.ToolStripMenuItem();
            this.restart = new System.Windows.Forms.ToolStripMenuItem();
            this.exit = new System.Windows.Forms.ToolStripMenuItem();
            this.help = new System.Windows.Forms.ToolStripMenuItem();
            this.panel1 = new System.Windows.Forms.Panel();
            this.label1 = new System.Windows.Forms.Label();
            this.panel2 = new System.Windows.Forms.Panel();
            this.btnThanhToan = new System.Windows.Forms.Button();
            this.btnKhachHang = new System.Windows.Forms.Button();
            this.btnSuDungDV = new System.Windows.Forms.Button();
            this.btnDichVu = new System.Windows.Forms.Button();
            this.btnThuePhong = new System.Windows.Forms.Button();
            this.btnVatDung = new System.Windows.Forms.Button();
            this.btnPhong = new System.Windows.Forms.Button();
            this.btnNguoiDung = new System.Windows.Forms.Button();
            this.mnuChucNang.SuspendLayout();
            this.panel1.SuspendLayout();
            this.SuspendLayout();
            // 
            // mnuChucNang
            // 
            this.mnuChucNang.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(163)));
            this.mnuChucNang.ImageScalingSize = new System.Drawing.Size(24, 24);
            this.mnuChucNang.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.account,
            this.help});
            this.mnuChucNang.Location = new System.Drawing.Point(0, 0);
            this.mnuChucNang.Name = "mnuChucNang";
            this.mnuChucNang.Padding = new System.Windows.Forms.Padding(14, 5, 0, 5);
            this.mnuChucNang.Size = new System.Drawing.Size(861, 41);
            this.mnuChucNang.TabIndex = 1;
            this.mnuChucNang.Text = "menuStrip1";
            // 
            // account
            // 
            this.account.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.restart,
            this.exit});
            this.account.ForeColor = System.Drawing.Color.Navy;
            this.account.Name = "account";
            this.account.Size = new System.Drawing.Size(106, 31);
            this.account.Text = "Account";
            // 
            // restart
            // 
            this.restart.Name = "restart";
            this.restart.Size = new System.Drawing.Size(229, 32);
            this.restart.Text = "Đăng nhập lại";
            this.restart.Click += new System.EventHandler(this.restart_Click);
            // 
            // exit
            // 
            this.exit.Name = "exit";
            this.exit.Size = new System.Drawing.Size(229, 32);
            this.exit.Text = "Thoát";
            this.exit.Click += new System.EventHandler(this.exit_Click);
            // 
            // help
            // 
            this.help.ForeColor = System.Drawing.Color.Navy;
            this.help.Name = "help";
            this.help.ShortcutKeys = System.Windows.Forms.Keys.F1;
            this.help.Size = new System.Drawing.Size(117, 31);
            this.help.Text = "Help (F1)";
            this.help.Click += new System.EventHandler(this.help_Click);
            // 
            // panel1
            // 
            this.panel1.BackColor = System.Drawing.Color.Aqua;
            this.panel1.Controls.Add(this.label1);
            this.panel1.Dock = System.Windows.Forms.DockStyle.Top;
            this.panel1.Location = new System.Drawing.Point(0, 41);
            this.panel1.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(861, 151);
            this.panel1.TabIndex = 21;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Times New Roman", 20.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.Location = new System.Drawing.Point(193, 48);
            this.label1.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(470, 47);
            this.label1.TabIndex = 0;
            this.label1.Text = "QUẢN LÝ KHÁCH SẠN";
            this.label1.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            this.label1.Click += new System.EventHandler(this.label1_Click);
            // 
            // panel2
            // 
            this.panel2.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("panel2.BackgroundImage")));
            this.panel2.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Center;
            this.panel2.Location = new System.Drawing.Point(292, 375);
            this.panel2.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.panel2.Name = "panel2";
            this.panel2.Size = new System.Drawing.Size(284, 166);
            this.panel2.TabIndex = 22;
            // 
            // btnThanhToan
            // 
            this.btnThanhToan.BackColor = System.Drawing.SystemColors.Control;
            this.btnThanhToan.BackgroundImage = global::QL_KS.Properties.Resources.pm;
            this.btnThanhToan.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Center;
            this.btnThanhToan.FlatAppearance.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            this.btnThanhToan.FlatAppearance.BorderSize = 0;
            this.btnThanhToan.FlatAppearance.CheckedBackColor = System.Drawing.Color.Transparent;
            this.btnThanhToan.FlatAppearance.MouseDownBackColor = System.Drawing.Color.Transparent;
            this.btnThanhToan.FlatAppearance.MouseOverBackColor = System.Drawing.Color.Transparent;
            this.btnThanhToan.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnThanhToan.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnThanhToan.ForeColor = System.Drawing.Color.Navy;
            this.btnThanhToan.Location = new System.Drawing.Point(658, 560);
            this.btnThanhToan.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.btnThanhToan.Name = "btnThanhToan";
            this.btnThanhToan.Size = new System.Drawing.Size(171, 126);
            this.btnThanhToan.TabIndex = 15;
            this.btnThanhToan.Text = "Thanh Toán";
            this.btnThanhToan.TextAlign = System.Drawing.ContentAlignment.BottomCenter;
            this.btnThanhToan.UseVisualStyleBackColor = false;
            this.btnThanhToan.Click += new System.EventHandler(this.btnThanhToan_Click);
            // 
            // btnKhachHang
            // 
            this.btnKhachHang.BackColor = System.Drawing.SystemColors.Control;
            this.btnKhachHang.BackgroundImage = global::QL_KS.Properties.Resources._1474570775_User;
            this.btnKhachHang.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Center;
            this.btnKhachHang.FlatAppearance.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            this.btnKhachHang.FlatAppearance.BorderSize = 0;
            this.btnKhachHang.FlatAppearance.CheckedBackColor = System.Drawing.Color.Transparent;
            this.btnKhachHang.FlatAppearance.MouseDownBackColor = System.Drawing.Color.Transparent;
            this.btnKhachHang.FlatAppearance.MouseOverBackColor = System.Drawing.Color.Transparent;
            this.btnKhachHang.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnKhachHang.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnKhachHang.ForeColor = System.Drawing.Color.Navy;
            this.btnKhachHang.ImageAlign = System.Drawing.ContentAlignment.TopCenter;
            this.btnKhachHang.Location = new System.Drawing.Point(658, 202);
            this.btnKhachHang.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.btnKhachHang.Name = "btnKhachHang";
            this.btnKhachHang.Size = new System.Drawing.Size(171, 126);
            this.btnKhachHang.TabIndex = 11;
            this.btnKhachHang.Text = "Khách hàng";
            this.btnKhachHang.TextAlign = System.Drawing.ContentAlignment.BottomCenter;
            this.btnKhachHang.UseVisualStyleBackColor = false;
            this.btnKhachHang.Click += new System.EventHandler(this.btnKhachHang_Click);
            // 
            // btnSuDungDV
            // 
            this.btnSuDungDV.BackColor = System.Drawing.SystemColors.Control;
            this.btnSuDungDV.BackgroundImage = global::QL_KS.Properties.Resources._1461743837_edit_find_replace;
            this.btnSuDungDV.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Center;
            this.btnSuDungDV.FlatAppearance.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            this.btnSuDungDV.FlatAppearance.BorderSize = 0;
            this.btnSuDungDV.FlatAppearance.CheckedBackColor = System.Drawing.Color.Transparent;
            this.btnSuDungDV.FlatAppearance.MouseDownBackColor = System.Drawing.Color.Transparent;
            this.btnSuDungDV.FlatAppearance.MouseOverBackColor = System.Drawing.Color.Transparent;
            this.btnSuDungDV.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnSuDungDV.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnSuDungDV.ForeColor = System.Drawing.Color.Navy;
            this.btnSuDungDV.Location = new System.Drawing.Point(340, 560);
            this.btnSuDungDV.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.btnSuDungDV.Name = "btnSuDungDV";
            this.btnSuDungDV.Size = new System.Drawing.Size(171, 126);
            this.btnSuDungDV.TabIndex = 14;
            this.btnSuDungDV.Text = "Sử dụng dịch vụ";
            this.btnSuDungDV.TextAlign = System.Drawing.ContentAlignment.BottomCenter;
            this.btnSuDungDV.UseVisualStyleBackColor = false;
            this.btnSuDungDV.Click += new System.EventHandler(this.btnSuDungDV_Click);
            // 
            // btnDichVu
            // 
            this.btnDichVu.BackColor = System.Drawing.SystemColors.Control;
            this.btnDichVu.BackgroundImage = global::QL_KS.Properties.Resources._1462365475_accessories_text_editor;
            this.btnDichVu.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Center;
            this.btnDichVu.FlatAppearance.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            this.btnDichVu.FlatAppearance.BorderSize = 0;
            this.btnDichVu.FlatAppearance.CheckedBackColor = System.Drawing.Color.Transparent;
            this.btnDichVu.FlatAppearance.MouseDownBackColor = System.Drawing.Color.Transparent;
            this.btnDichVu.FlatAppearance.MouseOverBackColor = System.Drawing.Color.Transparent;
            this.btnDichVu.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnDichVu.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnDichVu.ForeColor = System.Drawing.Color.Navy;
            this.btnDichVu.Location = new System.Drawing.Point(340, 202);
            this.btnDichVu.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.btnDichVu.Name = "btnDichVu";
            this.btnDichVu.Size = new System.Drawing.Size(171, 126);
            this.btnDichVu.TabIndex = 12;
            this.btnDichVu.Text = "Dịch vụ";
            this.btnDichVu.TextAlign = System.Drawing.ContentAlignment.BottomCenter;
            this.btnDichVu.UseVisualStyleBackColor = false;
            this.btnDichVu.Click += new System.EventHandler(this.btnDichVu_Click);
            // 
            // btnThuePhong
            // 
            this.btnThuePhong.BackColor = System.Drawing.SystemColors.Control;
            this.btnThuePhong.BackgroundImage = global::QL_KS.Properties.Resources._1461743846_go_home;
            this.btnThuePhong.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Center;
            this.btnThuePhong.FlatAppearance.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            this.btnThuePhong.FlatAppearance.BorderSize = 0;
            this.btnThuePhong.FlatAppearance.CheckedBackColor = System.Drawing.Color.Transparent;
            this.btnThuePhong.FlatAppearance.MouseDownBackColor = System.Drawing.Color.Transparent;
            this.btnThuePhong.FlatAppearance.MouseOverBackColor = System.Drawing.Color.Transparent;
            this.btnThuePhong.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnThuePhong.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnThuePhong.ForeColor = System.Drawing.Color.Navy;
            this.btnThuePhong.Location = new System.Drawing.Point(658, 375);
            this.btnThuePhong.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.btnThuePhong.Name = "btnThuePhong";
            this.btnThuePhong.Size = new System.Drawing.Size(171, 126);
            this.btnThuePhong.TabIndex = 13;
            this.btnThuePhong.Text = "Thuê phòng";
            this.btnThuePhong.TextAlign = System.Drawing.ContentAlignment.BottomCenter;
            this.btnThuePhong.UseVisualStyleBackColor = false;
            this.btnThuePhong.Click += new System.EventHandler(this.btnThuePhong_Click);
            // 
            // btnVatDung
            // 
            this.btnVatDung.BackColor = System.Drawing.SystemColors.Control;
            this.btnVatDung.BackgroundImage = global::QL_KS.Properties.Resources._1462270722_utilities_system_monitor;
            this.btnVatDung.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Center;
            this.btnVatDung.FlatAppearance.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            this.btnVatDung.FlatAppearance.BorderSize = 0;
            this.btnVatDung.FlatAppearance.CheckedBackColor = System.Drawing.Color.Transparent;
            this.btnVatDung.FlatAppearance.MouseDownBackColor = System.Drawing.Color.Transparent;
            this.btnVatDung.FlatAppearance.MouseOverBackColor = System.Drawing.Color.Transparent;
            this.btnVatDung.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnVatDung.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnVatDung.ForeColor = System.Drawing.Color.Navy;
            this.btnVatDung.Location = new System.Drawing.Point(18, 560);
            this.btnVatDung.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.btnVatDung.Name = "btnVatDung";
            this.btnVatDung.Size = new System.Drawing.Size(171, 126);
            this.btnVatDung.TabIndex = 10;
            this.btnVatDung.Text = "Thiết bị";
            this.btnVatDung.TextAlign = System.Drawing.ContentAlignment.BottomCenter;
            this.btnVatDung.UseVisualStyleBackColor = false;
            this.btnVatDung.Click += new System.EventHandler(this.btnVatDung_Click);
            // 
            // btnPhong
            // 
            this.btnPhong.BackColor = System.Drawing.SystemColors.Control;
            this.btnPhong.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("btnPhong.BackgroundImage")));
            this.btnPhong.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Center;
            this.btnPhong.FlatAppearance.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            this.btnPhong.FlatAppearance.BorderSize = 0;
            this.btnPhong.FlatAppearance.CheckedBackColor = System.Drawing.Color.Transparent;
            this.btnPhong.FlatAppearance.MouseDownBackColor = System.Drawing.Color.Transparent;
            this.btnPhong.FlatAppearance.MouseOverBackColor = System.Drawing.Color.Transparent;
            this.btnPhong.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnPhong.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnPhong.ForeColor = System.Drawing.Color.Navy;
            this.btnPhong.Location = new System.Drawing.Point(18, 375);
            this.btnPhong.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.btnPhong.Name = "btnPhong";
            this.btnPhong.Size = new System.Drawing.Size(171, 126);
            this.btnPhong.TabIndex = 9;
            this.btnPhong.Text = "Phòng";
            this.btnPhong.TextAlign = System.Drawing.ContentAlignment.BottomCenter;
            this.btnPhong.UseVisualStyleBackColor = false;
            this.btnPhong.Click += new System.EventHandler(this.btnPhong_Click);
            // 
            // btnNguoiDung
            // 
            this.btnNguoiDung.BackColor = System.Drawing.SystemColors.Control;
            this.btnNguoiDung.BackgroundImage = global::QL_KS.Properties.Resources.group;
            this.btnNguoiDung.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Center;
            this.btnNguoiDung.FlatAppearance.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            this.btnNguoiDung.FlatAppearance.BorderSize = 0;
            this.btnNguoiDung.FlatAppearance.CheckedBackColor = System.Drawing.Color.Transparent;
            this.btnNguoiDung.FlatAppearance.MouseDownBackColor = System.Drawing.Color.Transparent;
            this.btnNguoiDung.FlatAppearance.MouseOverBackColor = System.Drawing.Color.Transparent;
            this.btnNguoiDung.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnNguoiDung.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnNguoiDung.ForeColor = System.Drawing.Color.Navy;
            this.btnNguoiDung.Location = new System.Drawing.Point(18, 202);
            this.btnNguoiDung.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.btnNguoiDung.Name = "btnNguoiDung";
            this.btnNguoiDung.Size = new System.Drawing.Size(171, 126);
            this.btnNguoiDung.TabIndex = 8;
            this.btnNguoiDung.Text = "Nhân Viên";
            this.btnNguoiDung.TextAlign = System.Drawing.ContentAlignment.BottomCenter;
            this.btnNguoiDung.UseVisualStyleBackColor = false;
            this.btnNguoiDung.Click += new System.EventHandler(this.btnNguoiDung_Click);
            // 
            // frmMain
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(9F, 20F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.SystemColors.Control;
            this.ClientSize = new System.Drawing.Size(861, 777);
            this.Controls.Add(this.panel2);
            this.Controls.Add(this.panel1);
            this.Controls.Add(this.btnThanhToan);
            this.Controls.Add(this.btnKhachHang);
            this.Controls.Add(this.btnSuDungDV);
            this.Controls.Add(this.btnDichVu);
            this.Controls.Add(this.btnThuePhong);
            this.Controls.Add(this.btnVatDung);
            this.Controls.Add(this.btnPhong);
            this.Controls.Add(this.btnNguoiDung);
            this.Controls.Add(this.mnuChucNang);
            this.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.Name = "frmMain";
            this.Text = "Quản lý khách sạn";
            this.Load += new System.EventHandler(this.frmMain_Load);
            this.mnuChucNang.ResumeLayout(false);
            this.mnuChucNang.PerformLayout();
            this.panel1.ResumeLayout(false);
            this.panel1.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.MenuStrip mnuChucNang;
        private System.Windows.Forms.ToolStripMenuItem account;
        private System.Windows.Forms.ToolStripMenuItem restart;
        private System.Windows.Forms.ToolStripMenuItem exit;
        private System.Windows.Forms.ToolStripMenuItem help;
        private System.Windows.Forms.Button btnThanhToan;
        private System.Windows.Forms.Button btnKhachHang;
        private System.Windows.Forms.Button btnSuDungDV;
        private System.Windows.Forms.Button btnDichVu;
        private System.Windows.Forms.Button btnThuePhong;
        private System.Windows.Forms.Button btnVatDung;
        private System.Windows.Forms.Button btnPhong;
        private System.Windows.Forms.Button btnNguoiDung;
        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Panel panel2;
    }
}