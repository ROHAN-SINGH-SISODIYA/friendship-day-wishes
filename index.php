<?php
       $conn=mysqli_connect('118.185.43.122','0187cs161025','sistec','0187cs161025'); 
       $userID="";$groupCode="";
       if (isset($_GET['userID']))
       {
      		     $userID=$_GET["userID"];
      		 	 $sql = "select * from tbl_friend where userID='$userID'";
      		 	 if (isset($_GET['groupCode'])){
      		    	 $groupCode=$_GET['groupCode'];
      		 		 $sql = "select * from tbl_friend where groupCode='$groupCode'";
      		 	 }
				 $result = mysqli_query($conn, $sql);
      		 	 //var_dump($sql);exit();
				 $i=0;
				 $rowArray = array();
				 if (mysqli_num_rows($result)>0) {
				 while ($row = mysqli_fetch_assoc($result)) {
					    	$rowArray[$i]['userID']=$row['userID'];
					    	$rowArray[$i]['userName']=$row['userName'];
					    	$rowArray[$i]['groupCode']=$row['groupCode'];
					    	$rowArray[$i]['group_option']=$row['group_option'];
					    	$rowArray[$i]['img']=$row['img'];
					    	$i++;

					    }				 
					}
      		 	 //var_dump($rowArray);exit();




       }
 ?>


<!DOCTYPE html>
<html>
<head>
	  <title>Friendship-day-wishes</title>
	   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	  <style type="text/css">
  	
* { margin: 0px; padding: 0px; }
body {
	background: #ecf1f5;
	font:14px "Open Sans", sans-serif; 
	text-align:center;
}
.tile{
	width: 100%;
	background:#fff;
	border-radius:5px;
	box-shadow:0px 2px 3px -1px rgba(151, 171, 187, 0.7);
	float:left;
  	transform-style: preserve-3d;
  	margin: 10px 5px;

}

.header{
	border-bottom:1px solid #ebeff2;
	padding:19px 0;
	text-align:center;
	color:#59687f;
	font-size:600;
	font-size:19px;	
	position:relative;
}

.banner-img {
	padding: 5px 5px 0;
}

.banner-img img {
	width: 100%;
	border-radius: 5px;
}

.dates{
	border:1px solid #ebeff2;
	border-radius:5px;
	padding:20px 0px;
	margin:10px 20px;
	font-size:16px;
	color:#5aadef;
	font-weight:600;	
	overflow:auto;
}
.dates div{
	float:left;
	width:50%;
	text-align:center;
	position:relative;
}
.dates strong,
.stats strong{
	display:block;
	color:#adb8c2;
	font-size:11px;
	font-weight:700;
}
.dates span{
	width:1px;
	height:40px;
	position:absolute;
	right:0;
	top:0;	
	background:#ebeff2;
}
.stats{
	border-top:1px solid #ebeff2;
	background:#f7f8fa;
	overflow:auto;
	padding:15px 0;
	font-size:16px;
	color:#59687f;
	font-weight:600;
	border-radius: 0 0 5px 5px;
}
.stats div{
	border-right:1px solid #ebeff2;
	width: 33.33333%;
	float:left;
	text-align:center
}

.stats div:nth-of-type(3){border:none;}

div.footer {
	text-align: right;
	position: relative;
	margin: 20px 5px;
}

div.footer a.Cbtn{
	padding: 10px 25px;
	background-color: #DADADA;
	color: #666;
	margin: 10px 2px;
	text-transform: uppercase;
	font-weight: bold;
	text-decoration: none;
	border-radius: 3px;
}

div.footer a.Cbtn-primary{
	background-color: #5AADF2;
	color: #FFF;
}

div.footer a.Cbtn-primary:hover{
	background-color: #7dbef5;
}

div.footer a.Cbtn-danger{
	background-color: #fc5a5a;
	color: #FFF;
}

div.footer a.Cbtn-danger:hover{
	background-color: #fd7676;
}
  </style>
</head>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="tile">
                    <div class="wrapper">
                        <div class="header">Friendship Day</div>

                        <div class="banner-img">
                            <img src="download.jpeg" alt="Image 1">
                        </div>

                        <?php if(count($rowArray)>0){
                        	$u=1;
                        	$count=0;
                        	foreach ($rowArray as $key ) {
                        		if($u==1){
                        			$u=0;
                        			echo '<div class="stats">';
                        		}
                        		echo '
		 							
		                             <div>
		                            	<strong>'.$key['userName'].'</strong>
		                            	<img src="images/'.$key['img'].'" alt="Image 1" style="    height: 100px">
		                            </div>
                        		';
                        		$count++;
                        		if ($count%3==0) {
                        			$u=1;
                        			echo '</div>';
                        		}
                        	}
                        		if (($count%3)!=0) {
                        			echo '</div>';
                        	}
                        }?>


                        


                        <div class="footer">
                         <?php if(count($rowArray)>0){
                        	if($rowArray[0]['group_option']=="yes"){
                        		echo '
 								<a  class="btn btn-success statusClass" data-toggle="modal"  data-groupCode="'.$rowArray[0]['groupCode'].'" data-group-option="yes">join group</a>
                        		';
                        	}
                        }?>
                            
                            <a  class="btn btn-success statusClass" data-toggle="modal"   data-groupCode="" data-group-option="yes">create group</a>
                            <a  class="Cbtn Cbtn-danger statusClass" data-groupCode="" data-group-option="no">Person</a>
                        </div>
                         <div class="footer">
                            <a  class="btn btn-success " data-toggle="modal"   data-groupCode="" data-group-option="yes">WhAtSAPP SHARE</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">JOIN AND ADD FRIENDS</h4>
        </div>
        <div class="modal-body">
               <form method="post" enctype="multipart/form-data">
					  <div class="form-group">
					    <label for="exampleInputEmail1">ENTER YOUR NAME</label>
					    <input type="text" name="username" class="form-control" placeholder="Enter Name">
					    <input type="hidden" name="groupCode" id="groupCode" value=" " class="form-control" placeholder="Enter Name">
					    <input type="hidden" id="group_option" name="group_option" value="yes" class="form-control" placeholder="Enter Name">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">PHOTO</label>
					    <input type="file" name="file1" class="form-control" placeholder="Upload file">
					  </div>
					  <button type="submit" name="submit" class="btn btn-primary">Join</button>
				</form>
        </div>
      </div>
  </div>
</div>
</body>
</html>
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
		  	# code...
		  }

   }
?>
  <script type="text/javascript">
		$(document).on('click','.statusClass',function() {
			var groupCode=$(this).attr("data-groupCode");
			var group_option=$(this).attr("data-group-option");
			$("#groupCode").val(groupCode);
			$("#group_option").val(group_option);
			$("#myModal").modal("show");


		});

  </script>