<?php
mysqli_report(MYSQLI_REPORT_STRICT);
require 'app-config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
	<link rel="stylesheet" href="assets-prod/styles/main.css">
</head>
<body>
	<header class="top-header">
		<img src="assets-prod/images/logo.png" alt="Logo strony" class="top-header-image">
	</header>

	<div class="main-content container">
		<div class="main-content-header">
			<h1>Lista najnowszych artykułów</h1>
			<?php
			
			try {
				$connection = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
				$connection->set_charset('utf8');
				$sql = "SELECT title, content FROM posts";

				$result = $connection->query($sql);

				while($row = $result->fetch_assoc())
				{
					echo '<article>';
					echo '<h2>' . $row['title'] . '</h2>';
					echo '<p>' . $row['content'] . '</p>';
					echo '</article>';
				}
				$connection->close();
			} catch (Exception $e) {
				echo 'Usluga bazy danych niedostepna';
				echo $e->getMessage();
			}


			?>
		</div>
	</div>

	<footer class="site-footer container">
		<div class="site-footer-links">
			<a href="">Twitter</a>| <a href="">Facebook</a> | <a href="">Google+</a>
		</div>
		<p class="site-footer-copy">
			Copyright 2006-2017 strefakursów.pl © All rights reserved
		</p>
	</footer>

</body>
</html>