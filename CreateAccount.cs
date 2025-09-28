using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using Database;
using MySqlConnector;
using System.Security.Cryptography;

namespace OnlineShop
{
    public partial class CreateAccount : Form
    {
        DbContext database = new DbContext();

        public Point mouseLocation;

        public CreateAccount()
        {
           
            InitializeComponent();

            //adaugate pentru creare cont
            database = new DbContext();
            database.Connect();
            database.OpenConnection();

            //transparent menu panel
            panel1.BackColor = Color.FromArgb(100, 0, 0, 0);

            //resizable form pt1
            this.SetStyle(ControlStyles.ResizeRedraw, true);

        }

        public string email { get; set; } 
        public string nume { get; set; }
        public string parola { get; set; }
        public string telefon { get; set; }
        public string adresa { get; set; }


        private bool ReadyForInsert()
        {
            if (string.IsNullOrEmpty(email) || string.IsNullOrEmpty(nume) || string.IsNullOrEmpty(parola) || string.IsNullOrEmpty(telefon) || string.IsNullOrEmpty(adresa))

            {
                return false;
            }
            return true;
        }

        //resizeble form pt2
        private const int cGrip = 16;
        private const int cCaption = 32;

        protected override void WndProc(ref Message m)
        {
            if (m.Msg == 0x84)
            {
                Point pos = new Point(m.LParam.ToInt32());
                pos = this.PointToClient(pos);
                if (pos.Y < cCaption)
                {
                    m.Result = (IntPtr)2;
                    return;
                }
                if (pos.X >= this.ClientSize.Width - cGrip && pos.Y >= this.ClientSize.Height - cGrip)
                {
                    m.Result = (IntPtr)17;
                    return;

                }

            }
            base.WndProc(ref m);
        }

        //buton inregistrare
        private void InregistrareLbl_Click(object sender, EventArgs e)
        {
            email = text_mail.Text;
            nume = text_nume.Text;
            parola = text_password.Text;
            telefon = text_telefon.Text;
            adresa = text_adresa.Text;

            if( ! ReadyForInsert())
            {
                MessageBox.Show("At least one sign up credential was invalid. Please fill in all the blanks in order to continue!");
                return; 
            }

            try
            {

                string encrypted = EncrpytPassword(parola);
                MySqlCommand command = new MySqlCommand("INSERT INTO clienti (email, nume, parola, telefon, adresa ) VALUES (@email, @nume, @parola, @telefon, @adresa )", database.DbConnection);
                command.Prepare();
                command.Parameters.AddWithValue("@email", email);
                command.Parameters.AddWithValue("@nume", nume);
                command.Parameters.AddWithValue("@parola", encrypted);
                command.Parameters.AddWithValue("@telefon", telefon);
                command.Parameters.AddWithValue("@adresa", adresa);



                int rows = command.ExecuteNonQuery();
                if (rows > 0)
                {

                    MessageBox.Show("Insert successful");
                    LoginForm client = new LoginForm();
                    client.Show();
                    this.Hide();

                }
                else
                {

                    MessageBox.Show("At least one sign up credential was invalid. Please fill in all the blanks in order to continue");
                }


            }
            catch (Exception ex)
            {
                MessageBox.Show("Error" + ex);
            }
            return;
        }

        

        private void mouse_Down(object sender, MouseEventArgs e)
        {
            mouseLocation = new Point(-e.X, -e.Y);
        }

        private void mouse_Move(object sender, MouseEventArgs e)
        {
            
                if (e.Button == MouseButtons.Left)
                {
                    Point mousePose = Control.MousePosition;
                    mousePose.Offset(mouseLocation.X, mouseLocation.Y);
                    Location = mousePose;
                }
        }


        //cod pentru adaugate cont

        private void ResetFields()
        {
           text_mail.Text = "";
           text_nume.Text = "";
           text_password.Text = "";
           text_telefon.Text = "";
           text_adresa.Text = "";
        }

      
















        //buton log out
        private void IesireLbl_Click(object sender, EventArgs e)
        {
            //this.Close();
            LoginForm client = new LoginForm();
            client.Show();
            this.Hide();
        }

        private string EncrpytPassword(string password)
        {
            MD5 md5 = new MD5CryptoServiceProvider();
            md5.ComputeHash(Encoding.ASCII.GetBytes(password));
            byte[] result = md5.Hash;

            StringBuilder sb = new StringBuilder();
            for (int i = 0; i < result.Length; i++)
            {
                sb.Append(result[i].ToString("x2"));
            }

            return sb.ToString();
        }


    }
}
