namespace QL_KS.GUI
{
    partial class frmThuePhong
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
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle2 = new System.Windows.Forms.DataGridViewCellStyle();
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle3 = new System.Windows.Forms.DataGridViewCellStyle();
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle1 = new System.Windows.Forms.DataGridViewCellStyle();
            this.btnHuy = new System.Windows.Forms.Button();
            this.btnThue = new System.Windows.Forms.Button();
            this.cmbKhachhang = new System.Windows.Forms.ComboBox();
            this.ckcChuabiet = new System.Windows.Forms.CheckBox();
            this.cmbPhuongthuc = new System.Windows.Forms.ComboBox();
            this.label5 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.dtpNgayra = new System.Windows.Forms.DateTimePicker();
            this.dtpNgayvao = new System.Windows.Forms.DateTimePicker();
            this.label1 = new System.Windows.Forms.Label();
            this.grbThuephong = new System.Windows.Forms.GroupBox();
            this.label4 = new System.Windows.Forms.Label();
            this.splitContainer1 = new System.Windows.Forms.SplitContainer();
            this.dgvThongtin = new System.Windows.Forms.DataGridView();
            this.STT = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.MaPh = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Thue = new System.Windows.Forms.DataGridViewCheckBoxColumn();
            this.SoPhong = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.TrangThai = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.grbThuephong.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.splitContainer1)).BeginInit();
            this.splitContainer1.Panel1.SuspendLayout();
            this.splitContainer1.Panel2.SuspendLayout();
            this.splitContainer1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvThongtin)).BeginInit();
            this.SuspendLayout();
            // 
            // btnHuy
            // 
            this.btnHuy.BackColor = System.Drawing.Color.Aqua;
            this.btnHuy.Location = new System.Drawing.Point(412, 151);
            this.btnHuy.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.btnHuy.Name = "btnHuy";
            this.btnHuy.Size = new System.Drawing.Size(112, 64);
            this.btnHuy.TabIndex = 5;
            this.btnHuy.Text = "Hủy";
            this.btnHuy.UseVisualStyleBackColor = false;
            this.btnHuy.Click += new System.EventHandler(this.btnHuy_Click);
            // 
            // btnThue
            // 
            this.btnThue.BackColor = System.Drawing.Color.Aqua;
            this.btnThue.Location = new System.Drawing.Point(194, 151);
            this.btnThue.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.btnThue.Name = "btnThue";
            this.btnThue.Size = new System.Drawing.Size(112, 64);
            this.btnThue.TabIndex = 4;
            this.btnThue.Text = "Thuê phòng";
            this.btnThue.UseVisualStyleBackColor = false;
            this.btnThue.Click += new System.EventHandler(this.btnThue_Click);
            // 
            // cmbKhachhang
            // 
            this.cmbKhachhang.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.cmbKhachhang.FormattingEnabled = true;
            this.cmbKhachhang.Location = new System.Drawing.Point(179, 49);
            this.cmbKhachhang.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.cmbKhachhang.Name = "cmbKhachhang";
            this.cmbKhachhang.Size = new System.Drawing.Size(258, 34);
            this.cmbKhachhang.TabIndex = 0;
            this.cmbKhachhang.SelectedIndexChanged += new System.EventHandler(this.cmbKhachhang_SelectedIndexChanged);
            // 
            // ckcChuabiet
            // 
            this.ckcChuabiet.AutoSize = true;
            this.ckcChuabiet.Location = new System.Drawing.Point(597, 145);
            this.ckcChuabiet.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.ckcChuabiet.Name = "ckcChuabiet";
            this.ckcChuabiet.Size = new System.Drawing.Size(137, 29);
            this.ckcChuabiet.TabIndex = 12;
            this.ckcChuabiet.Text = "Chưa biết";
            this.ckcChuabiet.UseVisualStyleBackColor = true;
            // 
            // cmbPhuongthuc
            // 
            this.cmbPhuongthuc.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.cmbPhuongthuc.FormattingEnabled = true;
            this.cmbPhuongthuc.Location = new System.Drawing.Point(179, 93);
            this.cmbPhuongthuc.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.cmbPhuongthuc.Name = "cmbPhuongthuc";
            this.cmbPhuongthuc.Size = new System.Drawing.Size(258, 34);
            this.cmbPhuongthuc.TabIndex = 1;
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(20, 98);
            this.label5.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(144, 25);
            this.label5.TabIndex = 10;
            this.label5.Text = "Phương thức";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(477, 54);
            this.label3.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(114, 25);
            this.label3.TabIndex = 8;
            this.label3.Text = "Ngày thuê";
            // 
            // dtpNgayra
            // 
            this.dtpNgayra.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.dtpNgayra.Location = new System.Drawing.Point(597, 97);
            this.dtpNgayra.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.dtpNgayra.Name = "dtpNgayra";
            this.dtpNgayra.Size = new System.Drawing.Size(361, 33);
            this.dtpNgayra.TabIndex = 3;
            this.dtpNgayra.Value = new System.DateTime(2017, 5, 5, 8, 24, 0, 0);
            // 
            // dtpNgayvao
            // 
            this.dtpNgayvao.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.dtpNgayvao.Location = new System.Drawing.Point(597, 49);
            this.dtpNgayvao.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.dtpNgayvao.Name = "dtpNgayvao";
            this.dtpNgayvao.Size = new System.Drawing.Size(361, 33);
            this.dtpNgayvao.TabIndex = 2;
            this.dtpNgayvao.Value = new System.DateTime(2017, 5, 1, 0, 0, 0, 0);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(20, 54);
            this.label1.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(140, 25);
            this.label1.TabIndex = 0;
            this.label1.Text = "Khách Hàng";
            // 
            // grbThuephong
            // 
            this.grbThuephong.Controls.Add(this.btnHuy);
            this.grbThuephong.Controls.Add(this.btnThue);
            this.grbThuephong.Controls.Add(this.cmbKhachhang);
            this.grbThuephong.Controls.Add(this.ckcChuabiet);
            this.grbThuephong.Controls.Add(this.cmbPhuongthuc);
            this.grbThuephong.Controls.Add(this.label5);
            this.grbThuephong.Controls.Add(this.label4);
            this.grbThuephong.Controls.Add(this.label3);
            this.grbThuephong.Controls.Add(this.dtpNgayra);
            this.grbThuephong.Controls.Add(this.dtpNgayvao);
            this.grbThuephong.Controls.Add(this.label1);
            this.grbThuephong.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.grbThuephong.Location = new System.Drawing.Point(0, 0);
            this.grbThuephong.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.grbThuephong.Name = "grbThuephong";
            this.grbThuephong.Padding = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.grbThuephong.Size = new System.Drawing.Size(960, 249);
            this.grbThuephong.TabIndex = 0;
            this.grbThuephong.TabStop = false;
            this.grbThuephong.Text = "Thông tin thuê phòng";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(477, 98);
            this.label4.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(100, 25);
            this.label4.TabIndex = 9;
            this.label4.Text = "Ngày trả";
            // 
            // splitContainer1
            // 
            this.splitContainer1.Dock = System.Windows.Forms.DockStyle.Fill;
            this.splitContainer1.Location = new System.Drawing.Point(0, 0);
            this.splitContainer1.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.splitContainer1.Name = "splitContainer1";
            this.splitContainer1.Orientation = System.Windows.Forms.Orientation.Horizontal;
            // 
            // splitContainer1.Panel1
            // 
            this.splitContainer1.Panel1.Controls.Add(this.grbThuephong);
            // 
            // splitContainer1.Panel2
            // 
            this.splitContainer1.Panel2.Controls.Add(this.dgvThongtin);
            this.splitContainer1.Size = new System.Drawing.Size(969, 631);
            this.splitContainer1.SplitterDistance = 220;
            this.splitContainer1.SplitterWidth = 6;
            this.splitContainer1.TabIndex = 1;
            // 
            // dgvThongtin
            // 
            this.dgvThongtin.AllowUserToAddRows = false;
            this.dgvThongtin.BackgroundColor = System.Drawing.Color.White;
            this.dgvThongtin.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvThongtin.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.STT,
            this.MaPh,
            this.Thue,
            this.SoPhong,
            this.TrangThai});
            this.dgvThongtin.Location = new System.Drawing.Point(4, 32);
            this.dgvThongtin.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.dgvThongtin.Name = "dgvThongtin";
            dataGridViewCellStyle2.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleLeft;
            dataGridViewCellStyle2.BackColor = System.Drawing.SystemColors.Control;
            dataGridViewCellStyle2.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            dataGridViewCellStyle2.ForeColor = System.Drawing.SystemColors.WindowText;
            dataGridViewCellStyle2.Format = "N1";
            dataGridViewCellStyle2.NullValue = "0";
            dataGridViewCellStyle2.SelectionBackColor = System.Drawing.SystemColors.Highlight;
            dataGridViewCellStyle2.SelectionForeColor = System.Drawing.SystemColors.HighlightText;
            dataGridViewCellStyle2.WrapMode = System.Windows.Forms.DataGridViewTriState.True;
            this.dgvThongtin.RowHeadersDefaultCellStyle = dataGridViewCellStyle2;
            dataGridViewCellStyle3.BackColor = System.Drawing.Color.White;
            this.dgvThongtin.RowsDefaultCellStyle = dataGridViewCellStyle3;
            this.dgvThongtin.Size = new System.Drawing.Size(951, 355);
            this.dgvThongtin.TabIndex = 0;
            // 
            // STT
            // 
            dataGridViewCellStyle1.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleCenter;
            this.STT.DefaultCellStyle = dataGridViewCellStyle1;
            this.STT.Frozen = true;
            this.STT.HeaderText = "STT";
            this.STT.Name = "STT";
            this.STT.ReadOnly = true;
            this.STT.Width = 70;
            // 
            // MaPh
            // 
            this.MaPh.DataPropertyName = "MaPh";
            this.MaPh.HeaderText = "MaPh";
            this.MaPh.Name = "MaPh";
            this.MaPh.ReadOnly = true;
            this.MaPh.SortMode = System.Windows.Forms.DataGridViewColumnSortMode.NotSortable;
            // 
            // Thue
            // 
            this.Thue.HeaderText = "Thuê";
            this.Thue.Name = "Thue";
            // 
            // SoPhong
            // 
            this.SoPhong.DataPropertyName = "SoPhong";
            this.SoPhong.HeaderText = "Số phòng";
            this.SoPhong.Name = "SoPhong";
            this.SoPhong.ReadOnly = true;
            this.SoPhong.SortMode = System.Windows.Forms.DataGridViewColumnSortMode.NotSortable;
            this.SoPhong.Width = 150;
            // 
            // TrangThai
            // 
            this.TrangThai.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.TrangThai.DataPropertyName = "TrangThai";
            this.TrangThai.HeaderText = "Trạng Thái";
            this.TrangThai.Name = "TrangThai";
            this.TrangThai.ReadOnly = true;
            this.TrangThai.SortMode = System.Windows.Forms.DataGridViewColumnSortMode.NotSortable;
            // 
            // frmThuePhong
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(9F, 20F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(969, 631);
            this.Controls.Add(this.splitContainer1);
            this.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.Name = "frmThuePhong";
            this.Text = "frmThuePhong";
            this.Load += new System.EventHandler(this.frmThuePhong_Load);
            this.grbThuephong.ResumeLayout(false);
            this.grbThuephong.PerformLayout();
            this.splitContainer1.Panel1.ResumeLayout(false);
            this.splitContainer1.Panel2.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.splitContainer1)).EndInit();
            this.splitContainer1.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.dgvThongtin)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.Button btnHuy;
        private System.Windows.Forms.Button btnThue;
        private System.Windows.Forms.ComboBox cmbKhachhang;
        private System.Windows.Forms.CheckBox ckcChuabiet;
        private System.Windows.Forms.ComboBox cmbPhuongthuc;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.DateTimePicker dtpNgayra;
        private System.Windows.Forms.DateTimePicker dtpNgayvao;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.GroupBox grbThuephong;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.SplitContainer splitContainer1;
        private System.Windows.Forms.DataGridView dgvThongtin;
        private System.Windows.Forms.DataGridViewTextBoxColumn STT;
        private System.Windows.Forms.DataGridViewTextBoxColumn MaPh;
        private System.Windows.Forms.DataGridViewCheckBoxColumn Thue;
        private System.Windows.Forms.DataGridViewTextBoxColumn SoPhong;
        private System.Windows.Forms.DataGridViewTextBoxColumn TrangThai;
    }
}