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
        <form action="dpscalc.php" method="GET" class="mt-5 mb-5">
            <div class="row container">
                <div class="col-4 ml-auto mr-auto">
                    <label for="spellpower" class="mb-2 font-weight-bold">Spellpower:</label><br>
                    <input type="number" name="spellpower" required placeholder="600">
                </div>
                <div class="col-4 ml-auto mr-auto">
                    <label for="critchance" class="mb-1 font-weight-bold">Crit(%):</label><br>
                    <input type="number" name="critchance" class="mt-1" required placeholder="10">
                </div>
                <div class="col-3 mt-4">
                    <input type="submit" class="btn button btn-light">
                </div>
            </div>
        </form>
        <?php include('./model/damagecalc.php'); ?>
    </div>
    
</div>



<?php include('./view/footer.php');?>