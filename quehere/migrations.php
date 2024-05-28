<?php
	$sqlquery = "CREATE TABLE IF NOT EXISTS registrar (id int AUTO_INCREMENT PRIMARY KEY, fullname CHAR(255), contact CHAR(255), address CHAR(255), dateofofregister date, password CHAR(255))";

	if (!mysqli_query($conn, $sqlquery)) {
		print mysqli_error($conn);
	}
?>	