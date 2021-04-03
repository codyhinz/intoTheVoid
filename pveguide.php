<?php 
    $page = "pveguide";
    include('./view/header.php');
?>

<div class="container introduction col-11">
    <div class="row">
        <div class="col-12">
            <h2>Player vs. Everything Guides</h2><hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            <h4 class="mt-2">Race Selection:</h4>
            <p class="mt-4">While there is a very obvious "optimal" race for the alliance,
            the horde have a bit more leeway on race selections in terms of PVE potential.
            Even still I would definitely consider most races to be viable,
            and at the end of the day play what you like. 
            Race differences make very minimal difference in terms of Shadow Priest in Burning Crusade.
            </p>
        </div>
    </div>
    <div class="row col-12 mt-5">
        <div class="col-6">
            <h5 class="mb-3 text-primary"><img src="./view/images/alliance.png" width="45" height="40">&nbsp;Alliance</h5>
            <ul class="ml-2">
                <li class="font-weight-bold text-primary">Draenei</li>
                <li>Dwarf</li>
                <li>Human</li>
                <li>Night Elf</li>
            </ul>
        </div>
        <div class="col-6">
            <h5 class="mb-3 text-danger"><img src="./view/images/horde.png" width="50" height="45">Horde</h5>
            <ul class="ml-2">
                <li class="font-weight-bold text-danger">Undead</li>
                <li>Blood Elf</li>
                <li>Troll</li>
            </ul>
        </div>
    </div>
</div>

<?php include('./view/footer.php');?>