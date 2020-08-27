<?php
	require_once 'db.php';

    if(isset($_POST['insert'])){

        $name   = mysqli_real_escape_string($obj->conn, $_POST['name']);
        $number   = mysqli_real_escape_string($obj->conn, $_POST['number']);
        $address   = mysqli_real_escape_string($obj->conn, $_POST['address']);

        if ($name == '' || $number == '' || $address == '') {
        	echo 'Field must not be empty';
        } else {
        	$result = $obj->Insert("first_table", "name='$name', mobile='$number', address='$address'");
	        if ($result) {
	            $success = "Data inserted succefully";
	        } else {
	            $error = "Data not insert";
	        }

        }


        
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Crud with oop</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<h1 class="display-3 text-center">Student List</h1>
	<div class="container col-sm-4">
		<h3 class="text-center">Add Student</h3>
		<?php
                if (isset($success)) {   
            ?> 
                <div class="alert alert-success" role="alert">
                    <?= $success ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    

            <?php
                }
            ?>

            <?php
                if (isset($error)) {   
            ?> 
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    

            <?php
                }
            ?>
		<div class="form-group">
			<form action="" method="POST">
				<label class="font-weight-bold mt-0" for="name">Student Name</label>
				<input id="name" required="" placeholder="Student Name" class="form-control" type="text" name="name">
				<label class="font-weight-bold mt-1" for="number">Student Number</label>
				<input id="number" required="" placeholder="Student Number" class="form-control" type="number" name="number">
				<label class="font-weight-bold mt-1" for="address">Student Address</label>
				<input id="address" required="" placeholder="Student Address" class="form-control" type="text" name="address">
				<input class="btn btn-success mt-3 btn-block" type="submit" name="insert">
			</form>
		</div>
	</div>

	<div class="container">
		<table class="table table-bordered table-hover">
			<?php
				$result = $obj->getAll("first_table", "*");
				echo '<thead>';
				echo "<tr>";
				foreach ($result[0] as $key => $val) {
					echo "<th>".ucfirst($key)."</th>";
				}	
					echo "<th>Action</th>";
				echo "</tr>";
				echo '</thead>';
				$i = 0;
				foreach ($result as $value) {
					$i++;
					echo "<tr>";
						echo '<td>'.$i.'</td>';
						echo '<td>'.ucfirst($value['name']).'</td>';
						echo '<td>'.ucfirst($value['mobile']).'</td>';
						echo '<td>'.ucfirst($value['address']).'</td>';
						echo '<td>';
					?>
							<a class='btn btn-warning' href='edit.php?editId=<?= base64_encode($value['id']); ?>'><i class="fas fa-user-edit"></i></a> 
							<a onclick="return confirm('Are you sure to delete this data?');" class='btn btn-danger' href='delete.php?deleteId=<?= base64_encode($value['id']); ?>'><i class="fas fa-trash-alt"></i></a></td>
					<?php
						echo '</td>';
					echo "</tr>";
				}
			?>
		</table>
	</div>



	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>