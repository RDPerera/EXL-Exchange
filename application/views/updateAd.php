<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update the advertisement</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <?php linkCSS("updateAdvertisement"); ?>
    
</head>

<body>
    <h1 align="center">Update the Advertisement</h1>
    <form method="post" enctype="multipart/form-data" action="<?php echo BASEURL;?>/advertisements_Controller/updateAdSubmit/<?php echo $data[0]; ?>">
        <div class='center'>
            <div class='polaroid'>
                <label> Enter the title </label>
                <input type="text" name="title" value="<?php echo $data[5]; ?>">
                <span class="error">  <?php if(!empty($data[16])): echo $data[16]; endif; ?></span>

                <br><br>
                <label>The category </label>
                <select name="category">
                    <?php echo $data[13]; ?>
                </select>
                <span class="error"> <?php if(!empty($data[17])): echo $data[17]; endif; ?></span>
                <br><br>

                <label> Upload an image </label> &nbsp &nbsp &nbsp
                <label class="custom-file-upload">
                    <input type='file' name='imageUpload' id='imageUpload'>
                    Browse
                </label>
                <br><br>

                <label for='radio'> Advertisement Status </label> <br><br>
                <input type="radio" id="active" name="status" value="active" <?php if(!empty($data[14])): echo $data[14]; endif; ?>>
                <label for="active">Active</label><br>
                <input type="radio" id="inactive" name="status" value="inactive" <?php if(!empty($data[15])): echo $data[15]; endif; ?>>
                <label for="inactive">Inactive</label><br>
                <span class="error"> <?php if(!empty($data[20])): echo $data[20]; endif; ?></span>
                <br><br>
                <label>The search tag </label>

                <input type="text" name="tag" value=" <?php if(!empty($data[6])): echo $data[6]; endif; ?>">
                <span class="error"><?php if(!empty($data[18])): echo $data[18]; endif; ?></span>

                <br><br>

                <label>Advertisement Content</label>
                <textarea name="content"><?php if(!empty($data[7])): echo $data[7]; endif; ?></textarea>

                <span class="error"> <?php if(!empty($data[19])): echo $data[19]; endif; ?></span>

                <br><br>

                <label>The price</label>
                <input type="text" name="price" placeholder="The price in Srilankan Rupees"
                    value=" <?php if(!empty($data[12])): echo $data[12]; endif; ?>">
                <span class="error"> <?php if(!empty($data[21])): echo $data[21]; endif; ?></span>
                <br><br>

                <h3>Update Collaborators of the Advertisement </h3>

                <label> Group member 01 </label>
                <input type="text" name="member1" placeholder="Enter the EXL Exchange username of the first member"
                    value=" <?php if(!empty($data[9])): echo $data[9]; endif; ?>">

                <label> Group member 02 </label>
                <input type="text" name="member2" placeholder="Enter the EXL Exchange username of the second member"
                    value=" <?php if(!empty($data[10])): echo $data[10]; endif; ?>">

                <label> Group member 03 </label>
                <input type="text" name="member3" placeholder="Enter the EXL Exchange username of the third member"
                    value=" <?php if(!empty($data[11])): echo $data[11]; endif; ?>">
                <br><br>
                <input type="submit" name="submit" value="Update The Advertisement">
            </div>
    </form>

</body>

</html>