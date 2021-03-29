<?php include "components/headerHome.php"; ?>

<div class="mainContainer">


    <div class="filter">
        <form action="<?php echo BASEURL; ?>/categories/filterSubmit" method="post" name="createAdForm" enctype="multipart/form-data">
            <div class="filterTitles">Filter advertisements by price </div>
            <div class="fieldset">
                <label> Enter a minimum price</label>
                <input type="text" name="minPrice" placeholder="In LKR">
            </div>

            <div class="fieldset">
                <label> Enter a maximum price</label>
                <input type="text" name="maxPrice" placeholder="In LKR">
            </div>

            <div class="filterTitles">Filter advertisements by time </div>
            <div class="fieldset">
                <label for='radio'> Advertisements created within </label> <br>
                <span class="sub-set">
                    <br>
                    <input type="radio" id="week" name="time" value="week">
                    <label for="week">This week</label> <br>
                    <input type="radio" id="month" name="time" value="month">
                    <label for="month">This month</label> <br>
                    <input type="radio" id="year" name="time" value="year">
                    <label for="year">This year</label> <br>
                    <input type="radio" id="noInput" name="time" value="noInput" checked>
                    <label for="noInput">Anytime</label>



                </span>
            </div>

            <div class="filterTitles">Filter advertisements by seller </div>
            <div class="fieldset">
                <label for='radio'> Advertisements published by </label> <br>
                <span class="sub-set">
                    <br>
                    <input type="radio" id="high" name="seller" value="high">
                    <label for="high">A higher rated seller</label> <br>
                    <input type="radio" id="low" name="seller" value="low">
                    <label for="low">A lower rated seller</label> <br>
                    <input type="radio" id="new" name="seller" value="new">
                    <label for="new">A newbie seller</label>
                    <br>
                    <input type="radio" id="noInput" name="seller" value="noInput" checked>
                    <label for="noInput">Any seller</label>
                </span>
            </div>

            <div class="fieldset">
                <div class="filterTitles">Filter advertisements by category </div>
                <label> Select a category </label>
                <select name="category">
                    <option>
                        All Categories
                    </option>
                    <option>
                        Graphics Designing
                    </option>
                    <option>
                        Programming
                    </option>
                    <option>
                        Content Writing
                    </option>
                    <option>
                        Other
                    </option>
                </select>

            </div>


            <input type="text" name="searchKeyword" placeholder="Enter a keyword">
            <input type="submit" name="fSubmit" value="Search" class="createbtn">

        </form>
    </div>
    <div class="categoryBar">
        <ul>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Graphics Designing</a>
                <div class="dropdown-content">
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/logo/graphic">Logo & Brand Identity</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/games/graphic">Gaming Graphics</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/illustration/graphic">Art & Illustration</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/web/graphic">Web Graphics</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/fashion/graphic">Fashion & Merchandise</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Content Writing</a>
                <div class="dropdown-content">
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/article/content">Articles</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/technical/content">Technical Writing</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/blog/content">Blog Posts</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/creative/content">Creative Writing</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/website/content">Website Content</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/translation/content">Translation</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/UX/content">UX Writing</a>
                </div>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Programming</a>
                <div class="dropdown-content">
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/wordpress/programming">WordPress</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/game/programming">Game Development</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/web/programming">Web Programming</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/mobile/programming">Mobile Apps</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/desktop/programming">Desktop Applications</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/chatbot/programming">Chatbots</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Other</a>
                <div class="dropdown-content">
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/music/other">Online Music Lessons</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/music/data">Data Science</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/music/fitness">Fitness Lessons</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/music/cooking">Cooking Lessons</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/music/seo">Search Engine Optimization (SEO)</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/music/market">Market Research</a>
                    <a href="<?php echo BASEURL; ?>/categories/categoryList/music/legalr">Legal Consulting</a>
                </div>
            </li>
        </ul>

    </div>
    <div class="result">
        <div class="main-title-create"><span class="blue-text-create"><?php echo $data['txt'];?></div>
        <section class='card-container-category'><?php while ($row = mysqli_fetch_assoc($data['search'])) {
                                                        include "components/adCard.php";
                                                    } ?></section>
        <!-- <input type="submit" name="filterSubmit" value="Next Page" class="createbtn"> -->
    </div>
</div>

<?php include "components/footerHome.php"; ?>