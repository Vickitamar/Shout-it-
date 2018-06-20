<?php
include 'database.php';

//create select query
$query = "SELECT * FROM shouts ORDER BY id DESC";
$shouts = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Shout it</title>
	<link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
	<div class="background">
		<div id="container">
			<header>
				<h1>Shout It</h1>
			</header>

			<div id="shouts">
				<ul>
					<?php while($row = mysqli_fetch_assoc($shouts)) : ?>
						<li class="shout"><span><?php echo $row['time']; ?> - </span><strong><?php echo $row['user']; ?>:  </strong><?php echo $row['message']; ?></li>

					<?php endwhile; ?>	

					
				</ul>
			</div>

			<div id="input">
				<?php if(isset($_GET['error'])) :  ?>
					<div class="error"><?php echo $_GET['error']; ?></div>
				<?php endif; ?>
				<form method="post" action="process.php">
					<input type="text" name="user" placeholder="Enter your name" />
					<input type="text" name="message" placeholder="Enter your message" />
					<br />
					<input class="shout-button" type="submit" name="submit" value="Shout it out" />
				</form>	
			</div>

				

		</div>

		<div class="logOut">
			<button><a href="logout.php">Log Out</a></button>
		</div>
	</div>	

</body>
</html>