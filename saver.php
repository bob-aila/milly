<!DOCTYPE html>
<html>
<head>
  <title>Store form </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;
align-contents: right;
}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
  padding-left:20%;
  padding-right:20%;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 1px;
  outline: none;
}

.input-field:focus {
  border: 5px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 20%;
  opacity: 0.9;
}
.container {
  width: 80%;
  border: 2px solid;
  border-color: grey;
  border-radius: 10px;
  
}

.btn:hover {
  opacity: 1;
}

    @media only screen and (max-width: 600px) {
  body {
    background-color: cyan;
    width: 100%;
    font-size: 13px;
  }
  .container {
  width: 95%;
  border: 2px solid;
  border-color: grey;
  border-radius: 10px;
  
 
}
	</style>
</head>
<body>
  <div align="center" class="container">
<h2>Visitor Details</h2>
<h3><a href="index.php">Visitors List</a></h3>
  <form method="post">
    <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input type="text" name="name" placeholder="Name" required>
    </div>

    <div class="input-container">
    <i class="fa fa-credit-card icon"></i>
    <input type="number" name="id" placeholder="ID/Pass" required>
    </div>

    <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input type="number" name="phone" placeholder="Contact" required>
    </div>

    <div class="input-container">
    <i class="fa fa-calendar icon"></i>
    <input type="text" name="chekind" value="<?php $date=date_create(); echo $time=date_format($date,"d/m/Y");?>" required>
    </div>

    <div class="input-container">
    <i class="fa fa-clock-o icon"></i>
    <input type="text" name="chekint" value="<?php $date=date_create(); echo $time=date_format($date,"H:i:s");?>" required>
    </div>

    <center><button type="submit" name="submit" class="btn">Checkin</button></center>
  
  </form>
</div>
</body>
</html>


<?php
              
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$id=$_POST['id'];
$phone=$_POST['phone'];
$chekind=$_POST['chekind'];
$chekint=$_POST['chekint'];

$fp = fopen('https://github.com/bob-aila/milly/blob/main/data.txt', 'a+');
$filePath = "data.txt";
$lines = count(file($filePath));
$lines=$lines/8;
fwrite($fp,"\n");
fwrite($fp, $lines+1);
fwrite($fp,"\n");
fwrite($fp, $name);
fwrite($fp,"\n");
fwrite($fp, $id);
fwrite($fp,"\n");
fwrite($fp, $phone);
fwrite($fp,"\n");
fwrite($fp, $chekind);
fwrite($fp,"\n");
fwrite($fp, $chekint);
fwrite($fp,"\n");
fwrite($fp, 'notyet');
fwrite($fp,"\n");
fwrite($fp, 'notyet');
//fwrite($fp,"\n");
fclose($fp);
echo '1 visitor added to '.$lines.' visotors';
}
?>
