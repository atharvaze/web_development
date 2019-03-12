<?php
// Retrieve details from HTMl files , like this : 
$username=$_REQUEST['user_name'];
$password=$_REQUEST['password'];
$day=$_REQUEST['day'];
$month=$_REQUEST['month'];
$year=$_REQUEST['year'];

// check len of the pwd 
if(strlen($password)<7)
{
	die("Password length must be greater than 6");
}
else
{
	//creates a timestamp. Not in actual date or time format yet. mktime() finds the secs elapsed from 1970.
	$mktime=mktime(0,0,0,$month,$day,$year); 
	
	$date_1=date('Y-m-d',$mktime); // create a actual date type using  above timestamp
	$date_2=date('d-m-Y',$mktime);

	echo "date of birth".$date_2.'<br/>';

	$current_year=date('Y');//current year
	$current_month=date('m');//current month
	
	
	//calculation for age
	$age=$current_year-$year;//get year
	if($current_month<$month) 
		{	//birthdate in this year is yet to come
			
			 $age=$age-1;
		}
	
	// restrict registration if not 18 years old.
		if($age<18)
		{
			die("<h2>You are not 18 years old yet.</h2>");
		}
		else
		{
			echo "Username".$username."<br/>";
			echo "Password".$password."<br/>";
			echo "date of birth".$date_2."<br/>";

			echo "Record being saved in DB"."<br>";
			$conn=@mysqli_connect('localhost','root','');
			if(!$conn)
			die("Error msg:".mysqli_connect_error());
			else
			echo "connection made".'<br/>';

			$flag=@mysqli_select_db($conn,'assign44');

			if(!$flag)
			die("Error msg:".mysqli_connect_error());
			else 
			echo "db selected".'<br/>';

			$status=@mysqli_query($conn,"INSERT into user VALUES('$username','$password','$date_1')");	
			if(!$status)
			die("Error msg:".mysqli_connect_error());
			else	
			echo " Record saved in DB, pls check ";
		}
	
}
?>