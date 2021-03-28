<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <?php linkCSS("invoice"); ?>
    <?php linkFAV("ee-logo.png"); ?>
</head>
<body> 
<?php $QR="localhost/EXL-Exchange/sellerJobHandler" ?>
<div class="head">
  <div class="subhead">
    <img src="<?php echo BASEURL."/public/assets/img/logoWhite.png" ?>" alt="logo" class="logo" />
    <span class="title">INVOICE</span>
  </div>
</div>

<div class="container">
  <div class="addata">
    <br /><br />
    <div class="main">Advertisement Details</div>
    <br /><br />
    <table class="tbl">
      <tr>
        <td class="rule">Advertisement ID</td>
        <td class="ans">20</td>
      </tr>
      <tr>
        <td class="rule">Advertisement Title</td>
        <td class="ans">I Edit photos</td>
      </tr>
      <tr>
        <td class="rule">Advertisement Description</td>
        <td class="ans">Graphic Designning</td>
      </tr>
      <tr>
        <td class="rule">Advertisement Category</td>
        <td class="ans">Graphic Designning</td>
      </tr>
      <tr>
        <td class="rule">Advertisement Owner</td>
        <td class="ans">Dilan Perera</td>
      </tr>
      <tr>
        <td class="rule">Advertisement Rate</td>
        <td class="ans">4</td>
      </tr>
      <tr>
        <td class="rule">Advertisement Feedbacks</td>
        <td class="ans">15</td>
      </tr>
    </table>
  </div>
  <div class="payment">
    <div class="main">Payment Details</div>
    <br /><br />
    <table class="tbl2">
      <tr>
        <td class="rule">Buyer Name</td>
        <td class="ans">Chathura Rathnayake</td>
      </tr>
      <tr>
        <td class="rule">JobID</td>
        <td class="ans">EXL04</td>
      </tr>
      <tr>
        <td class="rule">Date</td>
        <td class="ans">2012:05:05</td>
      </tr>
      <tr>
        <td class="rule">Time</td>
        <td class="ans">05:05:05</td>
      </tr>
      <tr>
        <td class="rule">Advertisement Price</td>
        <td class="ans">Rs.2000.00</td>
      </tr>
      <tr>
        <td class="rule">Additional Payment</td>
        <td class="ans">Rs.1000.00</td>
      </tr>
      <tr>
        <td class="rule">Total Payment</td>
        <td class="ans">Rs.3000.00</td>
      </tr>
    </table>
  </div>
  <div class="imge">
    <img
      src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2F<?php echo $QR; ?>%2F&choe=UTF-8"
      title="EXL-Exchange"
    />
    <input type="button" value="Print this page" onClick="window.print()">
  </div>
</div>
<?php linkJS('invoice'); ?>
</body>
</html>
