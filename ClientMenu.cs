using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;


//resurse
//design formular https://www.youtube.com/watch?v=CCSOmEEC_28
// adaugare link-uri https://www.youtube.com/watch?v=M5JS3PulBPo
//resize form https://www.youtube.com/watch?v=knW5lF3CRAY
//drag form https://www.youtube.com/watch?v=gEtwEwCrWbE&t=18s


namespace OnlineShop
{
    public partial class ClientMenu : Form
    {
        public Point mouseLocation;
        public ClientMenu()
        {
            InitializeComponent();

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
            if (m.Msg==0x84)
            {
                Point pos = new Point(m.LParam.ToInt32());
                pos= this.PointToClient(pos);
                if(pos.Y< cCaption)
                {
                    m.Result = (IntPtr)2;
                    return;
                }
                if (pos.X >= this.ClientSize.Width -cGrip && pos.Y >= this.ClientSize.Height -cGrip)
                {
                    m.Result= (IntPtr)17;
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




       /* private void label1_Click(object sender, EventArgs e)
        {

        }

        private void label1_Click_1(object sender, EventArgs e)
        {

        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void pictureBox5_Click(object sender, EventArgs e)
        {

        }*/

        private void Programarilbl_Click(object sender, EventArgs e)
        {
            //programari
            System.Diagnostics.Process.Start("http://localhost/portal/programari/programari.html");
        }

        private void Sarcinalbl_Click(object sender, EventArgs e)
        {
            //adresa unei pagini web de pe computer
            System.Diagnostics.Process.Start("http://localhost/portal/sarcinatrimestre/index.html");
        }

        private void Analizelbl_Click(object sender, EventArgs e)
        {
            //adresa unei pagini web de pe computer
            System.Diagnostics.Process.Start("http://localhost/portal/analize/tabelanalize.html");
        }

        private void Fitnesslbl_Click(object sender, EventArgs e)
        {
            //adresa unei pagini web de pe computer
            System.Diagnostics.Process.Start("http://localhost/portal/website/index.html");
        }

        private void shop_Click(object sender, EventArgs e)
        {
            //adresa unei pagini web oarecare
            System.Diagnostics.Process.Start("http://localhost/bebe/index.php");
        }

        private void Exitlbl_Click(object sender, EventArgs e)
        {
            //this.Close();
            LoginForm LoginWindow = new LoginForm();
            LoginWindow.Show();
            this.Hide();
        }
    }
}
