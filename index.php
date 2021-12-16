<?php
//header("refresh: 5");
if(isset($_REQUEST['customer_id'])){
  $id=$_REQUEST['customer_id'];
  $date=date_create();
  $time=date_format($date,"H:i:s");
  
  $filepath = 'data.txt';
  $fp = fopen('data.txt', 'a+');
  $ttxt = file($filepath);  
  //check post
      $line2 = ($id*8)-1;
      // Make the change to line in array
      // Put the lines back together, and write back into txt file
        $lines = count(file($filepath));
       if($lines == ($line2+1)){
        $ttxt[$line2] = $time; 
       }else{
        $ttxt[$line2] = $time."\n";
       }
        file_put_contents($filepath, implode($ttxt));
        header('location: index.php');
  }
  ?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,
					initial-scale=1, shrink-to-fit=no">
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
	</script>

	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 50%;
		}
		
		td,
		th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}
		
		h1 {
			color: green;
		}
    @media only screen and (max-width: 600px) {
  body {
    background-color: cyan;
    width: 100%;
    font-size: 13px;
  }
  td,th {
			border: 1px solid #dddddd;
      border-color: black;
			text-align: left;
			padding: 4px;
		}
}
	</style>
</head>

<body>
	<center>
		<h1>Visitors Check-In Details</h1>
		<h3>
		<a href="saver.php">Check in a Visitor</a>
		</h3>
		<b>Search any visitor detail for check out:
		<input id="gfg" type="text"
				placeholder="Search here">
		</b>
		<br>
		<br>
  <table> 
						<tr>
    <?php
    echo '<strong><th></th>';
    echo '<th>Name</th>';
    echo  '<th>ID/Pass</th>';
    echo '<th>Contact</th></strong>';
    echo '<th>Check In</th></strong>';
    echo '<th>Time</th></strong>';
    echo '<th>Check out</th></strong>';
    echo '<th>Time</th></strong>';
    echo '<th></th>';
    echo '</tr>'.
    '<tbody id="geeks">';
$myfile = fopen("data.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
$i=0;
$count=1;
while(!feof($myfile)) {
  echo '<tr>';
  for($i;$i<8;$i++){
    echo '<td>'.fgets($myfile).'</td>';  
  }
 if($i % 8 ==0){
  echo '<td><center>
  <form method="POST">
  <input type="hidden" id="customer_id" name="customer_id" value="'.$count.'">
  <button type="submit" name="submit">
  <a class = "btn btn-warning" href = "index.php?customer_id='.$count.'"><i class = "glyphicon glyphicon-edit"></i> Checkout</a> 
  </button>                      
        </center></td>';
   $i=0;
   $count++;
   echo '</tr>';
 }
}
if(isset($_REQUEST['customer_id'])){
$id=$_REQUEST['customer_id'];
$date=date_create();
$day=date_format($date,"Y/m/d");
$filepath = 'data.txt';
$fp = fopen('data.txt', 'a+');
$dtxt = file($filepath);
//check post
    $line1 = ($id*8)-2;
    // Make the change to line in array
    $dtxt[$line1] = $day."\n";
    // Put the lines back together, and write back into txt file
    file_put_contents($filepath, implode($dtxt));
    header('location: index.php');
}
?> 
	 </tbody>
  </table>
  <script>
			$(document).ready(function() {
				$("#gfg").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#geeks tr").filter(function() {
						$(this).toggle($(this).text()
						.toLowerCase().indexOf(value) > -1)
					});
				});
			});
		</script>
</center>
 </body>
</html>
