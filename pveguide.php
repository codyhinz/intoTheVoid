<?php 
    $page = "pveguide";
    include('./view/header.php');
    $race = $_GET["racials"] ?? "";
?>

<div class="container introduction col-11">
    <div class="row">
        <div class="col-12">
            <h2>Player vs. Environment Guides</h2><hr/>
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
            One huge change we received is baseline all races get fear ward. 
            </p>
        </div>
    </div>
    <div class="row col-12 mt-5 mb-5">
        <div class="col-6">
            <h5 class="mb-3 text-primary"><img src="./view/images/alliance.png" width="35" height="30" alt="Alliance Icon">&nbsp;Alliance</h5>
            <ul class="ml-2">
                <li class="font-weight-bold text-primary draenei">Draenei</li>
                <li class="dwarf">Dwarf</li>
                <li class="human">Human</li>
                <li class="nightelf">Night Elf</li>
            </ul>
        </div>
        <div class="col-6">
            <h5 class="mb-3 text-danger"><img src="./view/images/horde.png" width="40" height="35" alt="Horde Icon">Horde</h5>
            <ul class="ml-2">
                <li class="font-weight-bold text-danger undead mt-2">Undead</li>
                <li class="bloodelf">Blood Elf</li>
                <li class="troll">Troll</li>
            </ul>
        </div>
    </div>
    <div class="row">
    <div class="col-6">
        <div><h2 class="text-primary"><img src="./view/images/alliance.png" width="50" height="40" alt="Alliance Icon">&nbsp;Alliance</h2></div>
    </div>
    <div class="col-6 mt-3">
        <form method="get" action="pveguide.php">
            <select class="dropdownclass" name="racials">
                <option value="draenei" <?php if ($race == "draenei"){echo "selected";}?>>Draenei</option>
                <option value="dwarf" <?php if ($race == "dwarf"){echo "selected";}?>>Dwarf</option>
            </select>
            <button class="btn btn-primary ml-5 btn-sm mb-1" type="submit" value="submit">Submit</button>
        </form>
    </div>
</div>

<?php
    if ($race == 'draenei') {
        include('./model/draenei.php');
    } elseif ($race == 'dwarf') {
        include('./model/dwarf.php');
    } else {
        include('./model/draenei.php');
    }
?>
</div>



<?php include('./view/footer.php');?>