
	<!DOCTYPE html>
<html>
<head>
  <title>dwda_files | Upload and Download File</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="bootstrap.min.css"/>
<!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="bootstrap.min.js"></script>
   <!-- Bootstrap Carousel JS -->






</head>
<body>
<style>
body{


background-repeat:no repeat;
background-position:center center;		
}

.form{
width: 100%;
display: inline-block;
position: inherit;
padding: 6px;
}
 
.label {
padding: 10px;
width: 10%;
}
.input{
position: inherit;
padding: 3px;
margin-left: 2.3%;
}
 
.btn{
margin-left: 6.5%;
background-color: blue;
color: white;
}
</style>
<?php
//$servername = "sql305.epizy.com";and these too
//$username = "epiz_31613594";
//$pass = "8mDv1XT7nJbf6";
//$dbname = "epiz_31613594_dbupload";




//$con = mysqli_connect($servername,$username,$pass,$dbname);use thhis for website hosting
$con = mysqli_connect("localhost","root","","dbupload");//but if local host then will use this

// trying this
// $save= mysqli_real_escape_string($con,$_POST['save']);
// trying this

if (mysqli_connect_errno()) {
echo "Unable to connect to MySQL! ". mysqli_connect_error();
}
if (isset($_POST['save'])) {
$target_dir = "Uploaded_Files/";


$target_file = $target_dir . date("dmYhis") . basename($_FILES["file"]["name"]);
$uploadOk = 1;
//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);


//if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg" || $imageFileType != "gif") 
if($FileType != "jpg" || $FileType != "png" || $FileType != "jpeg" || $FileType != "gif" || $FileType != "pdf" ) 
{
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
$files = date("dmYhis") . basename($_FILES["file"]["name"]);
}else{
echo "Error Uploading File";
exit;
}
}else{
echo "File Not Supported";
exit;
}
$filename = $_POST['filename'];
$location = "Uploaded_Files/" . $files;


// trying this
$save= mysqli_real_escape_string($con,$_POST['save']);
// trying this

$sqli = "INSERT INTO `tblfiles` (`FileName`, `Location`) VALUES ('{$filename}','{$location}')";
$result = mysqli_query($con,$sqli);

if ($result) {
echo "Files have been uploaded";
};
}
?>
<center>

<h1>DOWNLOAD DWDA FILES</h1>
<!--<h1>Upload and Download</h1>
<!--<h1>Download</h1>-->

<form class="form" method="post" action="" enctype="multipart/form-data">
<label>Filename:</label>
<input type="text" name="filename" > <br/>
<div style="margin-left: 9%">
<label>File:</label>
<input type="file" name="file"> <br/>
</div>
<button type="submit" name="save" class="btn"><i class="fa fa-upload fw-fa"></i> Upload</button>
</form>
</center>
<br>

<div class="container">
<table id="demo" class="table table-bordered">
<thead>
<tr>
<td>FILENAMES</td>
<td>DOWNLOAD</td>
</tr>
</thead>

<?php
$sqli = "SELECT * FROM `tblfiles`";
$res = mysqli_query($con, $sqli);
while ($row = mysqli_fetch_array($res)) {
echo '<tr>';
echo '<td>'.$row['Filename'].'</td>';
echo '<td><a class="btn" download="'.$row['Filename'].'" href="'.$row['Location'].'">Download</a></td>';
echo '</tr>';
}
mysqli_close($con);
?>

</table>

<br><br>


</div>
<br><br>



<!-- ends          -->







<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
</script>










 <!--DISABLE INSPECT ELEMENT CODES STARTS-->
<script>
document.onkeydown=function(e)
{
if(event.keycode== 12345)
{
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0))
{
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0))
{
return false;
}

if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0))
{
return false;
}

if(e.ctrlKey && e.keyCode == 'P'.charCodeAt(0))
{
return false;
}

if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0))
{
return false;
}



}
</script>
<!--DISABLE INSPECT ELEMENT CODES ENDS-->















				<!--AUTO UPDATE FOOTER STARTS HERE 
<!--AUTO UPDATE FOOTER STARTS HERE--> 

              <div class="container">
			   <hr class="bg-white" style="height:2px;">
			  <div class="text">
				<center><p>&copy<span id="currentYear">2020</span>
				Dormaa West District Assembly,
				Nkrankwanta [Bono Region Ghana].All Rights Reserved.</p></center>
			  </div>
			  </div>
<!--AUTO UPDATE FOOTER ENDS HERE-->
              
<!--AUTO UPDATE FOOTER ENDS HERE-->
			  
<!--AUTO UPDATE YEAR SCRIPTS STARTS HERE--> 
<script>
const yearSpan=document.querySelector('#currentYear');
const currentYear=new Date();
yearSpan.innerText=currentYear.getFullYear();
</script>
<!--AUTO UPDATE YEAR SCRIPTS ENDS HERE--> 				
				
<br><br><br>








<br><br>
<script src= ></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" ></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js  " ></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js "></script>




</body>
</html>
