<?php 
$files=$data['files'];
?>
<?php include "components/buyerDashboardHeader.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXL Share Point</title>
    <?php linkCSS('sharePoint'); ?>
    <?php linkFAV("ee-logo.png"); ?>
</head>

<body>
    
  <!-- File Share -->
  <div class="main-grid">

    <div class="container-upper">
      <p class="title"><span class="big">Resources</span> Files</p>
      <?php if(count($files)>0){ ?>
      <div class="scrollable" id="style-1">
      <?php }else{?>
        <div class="scrollable-empty" id="style-1">
        <?php } foreach ($files as $file): ?>
        <?php if($file['final']=='0'){ ?>
        <div class="filecontainer">
          <div class="file">
            <img class="fileimg" src="<?php echo BASEURL.'/public/assets/img/icons/file.png?'?>">
            <div class="name">File Name :
              <?php echo $file['name']; ?>
            </div>
            <div class="time">
              <?php echo $file['time']; ?>
            </div>
            <div class="size">File Size :
              <?php echo floor($file['size'] / 1000) . ' KB'; ?>
            </div>
            <div class="download"><a href="<?php echo BASEURL." /public/assets/uploads/".$file['name']?>">
                <img class="downloadimg" src="<?php echo BASEURL.'/public/assets/img/icons/download.png?'?>"></a></div>
          </div>
        </div>
        <?php } else { ?>
          <div class="productcontainer">
          <div class="product">
            <img class="productimg" src="<?php echo BASEURL.'/public/assets/img/icons/file.png?'?>">
            <div class="name">
            Product Delivery <br> 
            </div>
            <div class="producttime">
              
              <?php echo $file['time']; ?>
            </div>
            <div class="size">
            File Name :
              <?php echo $file['name']; ?><br>  
            File Size :
              <?php echo floor($file['size'] / 1000) . ' KB'; ?>
              <br>
              Description :
              <?php echo $file['description']; ?>
            </div>
            <div class="download"><a href="<?php echo BASEURL." /public/assets/uploads/".$file['name']?>">
                <img class="downloadimg" src="<?php echo BASEURL.'/public/assets/img/icons/download2.png?'?>"></a></div>
          </div>
        </div>
        <?php } ?>
        <?php endforeach;?>
      </div>
    </div>
    <!-- Upload Section -->
    <div class="upload-sec">
      <p class="title"><span class="big">Send </span>Resources Files</p>
      <form action="<?php echo BASEURL.'/sharePointBuyer/uploadFile';?>" method="post" enctype="multipart/form-data">
        File must be compressed into .zip , .rar or .tar format.<br>
        <div class="upload_background"><input type="file" name="myfile" onchange="showName()" id="file" class="filebtn"><span id='filename'></span>
          <button type="submit" name="save" class="uploadbtn">Upload And Send</button>
        </div>
      </form>
    </div>
    <?php if($data['isActive']==1){ ?>
    <div class="rightside">
    <!-- fnish order Section -->
    <p class="title"><span class="big">Complete </span>The Order</p>
      <form action="<?php echo BASEURL.'/sharePointBuyer/uploadFile';?>" method="post" enctype="multipart/form-data">
        Give a review for this adverticement
        <br><textarea class="textbox" name="dis" rows="4" cols="50"></textarea><br><br>
        <br>
  
        <div id="rateSec">
        <p class="title"><span class="big">Rate </span>The Seller</p>
        <div class="subsection">Considering overoll expression about the seller's communication and respoding to your messages give him a<br>
        <span class="subsection-title">Communication rate</span>
        <div class="rate">
          <input type="radio" id="star5" name="communicationRate" value="5" />
          <label for="star5" title="text">5 stars</label>
          <input type="radio" id="star4" name="communicationRate" value="4" />
          <label for="star4" title="text">4 stars</label>
          <input type="radio" id="star3" name="communicationRate" value="3" />
          <label for="star3" title="text">3 stars</label>
          <input type="radio" id="star2" name="communicationRate" value="2" />
          <label for="star2" title="text">2 stars</label>
          <input type="radio" id="star1" name="communicationRate" value="1" />
          <label for="star1" title="text">1 star</label>
        </div>
        </div><div class="subsection">Considering overall expression about the delivery time give him a<br>
        <span class="subsection-title">Delivery rate</span>
        <div class="rate2">
          <input type="radio" id="star25" name="deliveryRate" value="5" />
          <label for="star25" title="text">5 stars</label>
          <input type="radio" id="star24" name="deliveryRate" value="4" />
          <label for="star24" title="text">4 stars</label>
          <input type="radio" id="star23" name="deliveryRate" value="3" />
          <label for="star23" title="text">3 stars</label>
          <input type="radio" id="star22" name="deliveryRate" value="2" />
          <label for="star22" title="text">2 stars</label>
          <input type="radio" id="star21" name="deliveryRate" value="1" />
          <label for="star21" title="text">1 star</label>
        </div>
        </div><div class="subsection">Considering overall expression about the seller give him a<br>
        <span class="subsection-title">Seller rate</span>
        <div class="rate3">
          <input type="radio" id="star35" name="mainRate" value="5" />
          <label for="star35" title="text">5 stars</label>
          <input type="radio" id="star34" name="mainRate" value="4" />
          <label for="star34" title="text">4 stars</label>
          <input type="radio" id="star33" name="mainRate" value="3" />
          <label for="star33" title="text">3 stars</label>
          <input type="radio" id="star32" name="mainRate" value="2" />
          <label for="star32" title="text">2 stars</label>
          <input type="radio" id="star31" name="mainRate" value="1" />
          <label for="star31" title="text">1 star</label>
        </div>
        </div>
        <br>
        <p class="title"><span class="big">Rate </span>The Job</p>
        <div class="subsection">Considering overall expression about quality of the product give a <br>
        <span class="subsection-title">Product Rate</span>
        <div class="rate4">
          <input type="radio" id="star45" name="productRate" value="5" />
          <label for="star45" title="text">5 stars</label>
          <input type="radio" id="star44" name="productRate" value="4" />
          <label for="star44" title="text">4 stars</label>
          <input type="radio" id="star43" name="productRate" value="3" />
          <label for="star43" title="text">3 stars</label>
          <input type="radio" id="star42" name="productRate" value="2" />
          <label for="star42" title="text">2 stars</label>
          <input type="radio" id="star41" name="productRate" value="1" />
          <label for="star41" title="text">1 star</label>
        </div>
        </div>
        </div>
        <br><br>
        <input type="checkbox" name="final" id="check" onclick="activeSubmit()"> I recive my product and I want to complete this job and enableing seller to get his money.
        <div class="submitSec"><button type="submit" name="finalsave" id="btnx" class="uploadbtnx">Complete The Job</button></div>
      </form>
    </div>


  </div>
  <?php } else { echo "asdasdas".$data['isActive'];?>
    <div class="rightside">
      <div class="image-container">
      <img src="<?php echo BASEURL ?>/public/assets/img/completed.svg" alt="complete">
    </div>
  </div>
  <?php } ?>
  <?php linkJS('sharePoint'); ?>
</body>
</html>