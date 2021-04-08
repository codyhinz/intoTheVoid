<?php 
    $page = "dpscalculator";
    include('./view/header.php');
?>

<div class="container row col-12">
    <div class="introduction col-11 ml-5">
        <h2>DPS Calculator</h2><hr/>
        <p class="mt-5 mb-5">This is a simulation based on the "optimal" rotation for a raiding environment.
        This is obviously not a very reliable way to predict your dps for a practical raiding environment.
        There are way too many variables to account for, but this is a great preview of how more spell power and crit effect your dps.
        This is based on a 30 second rotation that keeps dot uptime and debuffs in mind.</p>
        <?php include('./model/damagecalc.php'); ?>
    </div>
</div>



<?php include('./view/footer.php');?>