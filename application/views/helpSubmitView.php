
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php linkCSS('admin-nav'); ?>
  <?php linkFav('ee-logo.png');?>
  <?php linkCSS('help'); ?>
  <style>
    .container{
        width:100%;
        height:100vh;
        display:flex; 
        justify-content:center;
        margin:0;
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
    .issue,.submit,.description
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
    .page{
        margin-left:300px;
        margin-right:300px;
    }
    body{
        background-color:rgb(238, 238, 238) ;
    }
</style>
</head>
<body>
<div class="header" >
  <div class="primary">&nbsp&nbspHelp&nbsp&&nbspSupport</div>
</div>
<form method="post"  action="<?php echo BASEURL.'/helpSubmit/insert';?>" enctype="multipart/form-data">
<div class="page">
<div class="container">
<input type="hidden" name="userName" value="<?php echo $data['userName']; ?>">
<table class="tbl">
    <tr class="srule"><td class="scolumn" colspan="2"><p class="title">Help Form</p></td></tr>
    <tr class="rule"><td class="column">Issue</td><td class="column2">
        <select name="issue" id="issue" class="issue">
            <option value="Account Issue" class="op" selected>Select Issue</option>
            <option value="Account Issue" class="op">Account Issue</option>
            <option value="Order Issue" class="op">Order Issue</option>
            <option value="Payment Issue" class="op">Payment Issue</option>
            <option value="Report Issue" class="op">Report a bug</option>
        </select>
    </td></tr>
    <tr class="rule"><td class="column">Descrition</td><td class="column2">
        <textarea name="description" id="description" cols="30" rows="10" class="description"></textarea>
    </td></tr>
    <tr class="rule"><td class="column">Attachments (optional)</td><td class="column2">
        <input type="file" name="attachment" id="attachment" class="attachment">
    </td></tr>
    <tr class="rule"><td class="column"></td><td class="column2">
        <input type="submit" name="submit" id="submit" value="Request for Help" class="submit">
    </td></tr>
</table>
<form>
</div>
</div>
</body>
</html>