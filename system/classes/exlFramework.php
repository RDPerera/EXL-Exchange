<?php

class exlFramework
{

   public function view($viewName, $data = []){

      if(file_exists("../application/views/" . $viewName . ".php")){
         
         require_once "../application/views/$viewName.php";
 
      } else {
         echo "<div style='margin:0;padding: 10px;background-color:silver;'>$viewName.php file not found </div>";
      }
 
    }
    public function helper($helperName){

      if(file_exists("../system/helpers/".$helperName.".php")){

         require_once "../system/helpers/".$helperName.".php";

      } else {
         echo "<div style='margin:0;padding: 10px;background-color:silver;'>Sorry helper $helperName file not found </div>";
      }

   }
 
    public function model($modelName){
 
       if(file_exists("../application/models/" . $modelName . ".php")){
 
         require_once "../application/models/$modelName.php";
         return new $modelName;
 
       } else {
         echo "<div style='margin:0;padding: 10px;background-color:silver;'> $modelName.php file not found </div>";
       }
 
    }
 
    public function input($inputName){
 
       if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == 'post'){
 
          return trim(strip_tags($_POST[$inputName]));
 
       } else if($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'get'){
 
          return trim(strip_tags($_GET[$inputName]));
 
       }
 
    }
 
//session management methods

    // Set session
    public function setSession($sessionName, $sessionValue){


      if(!empty($sessionName) && !empty($sessionValue)){
         $_SESSION[$sessionName] = $sessionValue;
      }

  }

  // Get session
  public function getSession($sessionName){

    if(!empty($sessionName)){
       return $_SESSION[$sessionName];
    }

  }

  // Unset session
  public function unsetSession($sessionName){

     if(!empty($sessionName)){
        
        unset($_SESSION[$sessionName]);

     }

  }

  // Destroy sessions
  public function destroy(){

     session_destroy();

  }

  //redirection method
  public function redirect($path){

   header("location:" . BASEURL . "/".$path);

   }

//To get country of an particular IP
   function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
      $output = NULL;
      if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
          $ip = $_SERVER["REMOTE_ADDR"];
          if ($deep_detect) {
              if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
              if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                  $ip = $_SERVER['HTTP_CLIENT_IP'];
          }
      }
      $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
      $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
      $continents = array(
          "AF" => "Africa",
          "AN" => "Antarctica",
          "AS" => "Asia",
          "EU" => "Europe",
          "OC" => "Australia (Oceania)",
          "NA" => "North America",
          "SA" => "South America"
      );
      if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
          $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
          if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
              switch ($purpose) {
                  case "location":
                      $output = array(
                          "city"           => @$ipdat->geoplugin_city,
                          "state"          => @$ipdat->geoplugin_regionName,
                          "country"        => @$ipdat->geoplugin_countryName,
                          "country_code"   => @$ipdat->geoplugin_countryCode,
                          "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                          "continent_code" => @$ipdat->geoplugin_continentCode
                      );
                      break;
                  case "address":
                      $address = array($ipdat->geoplugin_countryName);
                      if (@strlen($ipdat->geoplugin_regionName) >= 1)
                          $address[] = $ipdat->geoplugin_regionName;
                      if (@strlen($ipdat->geoplugin_city) >= 1)
                          $address[] = $ipdat->geoplugin_city;
                      $output = implode(", ", array_reverse($address));
                      break;
                  case "city":
                      $output = @$ipdat->geoplugin_city;
                      break;
                  case "state":
                      $output = @$ipdat->geoplugin_regionName;
                      break;
                  case "region":
                      $output = @$ipdat->geoplugin_regionName;
                      break;
                  case "country":
                      $output = @$ipdat->geoplugin_countryName;
                      break;
                  case "countrycode":
                      $output = @$ipdat->geoplugin_countryCode;
                      break;
              }
          }
      }
      return $output;
  }

}

?>