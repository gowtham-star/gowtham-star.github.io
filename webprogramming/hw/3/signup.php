<!--
Signup Page.
-->
<?php include("common.php");?>
<?php top()  ?>
<form action="signup-submit.php" method="post">
    <fieldset> 
        <legend>New User Signup:</legend>
        <ul>
            <li>
                <!--
                    Name - A inputbox for the user to type his/her name
                 -->
                <strong>Name:</strong>
                <input type="text" name="name" size="16"/>
            </li>

            <li>
                <!--
                Gender -  Radio buttons to select male or female gender
                -->
                <strong>Gender:</strong>
                <label><input type="radio" name="gender" value="M"/>M</label>
                <label><input type="radio" name="gender" value="F"/>F</label>

            </li>

            <li>
                <!--
                Age - Takes input number of 2 digit size
                -->
                <strong>Age:</strong>
                <input type="text" name="age" size="6" maxlength="2"/>
            </li>

            <li>
                <!--
                Personality type - A 6-character input  allows the user to type personality type, such as ISTJ or ENFP. The box lets the user type up to 4 characters.
                -->
                <strong>Personality type:</strong>
                <input type="text" name="type" size="6" maxlength="4"/>
                <a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">(Don't know your type?)</a>
            </li>

            <li>
                <!--
                Favorite OS: A drop-down select box allowing the user to
                select a favorite operating system. The choices are Windows,
                Mac OS X, and Linux. Initially "Windows" is selected.
                -->
                <strong>Favorite OS:</strong>
                <select name="OS">
                    <option selected="selected">Windows</option>
                    <option>Mac OS X</option>
                    <option>Linux</option>
                </select>
            </li>

            <li>
                <!--
                Seeking age: This can be a age range from 1-99 and min and max should be given as input
                -->
                <strong>Seeking Age:</strong>
                <input type="text" name="min" size="6" maxlength="2" placeholder="min"/> to
                <input type="text" name="max" size="6" maxlength="2" placeholder="max"/>
            </li>

            <li>
                <!--
                Seeking Gender: This can be F, M, MF. This is used while matching pairs.
                -->
                <strong>Seeking Gender:</strong>
                <label><input type="radio" name="seekingGender" value="M"/>M</label>
                <label><input type="radio" name="seekingGender" value="F"/>F</label>
                <label><input type="radio" name="seekingGender" value="MF"/>MF</label>
            </li>
        </ul>

        <!--
        Sign Up: When the user presses "Sign Up," the form should submit its data as a POST to signup-submit.php.
        -->
        <input type="submit" value="Sign Up"/>
    </fieldset>
<?php bottom()  ?>