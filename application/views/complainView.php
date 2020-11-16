<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php linkCSS('add-moderator'); ?>
    <?php linkFav('ee-logo.png');?> 
</head>
<body>
<html>
<head> 
	<meta charset="utf-8">
	<meta description="description" content="get forms">
	<title>get forms</title>
</head>
<body>
  	<div class="form-style-10">
		<h1 >Complain Form</h1>
		<br>
		<div class="section">Enter Info</div>
		<div class="inner-wrap">
			<form method="post"   action="<?php echo BASEURL.'/complain/insert';?>"> 
				<label for="complain User">Complainant: </label>
				<input  type="text" id="complainUser" name="complainUser" >
		</div>
		<br>
		<div class="inner-wrap "  class="<?php echo BASEURL.'/complain/selectad';?>">
				<label for="accuseduser">Complainee:</label>
				<br>
				<br>
                <select name="accuseduser" class="dropdown">
                 <?php
                foreach ($data['joblist'] as $row) {
                    echo "<option value=".$row['jobId']." >".$row['jobId']." ".$row['title']."</option>";
                 }
                 ?>
        </select>
		</div>
		<br>
		<div class="inner-wrap">
			<label for="complainType">Complain Type:<br>1.Fraud&nbsp&nbsp2.Abuse&nbsp&nbsp3.Seller rule violation&nbsp&nbsp4.Failures<br>5.Buyer rule violation</label>
			<br>
			<br>
            <select id="complainType" name="complainType" class="dropdown">
                <option value = "1">1</option>
                <option value = "2">2</option>
                <option value = "3">3</option>
				<option value = "4">4</option>
				<option value = "5">5</option>
              	</select>
		</div>
		<br>
        <div class="inner-wrap">
			<label for="description">Description:</label>
			<input type="text" placeholder="Enter a short description about the complain" name="description" id="description">
		</div>
		<br>
		<div class="button-section">
			<input type="submit" name="submit" >
			<input type="reset" value="clear form">
		</div>
		</form>
	    </div>
	</div>
</body>
</html>