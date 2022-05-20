<?php 
// process.php


if(empty($_POST['name']))
{
	$error = '<label class="text-danger">Enter Name !</label>';
}
else if(empty($_POST['gender']))
{
	$error = '<label class="text-danger">Enter Gender !</label>';
}
elseif (empty($_POST['designation']))
{
	$error = '<label class="text-danger">Enter Designation !</label>';
}
else
{
	if(file_exists('employee_data.json'))
	{
		$current_data = file_get_contents('employee_data.json');
		$array_data = json_decode($current_data, true);
		$extra = array(
			'name' => $_POST['name'],
			'gender' => $_POST['gender'],
			'designation' => $_POST['designation']
		);
		$array_data[] = $extra;
		$final_data = json_encode($array_data);
		if(file_put_contents('employee_data.json', $final_data))
		{
			$error = '<label class="text-success">Data Insert Successfully !</label>';
		}

	}
	else
	{
		$error = '<label>Json File Not Exits !</label>';
	}
}



echo $error;












 ?>