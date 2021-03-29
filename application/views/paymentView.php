<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <?php linkCSS('invoice'); ?>
    <?php linkCSS('payment'); ?>
    <?php linkFav('ee-logo.png');?> 
</head>
<body>
<body>
<form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
    <input type="hidden" name="merchant_id" value="1216989">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="http://7ba9a4e322be.ngrok.io/payhere/payhandler.php">
    <input type="hidden" name="cancel_url" value="http://7ba9a4e322be.ngrok.io">
    <input type="hidden" name="notify_url" value="http://7ba9a4e322be.ngrok.io">  
    <input type="hidden" name="order_id" value="<?php echo $data['adId']; ?>">
    <input type="hidden" name="items" value="Payment form <?php $data['jobId'] ?>"><br>
    <input type="hidden" name="currency" value="LKR">
    <input type="hidden" name="amount" value="<?php echo $data['adPrice']+$data['adPay']; ?>">  
    <input type="hidden" name="first_name" value="<?php echo data['jobId']; ?>">
    <input type="hidden" name="last_name" value="<?php echo $data['jobId']; ?>"><br>
    <input type="hidden" name="email" value="samanp@gmail.com">
    <input type="hidden" name="phone" value="0771234567"><br>
    <input type="hidden" name="address" value="No.1, Galle Road">
    <input type="hidden" name="city" value="Colombo">
    <input type="hidden" name="country" value="Sri Lanka"><br><br> 
    <div class="main">Advertisement Details</div>
    <br />
    <table class="tbl">
      <tr>
        <td class="rule">Advertisement ID</td>
        <td class="ans"><?php echo $data['adData']['advertisementID']; ?></td>
      </tr>
      <tr>
        <td class="rule">Advertisement Title</td>
        <td class="ans"><?php echo $data['adData']['title']; ?></td>
      </tr>
      <tr>
        <td class="rule">Advertisement Description</td>
        <td class="ans"><?php echo $data['adData']['content']; ?></td>
      </tr>
      <tr>
        <td class="rule">Advertisement Category</td>
        <td class="ans"><?php echo $data['adData']['category']; ?></td>
      </tr>
      <tr>
        <td class="rule">Advertisement Rate</td>
        <td class="ans"><?php echo $data['adData']['rate']; ?></td>
      </tr>
      <tr>
        <td class="rule">Advertisement Feedbacks</td>
        <td class="ans"><?php echo $data['adData']['feedbacks']; ?></td>
      </tr>
    </table>
    <div class="payment">
    <div class="main">Payment Details</div>
    <br />
    <table class="tbl">
      <tr>
        <td class="rule">JobID</td>
        <td class="ans">EXL<?php echo $data['jobData']['jobId']; ?></td>
      </tr>
      <tr>
        <td class="rule">Date</td>
        <td class="ans"><?php echo $data['jobData']['date']; ?></td>
      </tr>
      <tr>
        <td class="rule">Time</td>
        <td class="ans"><?php echo $data['jobData']['time']; ?></td>
      </tr>
      <tr>
        <td class="rule">Advertisement Price</td>
        <td class="ans">Rs.<?php echo $data['adPrice']; ?>.00</td>
      </tr>
      <tr>
        <td class="rule">Additional Payment</td>
        <td class="ans">Rs.<?php echo $data['adPay']; ?></td>
      </tr>
      <tr>
        <td class="rule">Total Payment</td>
        <td class="ans"><u>Rs.<?php echo $data['adPrice']+$data['adPay'].".00"; ?></u></td>
      </tr>
      <tr>
        <td></td>
        <td class="ans" style="background-color:rgb(238, 238, 238);"><input style="float:right" class="buybtn" type="submit" value="Buy Now"></td>
      </tr>
        
    </table>
  </div>
     
</form> 
</body>
</html>