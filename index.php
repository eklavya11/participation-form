<?php
$insert = false;
if(isset($_POST['name'])){
$server = "localhost:3307";
$username ="root";
$password = "";
$insert;
$con = mysqli_connect($server,$username,$password);

if(!$con){
   die("connection to this database failed due to" .mysqli_connect_error());

}
//echo "Success connecting to database";
$name = $_POST['name'];
$gender = $_POST['gender'];
$house = $_POST['house'];
$age = $_POST['age'];
$email = $_POST['email'];
$number = $_POST['number'];
$other = $_POST['other'];

$sql = "INSERT INTO `hp`.`form` ( `name`, `house`, `age`, `gender`, `email`, `number`, `other`, `dt`) 
VALUES ( '$name', '$house', '$age', '$gender', '$email', '$number', '$other', current_timestamp());";
//echo $sql;
if($con->query($sql) == true){
   //echo "succesfully inserted";
   $insert = true;
}
else{
   echo "ERROR: $sql <br> $con->error";
}

$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Welcome to Hogwarts form</title>
   
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
   <link rel="stylesheet" href="style.css">
    
</head>
<body>
<img class="bg" src="hp1.jpg" alt="">
<div class="container">
<h1 style="font-size:40px;">Welcome to Hogwarts Triwizard Tournament Form</h1>
<p>Enter your details and submit this form to confirm participation.</p>
<?php
if($insert == true){
echo "<p class='submitMsg'>Thanks for submitting our form. We wish you all the best for the tournament.</p>";
}
?>
<form action="index.php" method="post">
<input type="text" name="name" id="name" placeholder="Enter your name">
<input type="text" name="house" id="house" placeholder="Enter your house">
<input type="text" name="age" id="age" placeholder="Enter your age">
<input type="text" name="gender" id="gender" placeholder="Enter your gender">
<input type="text" name="email" id="email" placeholder="Enter your email">
<input type="text" name="number" id="number" placeholder="Enter your phone number">
<textarea name ="other" id="other" cols="10" rows="10" placeholder="Enter any other information here"></textarea>
<button class="btn">submit</button>

<p style="margin-top:0px;">by eklavya</p>
<a href="records.php">Show records</a>

</form>
</div>
<script src="index.js"></script>

 
   
</body>
</html>
