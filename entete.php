<?php session_start();?>
<nav class="navbar navbar-expand-sm shadow" style="background-color:#fec5d9;margin-bottom:4em;">
	<h4>INTIMA</h4>
	<hr style="height:5vh;width:.2vw;border-width:0;color:#000;background-color:#000;margin-left: 15px;margin-right: 15px;margin-top: 2px;margin-bottom: 2px;">
	<h4>Calendar</h4>
	<a class="nav-link" href="home_page.php?id=<?= $_SESSION['user_id'];?>">calendrier</a>
	<a class="nav-link" href="statistics_page.php?id=<?= $_SESSION['user_id'];?>">statistiques</a>
	<a class="nav-link" href="settings_page.php?id=<?= $_SESSION['user_id'];?>">parametres</a>
	<a class="nav-link" href="index.php">deconnexion</a>
	
</nav>

