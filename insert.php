
<?php
    $conn=mysqli_connect('118.185.43.122','0187cs161025','sistec','0187cs161025'); 
    if(isset($_POST['submit']))
    {
    //	var_dump($_POST);exit();
   	    $userName=$_POST['username'];
   	    //image file type  
		$name= $_FILES['file1']['name'];
		$tmp_name= $_FILES['file1']['tmp_name'];
		if (isset($name)) 
		{ 
		  $path= 'images/';
		  if (!empty($name))
		    {
		        if (move_uploaded_file($tmp_name, $path.$name)) 
		        {
		        
		        }
		    }
		}
		$userID=uniqid();
		$groupCode='';
		$group_option=$_POST['group_option']; 		
		if ($_POST['group_option']=="no") {
			$groupCode='';
		}else if($_POST['groupCode']!=""){
			$groupCode=$_POST['groupCode'];
		}else{
			$groupCode=uniqid();
		}

         $qry="INSERT INTO `tbl_friend`(`userID`, `userName`, `img`, `groupCode`, `group_option`) VALUES ('$userID','$userName','".$name."','$groupCode','$group_option');";

		  $con1=mysqli_query($conn,$qry);
		  if ($con1==true) {
		  		if ($group_option=="yes") {
				$url = "index.php?userID=$userID&groupCode=$groupCode";
				header("Location: ".$url);		  		
			}else{
				$url = "index.php?userID=$userID";
				header("Location: ".$url);	
			}

		  }

   }
?>