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
    <div class="navbar">
        <div class="head">
        EXL Share Point
        </div>
        <div class="userimg">
        <img class="profile-pic" src="<?php echo BASEURL;?>/public/assets/img/userImages/<?php if (isset($data["profilePic"])) {echo $data["profilePic"];} else {echo "pp_default.jpg";}?>">
        </div>
    </div>

    <table>
    <thead>
        <th>ID</th>
        <th>Filename</th>
        <th>size (in mb)</th>
        <th>Action</th>
    </thead>
    <tbody>
    <?php foreach ($files as $file): ?>
        <tr>
        <td><?php echo $file['id']; ?></td>
        <td><?php echo $file['name']; ?></td>
        <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
        <td><?php echo $file['job_id']; ?></td>
        <td><a href="<?php echo BASEURL."/public/assets/uploads/".$file['name']?>">Download</a></td>
        </tr>
    <?php endforeach;?>

    </tbody>
    </table>
    <br><hr><br>
    <div class="container">
      <div class="row">
        <form action="<?php echo BASEURL.'/sharePoint/uploadFile';?>" method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save">upload</button>
        </form>
      </div>
    </div>
</body>
</html>