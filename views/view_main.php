<h1>ETS Main Page</h1>

<form action="<?php echo siteURL("main/formSubmit") ?>" method="POST">
	<input type="text" name="txtName" />
	<input type="submit" value="submit" />
</form>

<?php
	echo $data['test'];
	$results = $this->db->query("SELECT*FROM test");
	print_r($results);
?>