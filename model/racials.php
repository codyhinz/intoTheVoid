<div class="row">
    <div class="col-6">
        <div><h2 class="text-primary"><img src="./view/images/alliance.png" width="50" height="40" alt="Alliance Icon">&nbsp;Alliance</h2></div>
    </div>
    <div class="col-6 mt-3">
        <form method="get" action="pveguide.php">
            <select class="dropdownclass">
                <option value="dwarf"<?php $race = 'dwarf';?>>Dwarf</option>
                <option value="draenei"<?php $race = 'draenei';?> selected>Draenei</option>
            </select>
            <button class="btn btn-primary ml-5 btn-sm mb-1" type="submit" value="Submit">Submit</button>
        </form>
    </div>
</div>
<div class="mb-5 mt-5 row col-12"></div>

<?php
    if ($race == 'draenei') {
        include('draenei.php');
    } elseif ($race == 'dwarf') {
        include('dwarf.php');
    }
?>