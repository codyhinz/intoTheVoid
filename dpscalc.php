<?php 
    $page = "dpscalculator";
    include('./view/header.php');
?>

<div class="container-fluid row">
    <div class="introduction col-11">
        <h2>Damage per Second Calculator</h2><hr/>
        <?php include('./model/damagecalc.php'); ?>
    </div>
</div>



<?php include('./view/footer.php');?>