<?php 
// index.php




?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
</head>
<body>
	<br><br><br>
<div class="container">
	<div class="w-50 mx-auto bg-light shadow p-5" style="border-radius:15px;">
		<form method="post" id="form_submit">
			<div id="error"></div>
			<div class="form-group">
				<input class="form-control form-control-sm" type="text" name="name" placeholder="Name">
			</div>
			<div class="form-group">
				<input class="form-control form-control-sm" type="text" name="gender" placeholder="Gender">
			</div>
			<div class="form-group">
				<input class="form-control form-control-sm" type="" name="designation" placeholder="Designation">
			</div>
			<div class="">
				<button class="btn btn-info btn-sm btn-block">Submit</button>
			</div>
		</form>
	</div>
</div>


<div class="container" >

	<table class="table table-bordered table-sm">
		<tr class="bg-secondary">
			<td>ID</td>
			<td>Name</td>
			<td>Gender</td>
			<td>Designation</td>
		</tr>
<?php 

$data = file_get_contents('employee_data.json');
	
$json = json_decode($data, true);
$i = 1;
foreach ($json as $value)
{
	echo '
		<tr>
			<td contenteditable="true">'.$i.'</td>
			<td contenteditable="true">'.$value['name'].'</td>
			<td contenteditable="true">'.$value['gender'].'</td>
			<td contenteditable="true">'.$value['designation'].'</td>
		</tr>
	';
	$i++;
}

 ?>
	</table>

</div>



<br><br><br><br><br>




</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$("#form_submit").submit(function(e){
			e.preventDefault();
			var formData = $(this).serialize();
			$.ajax({
				url:"process.php",
				method:"post",
				data:formData,
				success:function(data)
				{
					$("#error").html(data);
				}
			});
		});
	});
</script>