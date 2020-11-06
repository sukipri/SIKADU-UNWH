	<?php
	session_start();
		$OUT = @mysql_real_escape_string($_GET['OUT']);
		session_destroy();
			header("location:../$OUT");
	?>