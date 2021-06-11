<!DOCTYPE HTML>
<!--
	Usable by gettemplates.co
	Twitter: http://twitter.com/gettemplateco
	URL: http://gettemplates.co
-->
<?php
include '/include/settings.php';
if (!isset($_SESSION)) 
{ session_start(); 
}
$conn=mysqli_connect("localhost","trinpuqg_admin","GuyverXbox1664","trinpuqg_trinityseal");
if (mysqli_connect_errno())
{
echo "Failed to connect to database, contact Centos.";
}
?>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TrinitySeal &mdash; .NET Licensing Solution</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
				<div class="col-sm-2 col-xs-12">
					<div id="gtco-logo"><a href="index.html">TrinitySeal</a></div>
				</div>
				<div class="col-xs-10 text-right menu-1 main-nav">
					<ul>
						<li class="active"><a href="#" data-nav-section="home">Home</a></li>
						<li><a href="#" data-nav-section="features">Why choose TrinitySeal?</a></li>
						<li><a href="#" data-nav-section="faq">Features</a></li>
						<li><a href="#" data-nav-section="contact">Community</a></li>
						<li class="btn-cta"><a href="/login" class="external" title="You will be navigated to the login page"><span>Login</span></a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<div id="gtco-header" data-section="home" class="gtco-cover header-fixed" role="banner" style="background-image:url(images/img_bg_3.jpg);">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="display-t">
						<div class="display-tc">
							<h1 class="animate-box" data-animate-effect="fadeIn">TrinitySeal</h1>
							<h2 class="animate-box" data-animate-effect="fadeIn">Secure, reliable and completely free!</h2>
							<p class="animate-box" data-animate-effect="fadeIn"><a href="/register" class="btn btn-primary btn-lg">Create an account</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<div id="gtco-features" class="border-bottom" data-section="features">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Our Incredible Features</h2>
					<p>Discover the new, simple way of user integration.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-cloud"></i>
						</span>
						<h3>Cloud Based</h3>
						<p>All data is stored securely in our servers, far away from possible hackers and data leakers. TrinitySeal ensures that you and your clients' data is safe at all times, without exceptions or excuses. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-tablet"></i>
						</span>
						<h3>Fully Responsive</h3>
						<p>No matter where you are and what device you are on, our responsive interface allows you to get on with whatever you need to without interruptions or bugs. Our web-based manager is available on all platforms!</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-settings"></i>
						</span>
						<h3>Inituative Customizations</h3>
						<p>Even though TrinitySeal does everything for you, you are still in full control. Do anything from changing themes and colours to customizing server responses and create your own functions with program/client variables.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-ruler-pencil"></i>
						</span>
						<h3>Web Design</h3>
						<p>Our design has been put together with care and thought. Forget professional interfaces that flood your screen with data and dull colours, TrinitySeal provides comfort and is pleasing to the eye, aswell as packing everything neatly into relative pages.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-dashboard"></i>
						</span>
						<h3>Lightning-Fast Servers</h3>
						<p>Even though we provide a free service, that does not mean that it doesn't perform well. Get almost instant responses from the TrinitySeal server almost every request. Make your clients' experience better by setting them up with TrinitySeal. It'll make you look good too ;).</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-shield"></i>
						</span>
						<h3>High Level Security</h3>
						<p>We understand how sensitive the area of data is, and that's why we have taken extra measures to ensure that data is never leaked or seen by outsiders. Data is regularly backed up and updated to meet legal requirements. We also store data only when it is encrypted and in our secure, private servers.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-gift"></i>
						</span>
						<h3>100% Free</h3>
						<p>No hidden costs, no dodgy stuff. TrinitySeal was made by a developer to help other developers who are also passionate about providing the best experience to their clients. You never have to worry about money when using TrinitySeal!</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	

	<div class="gtco-section" id="gtco-faq" data-section="faq">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Our Features</h2>
					<p>Here you can learn about our unique features and how they work.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">

					<div class="gtco-accordion">
						<div class="gtco-accordion-heading">
							<div class="icon"><i class="icon-cross"></i></div>
							<h3>HWID Lock</h3>
						</div>
						<div class="gtco-accordion-content">
							<div class="inner">
								<p>Each Windows machine has a unique identifier, which is called the HWID (Hardware ID), which is unique to that machine. To ensure that clients aren't sharing login details amongst each other, TrinitySeal implements a HWID lock which makes a single account lock to a certain machine. In simpler terms, it ensures that clients aren't sharing account details to others. This feature can be disabled if you wish to allow clients to share their logins.</p>
							</div>
						</div>
					</div>
					<div class="gtco-accordion">
						<div class="gtco-accordion-heading">
							<div class="icon"><i class="icon-cross"></i></div>
							<h3>Automated Client Management</h3>
						</div>
						<div class="gtco-accordion-content">
							<div class="inner">
								<p>This is a feature that makes TrinitySeal unique. Other licensing systems force you to make handlers to manage expiry times, hwid tampering etc. TrinitySeal handles this for you in the background. So if a client's time expires, TrinitySeal will deny access to your program and show an appropriate message to inform the client that they have run out of license allowance. HWID checks are also part of the normal authentication procedure, so if someone logs into an account from another machine, it will deny access (with some exceptions, such as you allowing them a HWID reset from the program manager)</p>
							</div>
						</div>
					</div>
					<div class="gtco-accordion">
						<div class="gtco-accordion-heading">
							<div class="icon"><i class="icon-cross"></i></div>
							<h3>Hash Checks</h3>
						</div>
						<div class="gtco-accordion-content">
							<div class="inner">
								<p>The number one reason of people having their programs cracked is reverse engineering. However, TrinitySeal has a very smart way of preventing this with hash checking. If your file is modified/tampered in any way (maliciously), TrinitySeal will be able to detect this because the original hash of your program is different to the tampered hash of your program. So TrinitySeal will not allow the tampered version of your program to run. Hash checks also apply to the Newtonsoft.Json and TrinitySeal DLL file to prevent any tampering to the authentication protocol.</p>
							</div>
						</div>
					</div>

				</div>
				<div class="col-md-6">

					<div class="gtco-accordion">
						<div class="gtco-accordion-heading">
							<div class="icon"><i class="icon-cross"></i></div>
							<h3>Advanced Security</h3>
						</div>
						<div class="gtco-accordion-content">
							<div class="inner">
								<p>A common way of bypassing authentication on other licensing systems is 'Packet Injecting'. This method allows an attacker to modify the response/request before it reaches either the client or server. For example, if the client sends a packet to the server with the HWID, packet injecting can be used to change this value to bypass the HWID lock. TrinitySeal has multiple functions to prevent this such as Process Monitor, End to End Encryption and 'Request Spy'. Process Monitor checks running processes on the machine to ensure that known tamper tools, such as Fiddler, aren't running at the same time as the auth request. End to End encryption sends unique requests and gets a unique response for every auth request, which makes packet injecting impossible as the data is unreadable and unique per request. 'Request Spy' watches the auth request and will kill the connection if it exceeds a certain time limit, as a packet inject holds the packet for a substantial amount of time before it can reach either the server/client, in order to tamper it.</p>
							</div>
						</div>
					</div>
					<div class="gtco-accordion">
						<div class="gtco-accordion-heading">
							<div class="icon"><i class="icon-cross"></i></div>
							<h3>Fully Cloud Based</h3>
						</div>
						<div class="gtco-accordion-content">
							<div class="inner">
								<p>Since TrinitySeal is cloud based, not much code is being executed on the client side. Any code executed on the client's machine is at big risk of either being dumped or tampered, and this is why we have fully made TrinitySeal server sided, meaning that any code or data is only being used on the server, which nobody can see or tamper.</p>
							</div>
						</div>
					</div>
					<div class="gtco-accordion">
						<div class="gtco-accordion-heading">
							<div class="icon"><i class="icon-cross"></i></div>
							<h3>Very Easy Setup</h3>
						</div>
						<div class="gtco-accordion-content">
							<div class="inner">
								<p>With TrinitySeal, you can setup full user integration in under 30 seconds with just a few lines of code. We also support both .NET languages C# and Visual Basic, so no matter what .NET language you prefer, TrinitySeal still supports you. Multiple video tutorials and templates are also available on the program dashboard, so setting up advanced user management has never been more simple and secure.</p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>


	<div id="gtco-counter" class="gtco-section">
		<div class="gtco-container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Statistics</h2>
					<p>Here's the current progress of my project.</p>
				</div>
			</div>

			<div class="row">
				
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-crown"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="<?php
$sql="select count('id') from owners";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
?>" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Total Developers</span>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-user"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="<?php
$sql1="select count('id') from users";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($result1);
echo "$row1[0]";
?>" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Total Clients</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-desktop"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="<?php
$sql2="select count('id') from programs";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_array($result2);
echo "$row2[0]";
?>" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Total Programs</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-ticket"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="<?php
$sql3="select count('id') from tokens";
$result3=mysqli_query($conn,$sql3);
$row3=mysqli_fetch_array($result3);
echo "$row3[0]";
?>" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Total Licenses</span>

					</div>
				</div>
					
			</div>
		</div>
	</div>


	
	<div id="gtco-contact" data-section="contact" class="gtco-cover gtco-cover-xs" style="background-image:url(images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row text-center">
				<div class="display-t">
					<div class="display-tc">
						<div class="col-md-12">
							<iframe src="https://discordapp.com/widget?id=516300051581108234&theme=dark" width="300" height="450" allowtransparency="true" frameborder="0"></iframe><br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-pb-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>About Us</h3>
						<p>TrinitySeal is one of my most prized projects thus far. My name is Jake Lazaros and I'm a passionate programmer with years of experience and a good reputation within my community for my skill and services.</p>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://gettemplates.co/" target="_blank">GetTemplates.co</a></small>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

