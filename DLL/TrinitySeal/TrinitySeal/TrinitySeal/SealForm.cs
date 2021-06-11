using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Diagnostics;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using TrinitySeal;

namespace TrinityGUI
{
    public partial class SealForm : Form
    {
        Point LT = new Point(0, 0);
        Point RT = new Point(72, 0);
        Point CT = new Point(143, 0);
        bool savecred;
        TrinitySeal.Properties.Settings settings = TrinitySeal.Properties.Settings.Default;
        public const int WM_NCLBUTTONDOWN = 0xA1;
        public const int HT_CAPTION = 0x2;
        [System.Runtime.InteropServices.DllImport("user32.dll")]
        public static extern int SendMessage(IntPtr hWnd, int Msg, int wParam, int lParam);
        [System.Runtime.InteropServices.DllImport("user32.dll")]
        public static extern bool ReleaseCapture();
        public static System.Windows.Forms.Form UserMainForm { get; set; }
        public static System.Windows.Forms.Form UserAuthForm { get; set; }
        public static string ProgramID { get; set; }
        public static string Version { get; set; }
        public static string VariableKey { get; set; }
        public static SealColours SelectedColour = SealColours.Green;

        #region Colours
        private void ReadColour(SealColours Colour)
        {
            if (Colour == SealColours.Red)
            {
                login.BackColor = Color.FromArgb(231, 76, 60);
                tabtab.BackColor = Color.FromArgb(231, 76, 60);
                label7.ForeColor = Color.FromArgb(231, 76, 60);
            }
            if (Colour == SealColours.Blue)
            {
                login.BackColor = Color.DodgerBlue;
                tabtab.BackColor = Color.DodgerBlue;
                label7.ForeColor = Color.DodgerBlue;
            }
            if (Colour == SealColours.Green)
            {
                login.BackColor = Color.Green;
                tabtab.BackColor = Color.Green;
                label7.ForeColor = Color.Green;
            }
            if (Colour == SealColours.Purple)
            {
                login.BackColor = Color.MediumPurple;
                tabtab.BackColor = Color.MediumPurple;
                label7.ForeColor = Color.MediumPurple;
            }
            if (Colour == SealColours.Grey)
            {
                login.BackColor = Color.DarkGray;
                tabtab.BackColor = Color.DarkGray;
                label7.ForeColor = Color.DarkGray;
            }
            if (Colour == SealColours.Orange)
            {
                login.BackColor = Color.FromArgb(255, 117, 24);
                tabtab.BackColor = Color.FromArgb(255, 117, 24);
                label7.ForeColor = Color.FromArgb(255, 117, 24);
            }
            if (Colour == SealColours.Pink)
            {
                login.BackColor = Color.HotPink;
                tabtab.BackColor = Color.HotPink;
                label7.ForeColor = Color.HotPink;
            }
        }

        #endregion


