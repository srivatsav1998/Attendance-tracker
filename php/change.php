<?php 
		require 'connection.php';
		$conn = Connect();
		if(isset($_POST['re_password'])){
			$old_pass=$_POST['old_pass'];
			$new_pass=$_POST['new_pass'];
			$re_pass=$_POST['re_pass'];
			$old_pass=md5($old_pass);
			$new_pass=md5($new_pass);
			$re_pass=md5($re_pass);
			$chg_pwd=mysqli_query($conn,"SELECT * FROM users WHERE username='$_SESSION[username]'");
			$chg_pwd1=mysqli_fetch_assoc($chg_pwd);
	        $data_pwd=$chg_pwd1['password'];
        	$sql="UPDATE permanent_list SET password='$new_pass' WHERE username='$_SESSION[username]'"
			if($data_pwd==$old_pass){
		    	if($new_pass==$re_pass){
				    $update_pwd=mysqli_query($conn,$sql);
				    echo "<script>alert('Update Sucessfully'); window.location='index.php'</script>";
		    	}
		    else{
			    echo "<script>alert('Your new and Retype Password is not match'); window.location='index.php'</script>";
		    }
		}
		else{
			echo "<script>alert('Your old password is wrong'); window.location='index.php'</script>";
		}
	}
?>