<?php
include 'core/starter.php';
protect_page();
if(isset($_FILES['profile']) ===true)
{
	if(empty($_FILES['profile']['name']) ===true)
	{
		echo "Please choose a file";
	}
	else
	{
		$allowed =array('jpg','jpeg','gif','png');
		$file_name =$_FILES['profile']['name'];
		$file_extn = strtolower(end(explode('.', $file_name)));
		$file_temp = $_FILES['profile']['tmp_name'];
		$name = sanitize($_POST['product_name']);
		$pricing = sanitize($_POST['pricing']);
        if(in_array($file_extn, $allowed) ===true)
        {
        	$username=$user_data['mobile'];
            add_product_image($username,$file_temp,$file_extn,$name,$pricing);
            header('Location:myprofile.php');
            exit();
        }
        else
        {
        	echo "Incorret file type, Allowed: ";
        	echo implode(', ', $allowed);
        }

	}
}

?>
<form method="post" action="" enctype="multipart/form-data">
	<input type="file" name="profile"><br>
    <input type="text" name="product_name" placeholder="Enter PRoduct name"><br>
    <input type="number" name="pricing" placeholder="Enter PRoduct PRice"><br>
    <input type="submit" value="Submit">
</form>
<p>
	<a href="index.php">Home</a>
</p>