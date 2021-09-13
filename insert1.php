<?php
$server = "localhost";
$username="root";
$password="";
$dbname="test";


$conn=mysqli_connect($server,$username,$password,$dbname);

if(isset($_POST['submit'])){

	if(!empty($_POST['name']) && !empty($_POST['date'])&& !empty($_POST['time'])&& !empty($_POST['number'])){

	   $name =$_POST['name'];
	   $date =$_POST['date'];
	   $time =$_POST['time'];
	   $number =$_POST['number'];

	   $query = "INSERT INTO appointment (name,date,time,number) values ('$name','$date','$time',$number)";

	   $run = mysqli_query ($conn,$query) or die(mysqli_error());

	   if($run){
        echo"THANK YOU SO MUCH FOR FILLING THIC FORM";
       }
	   else{
	    echo"Not submitted";
	   }
	}
	else{
	  echo "all fields required";
	}
}

?>