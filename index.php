<!DOCTYPE html>
<?php include_once('functions.php')?>
<html>
	<head>
		<title>Happy Number Finder</title>
		<meta name="description" content="Challenges for PHP Developer position" />
	</head>
	<body>
		<div id="candidate_info"></div>
		<div id="challenges_canvas">
			<div id="description"></div>
			<div id="form">
				<form action="<?php echo $PHP_SELF; ?>" method="post" accept-charset="utf-8">
					<p>Happy Numbers</p>
					<input type="text" size="50" name="number" value="<?php echo $_POST['number']; ?>"/><input type="submit" value="Submit" />
				</form>
				<div id="results">
					<?php
						$challenge = new HappyNumberChallenge;
						echo '<br />';
						if(isset($_POST['number'])){
						$array = $challenge->happyNumbersArray($_POST['number']);
						if (empty($array)){
							echo "You did not input any Happy Number.";
						}elseif(count($array) == 1){	
							echo "This is your Happy Number: " .'<br />'. implode(", ", $array);
						}else{
							echo "These are your Happy Numbers: " .'<br />'. implode(", ", $array);
						}
						}
					?>
				</div>
			</div>
		</div>
	</body>
	
</html>

