<?php 
	$pilihmp3 = $_GET['pilihmp3'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
<div class="audio">
    <audio controls autoplay>
      <source src="audio/<?php echo $pilihmp3; ?>" type="audio/mpeg" />
    </audio>    
</div>
</body>
</html>