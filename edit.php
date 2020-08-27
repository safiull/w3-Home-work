<!DOCTYPE html>
<html>
<head>
	<title>Edit Item</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<?php

		require_once 'db.php';

		if (!isset($_GET['editId']) || $_GET['editId'] == NULL) {
	        header("location: index.php");
	    } else {
	        $id = $_GET['editId'];
	        $id = base64_decode($id);
	    }


	    if(isset($_POST['update'])){

	        $name   = mysqli_real_escape_string($obj->conn, $_POST['name']);
	        $number   = mysqli_real_escape_string($obj->conn, $_POST['number']);
	        $address   = mysqli_real_escape_string($obj->conn, $_POST['address']);

	        if ($name == '' || $number == '' || $address == '') {
	        	echo 'Field must not be empty';
	        } else {
	        	$result = $obj->Update("name='$name', mobile='$number', address='$address'", "first_table", "id='$id'");
		        if ($result) {
		            $success = "Data Updated succefully";
		            header("location: index.php");
		        } else {
		            $error = "Data not update";
		        }

	        }

        
    }
	?>

	<h3 class="display-4 text-center">Edit Student</h3>
	
	<div class="container col-sm-4">
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
			<?php
				$result = $obj->getElementByCondition("*", "first_table", "id='$id'");
		        foreach ($result as $value) {

				
			?>
			<form action="" method="POST">
				<input required="" class="form-control" value="<?= $value['name'] ?>" type="text" name="name">

				<input required="" value="<?= $value['mobile'] ?>" class="form-control mt-3" type="number" name="number">

				<input required="" value="<?= $value['address'] ?>" class="form-control mt-3" type="text" name="address">

				<input value="Update" class="btn btn-success mt-3 btn-block" type="submit" name="update">
			<?php } ?>
			</form>
		</div>
	</div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>