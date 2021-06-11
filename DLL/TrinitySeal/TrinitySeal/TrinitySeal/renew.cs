using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace TrinityGUI
{
    public partial class renew : Form
    {
        string username;
        string password;
        public const int WM_NCLBUTTONDOWN = 0xA1;
        public const int HT_CAPTION = 0x2;
        [System.Runtime.InteropServices.DllImport("user32.dll")]
        public static extern int SendMessage(IntPtr hWnd, int Msg, int wParam, int lParam);
        [System.Runtime.InteropServices.DllImport("user32.dll")]
        public static extern bool ReleaseCapture();
        public renew()
        {
            InitializeComponent();
        }

        public void getinfo(string user, string pass)
        {
            username = user;
            password = pass;
            u.Text = username.ToUpper();
        }
        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }

        private void panel1_MouseDown(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Left)
            {
                ReleaseCapture();
                SendMessage(Handle, WM_NCLBUTTONDOWN, HT_CAPTION, 0);
            }
        }

        private void pictureBox2_Click(object sender, EventArgs e)
        {
            this.Hide();
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            u.Text = user.Text;
        }

        private void user_MouseClick(object sender, MouseEventArgs e)
        {
            bool clicked = false;
            if (!clicked)
            {
                if (user.Text == "Username")
                {
                    user.Text = "";
                    clicked = true;
                }
            }
        }

        private void pass_MouseClick(object sender, MouseEventArgs e)
        {
            bool clicked = false;
            if (!clicked)
            {
                if (pass.Text == "Password")
                {
                    pass.Text = "";
                    clicked = true;
                }
            }
        }

        private void token_MouseClick(object sender, MouseEventArgs e)
        {
            bool clicked = false;
            if (!clicked)
            {
                if (token.Text == "Token")
                {
                    token.Text = "";
                    clicked = true;
                }
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            bool response = TrinitySeal.Seal.RedeemToken(user.Text, pass.Text, token.Text);
            if (response)
            {
                this.Close();
            }
        }

        private void renew_Load(object sender, EventArgs e)
        {
            label2.Text = TrinitySeal.ProgramVariables.ProgramName;
        }

        private void user_TextChanged(object sender, EventArgs e)
        {
            u.Text = user.Text;
        }

        private void timer1_Tick_1(object sender, EventArgs e)
        {
            if (u.Text == "Username" || u.Text == "USERNAME")
            {
                u.Text = string.Empty;
            }
        }
    }
}
