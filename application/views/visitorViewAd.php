<?php include "components/headerHome.php"; ?>

<div class="visitor">
    <div class="adSection">
        <div class="adTitle">
            <div class="title">
                <p><?php echo $data[5]; ?></p>  <!-- ad title -->
                <div class="rating">
                    <div class="ad-rating">
                        <span class='feed-container'><?php echo "Price - LKR $data[12].00"; ?></span>
                        <span class='category-container'><?php echo "Category - $data[3]"; ?></span>
                        <span class='rate-container'><img src="<?php echo icoIMG('icons8-star-96.png') ?>" class='ratingIcon'>
                            <span class='rating'><?php echo "Rate - $data[13]"; ?></span></span>
                        <span class='status-container'><?php echo "Advertisement ID - $data[0]"; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="adImg">
            <img src='../../public/assets/img/adUploads/<?php echo $data[4]; ?>' height='590px' width='590px'>
        </div>

        <div class="adContent">
            <p>
                <?php echo $data[7]; ?>
            </p>

            <div class="review">
                <div class="review-head">
                    <p>Advertisement Reviews</p>
                </div>
                <?php while ($row = mysqli_fetch_assoc($data['reviewData'])) {
                    include "components/reviewCard.php";
                } ?>

            </div>
        </div>

    </div>


</div>


<?php include "components/footerHome.php"; ?>