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
    tr,td{
        padding:10px;
    }
    .sccuess{
        color:green;
        font-weight:600;
    }
    body{
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }
    .successimg{
        width:200px;
        height:170px;
        padding-left:20px;
    }
</style>
</head>

<body>
        <div class="container">
            <table class="tbl">
            <tr><td><img src="<?php echo BASEURL.'/public/assets/img/icons/success.png'; ?>" alt="success" class="successimg"></td></tr>
            <tr><td><p class="sccuess">Complain Sent Successfull !</p></td></tr>
            <tr><td><a href="<?php echo BASEURL.'/complainBuyer' ?>"><p class="sccuess">Back</p></td></tr>
            </table> 
        </div>     
</body>
</html>