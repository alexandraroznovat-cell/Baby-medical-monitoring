using System;
using System.Security.Cryptography;
using System.Text;
using System.Windows.Forms;
using Database;
using MySqlConnector;
using System.Drawing;

namespace OnlineShop
{
    public partial class LoginForm : Form
    {
        DbContext database;  
        private string username;
        private string password;

        public Point mouseLocation;

        public LoginForm()
        {
            username = "";
            password = "";
            InitializeComponent();
            database = new DbContext();
            database.Connect();
            database.OpenConnection();

            //transparent menu panel
            panel1.BackColor = Color.FromArgb(100, 0, 0, 0);

            //resizable form pt1
            this.SetStyle(ControlStyles.ResizeRedraw, true);
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

        //drag form https://www.youtube.com/watch?v=gEtwEwCrWbE&t=18s
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

        //original code

        private void ResetFields()
        {
            text_password.Text = "";
            text_username.Text = "";
        }


        // Sign in label ul
        private void SignInLbl_Click(object sender, EventArgs e)
        { //logica de la sign in button va fi mutata aici
          //nu am putut testa conexiunea la db din cauza lipsei
          //bazei de date dar ar trebui sa mearga
            try
            {
                if (string.IsNullOrEmpty(username) || string.IsNullOrEmpty(password))
                {
                    MessageBox.Show("The username or password is missing!", "Mom And Baby - Login Failed", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    ResetFields();
                    return;
                }

                //admin
                 // am comentat sectiunea care face conexiunea la baza de date a se decomenta in varianta finala
                string encrypted = EncrpytPassword(password);//user
                MySqlCommand command = new MySqlCommand("SELECT * FROM admin WHERE admin_nume = @username AND admin_parola = @password",database.DbConnection);
                command.Prepare();
                command.Parameters.AddWithValue("@username", username);
                command.Parameters.AddWithValue("@password", encrypted);

                MySqlDataReader reader = command.ExecuteReader();
                int admincount = 0;
                int usercount = 0;

                while (reader.Read())
                {
                    admincount++;
                }

                reader.Close();
                //client
                if (admincount == 0)
                {
                    command = new MySqlCommand("SELECT * FROM clienti WHERE nume = @nume AND parola = @parola", database.DbConnection);
                    command.Prepare();

                    command.Parameters.AddWithValue("@nume", username);
                    command.Parameters.AddWithValue("@parola", encrypted);
                    reader = command.ExecuteReader();
                    while (reader.Read())
                    {
                        usercount++;
                    }

                    reader.Close();
                }

                //valori folosite pentru testare din cauza lipsei accesului la db
                // a se sterge/comenta cand exista accesul la db
                //int count = 1;

                //test daca username este administrator
                // username = "administrator";

                //test daca userul nu este administrator
                ///username = "user1";



                if (admincount >= 1) 
                {
                    MessageBox.Show("Welcome back, " + username, "Mom And Baby - Login Successful", MessageBoxButtons.OK, MessageBoxIcon.Information);
                    Menu mainMenu = new Menu();
                    mainMenu.Show();
                    this.Hide();
                    return;
                }
                if (usercount >= 1)
                {
                    MessageBox.Show("Welcome back, " + username, "Mom And Baby - Login Successful", MessageBoxButtons.OK, MessageBoxIcon.Information);
                    ClientMenu mainMenu = new ClientMenu();
                    mainMenu.Show();
                    this.Hide();
                    return;
                }
                    MessageBox.Show("Cannot sign you in because the credentials you have provided does not describe any of our existing users!", "Mom And Baby - Login Failed", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    ResetFields();
                    //trimitere catre pg de creare cont
                    CreateAccount createAccount = new CreateAccount();
                    createAccount.Show();
                    this.Hide();
                    return;

            }
            catch (Exception ex)
            {
                MessageBox.Show("Error" + ex);
            }

        }

        private string EncrpytPassword(string password)
        {
            MD5 md5 = new MD5CryptoServiceProvider();
            md5.ComputeHash(Encoding.ASCII.GetBytes(password));
            byte[] result = md5.Hash;

            StringBuilder sb = new StringBuilder();
            for(int i=0; i<result.Length; i++)
            {
                sb.Append(result[i].ToString("x2"));
            }

            return sb.ToString();
        }

        private void text_username_TextChanged(object sender, EventArgs e)
        {
            username = text_username.Text;
        }

        private void text_password_TextChanged(object sender, EventArgs e)
        {
           password  = text_password.Text;
        }




        private void exitLbl_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void CreateAccount_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            CreateAccount createAccount= new CreateAccount();
            createAccount.Show();
            this.Hide();
        }

       
    }

 }

