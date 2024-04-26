<?php 

	$con = mysqli_connect("localhost","root","","syphp");
	
	if (isset($_GET['id'])) 
	{
		$id = $_GET['id'];
		$rec = "select * from form where id=".$id;
		$res = mysqli_query($con,$rec);
		$data = mysqli_fetch_assoc($res);
		$hob_array = explode(',', $data['hobby']); 
	}
	
	if (isset($_POST['submit'])) {

		$name = $_POST['name'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$hobby = $_POST['hobby'];
		$hob_str = implode(',', $hobby); // array to sring convert
		$city = $_POST['city'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$image = $_FILES['image']['name'];
		
		$path = "image/".$image;
		move_uploaded_file($_FILES['image']['tmp_name'], $path); // file uploade karava mate

		if (isset($_GET['id'])) 
		{
			$sql = "update form set name='$name',contact='$contact',email='$email',gender='$gender',hobby='$hob_str',city='$city',address='$address',password='$password',image='$image' where id=".$_GET['id'];
			header('location:form_img.php');
		}
		else
		{
			$sql = "insert into form(name,contact,email,gender,hobby,city,address,password,image)values('$name','$contact','$email','$gender','$hob_str','$city','$address','$password','$image')";
			header('location:form_img.php');			
		}

		mysqli_query($con,$sql);
		header('location:form_img_view.php');


	}


 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo @$data['name'] ?>"></td>
			</tr>
			<tr>
				<td>Contact</td>
				<td><input type="number" name="contact" value="<?php echo @$data['contact'] ?>"></td>
			</tr>
			<tr>
				<td>email</td>
				<td><input type="email" name="email" value="<?php echo @$data['email'] ?>"></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
					<input type="radio" name="gender" value="male" <?php if (@$data['gender']=="male"){?> checked <?php } ?> >Male
					<input type="radio" name="gender" value="female" <?php if (@$data['gender']=="female"){?> checked <?php } ?>>Female
				</td>
			</tr>
			<tr>
				<td>Hobby</td>
				<td>
					<input type="checkbox" name="hobby[]" value="cricket" <?php if (isset($_GET['id'])) { if (in_array("cricket", @$hob_array)) { ?> checked <?php } } ?>>cricket
					<input type="checkbox" name="hobby[]" value="kabaddi" <?php if (isset($_GET['id'])) { if (in_array("kabaddi", @$hob_array)) { ?> checked <?php } } ?>>kabaddi
					<input type="checkbox" name="hobby[]" value="football" <?php if (isset($_GET['id'])) { if (in_array("football", @$hob_array)) { ?> checked <?php } } ?>>football
					<input type="checkbox" name="hobby[]" value="kho kho" <?php if (isset($_GET['id'])) { if (in_array("kho kho", @$hob_array)) { ?> checked <?php } } ?>>kho kho
					<input type="checkbox" name="hobby[]" value="volleyball" <?php if (isset($_GET['id'])) { if (in_array("volleyball", @$hob_array)) { ?> checked <?php } } ?>>volleyball
				</td>
			</tr>
			<tr>
				<td>City</td>
				<td>
					<select name="city">
						<option selected disabled>Select City</option>
						<option name="Surat" <?php if(@$data['city']=="Surat"){?> selected <?php }?>>Surat</option>
						<option name="Ahmedabad" <?php if(@$data['city']=="Ahmedabad"){?> selected <?php }?>>Ahmedabad</option>
						<option name="Rajkot" <?php if(@$data['city']=="Rajkot"){?> selected <?php }?>>Rajkot</option>
						<option name="Junagadh" <?php if(@$data['city']=="Junagadh"){?> selected <?php }?>>Junagadh</option>
						<option name="Anand" <?php if(@$data['city']=="Anand"){?> selected <?php }?>>Anand</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="textarea" name="address" value="<?php echo @$data['address'] ?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" value="<?php echo @$data['password'] ?>"></td>
			</tr>
			<tr>
				<td>Image</td>
				<td><input type="file" name="image" value="<?php echo @$data['image'] ?>"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Click Here"></td>
			</tr>

		</table>
	</form>

</body>
</html>