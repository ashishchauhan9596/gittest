<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
//require 'password.php';
try{
    $pdo = new PDO("mysql:host=localhost;dbname=rightway", "root", "root");
	    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 

	catch(PDOException $e){
	    die("ERROR: Could not connect. " . $e->getMessage());
	}

	if (isset($_POST['submit'])) {

		try{
		    $sql = "INSERT INTO pdo (name, email,password,hashpass) VALUES (:name,:email,:password,:hashpass)";

		    $stmt = $pdo->prepare($sql);

		    $stmt->bindParam(':name',$_REQUEST['name'],PDO::PARAM_STR);
		    $stmt->bindParam(':email',$_REQUEST['email'],PDO::PARAM_STR);
		    $stmt->bindParam(':password',$_REQUEST['password'],PDO::PARAM_STR);
		    $stmt->bindParam(':hashpass',$passhash,PDO::PARAM_STR);
		    $passhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
		    $stmt->execute();

		    echo "Records inserted successfully.";

		}
		catch(PDOException $e){
			    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
		}

		unset($stmt);
	}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
	<form action="pdo.php" method="post">
	    <p>
	        <label for="firstName">Name:</label>
	        <input type="text" name="name" id="Name">
	    </p>
	    <p>
	        <label for="emailAddress">Email Address:</label>
	        <input type="text" name="email" id="emailAddress">
	    </p>
	    <p>
	        <label for="password">Password:</label>
	        <input type="password" name="password" id="password">
	    </p>
	    <input type="submit" name="submit" value="Submit">
	</form><br>
	<?php 
		try{
		    $sql = "SELECT * FROM pdo";

		    $result = $pdo->query($sql);

			if($result->rowCount() > 0): ?>
				<table border="1">
			        <tr>
			            <th>id</th>
			            <th>name</th>
			            <th>email</th>
			            <th>validity of email</th>
			            <th>hash password</th>
			            <th>original password</th>
			            <th>Validity of password</th>
			        </tr>
				    <?php while($row = $result->fetch()): ?>
				    	<tr>
					    	<td><?php echo $row['id']  ?></td>
					    	<td><?php echo $row['name']  ?></td>
					    	<td><?php echo $row['email']  ?></td>
					    	<td><?php 
					    			echo (filter_var($row['email'], FILTER_VALIDATE_EMAIL)) ?"Email is valid" : "Email is NOT valid";

					    	  ?></td>
					    	<td><?php echo $row['hashpass'] ?></td>
					    	<td><?php echo $row['password'] ?></td>
					    	<td>
					    		<?php
					    		$hash = $row['hashpass'];
								if (password_verify($row['password'], $hash)) {
								    echo 'Password is valid!';
								} else {
								    echo 'Invalid password.';
								}

					    		?>
					    	</td>
				    	</tr>
				    <?php endwhile;?> 
				</table> 
	<?php 
		unset($result);

			else:
				echo "No record found.";
			endif;
			} 
			catch(PDOException $e){
    		die("ERROR:" . $e->getMessage());
    		}

		unset($pdo);
	?>
</body>
</html>