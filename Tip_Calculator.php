<!doctype html>
<html>
	<head>
		<title>Tip Calculator</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="mystyle.css">
	</head>
	<body>
		<div class="Beginning">
			<h2>Tip Calculator</h2>
			<br>
			<form method="get">
				<div<?php
					if(isset($_GET["subtotal"]) && !empty($_GET["subtotal"]) 
						&& is_numeric($_GET["subtotal"]) && $_GET["subtotal"] >= 0){
						
					} else {
						echo ' class="error"';
					}
					?>>
				Bill subtotal: $<input type="text" name="subtotal" size="7" <?php 
				if(isset($_GET["subtotal"]) && !empty($_GET["subtotal"])
					&& is_numeric($_GET["subtotal"]) && $_GET["subtotal"] >= 0){
						echo "value=".$_GET["subtotal"];
					}else{
						echo 'value=0';
						
					}
					?>></div><br><br>
				Tip percentage:<br><br>
				<?php
				for ($i = 0; $i < 3; $i++) {
					if(isset($_GET["percent"]) && (10+($i*5))==$_GET["percent"]) {
						echo '<input type="radio" name="percent" checked value="' , 10 + ($i*5) , '"> ' , 10 + ($i*5) , '% 
					';} else {
					echo '<input type="radio" name="percent" value="' , 10 + ($i*5) , '"> ' , 10 + ($i*5) , '% 
					';}
				}
				?><br><br>
				
				<div class="Sbutton">
					<input type="submit" value="Submit">
				</div>
				<?php
				if(isset($_GET["subtotal"]) && !empty($_GET["subtotal"]) && isset($_GET["percent"])){
					if(is_numeric($_GET["subtotal"]) && $_GET["subtotal"] >= 0){
						$subtotal = (double)$_GET["subtotal"];
						$percent = ((double)$_GET["percent"])/100;
						$tip = $subtotal * $percent;
						$total = $subtotal + $tip;
						$tip = number_format($tip, 2, '.', ',');
						$total = number_format($total, 2, '.', ',');
						echo '<div class="Inside">
							Tip: $' . $tip .'<br>
							Total: $'. $total . '
						</div>';
					}
				}
				?>
		</div>
	</body>
</html>