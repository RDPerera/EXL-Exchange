<?php
class categories extends exlFramework
{
    public function __construct()
    {
        $this->helper("linker");
        $this->ads = $this->model('categoriesModel');
    }

    public function load($failedSearch)
    {
        //to display the popular ads to the user
        $data['search'] = $this->ads->getAdsPopular();

        
        if ($failedSearch == 1) { //if this function is called after a failed search

            $data['txt'] = "</span><font size='4px'>No Advertisement Found.! <font>";
            $this->view("categories", $data);
        } else {
            $data['txt'] = "Search </span>Results";
            $this->view("categories", $data);
        }
    }

    public function filterSubmit()
    {
        if (isset($_POST['fSubmit'])) {

            //retrieveing user entered data from the form
            $minPrice = $this->input('minPrice');
            $maxPrice = $this->input('maxPrice');
            $time = $this->input('time');
            $seller = $this->input('seller');
            $category = $this->input('category');
            $keyword = $this->input('searchKeyword');

            //filtering by the price
            if (!empty($minPrice)) {
                $minCondition = "advertisement.price >= $minPrice";
            } else {
                $minCondition = "1";
            }

            if (!empty($maxPrice)) {
                $maxCondition = "advertisement.price <= $maxPrice";
            } else {
                $maxCondition = "1";
            }

            //filtering by the time
            if ($time == "week") {
                $timeCondition = "(WEEK(dateTime) = WEEK(CURRENT_DATE()) AND YEAR(dateTime) = YEAR(CURRENT_DATE()))";
            } else if ($time == "month") {
                $timeCondition  = "(MONTH(dateTime) = MONTH(CURRENT_DATE()) AND YEAR(dateTime) = YEAR(CURRENT_DATE()))";
            } else if ($time == "year") {
                $timeCondition  = "YEAR(dateTime) = YEAR(CURRENT_DATE())";
            } else {
                $timeCondition  = "1";
            }

            //filtering by the category
            if ($category == "Graphics Designing") {
                $categoryCondition = "advertisement.category = 'Graphics Designing'";
            } else if ($category == "Programming") {
                $categoryCondition = "advertisement.category = 'Programming'";
            } else if ($category == "Content Writing") {
                $categoryCondition = "advertisement.category = 'Content Writing'";
            } else if ($category == "Other") {
                $categoryCondition = "advertisement.category = 'Other'";
            } else {
                $categoryCondition  = "1";
            }

            //filtering by the seller
            if ($seller == "high") {
                $sellerCondition = "seller.mainRate >= 3";
            } else if ($time == "low") {
                $sellerCondition = "seller.mainRate < 3";
            } else if ($time == "new") {
                $sellerCondition  = "ORDER BY feedbacks";
            } else {
                $sellerCondition  = "1";
            }

            //filtering using the user entered keyword
            if (!empty($keyword)) {
                $keywordCondition = "(tag LIKE '%$keyword%' OR title LIKE '%$keyword%' OR content LIKE '%$keyword%')";
            } else {
                $keywordCondition = "1";
            }

            $data['search'] = $this->ads->executeFilter($minCondition, $maxCondition, $timeCondition, $categoryCondition, $sellerCondition, $keywordCondition);

            if (empty($data['search'])) {
                $this->redirect('categories/load/1'); //call it with parameter 1 - so there are no results
            } else {
                //load the view
                $data['txt'] = "Search </span>Results";
                $this->view("categories", $data); //call it with parameter 0 - so there are results
            }
        }
    }

    public function categoryList($keyword,$category){

        //setting the category according to the link input
        if($category=="content"){
            $category = "Content Writing";
        }
        else if($category=="other"){
            $category = "Other";
        }
        else if($category=="graphic"){
            $category = "Graphics Designing";
        }
        else if($category=="programming"){
            $category = "Programming";
        }

        $catCondition = "advertisement.category = '$category'";

        //setting the keyword condition according to the link input

        $keyCondition = "(tag LIKE '%$keyword%' OR title LIKE '%$keyword%' OR content LIKE '%$keyword%')";

        $data['search'] = $this->ads->executeList($keyCondition,$catCondition);

        //loading the page with data
        if (empty($data['search'])) {
            $this->redirect('categories/load/1'); //call it with parameter 1 - so there are no results
        } else {
            //load the view
            $data['txt'] = "Search </span>Results";
            $this->view("categories", $data); //call it with parameter 0 - so there are results
        }
    }
}
