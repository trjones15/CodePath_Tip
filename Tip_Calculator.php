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
				Bill subtotal: $<input type="text" name="subtotal" size="5" <?php 
				if(isset($_GET["subtotal"]) && !empty($_GET["subtotal"])
					&& is_numeric($_GET["subtotal"]) && $_GET["subtotal"] >= 0){
						echo "value=".$_GET["subtotal"];
					}else{
						echo 'value=0';
						
					}
					?>></div><br><br>
				<div<?php
					if(isset($_GET["percent"])){
						if($_GET["percent"] ==3){
							if(isset($_GET["custom"]) 
								&& is_numeric($_GET["custom"]) && $_GET["custom"] >= 0){
									
								}
								else {
									echo ' class="error"';
								}
						}
					} else {
						echo ' class="error"';
					}
				?>>
				Tip percentage:<br><br>
				<?php
				for ($i = 0; $i < 3; $i++) {
					if(isset($_GET["percent"]) && (10+($i*5))==$_GET["percent"]) {
						echo '<input type="radio" name="percent" checked value="' , 10 + ($i*5) , '"> ' , 10 + ($i*5) , '% 
					';} else {
					echo '<input type="radio" name="percent" value="' , 10 + ($i*5) , '"> ' , 10 + ($i*5) , '% 
					';}
				}
				?><br>
				<input type="radio" name="percent" <?php if(3==$_GET["percent"]){echo 'checked ';}?>value="3"> Custom: <input type="text" name="custom" size="5" <?php 
				if(isset($_GET["custom"]) && !empty($_GET["custom"])
					&& is_numeric($_GET["custom"]) && $_GET["custom"] >= 0){
						echo "value=".$_GET["custom"];
					}else{
						echo 'value=0';
						
					}?>> %<br>
				</div><br>
				
				<div<?php
					if(isset($_GET["people"]) && !empty($_GET["people"]) 
						&& is_numeric($_GET["people"]) && $_GET["people"] >= 0){
						
					} else {
						echo ' class="error"';
					}
					?>>
				Split: <input type="text" name="people" size="5" <?php 
				if(isset($_GET["people"]) && !empty($_GET["people"])
					&& is_numeric($_GET["people"]) && $_GET["people"] >=0) {
						echo "value=".$_GET["people"];
					}else{
						echo 'value=1';
					}
				?>> person(s)</div><br>
				
				<div class="Sbutton">
					<input type="submit" value="Submit">
				</div>
				
				<?php
				if(isset($_GET["subtotal"]) && !empty($_GET["subtotal"]) && isset($_GET["percent"])&&isset($_GET["people"]) && !empty($_GET["people"])
								&& is_numeric($_GET["people"]) && $_GET["people"] >0){
					if(is_numeric($_GET["subtotal"]) && $_GET["subtotal"] >= 0){
						if($_GET["percent"] ==3){
							if(isset($_GET["custom"]) 
								&& is_numeric($_GET["custom"]) && $_GET["custom"] >= 0){
							$subtotal = (double)$_GET["subtotal"];
							if($_GET["percent"] == 3){
								$percent = ((double)$_GET["custom"])/100;
							} else {
								$percent = ((double)$_GET["percent"])/100;
							}
							$tip = $subtotal * $percent;
							$total = $subtotal + $tip;
							$tipF = number_format($tip, 2, '.', ',');
							$totalF = number_format($total, 2, '.', ',');
							echo '<div class="Inside">
								Tip: $' . $tipF .'<br>
								Total: $'. $totalF;
								if(isset($_GET["people"]) && !empty($_GET["people"])
									&& is_numeric($_GET["people"]) && $_GET["people"] >1) {
										$split = (int)$_GET["people"];
										$adjustedTip = $tip/$split;
										$adjustedTotal = $total/$split;
										$adjustedTipF = number_format($adjustedTip, 2, '.', ',');
										$adjustedTotalF = number_format($adjustedTotal, 2, '.', ',');
										echo '<br><br>Tip each: $'. $adjustedTipF.'<br>
										Total each: $' . $adjustedTotalF;
									}
							echo '</div>';
							}
						}else{
							$subtotal = (double)$_GET["subtotal"];
							if($_GET["percent"] == 3){
								$percent = ((double)$_GET["custom"])/100;
							} else {
								$percent = ((double)$_GET["percent"])/100;
							}
							$tip = $subtotal * $percent;
							$total = $subtotal + $tip;
							$tipF = number_format($tip, 2, '.', ',');
							$totalF = number_format($total, 2, '.', ',');
							echo '<div class="Inside">
								Tip: $' . $tipF .'<br>
								Total: $'. $totalF;
								if(isset($_GET["people"]) && !empty($_GET["people"])
									&& is_numeric($_GET["people"]) && $_GET["people"] >1) {
										$split = (int)$_GET["people"];
										$adjustedTip = $tip/$split;
										$adjustedTotal = $total/$split;
										$adjustedTipF = number_format($adjustedTip, 2, '.', ',');
										$adjustedTotalF = number_format($adjustedTotal, 2, '.', ',');
										echo '<br><br>Tip each: $'. $adjustedTipF.'<br>
										Total each: $' . $adjustedTotalF;
									}
							echo '</div>';
						}
					}
				}
				?>
		</div>
	</body>
</html>