        public SealForm(string programid, string version, string variablekey, System.Windows.Forms.Form AuthForm, System.Windows.Forms.Form MainForm, SealColours Colour)
        {
            InitializeComponent();
            if (string.IsNullOrEmpty(programid) || string.IsNullOrEmpty(version))
            {
                MessageBox.Show("Please don't directly open the form, call to TrinitySeal.Seal.InitializeForm!", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                Environment.Exit(0);
            }
            UserMainForm = MainForm;
            UserAuthForm = AuthForm;
            ProgramID = programid;
            Version = version;
            VariableKey = variablekey;
            TrinitySeal.Seal.Secret = programid;
            TrinitySeal.Seal.Initialize(version);
            SelectedColour = Colour;
            ReadColour(Colour);
            if (TrinitySeal.ProgramVariables.Freemode)
            {
                Seal.InitPassed = true;
                Seal.LoginPassed = true;
            }
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            label2.Text = TrinitySeal.ProgramVariables.ProgramName;
            savecred = settings.check;
            if (settings.check == true)
            {
                user.Text = settings.username;
                pass.Text = settings.password;
                switch (SelectedColour) {
                    case SealColours.Blue:
                        save.Image = TrinitySeal.Properties.Resources.blue;
                        break;
                    case SealColours.Red:
                        save.Image = TrinitySeal.Properties.Resources.red;
                        break;
                    case SealColours.Green:
                        save.Image = TrinitySeal.Properties.Resources.green;
                        break;
                    case SealColours.Purple:
                        save.Image = TrinitySeal.Properties.Resources.purple;
                        break;
                    case SealColours.Grey:
                        save.Image = TrinitySeal.Properties.Resources.grey;
                        break;
                    case SealColours.Orange:
                        save.Image = TrinitySeal.Properties.Resources.orange;
                        break;
                    case SealColours.Pink:
                        save.Image = TrinitySeal.Properties.Resources.pink;
                        break;
                }
                
            }
            else
            {
                save.Image = TrinitySeal.Properties.Resources.off;
            }
        }

        private void Form1_MouseDown(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Left)
            {
                ReleaseCapture();
                SendMessage(Handle, WM_NCLBUTTONDOWN, HT_CAPTION, 0);
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void checkL()
        {
            if (user.Text == string.Empty || pass.Text == String.Empty)
            {
                login.Enabled = false;
            }
            else
            {
                login.Enabled = true;
            }
        }

        private void checkR()
        {
            if (ruser.Text == string.Empty || rpass.Text == String.Empty || email.Text == String.Empty || token.Text == String.Empty)
            {
                login.Enabled = false;
            }
            else
            {
                login.Enabled = true;
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            WindowState = FormWindowState.Minimized;
        }

        private void pictureBox2_Click(object sender, EventArgs e)
        {
            DialogResult dr = MessageBox.Show("Yes: Close Application\n\nNo: Minimize Application", "Exit the application?", MessageBoxButtons.YesNo);
            switch (dr)
            {
                case DialogResult.Yes:
                    Application.Exit();
                    settings.check = savecred;
                    settings.Save();
                    break;
                case DialogResult.No:
                    WindowState = FormWindowState.Minimized;
                    break;
            }
           

        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {
            Dostuff(null, null);
        }


        private void label1_Click(object sender, EventArgs e)
        {
            Dostuff(null, null);
        }

        private void label4_Click(object sender, EventArgs e)
        {
            tab.Location = LT;
            label4.BackColor = Color.FromArgb(25, 25, 25);
            label5.BackColor = Color.FromArgb(40, 40, 40);
            label6.BackColor = Color.FromArgb(40, 40, 40);
            ico.Image = TrinitySeal.Properties.Resources.li;
            txt.Text = "Login";
            LTab.BringToFront();
            checkL();
        }

        private void label5_Click(object sender, EventArgs e)
        {
            tab.Location = RT;
            label4.BackColor = Color.FromArgb(40, 40, 40);
            label5.BackColor = Color.FromArgb(25,25,25);
            label6.BackColor = Color.FromArgb(40, 40, 40);
            ico.Image = TrinitySeal.Properties.Resources.reg;
            txt.Text = "Register";
            RTab.BringToFront();
            checkR();
        }

        private void label6_Click(object sender, EventArgs e)
        {
            renew renew = new renew();
            renew.getinfo(user.Text, pass.Text);
            renew.Show();
        }

        private void save_Click(object sender, EventArgs e)
        {
            if (savecred == true)
            {
                settings.check = false;
                savecred = false;
                save.Image = TrinitySeal.Properties.Resources.off;
            }
            else
            {
                settings.check = true;
                savecred = true;
                switch (SelectedColour)
                {
                    case SealColours.Blue:
                        save.Image = TrinitySeal.Properties.Resources.blue;
                        break;
                    case SealColours.Red:
                        save.Image = TrinitySeal.Properties.Resources.red;
                        break;
                    case SealColours.Green:
                        save.Image = TrinitySeal.Properties.Resources.green;
                        break;
                    case SealColours.Purple:
                        save.Image = TrinitySeal.Properties.Resources.purple;
                        break;
                    case SealColours.Grey:
                        save.Image = TrinitySeal.Properties.Resources.grey;
                        break;
                    case SealColours.Orange:
                        save.Image = TrinitySeal.Properties.Resources.orange;
                        break;
                    case SealColours.Pink:
                        save.Image = TrinitySeal.Properties.Resources.pink;
                        break;
                }

            }
            settings.Save();
                
        }

        private void pictureBox6_Click(object sender, EventArgs e)
        {
            renew renew = new renew();
            renew.getinfo(user.Text, pass.Text);
            renew.Show();
        }

        private void Dostuff(object sender, EventArgs e)
        {
            if (txt.Text == "Login")
            {
                bool response = TrinitySeal.Seal.Login(user.Text, pass.Text);
                if (response)
                {
                    TrinitySeal.Seal.GrabVariables(VariableKey, ProgramID, user.Text, pass.Text);
                    UserMainForm.Show();
                    this.Close();
                }
            }
            else
            {

                bool response = TrinitySeal.Seal.Register(ruser.Text, rpass.Text, email.Text, token.Text);
                if (response)
                {
                    tab.Location = LT;
                    label4.BackColor = Color.FromArgb(25, 25, 25);
                    label5.BackColor = Color.FromArgb(40, 40, 40);
                    label6.BackColor = Color.FromArgb(40, 40, 40);
                    ico.Image = TrinitySeal.Properties.Resources.li;
                    txt.Text = "Login";
                    LTab.BringToFront();
                    checkL();
                }
            }
        }


        //ugly tedious shit
        private void user_TextChanged(object sender, EventArgs e)
        {
            checkL();
        }

        private void pass_TextChanged(object sender, EventArgs e)
        {
            checkL();
        }

        private void ruser_TextChanged(object sender, EventArgs e)
        {
            checkR();
        }

        private void email_TextChanged(object sender, EventArgs e)
        {
            checkR();
        }

        private void rpass_TextChanged(object sender, EventArgs e)
        {
            checkR();
        }

        private void token_TextChanged(object sender, EventArgs e)
        {
            checkR();
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

        private void ruser_MouseClick(object sender, MouseEventArgs e)
        {
            bool clicked = false;
            if (!clicked)
            {
                if (ruser.Text == "Username")
                {
                    ruser.Text = "";
                    clicked = true;
                }
            }
        }

        private void rpass_MouseClick(object sender, MouseEventArgs e)
        {
            bool clicked = false;
            if (!clicked)
            {
                if (rpass.Text == "Password")
                {
                    rpass.Text = "";
                    clicked = true;
                }
            }
        }

        private void email_MouseClick(object sender, MouseEventArgs e)
        {
            bool clicked = false;
            if (!clicked)
            {
                if (email.Text == "Email")
                {
                    email.Text = "";
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

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }

        private void label2_MouseDown(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Left)
            {
                ReleaseCapture();
                SendMessage(Handle, WM_NCLBUTTONDOWN, HT_CAPTION, 0);
            }
        }

        private void label7_Click(object sender, EventArgs e)
        {
            Process.Start("https://trinityseal.me");
        }

        private void label7_MouseHover(object sender, EventArgs e)
        {
            
        }

        private void login_Paint(object sender, PaintEventArgs e)
        {

        }

        private void label1_Click_1(object sender, EventArgs e)
        {

        }

        private void SealForm_FormClosing(object sender, FormClosingEventArgs e)
        {
            if (savecred)
            {
                settings.username = user.Text;
                settings.password = pass.Text;
                settings.Save();
            }
            else
            {
                settings.Reset();
            }
        }
    }    

  }
