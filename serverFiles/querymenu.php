<?php include("top.html"); ?>

		<form action="query.php" method="post">
		
		Date: <input type="text" name="Logdate"/>
		Data Center: <select name="Loghost">
			<option value="WDC07">WDC07 - Washington</option>
			<option value="DAL10">DAL10 - Dallas</option>
			<option value="">All</option>
		</select>
		Environment: <select name="Logenv">
			<option value="DEV">Dev</option>
			<option value="QA">QA</option>
			<option value="PROD">PROD</option>
			<option value="">All</option>
		</select>
		PIN: <input type="text" name="QueryPIN"/>
		<input type="submit" value="Query It" /><br>
		</form>
		
<?php include("bottom.html"); ?>
