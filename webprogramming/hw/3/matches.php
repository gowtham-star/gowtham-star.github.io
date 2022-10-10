<!--
Login page
This page takes input details of name and initiates search
-->
<?php include("common.php");?>
<?php top()  ?>
<form action="matches-submit.php" method="get">
    <fieldset>
        <legend>Returning User:</legend>

        <ul>
            <li>
                <!--
                Name: 16 letter input box. Initially empty. Submits to the server as a query
                parameter name.
                -->
                <strong>Name:</strong>
                <input type="text" name="name" size="16"/>
            </li>
        </ul>

        <!--
        When the user presses "View My Matches," the form submits
        its data as a GET request to matches-submit.php. The
        name of the query parameter sent should be name. For
        example, when the user views matches for Rosie O Donnell,
        the URL should be:
        matches-submit.php?name=Rosie+O+Donnell
        -->
        <input type="submit" value="View My Matches"/>
    </fieldset>
</form>
<?php include("bottom.php"); ?>
<?php bottom()  ?>