<?php if($result->rowCount() > 0): ?>
	<table>
        <tr>
            <th>id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
        </tr>
	    <?php while($row=$result->fetech()): ?>
	    	<tr>
	    	<td><?php $row['id']  ?></td>
	    	<td><?php $row['name']  ?></td>
	    	<td><?php $row['email']  ?></td>
	    	<td><?php $row['password'] ?></td>
	    	</tr>
	    <? endwhile;?> 
	</table> 
	<?php unset($result);

			else:
				echo "No record found.";
			endif;	

			unset($stmt);

			unset($pdo);
	 


	=========================================================

		try{
	    $sql = "SELECT * FROM pdo";   
	    $result = $pdo->query($sql);
	    if($result->rowCount() > 0){
	        echo "<table border='1'>";
	            echo "<tr>";
	                echo "<th>id</th>";
	                echo "<th>first_name</th>";
	                echo "<th>last_name</th>";
	                echo "<th>email</th>";
	            echo "</tr>";
	        while($row = $result->fetch()){
	            echo "<tr>";
	                echo "<td>" . $row['id'] . "</td>";
	                echo "<td>" . $row['name'] . "</td>";
	                echo "<td>" . $row['email'] . "</td>";
	                echo "<td>" . $row['password'] . "</td>";
	            echo "</tr>";
	        }
	        echo "</table>";

	        unset($result);
    } else{
        echo "No records matching ";
    }
	} 
	catch(PDOException $e){
    	die("ERROR:" . $e->getMessage());
	}
	