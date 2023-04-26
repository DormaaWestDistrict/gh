<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>dwda_files | Upload and Download File</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top Bar Start -->
         <!-- Top Bar Start -->
        <div class="top-bar d-none d-md-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="top-bar-left">
                            <div class="text">
                                <i class="fa fa-phone-alt"></i>
                                <p></p>
                            </div>
                            <div class="text">
                                <i class="fa fa-envelope"></i>
                                <p>dormaawestdistrict@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="top-bar-right">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
         <div class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a href="index.html" class="navbar-brand">D.W.D.A</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="https://en.wikipedia.org/wiki/Dormaa_West_(district)" class="nav-item nav-link">About</a>
                        <a href="single.html" class="nav-item nav-link">News</a>
                        <a href="" class="nav-item nav-link">Assembly Structure</a>
                        <a href="" class="nav-item nav-link"></a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu">
                                <a href="event.html" class="dropdown-item">Projects</a>
                                <a href="service.html" class="dropdown-item">Staff</a>
                                <a href="team.html" class="dropdown-item">Departments</a>
                                <a href=".html" class="dropdown-item">Assembly Members</a>
                                <a href="volunteer.html" class="dropdown-item">Documents</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
        <!-- Nav Bar End -->
        
        
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Documents</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Documents</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- docs Start -->
   
   <?php
//$servername = "sql305.epizy.com";and these too
//$username = "epiz_31613594";
//$pass = "8mDv1XT7nJbf6";
//$dbname = "epiz_31613594_dbupload";




//$con = mysqli_connect($servername,$username,$pass,$dbname);use thhis for website hosting
$con = mysqli_connect("localhost","root","","upload");//but if local host then will use this

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
   
 <!--  
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
</style> -->
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
        <!-- docs End -->
        




        <!-- Footer Start -->
          <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-contact">
                            <h2>Our Head Office</h2>
                            <p><i class="fa fa-map-marker-alt"></i>Dormaa West District Assembly,Nkrankwanta</p>
							<p class="icn"><i class="fas fa-envelope"></i> P. O. Box 4</p>
							<p class="icn"><i class="fa fa-phone"></i>&nbsp;+233 (0)352291438 </p>
							<p class="icn"><i class="fas fa-map-marker-alt"></i> BF-0029-6264</p>
                            
                            <p><i class="fa fa-envelope"></i>dormaawestdistrict@gmail.com</p>
                            <div class="footer-social">
                                <a class="btn btn-custom" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link">
                            <h2>Popular Links</h2>
                            <a href="">About Us</a>
                            <a href="">Contact Us</a>
                            <a href="">Popular Causes</a>
                            <a href="">Upcoming Events</a>
                            <a href="">Latest Blog</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link">
                            <h2>Useful Links</h2>
				<a href="http://lgs.gov.gh/">Local Government Service.  </a>
				<a href="http://www.ghanadistricts.com/home/">Ghana Districts.</a> 
				<a href="http://www.ghana.gov.gh/">GoG Official Portal.</a>
				<a href="http://www.eservices.gov.gh/SitePages/Portal-Home.aspx">Gov't.eServices Portal.</a>
				<a href="https://www.epay.gov.gh/epay">Gov't. ePayment Portal.</a>
				<a href="http://www.gogpayslip.com/">GoG Payslip Portal.</a>
				<a href="http://www.mlgrdghanagov.com/"> Min. Of Local Gov’t & Rural Dev’t.</a>
				<a href="http://www.ilgs-edu.org/"> Institute of Local Government Studies.</a>
				<a href="http://www.psc.gov.gh/"> Public Services Commission.</a>
				<a href="http://www.presidency.gov.gh/">The Presidency - Republic of Ghana.</a>
				<a href=" http://www.parliament.gh/">Parliament Of Ghana.</a>
                          
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-newsletter">
                            <h2>Newsletter</h2>
                            <form>
                                <input class="form-control" placeholder="Email goes here">
                                <button class="btn btn-custom">Submit</button>
                                <label>Don't worry, we don't spam!</label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container copyright">
                <div class="row">
                    <div class="col-md-6">
                        
						<p>&copy<span id="currentYear">2020</span>
				Dormaa West District Assembly,
				Nkrankwanta [Bono Region Ghana]<br>All Rights Reserved</p>
						
                    </div>
                    <div class="col-md-6">
                        <p>Designed By <a href="#">M.I.S</a></p>
                    </div>
                </div>
            </div>
        </div>
	 
	 
	 
	 
	 
        <!-- Footer End -->
		
		
		<!--AUTO UPDATE YEAR SCRIPTS STARTS HERE--> 
<script>
const yearSpan=document.querySelector('#currentYear');
const currentYear=new Date();
yearSpan.innerText=currentYear.getFullYear();
</script>
<!--AUTO UPDATE YEAR SCRIPTS ENDS HERE--> 
	   
	   
	   
        <!-- Footer End -->

        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/parallax/parallax.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
