<!-- Run the php function to get matches from files -->
<?php include("common.php");?>
<?php top(); ?>
<h1>Matches for <?= $_GET["name"] ?></h1>
<div class='match'>
    <?php getMatchesFromFile(); ?>
</div>
<?php bottom() ?>

