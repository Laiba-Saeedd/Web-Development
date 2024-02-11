<?php
session_start();
$conn = mysqli_connect("localhost","root","","trainreservationsystem");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$User_id=$_POST['User_id'];	
$Book_status=$_POST['Book_status'];
$Seat_no=$_POST['Seat_no'];
$sql = "SELECT user_id FROM user_info WHERE user_id = '$User_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$email=$_SESSION['user_info'];
$sql = "INSERT INTO booking(Book_status, Seat_no) VALUES ('$Book_status', '$Seat_no');";

$query="UPDATE booking SET User_id='$row[user_id]' WHERE Book_id='$User_id';";

	if(mysqli_query($conn, $sql))
{  
	$message = "Booking Info have been successfully added";
}
else
{  
	$message = "Could not insert record"; 
}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<HTML>
<HEAD>
<TITLE>Add Booking Info on Pakistan Railways</TITLE>
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
<FORM name="register" method="post" action="book.php" onsubmit="return validate()">
<TABLE border="0">
<CAPTION><FONT size="6" color="WHITE"><br/>Enter Booking details:</FONT></CAPTION>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">User ID:</FONT></TD>
<TD><INPUT name="User_id" type="TEXT" placeholder="Enter User ID" size="30" maxlength="30" align="center" id="User_id"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Book Status:</FONT></TD>
<TD><INPUT name="Book_status" type="TEXT" placeholder="Enter Booking Status" size="30" maxlength="30" align="center" id="Book_status"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Seat No:</FONT></TD>
<TD><INPUT type="TEXT" name="Seat_no" align="center" size="30" maxlength="30" placeholder="Enter Seat No" id="Seat_no"></TD>
</TR><tr></tr><tr></tr>
<tr></tr><tr></tr><tr></tr>
</TABLE>
<P><INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button" onclick="if(!this.form.tc.checked){alert('You must agree to the terms first.');return false}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<INPUT TYPE="Reset" value="Reset" id="reset" class="button"></P></FORM><br/>
<HR width="450" style="border-color: black;display: block;" noshade>
</FORM></div>
</BODY>
</HTML>