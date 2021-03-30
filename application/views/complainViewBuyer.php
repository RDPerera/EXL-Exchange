<?php include "components/buyerDashboardHeader.php"; ?>
<head>
<style>
    .container{
        width:100%;
        height:100vh;
        display:flex; 
        justify-content:center;  
    }
    .tbl{
        padding:10px;
        align-self:center;
        
    }
    .title
    {
        color: #007bff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: x-large;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .issue,.submit,.description,.i
    {
        padding:10px;
        border-radius: 7px;
        border:none;
        background-color: rgb(238, 238, 238);
    }
    .submit
    {
        float:right;
        padding:10px;
        border-radius: 7px;
        border:none;
        color:white;
        background-color:#007bff ;
        transition: ease-in-out 0.3s;
    }
    .submit:hover{
        color:#007bff;
        background-color:rgb(238, 238, 238) ;
    }
    tr,td{
        padding:10px;
    }
    .success{
        color:green;
        font-weight:600;
    }
    .backbtn{
        background-color:#48b82c;
        padding:10px;
        border-radius: 7px;
        border:none;
        color:white;
        font-size:small;
        text-align:center;
        transition:ease-in-out 0.3s;
    }
    .backbtn:hover{
        background-color:rgb(238, 238, 238) ;
        color:green;
    }
    body{
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }
</style>
</head>

<form method="post"  action="<?php echo BASEURL.'/complainBuyer/insert';?>" enctype="multipart/form-data">
<div class="container">
<input type="hidden" name="complainerUsername" value="<?php echo $data['complainerUsername']; ?>">
<table class="tbl">
    <tr class="srule"><td class="scolumn" colspan="2"><p class="title">Complain Form</p></td></tr>
    <tr class="rule"><td class="column">Issue</td><td class="column2">
        <select name="issue" id="issue" class="issue">
            <option value="Account Issue" class="op" selected>Select complain Type</option>
            <option value="Fraud" class="op">Fraud</option>
            <option value="Abuse" class="op">Abuse</option>
            <option value="Seller Rule Violation" class="op">Seller Rule Violation</option>
			<option value="Buyer Rule Violation" class="op">Buyer Rule Violation</option>
            <option value="Failures" class="op">Failures</option>
        </select>
    </td></tr>
	<tr class="rule"><td class="column">Accuesed UserName</td><td class="column2">
        <input type="text" name="accusedusername" id="accusedusername" class="i">
    </td></tr>
    <tr class="rule"><td class="column">Descrition</td><td class="column2">
        <textarea name="description" id="description" cols="30" rows="10" class="description"></textarea>
    </td></tr>
	<tr class="rule"><td class="column">Job Id</td><td class="column2">
	<input type="text" name="jobid" id="jobid" class="i">
    </td></tr>
	<tr class="rule"><td class="column">Advertisment Id Id</td><td class="column2">
	<input type="text" name="adid" id="adid" class="i">
    </td></tr>
    <tr class="rule"><td class="column"><a href="<?php echo BASEURL.'/job';?>"><div class="backbtn">Back</div></a></td><td class="column2">
	 <input type="submit" name="submit" id="submit" value="Make a complaint" class="submit">
    </td></tr>
</table>
<form>
</div>
</body>
</html>