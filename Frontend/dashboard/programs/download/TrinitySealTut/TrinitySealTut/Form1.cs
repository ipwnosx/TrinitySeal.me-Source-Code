using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using TrinitySeal;

namespace TrinitySealTut
{
    public partial class Form1 : Form
    {
        /* I recommend setting up Trinity after your program is fully developed to avoid you having to constantly update hash each build. */
        public Form1()
        {
            InitializeComponent();
            TrinitySeal.Seal.Secret = "your secret";
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            TrinitySeal.Security.Init(); //important
            TrinitySeal.Seal.Initialize("1.0"); //current version (this should match up with the current version on the site)
            if (TrinitySeal.ProgramVariables.Freemode == true)
            {
                //show form without needing to login
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            bool response = TrinitySeal.Seal.Login(textBox1.Text, textBox2.Text);
            if (response)
            {
                //successful login, show next form
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            bool response = TrinitySeal.Seal.Register(textBox1.Text, textBox2.Text, textBox3.Text, textBox4.Text);
            if (response)
            {
                //successful register, maybe redirect to login form if you have one or disable the register button to avoid multiple tokens being used.
            }

        }
    }
}
