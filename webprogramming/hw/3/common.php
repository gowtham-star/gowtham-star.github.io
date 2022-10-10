<?php 
/**
 * Common HTML header code for every page in the site.
 *  Extra feature #3. LGBT matches feature is added which matches based on seeking gender
 */
function top() {
  echo '<!doctype html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport"
            content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
      <title>NerdLuv</title>
      <!-- instructor-provided CSS and JavaScript links; do not modify -->
      <link href="images/heart.gif" type="image/gif" rel="shortcut icon"/>
      <link href="css/nerdieluv.css" type="text/css" rel="stylesheet"/>
  </head>
  <body>
  <div id="bannerarea">
      <img src="images/nerdluv.png" alt="banner logo"/> <br/>
      where meek geeks meet
  </div>';
}
/**
 * Common HTML footer code for every page in the site.
 */
function bottom(){
    echo '
    <div>
        <p>
            This page is for single nerds to meet and date each other! Type in your personal information and wait for the
            nerdly luv to begin! Thank you for using our site.
        </p>
    
        <p>
            Results and page (C) Copyright NerdLuv Inc.
        </p>
    
        <ul>
            <li>
                <a href="index.php">
                    <img src="images/back.gif" alt="icon"/>
                    Back to front page
                </a>
            </li>
        </ul>
    </div>
    
    <div id="w3c">
        <a href="https://validator.w3.org/check/referer">
            <img src="images/w3html.png" alt="Valid HTML"/></a>
        <a href="https://jigsaw.w3.org/css-validator/check/referer">
            <img src="images/vcss-blue.gif" alt="Valid CSS"/></a>
    </div>
    </body>
    </html>
    ';
}

/**
 * Read the name from the page's "name" query parameter and finds which other singles match the given user.
 * Output the HTML to display the matches, in the order found in the file.
 */
function getMatchesFromFile()
{
    $filename = "singles2.txt";
    $loginUser = "";
    $flag = 0;
    foreach (file($filename, FILE_IGNORE_NEW_LINES) as $loginUser) {
        // "name" attribute is used to retrieve other information of logged in user
        if ($_GET["name"] == explode(",", $loginUser)[0]) {
            $flag=1;
            break;
        }
    }
    if($flag ==1){
        foreach (file($filename, FILE_IGNORE_NEW_LINES) as $matchUser) {
        // Iterate through all the names in singles2.txt
        if (
            // Index 0 - name
            // Do not match user with himself/herself.
            explode(",", $matchUser)[0] != explode(",", $loginUser)[0]

            // Index 1 and 7  -  seeking Gender.
            // Match based on seeking gender
            && ( in_array(explode(",", $loginUser)[1] ,str_split(explode(",", $matchUser)[7])) &&
                    in_array(explode(",", $matchUser)[1] ,str_split(explode(",", $loginUser)[7])) )

            // Index 2 - user age, Index 5 - preferred min age, Index 6 - preferred max age.
            // Each person is between the other's minimum and maximum ages, inclusive.
            && explode(",", $matchUser)[2] >= explode(",", $loginUser)[5]
            && explode(",", $matchUser)[2] <= explode(",", $loginUser)[6]

            // Index 4 - operating system.
            // Match the user based on favorite operating system
            && explode(",", $matchUser)[4] == explode(",", $loginUser)[4]

            // Index 3 - personality type.
            // Shares at least one personality type letter in common at the same index in each string.
            && (
                str_split(explode(",", $matchUser)[3])[0] == str_split(explode(",", $loginUser)[3])[0]
                || str_split(explode(",", $matchUser)[3])[1] == str_split(explode(",", $loginUser)[3])[1]
                || str_split(explode(",", $matchUser)[3])[2] == str_split(explode(",", $loginUser)[3])[2]
                || str_split(explode(",", $matchUser)[3])[3] == str_split(explode(",", $loginUser)[3])[3]
            )
        ) {
            //Displays all the matched for given login user 
            ?>
            <div class="match">
            <p><img src='images/user.jpg' alt='user icon'><?= explode(",", $matchUser)[0] ?></p>
            <ul>
                <li><strong>gender:</strong><?= explode(",", $matchUser)[1] ?></li>
                <li><strong>age:</strong><?= explode(",", $matchUser)[2] ?></li>
                <li><strong>type:</strong><?= explode(",", $matchUser)[3] ?></li>
                <li><strong>OS:</strong><?= explode(",", $matchUser)[4] ?></li>
            </ul>
        </div>
        <?php 
        }
        }
    }
    else{
        echo "<b>Error! Invalid data.</b>";
        echo "<p>We're sorry. You submitted invalid user information. Please go back and try again.</p>";
    }
  
}

/**
 * User data is stored in a file singles2.txt.
 * The file contains data in the following format:
 * user name, gender (M | F), age, personality type, operating system, and min/max seeking age, seeking gender (M | F | MF), separated by comma.
 */
function newWriteToFile()
{

    $userInfo = "";
    foreach ($_POST as $attribute) {
        $userInfo = $userInfo . $attribute . ",";
    }
    file_put_contents("./singles2.txt", "\n" . substr($userInfo, 0, -1), FILE_APPEND);
}

?>