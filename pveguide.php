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
    <div class="row col-12 mt-5 mb-5">
        <div class="col-6">
            <h5 class="mb-3 text-primary"><img src="./view/images/alliance.png" width="35" height="30">&nbsp;Alliance</h5>
            <ul class="ml-2">
                <li class="font-weight-bold text-primary draenei">Draenei</li>
                <li class="dwarf">Dwarf</li>
                <li class="human">Human</li>
                <li class="nightelf">Night Elf</li>
            </ul>
        </div>
        <div class="col-6">
            <h5 class="mb-3 text-danger"><img src="./view/images/horde.png" width="40" height="35">Horde</h5>
            <ul class="ml-2">
                <li class="font-weight-bold text-danger undead mt-2">Undead</li>
                <li class="bloodelf">Blood Elf</li>
                <li class="troll">Troll</li>
            </ul>
        </div>
    </div>
    <div class="col-12 mt-5">
        <div class="mt-5"><h2 class="text-primary"><img src="./view/images/alliance.png" width="50" height="40">&nbsp;Alliance</h2></div>
    </div>
    <div class="row col-12">
        <div class="col-xl-7 col-lg-7 col-md-12 mt-2">
            <h5 class="font-weight-bold">Draenei:</h5>
            <p>In terms of PVE the alliance have a massive advantage; the draenei.
                Bringing their 1% spell hit into the equation, this means you can gear even less for spell hit.
                Inspiring presence is by far and away the best racial for shadow priests.</p>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-12 mt-4">
            <img src="./view/images/inspiringpresence.png" class="img-fluid">
        </div>
    </div>
</div>

<?php include('./view/footer.php');?>