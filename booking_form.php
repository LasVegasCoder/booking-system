<!DOCTYPE html>
<html>
	<head>
		<title>Online booking form</title>
	</head>
	
	<body>
			<div id='i_err'>
			<?php
				if(isset($error)){
					if(!empty($error)){
						foreach($error as $err){
						echo "<h3 stype='color:red'>$err</h3>";
						}
					}
				}
			?>
			</div>
		</div>
		<div id_='i_result'>
		
		</div>
		<fieldset style="position: relative; margin:0px; padding:5px; width:18%; border:1px dotted gold; border-radius:5px">
			<legend>Real-Time Booking</legend>
			<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
				<p><label for="ia_depature">Departure date</label><p>
				<input type="date" name="ia_depature" required autofocus id="ia_depature">
				<p><label for="in_nights">Number of nights</label><p>
				<input type="number" name="in_nights" required autofocus id="in_nights min="1" max="6">
				<p><label for="i_adtguest">Number of Adult guest</label><p>
				<input type="number" name="i_adtguest" required autofocus id="i_adtguest" min="0" max="6" >
				<p><label for="i_adtguest">Number of Minor guest</label><p>
				<input type="number" name="i_minguest" required autofocus id="i_minguest" min="0" max="3"><br>
				<input type="submit" name="i_consent" id="i_consent" value="Check Availablility" >
			</form>
		</fieldset>
		<!--<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>-->
	</body>

</html>