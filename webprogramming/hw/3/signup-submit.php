<!--
Read the data as POST from the query parameters and store it in singles2.txt.
Validates the name is not blank
Validates the input age range from 1-99
Validates the input peresonality type to [I|E][N|S][F|T][J|P]
Validates if the min and max age are in range of 1 to 99 and 
-->
<?php include("common.php");?>
<?php top()  ?>
<?php

$num = $_POST["age"];
$pattern_num = "/\A([1-9]|[1-9][0-9])\Z/";
$personality = $_POST["type"];
$patter_personality = "/\A[I|E][N|S][F|T][J|P]\Z/";
$min_age = $_POST["min"];
$max_age = $_POST["max"];

if(!empty($_POST["name"]) && preg_match($pattern_num, $num) && preg_match($pattern_num, $min_age) && preg_match($pattern_num, $max_age) 
    && preg_match($patter_personality, $personality)
    && preg_match($pattern_num, $min_age) && preg_match($pattern_num, $max_age) && $min_age<=$max_age){
    newWriteToFile(); 
?>
<div>   
    <h1>Thank you!</h1>
    <p>
        Welcome to NerdLuv, <?= $_POST["name"] ?>!<br/><br/>
        Now <a href="matches.php">log in to see your matches!</a>
    </p>
</div>
<?php
}
else{
    echo "<b>Error! Invalid data.</b>";
    echo "<p>We're sorry. You submitted invalid user information. Please go back and try again.</p>";
}
?>


<?php bottom()  ?>
