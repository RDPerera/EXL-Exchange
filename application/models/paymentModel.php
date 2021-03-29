<?php
    class paymentModel extends database
    {
        public function pay($buyer,$seller,$date,$time,$jobId,$adId,$price,$exlprice,$net)
        {
            $query = "INSERT INTO payment(type,date,time,jobId,seller,buyer,adId,totalAmount,exlAmount,sellerAmount)
            VALUES('std','$date','$time','$jobId','$seller','$buyer','$adId','$price','$exlprice','$net')";
            mysqli_query($GLOBALS['db'], $query);
            $query = "UPDATE job SET jobStatus='4' WHERE jobId='$jobId'";
            mysqli_query($GLOBALS['db'], $query);
        }
    }
?>