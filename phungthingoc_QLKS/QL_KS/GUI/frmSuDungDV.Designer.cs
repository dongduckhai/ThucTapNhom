namespace QL_KS.GUI
{
    partial class frmSuDungDV
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
            this.components = new System.ComponentModel.Container();
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(frmSuDungDV));
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle5 = new System.Windows.Forms.DataGridViewCellStyle();
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle6 = new System.Windows.Forms.DataGridViewCellStyle();
            this.label2 = new System.Windows.Forms.Label();
            this.txtHoaDon = new System.Windows.Forms.TextBox();
            this.label4 = new System.Windows.Forms.Label();
            this.cboDichVu = new System.Windows.Forms.ComboBox();
            this.label3 = new System.Windows.Forms.Label();
            this.timer1 = new System.Windows.Forms.Timer(this.components);
            this.cboPhong = new System.Windows.Forms.ComboBox();
            this.label1 = new System.Windows.Forms.Label();
            this.panel1 = new System.Windows.Forms.Panel();
            this.btn_Luu = new System.Windows.Forms.Button();
            this.btnThoat = new System.Windows.Forms.Button();
            this.panel3 = new System.Windows.Forms.Panel();
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.labGio = new System.Windows.Forms.Label();
            this.labNgay = new System.Windows.Forms.Label();
            this.dtpThoiGian = new System.Windows.Forms.DateTimePicker();
            this.toolStrip1 = new System.Windows.Forms.ToolStrip();
            this.toolStripLabel1 = new System.Windows.Forms.ToolStripLabel();
            this.txtTimPhong = new System.Windows.Forms.ToolStripTextBox();
            this.txtTimDV = new System.Windows.Forms.ToolStripTextBox();
            this.btnReset = new System.Windows.Forms.ToolStripButton();
            this.btnSua = new System.Windows.Forms.Button();
            this.btnXoa = new System.Windows.Forms.Button();
            this.btnThem = new System.Windows.Forms.Button();
            this.dgvDanhSach = new System.Windows.Forms.DataGridView();
            this.TenPhong = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.TenDV = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.ThoiGian = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.MaHD = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.DonGia = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.panel1.SuspendLayout();
            this.panel3.SuspendLayout();
            this.groupBox1.SuspendLayout();
            this.toolStrip1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvDanhSach)).BeginInit();
            this.SuspendLayout();
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label2.Location = new System.Drawing.Point(51, 142);
            this.label2.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(99, 25);
            this.label2.TabIndex = 13;
            this.label2.Text = "Hóa đơn";
            // 
            // txtHoaDon
            // 
            this.txtHoaDon.Location = new System.Drawing.Point(171, 134);
            this.txtHoaDon.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.txtHoaDon.Name = "txtHoaDon";
            this.txtHoaDon.Size = new System.Drawing.Size(373, 26);
            this.txtHoaDon.TabIndex = 12;
            this.txtHoaDon.TextChanged += new System.EventHandler(this.txtHoaDon_TextChanged);
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label4.Location = new System.Drawing.Point(51, 183);
            this.label4.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(88, 25);
            this.label4.TabIndex = 8;
            this.label4.Text = "Dịch vụ";
            // 
            // cboDichVu
            // 
            this.cboDichVu.AutoCompleteMode = System.Windows.Forms.AutoCompleteMode.Suggest;
            this.cboDichVu.AutoCompleteSource = System.Windows.Forms.AutoCompleteSource.CustomSource;
            this.cboDichVu.Enabled = false;
            this.cboDichVu.Location = new System.Drawing.Point(171, 175);
            this.cboDichVu.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.cboDichVu.Name = "cboDichVu";
            this.cboDichVu.Size = new System.Drawing.Size(373, 28);
            this.cboDichVu.TabIndex = 2;
            this.cboDichVu.SelectedIndexChanged += new System.EventHandler(this.cboDichVu_SelectedIndexChanged);
            this.cboDichVu.Validated += new System.EventHandler(this.cboDichVu_Validated);
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label3.Location = new System.Drawing.Point(51, 97);
            this.label3.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(77, 25);
            this.label3.TabIndex = 6;
            this.label3.Text = "Phòng";
            // 
            // timer1
            // 
            this.timer1.Enabled = true;
            this.timer1.Interval = 1000;
            this.timer1.Tick += new System.EventHandler(this.timer1_Tick);
            // 
            // cboPhong
            // 
            this.cboPhong.AutoCompleteMode = System.Windows.Forms.AutoCompleteMode.Suggest;
            this.cboPhong.AutoCompleteSource = System.Windows.Forms.AutoCompleteSource.CustomSource;
            this.cboPhong.Enabled = false;
            this.cboPhong.Location = new System.Drawing.Point(171, 89);
            this.cboPhong.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.cboPhong.Name = "cboPhong";
            this.cboPhong.Size = new System.Drawing.Size(373, 28);
            this.cboPhong.TabIndex = 1;
            this.cboPhong.SelectedIndexChanged += new System.EventHandler(this.cboPhong_SelectedIndexChanged);
            this.cboPhong.TextChanged += new System.EventHandler(this.cboPhong_TextChanged);
            this.cboPhong.Validated += new System.EventHandler(this.cboPhong_Validated);
            // 
            // label1
            // 
            this.label1.Anchor = System.Windows.Forms.AnchorStyles.Top;
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Microsoft Sans Serif", 18F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(163)));
            this.label1.ForeColor = System.Drawing.Color.Navy;
            this.label1.Location = new System.Drawing.Point(286, 14);
            this.label1.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(355, 40);
            this.label1.TabIndex = 0;
            this.label1.Text = "SỬ DỤNG DỊCH VỤ";
            // 
            // panel1
            // 
            this.panel1.Controls.Add(this.btn_Luu);
            this.panel1.Controls.Add(this.btnThoat);
            this.panel1.Controls.Add(this.panel3);
            this.panel1.Controls.Add(this.dtpThoiGian);
            this.panel1.Controls.Add(this.toolStrip1);
            this.panel1.Controls.Add(this.btnSua);
            this.panel1.Controls.Add(this.label2);
            this.panel1.Controls.Add(this.txtHoaDon);
            this.panel1.Controls.Add(this.btnXoa);
            this.panel1.Controls.Add(this.label4);
            this.panel1.Controls.Add(this.cboDichVu);
            this.panel1.Controls.Add(this.label3);
            this.panel1.Controls.Add(this.cboPhong);
            this.panel1.Controls.Add(this.btnThem);
            this.panel1.Controls.Add(this.label1);
            this.panel1.Dock = System.Windows.Forms.DockStyle.Top;
            this.panel1.Location = new System.Drawing.Point(0, 0);
            this.panel1.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(928, 395);
            this.panel1.TabIndex = 4;
            // 
            // btn_Luu
            // 
            this.btn_Luu.AccessibleDescription = "";
            this.btn_Luu.BackColor = System.Drawing.Color.Aqua;
            this.btn_Luu.FlatAppearance.BorderSize = 0;
            this.btn_Luu.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btn_Luu.ForeColor = System.Drawing.Color.Black;
            this.btn_Luu.Image = ((System.Drawing.Image)(resources.GetObject("btn_Luu.Image")));
            this.btn_Luu.ImageAlign = System.Drawing.ContentAlignment.MiddleLeft;
            this.btn_Luu.Location = new System.Drawing.Point(464, 240);
            this.btn_Luu.Margin = new System.Windows.Forms.Padding(4);
            this.btn_Luu.Name = "btn_Luu";
            this.btn_Luu.Size = new System.Drawing.Size(113, 62);
            this.btn_Luu.TabIndex = 18;
            this.btn_Luu.Text = "Lưu";
            this.btn_Luu.TextAlign = System.Drawing.ContentAlignment.MiddleRight;
            this.btn_Luu.UseVisualStyleBackColor = false;
            this.btn_Luu.Click += new System.EventHandler(this.btn_Luu_Click);
            // 
            // btnThoat
            // 
            this.btnThoat.BackColor = System.Drawing.Color.Aqua;
            this.btnThoat.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnThoat.Image = global::QL_KS.Properties.Resources.cen2;
            this.btnThoat.ImageAlign = System.Drawing.ContentAlignment.MiddleLeft;
            this.btnThoat.Location = new System.Drawing.Point(601, 240);
            this.btnThoat.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.btnThoat.Name = "btnThoat";
            this.btnThoat.Size = new System.Drawing.Size(113, 62);
            this.btnThoat.TabIndex = 17;
            this.btnThoat.Text = "Thoát";
            this.btnThoat.TextAlign = System.Drawing.ContentAlignment.MiddleRight;
            this.btnThoat.UseVisualStyleBackColor = false;
            this.btnThoat.Click += new System.EventHandler(this.btnThoat_Click);
            // 
            // panel3
            // 
            this.panel3.Controls.Add(this.groupBox1);
            this.panel3.Location = new System.Drawing.Point(591, 73);
            this.panel3.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.panel3.Name = "panel3";
            this.panel3.Size = new System.Drawing.Size(315, 162);
            this.panel3.TabIndex = 16;
            // 
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.labGio);
            this.groupBox1.Controls.Add(this.labNgay);
            this.groupBox1.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.groupBox1.Location = new System.Drawing.Point(10, 8);
            this.groupBox1.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Padding = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.groupBox1.Size = new System.Drawing.Size(300, 146);
            this.groupBox1.TabIndex = 10;
            this.groupBox1.TabStop = false;
            this.groupBox1.Text = "Thời gian";
            // 
            // labGio
            // 
            this.labGio.AutoSize = true;
            this.labGio.Font = new System.Drawing.Font("Microsoft Sans Serif", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(163)));
            this.labGio.ForeColor = System.Drawing.Color.Cyan;
            this.labGio.Location = new System.Drawing.Point(68, 94);
            this.labGio.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.labGio.Name = "labGio";
            this.labGio.Size = new System.Drawing.Size(66, 33);
            this.labGio.TabIndex = 11;
            this.labGio.Text = "end";
            // 
            // labNgay
            // 
            this.labNgay.AutoSize = true;
            this.labNgay.Font = new System.Drawing.Font("Microsoft Sans Serif", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(163)));
            this.labNgay.ForeColor = System.Drawing.Color.Cyan;
            this.labNgay.Location = new System.Drawing.Point(70, 42);
            this.labNgay.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.labNgay.Name = "labNgay";
            this.labNgay.Size = new System.Drawing.Size(77, 33);
            this.labNgay.TabIndex = 10;
            this.labNgay.Text = "start";
            this.labNgay.Click += new System.EventHandler(this.labNgay_Click);
            // 
            // dtpThoiGian
            // 
            this.dtpThoiGian.Location = new System.Drawing.Point(632, 157);
            this.dtpThoiGian.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.dtpThoiGian.Name = "dtpThoiGian";
            this.dtpThoiGian.Size = new System.Drawing.Size(228, 26);
            this.dtpThoiGian.TabIndex = 15;
            // 
            // toolStrip1
            // 
            this.toolStrip1.AutoSize = false;
            this.toolStrip1.Dock = System.Windows.Forms.DockStyle.Bottom;
            this.toolStrip1.ImageScalingSize = new System.Drawing.Size(24, 24);
            this.toolStrip1.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.toolStripLabel1,
            this.txtTimPhong,
            this.txtTimDV,
            this.btnReset});
            this.toolStrip1.Location = new System.Drawing.Point(0, 326);
            this.toolStrip1.Name = "toolStrip1";
            this.toolStrip1.Padding = new System.Windows.Forms.Padding(0, 0, 2, 0);
            this.toolStrip1.Size = new System.Drawing.Size(928, 69);
            this.toolStrip1.TabIndex = 14;
            this.toolStrip1.Text = "toolStrip1";
            // 
            // toolStripLabel1
            // 
            this.toolStripLabel1.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.toolStripLabel1.Name = "toolStripLabel1";
            this.toolStripLabel1.Size = new System.Drawing.Size(88, 66);
            this.toolStripLabel1.Text = "  Tìm    ";
            // 
            // txtTimPhong
            // 
            this.txtTimPhong.Name = "txtTimPhong";
            this.txtTimPhong.Size = new System.Drawing.Size(148, 69);
            this.txtTimPhong.Text = "Phòng";
            this.txtTimPhong.Click += new System.EventHandler(this.txtTimPhong_Click);
            this.txtTimPhong.TextChanged += new System.EventHandler(this.txtTimPhong_TextChanged);
            // 
            // txtTimDV
            // 
            this.txtTimDV.Name = "txtTimDV";
            this.txtTimDV.Size = new System.Drawing.Size(238, 69);
            this.txtTimDV.Text = "Dịch vụ";
            this.txtTimDV.Click += new System.EventHandler(this.txtTimDV_Click);
            this.txtTimDV.TextChanged += new System.EventHandler(this.txtTimDV_TextChanged);
            // 
            // btnReset
            // 
            this.btnReset.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Text;
            this.btnReset.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnReset.Image = global::QL_KS.Properties.Resources.update1;
            this.btnReset.ImageAlign = System.Drawing.ContentAlignment.MiddleLeft;
            this.btnReset.ImageTransparentColor = System.Drawing.Color.Magenta;
            this.btnReset.Name = "btnReset";
            this.btnReset.Size = new System.Drawing.Size(72, 66);
            this.btnReset.Text = "Reset";
            this.btnReset.Click += new System.EventHandler(this.btnReset_Click);
            // 
            // btnSua
            // 
            this.btnSua.BackColor = System.Drawing.Color.Aqua;
            this.btnSua.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnSua.Image = global::QL_KS.Properties.Resources._1462365475_accessories_text_editor;
            this.btnSua.ImageAlign = System.Drawing.ContentAlignment.MiddleLeft;
            this.btnSua.Location = new System.Drawing.Point(194, 240);
            this.btnSua.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.btnSua.Name = "btnSua";
            this.btnSua.Size = new System.Drawing.Size(119, 60);
            this.btnSua.TabIndex = 4;
            this.btnSua.Text = "Sửa";
            this.btnSua.TextAlign = System.Drawing.ContentAlignment.MiddleRight;
            this.btnSua.UseVisualStyleBackColor = false;
            this.btnSua.Click += new System.EventHandler(this.btnLuu_Click);
            // 
            // btnXoa
            // 
            this.btnXoa.BackColor = System.Drawing.Color.Aqua;
            this.btnXoa.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnXoa.Image = global::QL_KS.Properties.Resources.del321;
            this.btnXoa.ImageAlign = System.Drawing.ContentAlignment.MiddleLeft;
            this.btnXoa.Location = new System.Drawing.Point(334, 240);
            this.btnXoa.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.btnXoa.Name = "btnXoa";
            this.btnXoa.Size = new System.Drawing.Size(113, 62);
            this.btnXoa.TabIndex = 5;
            this.btnXoa.Text = "Xóa";
            this.btnXoa.TextAlign = System.Drawing.ContentAlignment.MiddleRight;
            this.btnXoa.UseVisualStyleBackColor = false;
            this.btnXoa.Click += new System.EventHandler(this.btnXoa_Click);
            // 
            // btnThem
            // 
            this.btnThem.BackColor = System.Drawing.Color.Aqua;
            this.btnThem.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnThem.Image = global::QL_KS.Properties.Resources.add32;
            this.btnThem.ImageAlign = System.Drawing.ContentAlignment.MiddleLeft;
            this.btnThem.Location = new System.Drawing.Point(56, 240);
            this.btnThem.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.btnThem.Name = "btnThem";
            this.btnThem.Size = new System.Drawing.Size(116, 60);
            this.btnThem.TabIndex = 3;
            this.btnThem.Text = "Thêm";
            this.btnThem.TextAlign = System.Drawing.ContentAlignment.MiddleRight;
            this.btnThem.UseVisualStyleBackColor = false;
            this.btnThem.Click += new System.EventHandler(this.btnThem_Click);
            // 
            // dgvDanhSach
            // 
            this.dgvDanhSach.AllowUserToAddRows = false;
            this.dgvDanhSach.AllowUserToDeleteRows = false;
            this.dgvDanhSach.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.dgvDanhSach.BackgroundColor = System.Drawing.Color.White;
            dataGridViewCellStyle5.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleCenter;
            dataGridViewCellStyle5.BackColor = System.Drawing.SystemColors.Control;
            dataGridViewCellStyle5.Font = new System.Drawing.Font("Microsoft Sans Serif", 9F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(163)));
            dataGridViewCellStyle5.ForeColor = System.Drawing.SystemColors.WindowText;
            dataGridViewCellStyle5.SelectionBackColor = System.Drawing.SystemColors.Highlight;
            dataGridViewCellStyle5.SelectionForeColor = System.Drawing.SystemColors.HighlightText;
            dataGridViewCellStyle5.WrapMode = System.Windows.Forms.DataGridViewTriState.True;
            this.dgvDanhSach.ColumnHeadersDefaultCellStyle = dataGridViewCellStyle5;
            this.dgvDanhSach.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvDanhSach.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.TenPhong,
            this.TenDV,
            this.ThoiGian,
            this.MaHD,
            this.DonGia});
            this.dgvDanhSach.Location = new System.Drawing.Point(-14, 405);
            this.dgvDanhSach.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.dgvDanhSach.Name = "dgvDanhSach";
            this.dgvDanhSach.RowHeadersWidth = 37;
            this.dgvDanhSach.Size = new System.Drawing.Size(942, 291);
            this.dgvDanhSach.TabIndex = 10;
            this.dgvDanhSach.TabStop = false;
            this.dgvDanhSach.CellEnter += new System.Windows.Forms.DataGridViewCellEventHandler(this.dgvDanhSach_CellEnter);
            // 
            // TenPhong
            // 
            this.TenPhong.DataPropertyName = "SoPhong";
            this.TenPhong.HeaderText = "Phòng";
            this.TenPhong.Name = "TenPhong";
            this.TenPhong.Width = 80;
            // 
            // TenDV
            // 
            this.TenDV.DataPropertyName = "TenDV";
            this.TenDV.HeaderText = "Dịch vụ";
            this.TenDV.Name = "TenDV";
            this.TenDV.Width = 150;
            // 
            // ThoiGian
            // 
            this.ThoiGian.DataPropertyName = "ThoiGian";
            dataGridViewCellStyle6.Format = "G";
            dataGridViewCellStyle6.NullValue = null;
            this.ThoiGian.DefaultCellStyle = dataGridViewCellStyle6;
            this.ThoiGian.HeaderText = "Thời gian";
            this.ThoiGian.Name = "ThoiGian";
            this.ThoiGian.Width = 150;
            // 
            // MaHD
            // 
            this.MaHD.DataPropertyName = "MaHD";
            this.MaHD.HeaderText = "Hóa đơn";
            this.MaHD.Name = "MaHD";
            // 
            // DonGia
            // 
            this.DonGia.DataPropertyName = "Gia";
            this.DonGia.HeaderText = "Đơn giá";
            this.DonGia.Name = "DonGia";
            // 
            // frmSuDungDV
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(9F, 20F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(928, 700);
            this.Controls.Add(this.dgvDanhSach);
            this.Controls.Add(this.panel1);
            this.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.Name = "frmSuDungDV";
            this.Text = "Sử dụng dịch vụ";
            this.Load += new System.EventHandler(this.frmSuDungDV_Load);
            this.panel1.ResumeLayout(false);
            this.panel1.PerformLayout();
            this.panel3.ResumeLayout(false);
            this.groupBox1.ResumeLayout(false);
            this.groupBox1.PerformLayout();
            this.toolStrip1.ResumeLayout(false);
            this.toolStrip1.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvDanhSach)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion
        private System.Windows.Forms.Button btnSua;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.TextBox txtHoaDon;
        private System.Windows.Forms.Button btnXoa;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.ComboBox cboDichVu;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Timer timer1;
        private System.Windows.Forms.ComboBox cboPhong;
        private System.Windows.Forms.Button btnThem;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.GroupBox groupBox1;
        private System.Windows.Forms.Label labGio;
        private System.Windows.Forms.Label labNgay;
        private System.Windows.Forms.DataGridView dgvDanhSach;
        private System.Windows.Forms.ToolStrip toolStrip1;
        private System.Windows.Forms.ToolStripLabel toolStripLabel1;
        private System.Windows.Forms.ToolStripTextBox txtTimPhong;
        private System.Windows.Forms.ToolStripTextBox txtTimDV;
        private System.Windows.Forms.Panel panel3;
        private System.Windows.Forms.DateTimePicker dtpThoiGian;
        public System.Windows.Forms.ToolStripButton btnReset;
        private System.Windows.Forms.Button btnThoat;
        private System.Windows.Forms.DataGridViewTextBoxColumn TenPhong;
        private System.Windows.Forms.DataGridViewTextBoxColumn TenDV;
        private System.Windows.Forms.DataGridViewTextBoxColumn ThoiGian;
        private System.Windows.Forms.DataGridViewTextBoxColumn MaHD;
        private System.Windows.Forms.DataGridViewTextBoxColumn DonGia;
        private System.Windows.Forms.Button btn_Luu;
    }
}