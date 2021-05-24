<html>
	<head>
		<title></title>
	</head>
	<body>
	<form method="post" action="../update/<?= $id ?>">
		firstname
		<input type="text" name="fname" value="<?= $first_name ?>"><br>
		Last Name
		<input type="text" name="lname" value="<?= $last_name ?>"><br>
		M.I
		<input type="text" name="mi" value="<?= $middle_name ?>"><br>
		Age
		<input type="text" name="age" value="<?= $age ?>"><br>
		Gender
		<input type="text" name="gender" value="<?= $gender ?>"><br>
		<input type="submit" value="edit">
	</form>
	</body>
</html>