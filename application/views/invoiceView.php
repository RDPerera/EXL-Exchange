<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <?php linkCSS("invoice"); ?>
    <?php linkFAV("ee-logo.png"); ?>
    <link rel="stylesheet" type="text/css" media="print" href="<?php echo BASEURL."/public/assets/css/invoice.css" ?>";>
</head>
<body> 
<?php $QR=BASEURL."/invoice/get/".$data['jobId'] ?>
<div class="head">
  <div class="subhead">
    <img src="<?php echo BASEURL."/public/assets/img/logoWhite.png" ?>" alt="logo" class="logo" />
    <span class="title">INVOICE</span>
  </div>
</div>
<div class="container">
  <div class="addata">
    <div class="main">Advertisement Details</div>
    <br />
    <table class="tbl">
      <tr>
        <td class="rule">Advertisement ID</td>
        <td class="ans"><?php echo $data['advertisementID']; ?></td>
      </tr>
      <tr>
        <td class="rule">Advertisement Title</td>
        <td class="ans"><?php echo $data['title']; ?></td>
      </tr>
      <tr>
        <td class="rule">Advertisement Description</td>
        <td class="ans"><?php echo $data['content']; ?></td>
      </tr>
      <tr>
        <td class="rule">Advertisement Category</td>
        <td class="ans"><?php echo $data['category']; ?></td>
      </tr>
      <tr>
        <td class="rule">Advertisement Rate</td>
        <td class="ans"><?php echo $data['rate']; ?></td>
      </tr>
      <tr>
        <td class="rule">Advertisement Feedbacks</td>
        <td class="ans"><?php echo $data['feedbacks']; ?></td>
      </tr>
    </table>
  </div>
  <div class="payment">
    <div class="main">Payment Details</div>
    <br />
    <table class="tbl2">
    <tr>
        <td class="rule">Buyer Name</td>
        <td class="ans"><?php echo $data['buyer']['firstName']." ".$data['buyer']['lastName']; ?></td>
      </tr>
      <tr>
        <td class="rule">Buyer Email</td>
        <td class="ans"><?php echo $data['buyer']['email']; ?></td>
      </tr>
      <tr>
        <td class="rule">Seller Name</td>
        <td class="ans"><?php echo $data['firstName']." ".$data['lastName']; ?></td>
      </tr>
      <tr>
        <td class="rule">Seller Email</td>
        <td class="ans"><?php echo $data['email']; ?></td>
      </tr>
      <tr>
        <td class="rule">JobID</td>
        <td class="ans">EXL<?php echo $data['jobId']; ?></td>
      </tr>
      <tr>
        <td class="rule">Date</td>
        <td class="ans"><?php echo $data['date']; ?></td>
      </tr>
      <tr>
        <td class="rule">Time</td>
        <td class="ans"><?php echo $data['time']; ?></td>
      </tr>
      <tr>
        <td class="rule">Advertisement Price</td>
        <td class="ans">Rs.<?php echo $data['price']; ?>.00</td>
      </tr>
      <tr>
        <td class="rule">Additional Payment</td>
        <td class="ans">Rs.<?php echo $data['additionalPayment']; ?></td>
      </tr>
      <tr>
        <td class="rule">Total Payment</td>
        <td class="ans"><u>Rs.<?php echo $data['price']+$data['additionalPayment'].".00"; ?></u></td>
      </tr>
    </table>
  </div>
  <div class="imge">
    <img
      src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2F<?php echo $QR; ?>%2F&choe=UTF-8"
      title="EXL-Exchange"
    />
    
  </div>
  
</div>
<input class="printButton" type="button" value="Print this page" onClick="window.print()">
<?php linkJS('invoice'); ?>
</body>
</html>
