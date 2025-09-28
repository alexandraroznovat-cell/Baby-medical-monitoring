namespace OnlineShop
{
    partial class CreateAccount
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(CreateAccount));
            this.panel1 = new System.Windows.Forms.Panel();
            this.AdresaLbl = new System.Windows.Forms.Label();
            this.text_adresa = new System.Windows.Forms.TextBox();
            this.TelefonLbl = new System.Windows.Forms.Label();
            this.text_telefon = new System.Windows.Forms.TextBox();
            this.IesireLbl = new System.Windows.Forms.Label();
            this.InregistrareLbl = new System.Windows.Forms.Label();
            this.ParolaLbl = new System.Windows.Forms.Label();
            this.text_password = new System.Windows.Forms.TextBox();
            this.utilizatorLbl = new System.Windows.Forms.Label();
            this.text_nume = new System.Windows.Forms.TextBox();
            this.text_mail = new System.Windows.Forms.TextBox();
            this.emailLbl = new System.Windows.Forms.Label();
            this.panel1.SuspendLayout();
            this.SuspendLayout();
            // 
            // panel1
            // 
            this.panel1.BackColor = System.Drawing.SystemColors.ControlDark;
            this.panel1.Controls.Add(this.AdresaLbl);
            this.panel1.Controls.Add(this.text_adresa);
            this.panel1.Controls.Add(this.TelefonLbl);
            this.panel1.Controls.Add(this.text_telefon);
            this.panel1.Controls.Add(this.IesireLbl);
            this.panel1.Controls.Add(this.InregistrareLbl);
            this.panel1.Controls.Add(this.ParolaLbl);
            this.panel1.Controls.Add(this.text_password);
            this.panel1.Controls.Add(this.utilizatorLbl);
            this.panel1.Controls.Add(this.text_nume);
            this.panel1.Controls.Add(this.text_mail);
            this.panel1.Controls.Add(this.emailLbl);
            this.panel1.Location = new System.Drawing.Point(403, 73);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(287, 425);
            this.panel1.TabIndex = 0;
            // 
            // AdresaLbl
            // 
            this.AdresaLbl.AutoSize = true;
            this.AdresaLbl.BackColor = System.Drawing.Color.Transparent;
            this.AdresaLbl.Font = new System.Drawing.Font("Century Gothic", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.AdresaLbl.ForeColor = System.Drawing.SystemColors.ButtonHighlight;
            this.AdresaLbl.Location = new System.Drawing.Point(40, 255);
            this.AdresaLbl.Name = "AdresaLbl";
            this.AdresaLbl.Size = new System.Drawing.Size(61, 20);
            this.AdresaLbl.TabIndex = 12;
            this.AdresaLbl.Text = "Adresa";
            // 
            // text_adresa
            // 
            this.text_adresa.Location = new System.Drawing.Point(41, 278);
            this.text_adresa.Multiline = true;
            this.text_adresa.Name = "text_adresa";
            this.text_adresa.Size = new System.Drawing.Size(227, 66);
            this.text_adresa.TabIndex = 11;
            // 
            // TelefonLbl
            // 
            this.TelefonLbl.AutoSize = true;
            this.TelefonLbl.BackColor = System.Drawing.Color.Transparent;
            this.TelefonLbl.Font = new System.Drawing.Font("Century Gothic", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.TelefonLbl.ForeColor = System.Drawing.SystemColors.ButtonHighlight;
            this.TelefonLbl.Location = new System.Drawing.Point(40, 205);
            this.TelefonLbl.Name = "TelefonLbl";
            this.TelefonLbl.Size = new System.Drawing.Size(61, 20);
            this.TelefonLbl.TabIndex = 10;
            this.TelefonLbl.Text = "Telefon";
            // 
            // text_telefon
            // 
            this.text_telefon.Location = new System.Drawing.Point(41, 228);
            this.text_telefon.Name = "text_telefon";
            this.text_telefon.Size = new System.Drawing.Size(227, 20);
            this.text_telefon.TabIndex = 9;
            // 
            // IesireLbl
            // 
            this.IesireLbl.AutoSize = true;
            this.IesireLbl.BackColor = System.Drawing.Color.Transparent;
            this.IesireLbl.Font = new System.Drawing.Font("Century Gothic", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.IesireLbl.ForeColor = System.Drawing.SystemColors.ButtonHighlight;
            this.IesireLbl.Location = new System.Drawing.Point(182, 377);
            this.IesireLbl.Name = "IesireLbl";
            this.IesireLbl.Size = new System.Drawing.Size(67, 20);
            this.IesireLbl.TabIndex = 8;
            this.IesireLbl.Text = "Log Out";
            this.IesireLbl.Click += new System.EventHandler(this.IesireLbl_Click);
            // 
            // InregistrareLbl
            // 
            this.InregistrareLbl.AutoSize = true;
            this.InregistrareLbl.BackColor = System.Drawing.Color.Transparent;
            this.InregistrareLbl.Font = new System.Drawing.Font("Century Gothic", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.InregistrareLbl.ForeColor = System.Drawing.SystemColors.ButtonHighlight;
            this.InregistrareLbl.Location = new System.Drawing.Point(37, 377);
            this.InregistrareLbl.Name = "InregistrareLbl";
            this.InregistrareLbl.Size = new System.Drawing.Size(92, 20);
            this.InregistrareLbl.TabIndex = 7;
            this.InregistrareLbl.Text = "Inregistrare";
            this.InregistrareLbl.Click += new System.EventHandler(this.InregistrareLbl_Click);
            this.InregistrareLbl.MouseDown += new System.Windows.Forms.MouseEventHandler(this.mouse_Down);
            this.InregistrareLbl.MouseMove += new System.Windows.Forms.MouseEventHandler(this.mouse_Move);
            // 
            // ParolaLbl
            // 
            this.ParolaLbl.AutoSize = true;
            this.ParolaLbl.BackColor = System.Drawing.Color.Transparent;
            this.ParolaLbl.Font = new System.Drawing.Font("Century Gothic", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.ParolaLbl.ForeColor = System.Drawing.SystemColors.ButtonHighlight;
            this.ParolaLbl.Location = new System.Drawing.Point(40, 155);
            this.ParolaLbl.Name = "ParolaLbl";
            this.ParolaLbl.Size = new System.Drawing.Size(56, 20);
            this.ParolaLbl.TabIndex = 6;
            this.ParolaLbl.Text = "Parola";
            // 
            // text_password
            // 
            this.text_password.Location = new System.Drawing.Point(41, 178);
            this.text_password.Name = "text_password";
            this.text_password.PasswordChar = '*';
            this.text_password.Size = new System.Drawing.Size(227, 20);
            this.text_password.TabIndex = 5;
            // 
            // utilizatorLbl
            // 
            this.utilizatorLbl.AutoSize = true;
            this.utilizatorLbl.BackColor = System.Drawing.Color.Transparent;
            this.utilizatorLbl.Font = new System.Drawing.Font("Century Gothic", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.utilizatorLbl.ForeColor = System.Drawing.SystemColors.ButtonHighlight;
            this.utilizatorLbl.Location = new System.Drawing.Point(40, 105);
            this.utilizatorLbl.Name = "utilizatorLbl";
            this.utilizatorLbl.Size = new System.Drawing.Size(115, 20);
            this.utilizatorLbl.TabIndex = 4;
            this.utilizatorLbl.Text = "Nume utilizator";
            // 
            // text_nume
            // 
            this.text_nume.Location = new System.Drawing.Point(41, 128);
            this.text_nume.Name = "text_nume";
            this.text_nume.Size = new System.Drawing.Size(227, 20);
            this.text_nume.TabIndex = 3;
            // 
            // text_mail
            // 
            this.text_mail.Location = new System.Drawing.Point(41, 78);
            this.text_mail.Name = "text_mail";
            this.text_mail.Size = new System.Drawing.Size(227, 20);
            this.text_mail.TabIndex = 2;
            // 
            // emailLbl
            // 
            this.emailLbl.AutoSize = true;
            this.emailLbl.BackColor = System.Drawing.Color.Transparent;
            this.emailLbl.Font = new System.Drawing.Font("Century Gothic", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.emailLbl.ForeColor = System.Drawing.SystemColors.ButtonHighlight;
            this.emailLbl.Location = new System.Drawing.Point(40, 55);
            this.emailLbl.Name = "emailLbl";
            this.emailLbl.Size = new System.Drawing.Size(104, 20);
            this.emailLbl.TabIndex = 0;
            this.emailLbl.Text = "Adresa email";
            // 
            // CreateAccount
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("$this.BackgroundImage")));
            this.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Zoom;
            this.ClientSize = new System.Drawing.Size(877, 657);
            this.Controls.Add(this.panel1);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.None;
            this.Name = "CreateAccount";
            this.Text = "CreateAccount";
            this.MouseDown += new System.Windows.Forms.MouseEventHandler(this.mouse_Down);
            this.MouseMove += new System.Windows.Forms.MouseEventHandler(this.mouse_Move);
            this.panel1.ResumeLayout(false);
            this.panel1.PerformLayout();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.Label emailLbl;
        private System.Windows.Forms.TextBox text_nume;
        private System.Windows.Forms.TextBox text_mail;
        private System.Windows.Forms.Label InregistrareLbl;
        private System.Windows.Forms.Label ParolaLbl;
        private System.Windows.Forms.TextBox text_password;
        private System.Windows.Forms.Label utilizatorLbl;
        private System.Windows.Forms.Label IesireLbl;
        private System.Windows.Forms.Label AdresaLbl;
        private System.Windows.Forms.TextBox text_adresa;
        private System.Windows.Forms.Label TelefonLbl;
        private System.Windows.Forms.TextBox text_telefon;
    }
}