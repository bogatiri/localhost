<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" href="css\style_main.css">
	<title>Home Page</title>
	<?php
    session_start();
    $user_name = $_SESSION['user_name'];
    $user_qualification = $_SESSION['user_qualification'];
    ?>
</head>


<body class="<?php echo isset($_SESSION['theme']) ? $_SESSION['theme'] : 'default-theme'; ?>">
	<nav class="navbar ">
			<div class="nav-search-box">
				<i class="fa-solid fa-magnifying-glass search-icon"></i>
				<input type="text" placeholder="Search...">
			</div>
			<a href="#" class="logo">DiplomProject</a>
			<ul class="nav-links">
				<i class="fa-solid fa-xmark navCloseBtn"></i>
				<li>
					<a href="#">
						<i class="fa-solid fa-house icon"></i>
						<span class="text">Home</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa-solid fa-house icon"></i>
						<span class="text">one</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa-solid fa-house icon"></i>
						<span class="text">two</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa-solid fa-house icon"></i>
						<span class="text">three</span>
					</a>
					</li>
				<li>
					<a href="#">
						<i class="fa-solid fa-house icon"></i>
						<span class="text">four</span>
					</a>
				</li>
			</ul>
			<i class="fa-solid fa-magnifying-glass search-icon-1" id="searchIcon"></i>
			<i class="fa-solid fa-bars navOpenBtn"></i>
	</nav>
	<nav class="sidebar close">
		<header>
			<div class="image-text">
				<span class="image">
					<img src="logo.png" alt="Logo">
				</span>
				<div class="text header-text">
					<span class="name"><?php echo $user_name; ?></span>
					<span class="proffesion"><?php echo $user_qualification; ?></span>
				</div>
			</div>
			<i class="fa-solid fa-chevron-right toggle"></i>
		</header>
		<div class="menu-bar">
			<div class="menu">
				<li class="search-box">
					<i class="fa-solid fa-magnifying-glass icon"></i>
					<input type="search" placeholder="Search...">
				</li>
				<ul class="menu-links">
					<li class="nav-link">
						<a href="#">
							<i class="fa-solid fa-house icon"></i>
							<span class="text nav-text">All Boards</span>
						</a>
					</li>
					<li class="nav-link">
						<a href="#">
							<i class="fa-solid fa-briefcase icon"></i>
							<span class="text nav-text">Overall Projects</span>
						</a>
					</li>
					<li class="nav-link">
						<a href="#">
							<i class="fa-solid fa-list-check icon"></i>
							<span class="text nav-text">Active Projects</span>
						</a>
					</li>
					<li class="nav-link">
						<a href="#">
							<i class="fa-solid fa-box-archive icon"></i>
							<span class="text nav-text">Archive Projects</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="bottom-content">
				<li class="">
					<a href="exit.php">
						<i class="fa-solid fa-arrow-right-from-bracket icon"></i>
						<span class="text nav-text">Logout</span>
					</a>
				</li>
				<form action="save-theme.php" method="post">
					<li class="mode">
						<div class="moon-sun">
							<i class="fa-regular fa-moon icon moon"></i>
							<i class="fa-regular fa-sun icon sun"></i>
						</div>
						<span class="mode-text text">Dark Mode</span>
						<div class="toggle-switch">
							<span class="switch"></span>
						</div>
					</li>
				</form>
			</div>
		</div>
	</nav>
	<section class="home">
		<!-- <div class="text">SOMETHING SHOULD BE HERE</div> -->
	</section>
	<script src="js\main_script.js"></script>
</body>

</html>