<?php 
$data["profilePic"]="dilan.png";
$files=$data['files'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EXL Share Point</title>
  <?php linkCSS('sharePoint'); ?>
</head>

<body>
  <!-- nav bar -->
  <div class="navbar">
    <div class="head">
      EXL Share Point
    </div>
    <div class="userimg">
      <img class="profile-pic" src="<?php echo BASEURL;?>/public/assets/img/userImages/<?php if (isset($data["profilePic"])) {echo $data["profilePic"];} else {echo "pp_default.jpg" ;}?>">
    </div>
  </div>
  <!-- File Share -->
  <div class="main-grid">

    <div class="container-upper">
      <p class="title"><span class="big">Resources</span> Files</p>
      <div class="scrollable" id="style-1">
        <?php foreach ($files as $file): ?>
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
        <?php endforeach;?>
      </div>
    </div>
    <div class="upload-sec">
      <p class="title"><span class="big">Send </span>Resources Files</p>
      <form action="<?php echo BASEURL.'/sharePoint/uploadFile';?>" method="post" enctype="multipart/form-data">
        File must be compressed into .zip , .rar or .tar format.<br>
        <div class="upload_background"><input type="file" name="myfile" class="filebtn">
          <button type="submit" name="save" class="uploadbtn">Upload And Send</button>
        </div>
      </form>
    </div>
    <div class="rightside">
      <p class="title"><span class="big">Deliver </span>The Finished Product</p>
      <form action="<?php echo BASEURL.'/sharePoint/uploadFile';?>" method="post" enctype="multipart/form-data">
        Discription of deliver 
        <br><textarea class="textbox" name="dis" rows="4" cols="50">
        </textarea><br><br>
        File must be compressed into .zip , .rar or .tar format.<br>
        <div class="upload_background"><input type="file" name="filex" class="filebtn">
          <button type="submit" name="finalsave" class="uploadbtn">Upload And Send</button>
        </div>
        <br>
        <input type="checkbox" name="final" id="final" onclick="showrate()"> Consider this as a final product delivery.
        <div id="rateSec" style="display:none">
        <p class="title"><span class="big">Rate </span>The Buyer</p>
        Considering overroll expresion about the buyer, give him a rate.
        <div class="rate">
          <input type="radio" id="star5" name="rate" value="5" />
          <label for="star5" title="text">5 stars</label>
          <input type="radio" id="star4" name="rate" value="4" />
          <label for="star4" title="text">4 stars</label>
          <input type="radio" id="star3" name="rate" value="3" />
          <label for="star3" title="text">3 stars</label>
          <input type="radio" id="star2" name="rate" value="2" />
          <label for="star2" title="text">2 stars</label>
          <input type="radio" id="star1" name="rate" value="1" />
          <label for="star1" title="text">1 star</label>
        </div>
        </div>
      </form>
    </div>


  </div>
  <?php linkJS('sharePoint'); ?>
</body>
</html>