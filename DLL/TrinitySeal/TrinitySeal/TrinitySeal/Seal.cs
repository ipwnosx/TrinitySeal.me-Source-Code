using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Collections.Specialized;
using System.Diagnostics;
using System.IO;
using System.Linq;
using System.Management;
using System.Net;
using System.Reflection;
using System.Security.Cryptography;
using System.Security.Principal;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.Windows.Forms;
using TrinityGUI;

namespace TrinitySeal
{
    public class Seal
    {
        #region DLL Variables
        private static string Key { get; set; }
        private static string Salt { get; set; }
        public static string Secret { get; set; }
        private static string Message { get; set; }

        public static bool LoginPassed = false;
        public static bool InitPassed = false;
        private static string Version = "3.1";
        private static bool kappa = false;
        private static Dictionary<string, string> Vars = new Dictionary<string, string>();
        #endregion

        #region Update DLL
        public static void UpdateDLL()
        {
            try
            {
                using (var wc = new WebClient())
                {
                    wc.Headers["User-Agent"] = "TrinitySeal";
                    string kappa1 = wc.DownloadString("https://auth.trinityseal.me/version.txt");
                    if (kappa1 != Version)
                    {
                        MessageBox.Show("This is an outdated TrinitySeal.dll, downloading new version...", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                        if (!Directory.Exists(Directory.GetCurrentDirectory() + "\\Updated"))
                        {
                            Directory.CreateDirectory(Directory.GetCurrentDirectory() + "\\Updated");
                        }
                        wc.Headers["User-Agent"] = "TrinitySeal";
                        wc.DownloadFile("https://auth.trinityseal.me/TrinitySeal.dll", "Updated//TrinitySeal.dll");
                        Thread.Sleep(300);
                        MessageBox.Show("Successfully downloaded new DLL into 'Updated' folder! Please replace this current dll with the updated one.", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                        kappa = true;
                        Environment.Exit(0);
                    }
                }
            }
            catch(Exception ex)
            {
                MessageBox.Show(ex.ToString(), "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }
        #endregion

        #region Initialize Form
        public static void InitializeForm(string programid, string version, string variablekey, System.Windows.Forms.Form AuthForm, System.Windows.Forms.Form MainForm, SealColours Colour)
        {
            new SealForm(programid, version, variablekey, AuthForm, MainForm, Colour).Show();
        }
        #endregion

        #region Server Variables
        public static bool GrabVariables(string secretkey, string programtoken, string username, string password)
        {
            UpdateDLL();
            Start_Session();
            if (!HashCheck())
            {
                kappa = true;
                MessageBox.Show("Invalid Newtonsoft.Json.dll", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                Environment.Exit(0);
            }
            if (!kappa)
            {
                var request = (HttpWebRequest)WebRequest.Create("https://auth.trinityseal.me/variables.php");

                var postData = $"&programtoken={Payload_ENCRYPT(programtoken).Replace("+", "#")}";
                postData += $"&username={Payload_ENCRYPT(username).Replace("+", "#")}";
                postData += $"&password={Payload_ENCRYPT(password).Replace("+", "#")}";
                postData += $"&hwid={Payload_ENCRYPT(getUniqueID()).Replace("+", "#")}";
                postData += $"&key={Payload_ENCRYPT(secretkey).Replace("+", "#")}";
                postData += $"&session_id={Key}";
                postData += $"&session_salt={Salt}";
                var data = Encoding.ASCII.GetBytes(postData);

                request.Method = "POST";
                request.UserAgent = "TrinitySeal";
                request.ContentType = "application/x-www-form-urlencoded";
                request.ContentLength = data.Length;

                using (var stream = request.GetRequestStream())
                {
                    stream.Write(data, 0, data.Length);
                }

                var response = (HttpWebResponse)request.GetResponse();

                var responseString = new StreamReader(response.GetResponseStream()).ReadToEnd();

                dynamic json = JsonConvert.DeserializeObject(Payload_DECRYPT(responseString));
                string status = json.status;
                if (status != "success")
                {
                    string info = json.info;
                    MessageBox.Show(info, "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
                else
                {
                    Vars = JsonConvert.DeserializeObject<Dictionary<string, object>>(json.vars.ToString());
                    return true;
                }
            }
            return false;
        }

        public static string Var(string Name)
        {
            try
            {
                return Payload_DECRYPT(Vars[Name].ToString());
            }
            catch
            {
                return "Unknown variable";
            }
        }
        #endregion

        #region Initialize
        public static bool Initialize(string version)
        {
            UpdateDLL();
            Start_Session();
            if (string.IsNullOrEmpty(version))
            {
                MessageBox.Show("Please enter a version!", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                return false;
            }
            else
            {
                if (!HashCheck())
                {
                    kappa = true;
                    MessageBox.Show("Invalid Newtonsoft.Json.dll", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    Environment.Exit(0);
                }
                if (!kappa)
                {
                    var request = (HttpWebRequest)WebRequest.Create("https://auth.trinityseal.me/program.php");

                    var postData = $"&programtoken={Payload_ENCRYPT(Secret).Replace("+", "#")}";
                    postData += $"&session_id={Key}";
                    postData += $"&session_salt={Salt}";
                    var data = Encoding.ASCII.GetBytes(postData);

                    request.Method = "POST";
                    request.UserAgent = "TrinitySeal";
                    request.ContentType = "application/x-www-form-urlencoded";
                    request.ContentLength = data.Length;

                    using (var stream = request.GetRequestStream())
                    {
                        stream.Write(data, 0, data.Length);
                    }

                    var response = (HttpWebResponse)request.GetResponse();

                    var responseString = new StreamReader(response.GetResponseStream()).ReadToEnd();
                    dynamic json = JsonConvert.DeserializeObject(Payload_DECRYPT(responseString));
                    string status = json.status;
                    if (status != "success")
                    {
                        string info = json.info;
                        MessageBox.Show(info, "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                        return false;
                    }
                    else
                    {
                        InitPassed = true;
                        string versionn = json.version;
                        int usercount = json.clients;
                        string freemode = json.freemode;
                        string enabled = json.enabled;
                        string message = json.message;
                        string updatelink = json.downloadlink;
                        string hash = json.hash;
                        string filename = json.filename;
                        string devmode = json.devmode;
                        string hwidlock = json.hwidlock;
                        string programname = json.programname;
                        ProgramVariables.HWIDLock = true;
                        ProgramVariables.ProgramName = programname;
                        if (hwidlock != "1")
                        {
                            ProgramVariables.HWIDLock = false;
                        }
                        ProgramVariables.DeveloperMode = true;
                        if (devmode != "1")
                        {
                            ProgramVariables.DeveloperMode = false;
                            try
                            {
                                if (CalculateMD5(filename) != hash)
                                {
                                    kappa = true;
                                    MessageBox.Show("File hash mismatch, exiting...", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                                    Environment.Exit(0);
                                    return false;
                                }
                            }
                            catch
                            {
                                kappa = true;
                                MessageBox.Show("Exception caught, please ensure that you have used the hash checker to implement the right hash and exe name in your program settings!", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                                Environment.Exit(0);
                                return false;
                            }
                        }
                        bool bruhfreemode;
                        if (freemode == "1")
                        {
                            bruhfreemode = true;
                        }
                        else
                        {
                            bruhfreemode = false;
                        }
                        ProgramVariables.Clients = usercount;
                        ProgramVariables.Freemode = bruhfreemode;
                        ProgramVariables.Version = version;
                        ProgramVariables.Message = message;
                        if (enabled == "0")
                        {
                            kappa = true;
                            MessageBox.Show("Program disabled by owner, exiting...", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                            Environment.Exit(0);
                            return false;
                        }
                        if (version != versionn)
                        {
                            MessageBox.Show("Update available!", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                            try
                            {
                                Process.Start(updatelink);
                            }
                            catch
                            {
                                Process.Start("https://" + updatelink);
                            }
                            kappa = true;
                            Environment.Exit(0);
                            return false;
                        }
                        if (bruhfreemode == true)
                        {
                            MessageBox.Show("Freemode enabled!", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                            ProgramVariables.Freemode = true;
                        }
                    }
                }
                return false;
            }
        }
#endregion

        #region Client Register
        public static bool Register(string username, string password, string email, string token, bool message = true)
        {
            UpdateDLL();
            Start_Session();
            if (string.IsNullOrEmpty(username) || string.IsNullOrEmpty(password) || string.IsNullOrEmpty(email) || string.IsNullOrEmpty(token))
            {
                MessageBox.Show("Please fill in all fields!", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
            if (!HashCheck())
            {
                kappa = true;
                MessageBox.Show("Invalid Newtonsoft.Json.dll please use the file provided with the download!", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                Environment.Exit(0);
                return false;
            }
            if (!kappa)
            {
                var request = (HttpWebRequest)WebRequest.Create("https://auth.trinityseal.me/register.php");

                var postData = $"username={Payload_ENCRYPT(username).Replace("+", "#")}";
                postData += $"&password={Payload_ENCRYPT(password).Replace("+", "#")}";
                postData += $"&email={Payload_ENCRYPT(email).Replace("+", "#")}";
                postData += $"&hwid={Payload_ENCRYPT(getUniqueID()).Replace("+", "#")}";
                postData += $"&token={Payload_ENCRYPT(token).Replace("+", "#")}";
                postData += $"&programtoken={Payload_ENCRYPT(Secret).Replace("+", "#")}";
                postData += $"&session_id={Key}";
                postData += $"&session_salt={Salt}";
                var data = Encoding.ASCII.GetBytes(postData);

                request.Method = "POST";
                request.UserAgent = "TrinitySeal";
                request.ContentType = "application/x-www-form-urlencoded";
                request.ContentLength = data.Length;

                using (var stream = request.GetRequestStream())
                {
                    stream.Write(data, 0, data.Length);
                }

                var response = (HttpWebResponse)request.GetResponse();

                var responseString = new StreamReader(response.GetResponseStream()).ReadToEnd();
                dynamic json = JsonConvert.DeserializeObject(Payload_DECRYPT(responseString));
                string status = json.status;
                if (status != "success")
                {
                    string info = json.info;
                    if (message)
                    {
                        MessageBox.Show(info, "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                    return false;
                }
                else
                {
                    if (message)
                    {
                        MessageBox.Show("Successfully registered!", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Information);
                    }
                    return true;
                }
            }
            return false;
        }
#endregion

        #region Client Redeem Token
        public static bool RedeemToken(string username, string password, string token, bool message = true)
        {
            UpdateDLL();
            Start_Session();
            if (string.IsNullOrEmpty(username) || string.IsNullOrEmpty(password) || string.IsNullOrEmpty(token))
            {
                MessageBox.Show("Please fill in all fields!", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
            else
            {
                if (!HashCheck())
                {
                    kappa = true;
                    MessageBox.Show("Failed hash check, please use all files provided in the download.", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    kappa = true;
                    Environment.Exit(0);
                    return false;
                }
                if (!kappa)
                {
                    var request = (HttpWebRequest)WebRequest.Create("https://auth.trinityseal.me/redeemtoken.php");

                    var postData = $"username={Payload_ENCRYPT(username).Replace("+", "#")}";
                    postData += $"&password={Payload_ENCRYPT(password).Replace("+", "#")}";
                    postData += $"&hwid={Payload_ENCRYPT(getUniqueID()).Replace("+", "#")}";
                    postData += $"&token={Payload_ENCRYPT(token).Replace("+", "#")}";
                    postData += $"&programtoken={Payload_ENCRYPT(Secret).Replace("+", "#")}";
                    postData += $"&session_id={Key}";
                    postData += $"&session_salt={Salt}";
                    var data = Encoding.ASCII.GetBytes(postData);

                    request.Method = "POST";
                    request.UserAgent = "TrinitySeal";
                    request.ContentType = "application/x-www-form-urlencoded";
                    request.ContentLength = data.Length;

                    using (var stream = request.GetRequestStream())
                    {
                        stream.Write(data, 0, data.Length);
                    }

                    var response = (HttpWebResponse)request.GetResponse();

                    var responseString = new StreamReader(response.GetResponseStream()).ReadToEnd();
                    dynamic json = JsonConvert.DeserializeObject(Payload_DECRYPT(responseString));
                    string status = json.status;
                    if (status != "success")
                    {
                        string info = json.info;
                        if (message)
                        {
                            MessageBox.Show(info, "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                        }
                        return false;
                    }
                    else
                    {
                        if (message)
                        {
                            MessageBox.Show("Successfully redeemed token!", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Information);
                        }
                        return true;
                    }
                }
            }
            return false;
        }
        #endregion

        #region Client Login
        public static bool Login(string username, string password, bool message = true)
        {
            Start_Session();
            UpdateDLL();
            if (string.IsNullOrEmpty(username) || string.IsNullOrEmpty(password))
            {
                MessageBox.Show("Please fill in all fields!", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
            else
            {
                if (!HashCheck())
                {
                    kappa = true;
                    MessageBox.Show("Failed hash check on Newtonsoft.Json.dll please use the one provided with the TrinitySeal download.", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    Environment.Exit(0);
                    return false;
                }
                if (!kappa)
                {
                    var request = (HttpWebRequest)WebRequest.Create("https://auth.trinityseal.me/login.php");

                    var postData = $"username={Payload_ENCRYPT(username).Replace("+", "#")}";
                    postData += $"&password={Payload_ENCRYPT(password).Replace("+", "#")}";
                    postData += $"&hwid={Payload_ENCRYPT(getUniqueID()).Replace("+", "#")}";
                    postData += $"&programtoken={Payload_ENCRYPT(Secret).Replace("+", "#")}";
                    postData += $"&timestamp={Payload_ENCRYPT(Encrypt(DateTime.Now.ToString())).Replace("+", "#")}";
                    postData += $"&session_id={Key}";
                    postData += $"&session_salt={Salt}";
                    var data = Encoding.ASCII.GetBytes(postData);

                    request.Method = "POST";
                    request.UserAgent = "TrinitySeal";
                    request.ContentType = "application/x-www-form-urlencoded";
                    request.ContentLength = data.Length;

                    using (var stream = request.GetRequestStream())
                    {
                        stream.Write(data, 0, data.Length);
                    }

                    var response = (HttpWebResponse)request.GetResponse();

                    var responseString = new StreamReader(response.GetResponseStream()).ReadToEnd();

                    dynamic json = JsonConvert.DeserializeObject(Payload_DECRYPT(responseString));
                    string status = json.status;
                    if (status != "success")
                    {
                        string info = json.info;
                        if (message)
                        {
                            MessageBox.Show(info, "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                        }
                        return false;
                    }
                    else
                    {
                        LoginPassed = true;
                        string datetime = json.timestamp;
                        string hwidd = json.hwid;
                        string userr = json.username;
                        string email = json.email;
                        int level = json.level;
                        string expires = json.expires;
                        string ip = json.ip;
                        LoadData(userr, email, level, DateTime.Parse(expires), ip);
                        if (SecurityChecks(Decrypt(datetime), hwidd))
                        {
                            if (!string.IsNullOrEmpty(ProgramVariables.Message))
                            {
                                MessageBox.Show(ProgramVariables.Message, "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                            }
                            else
                            {
                                Security.ChallengesPassed = true;
                                if (message)
                                {
                                    MessageBox.Show("Success! Welcome, " + UserInfo.Username, "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                                }
                            }
                            return true;
                        }
                    }
                }
            }
            return false;
        }
        #endregion

        #region Hash Checks
        private static bool HashCheck()
        { 
            if (CalculateMD5("Newtonsoft.Json.dll") == "4df6c8781e70c3a4912b5be796e6d337")
            {
                return true;
            }
            else
            {
                kappa = true;
                return false;
            }
        }
        #endregion

        #region MD5
        private static string CalculateMD5(string filename)
        {
            using (var md5 = MD5.Create())
            {
                using (var stream = File.OpenRead(filename))
                {
                    var hash = md5.ComputeHash(stream);
                    return BitConverter.ToString(hash).Replace("-", "").ToLowerInvariant();
                }
            }
        }
        #endregion

        #region Load Data
        private static void LoadData(string username, string email, int level, DateTime expires, string ip)
        {
            UserInfo.Username = username;
            UserInfo.Email = email;
            UserInfo.Level = level;
            UserInfo.Expires = expires;
            UserInfo.IP = ip;
        }
        #endregion

        #region Security Check
        private static bool SecurityChecks(string date, string hwid)
        {
            if (hwid != getUniqueID() && ProgramVariables.HWIDLock)
            {
                kappa = true;
                MessageBox.Show("HWID not recognized, exiting...", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                Environment.Exit(0);
            }
            else
            {
                DateTime dt1 = DateTime.Parse(date); //time sent
                DateTime dt2 = DateTime.Now; //time received
                TimeSpan d3 = dt1 - dt2;
                if (Convert.ToInt32(d3.Seconds.ToString().Replace("-", "")) >= 5 || Convert.ToInt32(d3.Minutes.ToString().Replace("-", "")) >= 1)
                {
                    kappa = true;
                    MessageBox.Show("Possible malicious network activity, exiting...", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    Environment.Exit(0);
                }
                else
                {
                    return true;
                }
            }
            return false;
        }
        #endregion

        #region Sessions
        private static void Start_Session()
        {
            try
            {
                Key = SaltString(Convert.ToBase64String(Encoding.Default.GetBytes(Session_ID(32))));
                Salt = SaltString(Convert.ToBase64String(Encoding.Default.GetBytes(Session_ID(16))));
            }
            catch
            {
                Key =  SaltString(Convert.ToBase64String(Encoding.Default.GetBytes(Session_ID(32))));
                Salt = SaltString(Convert.ToBase64String(Encoding.Default.GetBytes(Session_ID(16))));
            }
        }
        
        private static string Session_ID(int length)
        {
            Random random = new Random();
            const string chars = "0123456789abcdefghijklmnopqrstuvwxyz";
            return new string(Enumerable.Repeat(chars, length)
              .Select(s => s[random.Next(s.Length)]).ToArray());
        }

        #endregion

        #region HWID

        private static string getUniqueID()
        {
            return WindowsIdentity.GetCurrent().User.Value;
            /*
            try
            {
                return WindowsIdentity.GetCurrent().User.Value;
            }
            catch
            {
                string drive = "C";
                if (drive == string.Empty)
                {
                    foreach (DriveInfo compDrive in DriveInfo.GetDrives())
                    {
                        if (compDrive.IsReady)
                        {
                            drive = compDrive.RootDirectory.ToString();
                            break;
                        }
                    }
                }
                if (drive.EndsWith(":\\"))
                {
                    drive = drive.Substring(0, drive.Length - 2);
                }
                string volumeSerial = getVolumeSerial(drive);
                string cpuID = getCPUID();
                return cpuID.Substring(13) + cpuID.Substring(1, 4) + volumeSerial + cpuID.Substring(4, 4);
            }
            */
        }

        private static string getVolumeSerial(string drive)
        {
            ManagementObject disk = new ManagementObject(@"win32_logicaldisk.deviceid=""" + drive + @":""");
            disk.Get();
            string volumeSerial = disk["VolumeSerialNumber"].ToString();
            disk.Dispose();
            return volumeSerial;
        }

        private static string getCPUID()
        {
            string cpuInfo = "";
            ManagementClass managClass = new ManagementClass("win32_processor");
            ManagementObjectCollection managCollec = managClass.GetInstances();
            foreach (ManagementObject managObj in managCollec)
            {
                if (cpuInfo == "")
                {
                    cpuInfo = managObj.Properties["processorID"].Value.ToString();
                    break;
                }
            }
            return cpuInfo;
        }

        #endregion

        #region DT Encryption
        private static string Encrypt(string clearText)
        {

            byte[] clearBytes = Encoding.Unicode.GetBytes(clearText);
            using (Aes encryptor = Aes.Create())
            {
                Rfc2898DeriveBytes pdb = new Rfc2898DeriveBytes("datexd", new byte[] { 0x49, 0x76, 0x61, 0x6e, 0x20, 0x4d, 0x65, 0x64, 0x76, 0x65, 0x64, 0x65, 0x76 });
                encryptor.Key = pdb.GetBytes(32);
                encryptor.IV = pdb.GetBytes(16);
                encryptor.Padding = PaddingMode.PKCS7;
                using (MemoryStream ms = new MemoryStream())
                {
                    using (CryptoStream cs = new CryptoStream(ms, encryptor.CreateEncryptor(), CryptoStreamMode.Write))
                    {
                        cs.Write(clearBytes, 0, clearBytes.Length);
                        cs.Close();
                    }
                    clearText = Convert.ToBase64String(ms.ToArray());
                }
            }
            return clearText;
        }

        private static string Decrypt(string cipherText)
        {
            cipherText = cipherText.Replace(" ", "+");
            byte[] cipherBytes = Convert.FromBase64String(cipherText);
            using (Aes encryptor = Aes.Create())
            {
                Rfc2898DeriveBytes pdb = new Rfc2898DeriveBytes("datexd", new byte[] { 0x49, 0x76, 0x61, 0x6e, 0x20, 0x4d, 0x65, 0x64, 0x76, 0x65, 0x64, 0x65, 0x76 });
                encryptor.Key = pdb.GetBytes(32);
                encryptor.IV = pdb.GetBytes(16);
                encryptor.Padding = PaddingMode.PKCS7;
                using (MemoryStream ms = new MemoryStream())
                {
                    using (CryptoStream cs = new CryptoStream(ms, encryptor.CreateDecryptor(), CryptoStreamMode.Write))
                    {
                        cs.Write(cipherBytes, 0, cipherBytes.Length);
                    }
                    cipherText = Encoding.Unicode.GetString(ms.ToArray());
                }
            }
            return cipherText;
        }

        #endregion

        #region Salting
        private static string SaltString(string value)
        {
            value = value.Replace("a", "!");
            value = value.Replace("z", "?");
            value = value.Replace("b", "}");
            value = value.Replace("c", "{");
            value = value.Replace("d", "]");
            value = value.Replace("e", "[");
            return value;
        }

        private static string DesaltString(string value)
        {
            value = value.Replace("?", "z");
            value = value.Replace("!", "a");
            value = value.Replace("}", "b");
            value = value.Replace("{", "c");
            value = value.Replace("]", "d");
            value = value.Replace("[", "e");
            return value;
        }
        #endregion

        #region Payload Encryption


        private static string Payload_DECRYPT(string value)
        {
            string message = value;
            string password = Encoding.Default.GetString(Convert.FromBase64String(DesaltString(Key)));
            SHA256 mySHA256 = SHA256Managed.Create();
            byte[] key = mySHA256.ComputeHash(Encoding.ASCII.GetBytes(password));
            byte[] iv = Encoding.ASCII.GetBytes(Encoding.Default.GetString(Convert.FromBase64String(DesaltString(Salt))));
            string decrypted = String_Encryption.DecryptString(message, key, iv);
            return decrypted;
        }
        private static string Payload_ENCRYPT(string value)
        {
            string message = value;
            string password = Encoding.Default.GetString(Convert.FromBase64String(DesaltString(Key)));
            SHA256 mySHA256 = SHA256Managed.Create();
            byte[] key = mySHA256.ComputeHash(Encoding.ASCII.GetBytes(password));
            byte[] iv = Encoding.ASCII.GetBytes(Encoding.Default.GetString(Convert.FromBase64String(DesaltString(Salt))));
            string decrypted = String_Encryption.EncryptString(message, key, iv);
            return decrypted;
        }

        private static string EncryptString(string plainText, byte[] key, byte[] iv)
        {
            Aes encryptor = Aes.Create();
            encryptor.Mode = CipherMode.CBC;
            encryptor.Key = key;
            encryptor.IV = iv;
            MemoryStream memoryStream = new MemoryStream();
            ICryptoTransform aesEncryptor = encryptor.CreateEncryptor();
            CryptoStream cryptoStream = new CryptoStream(memoryStream, aesEncryptor, CryptoStreamMode.Write);
            byte[] plainBytes = Encoding.ASCII.GetBytes(plainText);
            cryptoStream.Write(plainBytes, 0, plainBytes.Length);
            cryptoStream.FlushFinalBlock();
            byte[] cipherBytes = memoryStream.ToArray();
            memoryStream.Close();
            cryptoStream.Close();
            string cipherText = Convert.ToBase64String(cipherBytes, 0, cipherBytes.Length);
            return cipherText;
        }

        private static string DecryptString(string cipherText, byte[] key, byte[] iv)
        {
            Aes encryptor = Aes.Create();
            encryptor.Mode = CipherMode.CBC;
            encryptor.Key = key;
            encryptor.IV = iv;
            MemoryStream memoryStream = new MemoryStream();
            ICryptoTransform aesDecryptor = encryptor.CreateDecryptor();
            CryptoStream cryptoStream = new CryptoStream(memoryStream, aesDecryptor, CryptoStreamMode.Write);
            string plainText = String.Empty;
            try
            {
                byte[] cipherBytes = Convert.FromBase64String(cipherText);
                cryptoStream.Write(cipherBytes, 0, cipherBytes.Length);
                cryptoStream.FlushFinalBlock();
                byte[] plainBytes = memoryStream.ToArray();
                plainText = Encoding.ASCII.GetString(plainBytes, 0, plainBytes.Length);
            }
            finally
            {
                memoryStream.Close();
                cryptoStream.Close();
            }
            return plainText;
        }

        #endregion
    }

    #region String Encryption
    class String_Encryption
    {
        public static string EncryptString(string plainText, byte[] key, byte[] iv)
        {
            Aes encryptor = Aes.Create();
            encryptor.Mode = CipherMode.CBC;
            encryptor.Key = key;
            encryptor.IV = iv;
            MemoryStream memoryStream = new MemoryStream();
            ICryptoTransform aesEncryptor = encryptor.CreateEncryptor();
            CryptoStream cryptoStream = new CryptoStream(memoryStream, aesEncryptor, CryptoStreamMode.Write);
            byte[] plainBytes = Encoding.ASCII.GetBytes(plainText);
            cryptoStream.Write(plainBytes, 0, plainBytes.Length);
            cryptoStream.FlushFinalBlock();
            byte[] cipherBytes = memoryStream.ToArray();
            memoryStream.Close();
            cryptoStream.Close();
            string cipherText = Convert.ToBase64String(cipherBytes, 0, cipherBytes.Length);
            return cipherText;
        }

        public static string DecryptString(string cipherText, byte[] key, byte[] iv)
        {
            Aes encryptor = Aes.Create();
            encryptor.Mode = CipherMode.CBC;
            encryptor.Key = key;
            encryptor.IV = iv;
            MemoryStream memoryStream = new MemoryStream();
            ICryptoTransform aesDecryptor = encryptor.CreateDecryptor();
            CryptoStream cryptoStream = new CryptoStream(memoryStream, aesDecryptor, CryptoStreamMode.Write);
            string plainText = String.Empty;
            try
            {
                byte[] cipherBytes = Convert.FromBase64String(cipherText);
                cryptoStream.Write(cipherBytes, 0, cipherBytes.Length);
                cryptoStream.FlushFinalBlock();
                byte[] plainBytes = memoryStream.ToArray();
                plainText = Encoding.ASCII.GetString(plainBytes, 0, plainBytes.Length);
            }
            finally
            {
                memoryStream.Close();
                cryptoStream.Close();
            }
            return plainText;
        }
    }
    #endregion

    #region Security
    public class Security
    {
        public static bool ChallengesPassed = true;
        public static void ChallengeCheck()
        {
            if (!Security.ChallengesPassed || !Seal.LoginPassed || !Seal.InitPassed)
            { 
                MessageBox.Show("Failed to pass all challenges, exiting...", "TrinitySeal", MessageBoxButtons.OK, MessageBoxIcon.Error);
                Environment.Exit(0);
            }
        }
        
        /*
        public static void Init()
        {
            Seal.UpdateDLL();
            Thread workerThread = new Thread(() => DoWork());
            workerThread.IsBackground = true;
            workerThread.Start();
        }
        */

        private static void DoWork()
        {
            string[] array = new string[]
            {
                "solarwinds",
                "paessler",
                "cpacket",
                "wireshark",
                "Ethereal",
                "sectools",
                "riverbed",
                "tcpdump",
                "Kismet",
                "EtherApe",
                "Fiddler",
                "telerik",
                "glasswire",
                "HTTPDebuggerSvc",
                "HTTPDebuggerUI",
                "charles",
                "intercepter",
                "snpa",
                "dumcap",
                "comview",
                "netcheat",
                "cheat",
                "winpcap",
                "megadumper",
                "MegaDumper",
                "dnspy",
                "ilspy",
                "reflector"
            };
            if (Process.GetProcessesByName(Path.GetFileNameWithoutExtension(Assembly.GetEntryAssembly().Location)).Length > 2)
            {
                Process.GetCurrentProcess().Kill();
                ChallengesPassed = false;
            }
            while (true)
            {
                foreach (string processName in array)
                {
                    Process[] processesByName = Process.GetProcessesByName(processName);
                    if (processesByName.Length != 0)
                    {
                        ChallengesPassed = false;
                        Environment.Exit(0);
                    }
                }
                foreach (Process proc in Process.GetProcesses())
                {
                    foreach (string processName in array)
                    {
                        bool x = false;
                        if (proc.MainWindowTitle.ToLower().Contains(processName) || proc.ProcessName.ToLower().Contains(processName) || proc.MainWindowTitle.ToLower().Contains(processName) || proc.ProcessName.ToLower().Contains(processName))
                            x = true;
                        if (x)
                        {
                            try
                            {
                                ChallengesPassed = false;
                                proc.Kill();
                            }
                            catch
                            {
                                ChallengesPassed = false;
                                Environment.Exit(0);
                            }
                        }
                    }
                }
                Thread.Sleep(3000);
            }
        }
    }
    #endregion
    
    #region Seal Colours
    public enum SealColours
    {
        Red,
        Blue,
        Green,
        Purple,
        Grey,
        Orange,
        Pink
    }
    #endregion

    #region Program Variables
    public class ProgramVariables
    {
        public static string Version { get; set; }
        public static string ProgramName { get; set; }
        public static int Clients { get; set; }
        public static bool Freemode { get; set; }
        public static string Message { get; set; }
        public static bool DeveloperMode { get; set; }
        public static bool HWIDLock { get; set; }
    }
    #endregion

    #region User Information
    public class UserInfo
    {
        public static string Username { get; set; }
        public static string Email { get; set; }
        public static int Level { get; set; }
        public static DateTime Expires { get; set; }
        public static string IP { get; set; }
    }
    #endregion

    #region Tools
    public class Tools
    {
        public static string SkypeResolver(string SkypeUsername)
        {
            return Request("skyperesolver", SkypeUsername);
        }

        public static string IP2Skype(string IP)
        {
            return Request("ip2skype", IP);
        }

        public static string Email2Skype(string Email)
        {
            return Request("email2skype", Email);
        }

        public static string GeoIP(string IP)
        {
            return Request("geoip", IP);
        }

        public static string DNSResolver(string URL)
        {
            return Request("dnsresolver", URL);
        }

        public static string CloudFlareResolver(string URL)
        {
            return Request("cloudflareresolver", URL);
        }

        public static string PhoneResolver(string Phone)
        {
            return Request("phoneresolver", Phone);
        }

        public static string SiteHeaders(string URL)
        {
            return Request("siteheaders", URL);
        }

        public static string SiteWhois(string URL)
        {
            return Request("sitewhois", URL);
        }

        public static string Ping(string IP)
        {
            return Request("ping", IP);
        }

        public static string PortScan(string IP)
        {
            return Request("portscan", IP);
        }

        public static string DisposableMailChecker(string Email)
        {
            return Request("disposablemailcheck", Email);
        }

        public static string IP2Website(string IP)
        {
            return Request("ip2website", IP);
        }

        public static string DomainInfo(string URL)
        {
            return Request("domaininfo", URL);
        }

        private static string Request(string type, string input)
        {
            WebClient wc = new WebClient();
            wc.Headers["User-Agent"] = "SealAPI";
            try
            {
                return wc.DownloadString($"https://auth.trinityseal.me/tools.php?type={type}&input={input}");
            }
            catch
            {
                return "Error when contacting API!";
            }
        }
    }
    #endregion
}
