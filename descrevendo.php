<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="montar.php" method="post">
		<?php 

			$qtdDecisao = $_POST['decisao'];
			$qtdRestri = $_POST['restricoes'];
			
			$_SESSION['decisao'] = $_POST['decisao'];
			$_SESSION['restricoes'] = $_POST['restricoes'];

			for ($i=0; $i < $qtdDecisao; $i++) {
		?> 
			<label>
				Decisao <?php echo "X".$i; ?>:
				<input type="text" name="<?php echo "dX".$i ?>">	
			</label>

		<?php } ?>

		<br>

		<?php 
			for ($i=0; $i < $qtdRestri; $i++) {
		?> 
		<?php 
				for ($j=0; $j < $qtdDecisao + 2; $j++) {
		?> 	
		<?php 
					if ($j < $qtdDecisao) {
		?> 	
						<label>
							<?php echo $i+1; ?> Restricao <?php echo "X".$j; ?>:
							<input type="text" name="<?php echo "rX".$i.$j ?>">	
						</label>
				<?php }elseif ($j < $qtdDecisao + 1) { ?>
						<select name="<?php echo "sinal". $i; ?>">
							<option value="="> = </option>
							<option value="<="> <= </option>
						</select>

				<?php }else{?>
						<label>
							<input type="text" name="<?php echo "rX".$i."resultado"?>">	
						</label>						
				<?php } ?>
			<?php } ?>
				<br>
		<?php } ?>

		<input type="submit" name="validar">		
	</form>
</body>
</html>