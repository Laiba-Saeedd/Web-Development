<?php
session_start();
$conn = mysqli_connect("localhost","root","","trainreservationsystem");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$t_no=$_POST['t_no'];
$Trn_name=$_POST['Trn_name'];
$Seats=$_POST['Seats'];
$Trn_source=$_POST['Trn_source'];
$Trn_destination=$_POST['Trn_destination'];
$Arrival_time=$_POST['Arrival_time'];
$Departure_time=$_POST['Departure_time'];
$sql = "INSERT INTO train (t_no, Trn_name, Seats, Trn_source, Trn_destination, Arrival_time, Departure_time) VALUES ('$t_no', '$Trn_name', '$Seats', '$Trn_source', '$Trn_destination', '$Arrival_time', 'Departure_time');";
	if(mysqli_query($conn, $sql))
{  
	$message = "Train have been successfully added";
}
else
{  
	$message = "Could not insert train record"; 
}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<HTML>
<HEAD>
<TITLE>Add Train on Pakistan Railways</TITLE>
<LINK REL="STYLESHEET" HREF="STYLE.CSS">
<style type="text/css">
*	{
	color: #222;
}
#register_form	{
	background-color: white;
	width: 40%;
	margin: auto;
	border-radius: 25px;
	border: 2px solid blue; 
	margin-top: 25px;
}
#nav	{
	color: white;
}
#logintext	{
	margin-top: 10px;
}
#login	{
	margin-top: 10px;
	margin-bottom: 20px;
}
</style>
<SCRIPT src="validation.js"></SCRIPT>
</HEAD>
<BODY  background="img/wallpaper1.jpg" link="white" alink="white" vlink="white" width="1024" height="768">
<?php include("adminheader.php") ?>
<div id="register_form" align="center" height="200" width="200">
<FORM name="register" method="post" action="addtrn.php" onsubmit="return validate()">
<TABLE border="0">
<CAPTION><FONT size="6" color="WHITE"><br/>Enter Train details:</FONT></CAPTION>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Train No:</FONT></TD>
<TD><INPUT name="t_no" type="TEXT" placeholder="Enter train no" size="30" maxlength="30" align="center" id="t_no"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Train name:</FONT></TD>
<TD><INPUT type="TEXT" name="Trn_name" align="center" size="30" maxlength="30" placeholder="Enter train name" id="Trn_name"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Seats:</FONT></TD>
<TD><INPUT type="TEXT" name="Seats" align="center" size="30" maxlength="3" placeholder="Enter Seats" id="Seats"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Train Source:</FONT></TD>
<TD><INPUT type="TEXT" name="Trn_source" size="30" maxlength="10" placeholder="Enter Train Source" id="Trn_source"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Train Destination:</FONT></TD>
<TD><INPUT type="TEXT" name="Trn_destination" size="30" maxlength="10" placeholder="Enter Train Destination" id="Trn_destination"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Arrival Time:</FONT></TD>
<TD><INPUT type="TEXT" name="Arrival_time" size="30" maxlength="10" placeholder="Enter Arrival Time" id="Arrival_time"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Departure Time:</FONT></TD>
<TD><INPUT type="TEXT" name="Departure_time" size="30" maxlength="10" placeholder="Enter Departure Time" id="Departure_time"></TD>
</TR><tr></tr><tr></tr>
<tr></tr><tr></tr><tr></tr>
</TABLE>
<P><INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button" onclick="if(!this.form.tc.checked){alert('You must agree to the terms first.');return false}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<INPUT TYPE="Reset" value="Reset" id="reset" class="button"></P></FORM><br/>
<HR width="450" style="border-color: black;display: block;" noshade>
</FORM></div>
</BODY>
</HTML>