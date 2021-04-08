<?php

    $spellpower = filter_input(INPUT_GET, 'spellpower', FILTER_VALIDATE_INT);
    $critchance = filter_input(INPUT_GET, 'critchance', FILTER_VALIDATE_INT);


    // Spell Critical strike chance does 150% damage
    // Spell Hit - Casters baseline need 15%, we gain 10% from talents. 12.6 spell hit to 1% spell hit.

    // --Debuffs--
    //Shadow Vounerability (2% Spell damage refreshed on each application of a shadow spell up to 10% - 15 second duration)
    //Misery (5% extra spell damage refreshed on each application of SWP, MF, VT - 24 second duration)

    // -DPS Optimal Rotation-
    // This sim is designed based on no holds barred dps, and lasts exactly 30 seconds of a rotation.

    /* --TICK DAMAGE IS ONLY EFFECTED BY INITIAL APPLICATION DEBUFFS--

    -Second 0 (Cast VT - 1.5 second cast)
    -Second 1.5 (1.02SV + 0.05M) (VT hits mob, SWP hits mob) (VT has 15 seconds, SWP has 24 seconds)
    -Second 3 (1.04SV + 0.05M) (Cast MB - 1.5 sec cast time) (VT has 13.5 seconds, SWP has 22.5 seconds))
    -Second 4.5 (1.04SV + 0.05M * (MB damage roll - can crit)) ((1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)) (VT has 12 seconds left, SWP has 21 seconds left))
    -Second 5 (1.06SV + 0.05M) (MF channel begins) (VT has 11.5 seconds left, SWP has 20.5 seconds left))
    -Second 6 (1.08SV + 0.05M * (MF Tick) (VT has 10.5 seconds left, SWP has 19.5 seconds left))
    -Second 7 (1.08SV + 0.05M * (MF Tick) (VT has 9.5 seconds left, SWP has 18.5 seconds left))
    -Second 7.5 (1.08SV + 0.05M * ((1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)) (VT has 9 seconds left, SWP has 18 seconds left))
    -Second 8 (1.08SV + 0.05M * (MF Tick) (VT has 8.5 seconds left, SWP has 17.5 seconds left))
    -Second 8.5 (1.08SV + 0.05M * (SWD can crit - GCD) (VT has 8 seconds left, SWP has 17 seconds left))
    -Second 10 (1.1SV + 0.05M) (MF Channel begins) (VT has 6.5 seconds left, SWP has 15.5 seconds left))
    -Second 10.5 (1.1SV + 0.05M) ((1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)) (VT has 6 seconds left, SWP has 15 seconds left)) 
    -Second 11 (1.1SV + 0.05M * (MF tick) (VT has 5.5 seconds left, SWP has 14.5 seconds left))
    -Second 12 (1.1SV + 0.05M * (MF tick) (VT has 4.5 seconds left, SWP has 13.5 seconds left)
    -Second 13 (1.1SV + 0.05M * (MF tick) (VT has 3.5 seconds left, SWP has 12.5 seconds left)
    -Second 13.5 (1.1SV + 0.05M) (Cast MB - 1.5 sec cast time) ((1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)) (VT has 3 seconds left, SWP has 12 seconds left))
    -Second 15 (1.1SV + 0.05M * (MB damage roll - can crit) (Cast VT 1.5 sec) (VT has 1.5 seconds left, SWP has 10.5 seconds left))
    -Second 16.5 (1.1SV + 0.05M * (VT lands) ((1.02SV + 0.05M * VT ticks) FINAL VT TICK, (1.04SV + 0.05M * SWP ticks)) (VT has 15 seconds left, SWP has 12 seconds left))
    -Second 18 (1.1SV + 0.05M) (MF Channel begins) (VT has 13.5 seconds left, SWP has 10.5 seconds left))
    -Second 19 (1.1SV + 0.05M * (MF tick) (VT has 12.5 seconds left, SWP has 9.5 seconds left))
    -Second 19.5 (1.1SV + 0.05M) ((1.1SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)) (VT has 12 seconds left, SWP has 9 seconds left))
    -Second 20 (1.1SV + 0.05M * (MF tick) (VT has 11.5 seconds left, SWP has 8.5 seconds left))
    -Second 21 (1.1SV + 0.05M * (MF tick) (VT has 10.5 seconds left, SWP has 7.5 seconds left))
    -Second 21.5 (1.1SV + 0.05M) (MF Channel begins) (VT has 10 seconds left, SWP has 7 seconds left))
    -Second 22.5 (1.1SV + 0.05M * (MF tick, (1.1SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)) (VT has 9 seconds left, SWP has 6 seconds left))
    -Second 23.5 (1.1SV + 0.05M * (MF tick) (VT has 8 seconds left, SWP has 5 seconds left))
    -Second 24.5 (1.1SV + 0.05M * (MF tick) (VT has 7 seconds left, SWP has 4 seconds left))
    -Second 25 (1.1SV + 0.05M) (Cast MB - 1.5 sec cast time) (VT has 6.5 seconds left, SWP has 3.5 seconds left))
    -Second 25.5 (1.1SV + 0.05M * ((1.1SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks) (VT has 6 seconds left, SWP has 3 seconds left))
    -Second 26.5 (1.1SV + 0.05M * (MB damage roll - can crit) (VT has 5 seconds left, SWP has 2 seconds left))
    -Second 27 (1.1SV + 0.05M) (Cast SWP) (VT has 4.5 seconds left, SWP has 24 seconds left))
    -Second 28.5 (1.1SV + 0.05M * (MF channel begins) (1.1SV + 0.05M * VT ticks) (VT has 3 seconds left, SWP has 22.5 seconds left))
    -Second 29.5 (1.1SV + 0.05M * (MF tick) (VT has 2 seconds left, SWP has 21.5 seconds left))
    -Second 30 (1.1SV + 0.05M * (1.1SV + 0.05M * SWP ticks) (VT has 1.5 seconds left, SWP has 21 seconds left))  

    // --Spells-- (All on GCD)
    // Mind Blast	42.86% (MB) (1.5 second cast time, 0.5 seconds off cooldown based off talents, 8 second cooldown baseline)
    // Mind Flay	57% (19% per tick) (MF) (3 seconds channeled 1 tick per second, No cooldown)
    // Shadowfiend	65.0%   (SF) (Too difficult to calculate in sim)
    // Shadow Word: Death	42.86% (SWD) (Instant cast, 12 second cooldown)
    // Shadow Word: Pain	110.0% (SWP) (Instant cast, 24 seconds duration, 8 ticks in total 1 every 3 seconds, No cooldown)
    // Vampiric Touch	100.0% (VT) (1.5 sec cast, 15 second duration, 5 ticks in total 1 every 3 seconds, No cooldown)

    
    /*  Mind Flay - Rank 7:                   528 dmg;
        Mind Blast - Rank 11:             708-748 dmg;
        Shadow Word Death - Rank 2:       572-662 dmg;
        Shadow Word Pain - Rank 10:          1648 dmg;
        Vampiric Touch - Rank 3:              650 dmg; */


    $damagemultiplier = 1;

    $darkness = $damagemultiplier * 1.1;
    $shadowForm = $damagemultiplier * 1.15;

    $damagemultiplier = $darkness + $shadowForm - 1;
    $criticalstrikeswd = "false";
    $criticalstrikemb = "false";

    $svone = 1.02;
    $svtwo = 1.04;
    $svthree = 1.06;
    $svfour = 1.08;
    $svfive = 1.1;

    $misery = 0.05;

    $mftick = 176 + ($spellpower * 0.19);

    $swd = mt_rand(572,662) + ($spellpower * 0.4286);

    $swptick = 1648 + ($spellpower * 1.1);
    $swptick = $swptick / 8;

    $vttick = 650 + $spellpower;
    $vttick = $vttick / 5;

    $spellpower = $_GET['spellpower'] ?? "600";
    $critchance = $_GET['critchance'] ?? "10";

/*    --Actual Damage Outputs--

    -Second 4.5($dmgphaseone) (1.04SV + 0.05M * (MB damage roll - can crit)) ((1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)) (VT has 12 seconds left, SWP has 21 seconds left)
    -Second 6($dmgphasetwo) (1.08SV + 0.05M * (MF Tick) (VT has 10.5 seconds left, SWP has 19.5 seconds left))
    -Second 7($dmgphasethree) (1.08SV + 0.05M * (MF Tick) (VT has 9.5 seconds left, SWP has 18.5 seconds left))
    -Second 7.5($dmgphasefour) (1.08SV + 0.05M * ((1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)) (VT has 9 seconds left, SWP has 18 seconds left))
    -Second 8($dmgphasefive) (1.08SV + 0.05M * (MF Tick) (VT has 8.5 seconds left, SWP has 17.5 seconds left))
    -Second 8.5($dmgphasesix) (1.08SV + 0.05M * (SWD can crit - GCD) (VT has 8 seconds left, SWP has 17 seconds left))
    -Second 10.5($dmgphaseseven) (1.1SV + 0.05M) ((1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)) (VT has 6 seconds left, SWP has 15 seconds left)) 
    -Second 11($dmgphaseeight) (1.1SV + 0.05M * (MF tick) (VT has 5.5 seconds left, SWP has 14.5 seconds left))
    -Second 12($dmgphasenine) (1.1SV + 0.05M * (MF tick) (VT has 4.5 seconds left, SWP has 13.5 seconds left)
    -Second 13($dmgphaseten) (1.1SV + 0.05M * (MF tick) (VT has 3.5 seconds left, SWP has 12.5 seconds left)
    -Second 13.5($dmgphaseeleven) (1.1SV + 0.05M * (Cast MB - 1.5 sec cast time) ((1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)) (VT has 3 seconds left, SWP has 12 seconds left))
    -Second 15($dmgphasetwelve) (1.1SV + 0.05M * (MB damage roll - can crit) (Cast VT 1.5 sec) (VT has 1.5 seconds left, SWP has 10.5 seconds left))
    -Second 16.5($dmgphasethirteen) (1.1SV + 0.05M * (VT lands) ((1.02SV + 0.05M * VT ticks) FINAL VT TICK, (1.04SV + 0.05M * SWP ticks)) (VT has 15 seconds left, SWP has 12 seconds left))
    -Second 19($dmgphasefourteen) (1.1SV + 0.05M * (MF tick) (VT has 12.5 seconds left, SWP has 9.5 seconds left))
    -Second 19.5($dmgphasefifteen) (1.1SV + 0.05M) ((1.1SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)) (VT has 12 seconds left, SWP has 9 seconds left))
    -Second 20($dmgphasesixteen) (1.1SV + 0.05M * (MF tick) (VT has 11.5 seconds left, SWP has 8.5 seconds left))
    -Second 21($dmgphaseseventeen) (1.1SV + 0.05M * (MF tick) (VT has 10.5 seconds left, SWP has 7.5 seconds left))
    -Second 22.5($dmgphaseeighteen) (1.1SV + 0.05M * (MF tick, (1.1SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)) (VT has 9 seconds left, SWP has 6 seconds left))
    -Second 23.5($dmgphasenineteen) (1.1SV + 0.05M * (MF tick) (VT has 8 seconds left, SWP has 5 seconds left))
    -Second 24.5($dmgphasetwenty) (1.1SV + 0.05M * (MF tick) (VT has 7 seconds left, SWP has 4 seconds left))
    -Second 25.5($dmgphasetwentyone) (1.1SV + 0.05M * ((1.1SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks) (VT has 6 seconds left, SWP has 3 seconds left))
    -Second 26.5($dmgphasetwentytwo) (1.1SV + 0.05M * (MB damage roll - can crit) (VT has 5 seconds left, SWP has 2 seconds left))
    -Second 28.5($dmgphasetwentythree) (1.1SV + 0.05M * (MF channel begins) (1.1SV + 0.05M * VT ticks) (VT has 3 seconds left, SWP has 22.5 seconds left))
    -Second 29.5($dmgphasetwentyfour) (1.1SV + 0.05M * (MF tick) (VT has 2 seconds left, SWP has 21.5 seconds left))
    -Second 30($dmgphasetwentyfive) (1.1SV + 0.05M * (1.1SV + 0.05M * SWP ticks) (VT has 1.5 seconds left, SWP has 21 seconds left)) 
    */

    echo "";
    echo "<div class=row><div class='col-xl-6 col-lg-6 col-md-12 ml-md-5 ml-lg-0'><h4 class=mb-1>&nbsp;&nbsp;Combat Log:</h4><br>";

    // $dmgphaseone
    // (1.04SV + 0.05M * (MB can crit)) ((1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks))

    $critrollone = mt_rand(1, 100);
    $criticalstrikembone = "false";

    $mbone = mt_rand(708, 748) + ($spellpower * 0.4286);

    if ($critrollone <= $critchance) {
        $mbone = $mbone * 1.5;
        $criticalstrikembone = "true";
    }

    $dmgphaseonecrit = "false";
    $dmgphaseonemb = (($svtwo + $misery) * ($mbone)) * ($damagemultiplier);
    if ($criticalstrikembone == "true") {
        $dmgphaseonecrit = "true";
    }
    $dmgphaseonemb = round($dmgphaseonemb);
    if ($dmgphaseonecrit == "true") {
        $dmgphaseonecrit = " damage and it was a critical strike.</li>";
    } else {
        $dmgphaseonecrit = " damage.</li>";
    }

    $dmgphaseoneswp = (($svtwo + $misery) * ($swptick)) * ($damagemultiplier);
    $dmgphaseoneswp = round($dmgphaseoneswp);

    $dmgphaseonevt = (($svone + $misery) * ($vttick)) * ($damagemultiplier);
    $dmgphaseonevt = round($dmgphaseonevt);

    $dmgphaseone = $dmgphaseonemb + $dmgphaseoneswp + $dmgphaseonevt;

    echo "<ol><li class=mb>&nbsp;&nbsp;<span class=font-weight-bold>Mind Blast</span> hits for " . $dmgphaseonemb . $dmgphaseonecrit;
    echo "<li class=swp>&nbsp;&nbsp;<span class=font-weight-bold>Shadow Word Pain</span> ticks for " . $dmgphaseoneswp . " damage.</li>";
    echo "<li class=vt>&nbsp;&nbsp;<span class=font-weight-bold>Vampiric Touch</span> ticks for " . $dmgphaseonevt . " damage.</li>";

    // $dmgphasetwo
    // (1.08SV + 0.05M * (MF Tick))

    $dmgphasetwo = (($svfour + $misery) * ($mftick)) * ($damagemultiplier);
    $dmgphasetwo = round($dmgphasetwo);

    echo "<li class=mf>&nbsp;&nbsp;<span class=font-weight-bold>Mind Flay</span> ticks for " . $dmgphasetwo . " damage.</li>";

    // $dmgphasethree
    // (1.08SV + 0.05M * (MF Tick))

    $dmgphasethree = (($svfour + $misery) * ($mftick)) * ($damagemultiplier);
    $dmgphasethree = round($dmgphasethree);

    echo "<li class=mf>&nbsp;&nbsp;<span class=font-weight-bold>Mind Flay</span> ticks for " . $dmgphasethree . " damage.</li>";

    // $dmgphasefour
    // (1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)

    $dmgphasefourswp = (($svtwo + $misery) * ($swptick)) * ($damagemultiplier);
    $dmgphasefourswp = round($dmgphasefourswp);

    $dmgphasefourvt = (($svone + $misery) * ($vttick)) * ($damagemultiplier);
    $dmgphasefourvt = round($dmgphasefourvt);

    $dmgphasefour = $dmgphasefourswp + $dmgphasefourvt;

    echo '<li class=swp>&nbsp;&nbsp;<span class=font-weight-bold>Shadow Word Pain</span> ticks for ' . $dmgphasefourswp . " damage.</li>";
    echo "<li class=vt>&nbsp;&nbsp;<span class=font-weight-bold>Vampiric Touch</span> ticks for " . $dmgphasefourvt . " damage.</li>";

    // $dmgphasefive
    // (1.08SV + 0.05M * MF Tick)

    $dmgphasefive = (($svfour + $misery) * ($mftick)) * ($damagemultiplier);
    $dmgphasefive = round($dmgphasefive);

    echo "<li class=mf>&nbsp;&nbsp;<span class=font-weight-bold>Mind Flay</span> ticks for " . $dmgphasefive . " damage.</li>";

    // $dmgphasesix
    // (1.08SV + 0.05M * (SWD can crit)

    $critrolltwo = mt_rand(1, 100);

    if ($critrolltwo <= $critchance) {
        $swd = $swd * 1.5;
        $criticalstrikeswd = "true";
    }

    $dmgphasesixcrit = false;
    $dmgphasesix = (($svfour + $misery) * ($swd)) * ($damagemultiplier);
    if ($criticalstrikeswd == "true") { $dmgphasesixcrit = true; }
    $dmgphasesix = round($dmgphasesix);
    if ($dmgphasesixcrit == true) {
        $dmgphasesixcrit = " damage and it was a critical strike.</li>";
    } else {
        $dmgphasesixcrit = " damage.</li>";
    }

    echo "<li class=swd>&nbsp;&nbsp;<span class=font-weight-bold>Shadow Word Death</span> hits for " . $dmgphasesix . $dmgphasesixcrit;

    // $dmgphaseseven
    // (1.1SV + 0.05M) ((1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks))

    $dmgphasesevenswp = (($svtwo + $misery) * ($swptick)) * ($damagemultiplier);
    $dmgphasesevenswp = round($dmgphasesevenswp);

    $dmgphasesevenvt = (($svone + $misery) * ($vttick)) * ($damagemultiplier);
    $dmgphasesevenvt = round($dmgphasesevenvt);

    $dmgphaseseven = $dmgphasesevenswp + $dmgphasesevenvt;

    echo '<li class=swp>&nbsp;&nbsp;<span class=font-weight-bold>Shadow Word Pain</span> ticks for ' . $dmgphasesevenswp . " damage.</li>";
    echo "<li class=vt>&nbsp;&nbsp;<span class=font-weight-bold>Vampiric Touch</span> ticks for " . $dmgphasesevenvt . " damage.</li>";

    // $dmgphaseeight
    // (1.1SV + 0.05M * MF tick)

    $dmgphaseeight = (($svfive + $misery) * ($mftick)) * ($damagemultiplier);
    $dmgphaseeight = round($dmgphaseeight);

    echo "<li class=mf>&nbsp;&nbsp;<span class=font-weight-bold>Mind Flay</span> ticks for " . $dmgphaseeight . " damage.</li>";

    // $dmgphasenine
    // (1.1SV + 0.05M * MF tick)

    $dmgphasenine = (($svfive + $misery) * ($mftick)) * ($damagemultiplier);
    $dmgphasenine = round($dmgphasenine);

    echo "<li class=mf>&nbsp;&nbsp;<span class=font-weight-bold>Mind Flay</span> ticks for " . $dmgphasenine . " damage.</li>";

    // $dmgphaseten
    // (1.1SV + 0.05M * MF tick)

    $dmgphaseten = (($svfive + $misery) * ($mftick)) * ($damagemultiplier);
    $dmgphaseten = round($dmgphaseten);

    echo "<li class=mf>&nbsp;&nbsp;<span class=font-weight-bold>Mind Flay</span> ticks for " . $dmgphaseten . " damage.</li>";

    // $dmgphaseeleven
    // (1.1SV + 0.05M) ((1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks))

    $dmgphaseelevenswp = (($svtwo + $misery) * ($swptick)) * ($damagemultiplier);
    $dmgphaseelevenswp = round($dmgphaseelevenswp);

    $dmgphaseelevenvt = (($svone + $misery) * ($vttick)) * ($damagemultiplier);
    $dmgphaseelevenvt = round($dmgphaseelevenvt);

    $dmgphaseeleven = $dmgphaseelevenswp + $dmgphaseelevenvt;

    echo '<li class=swp>&nbsp;&nbsp;<span class=font-weight-bold>Shadow Word Pain</span> ticks for ' . $dmgphaseelevenswp . " damage.</li>";
    echo "<li class=vt>&nbsp;&nbsp;<span class=font-weight-bold>Vampiric Touch</span> ticks for " . $dmgphaseelevenvt . " damage.</li>";

    // $dmgphasetwelve
    // (1.1SV + 0.05M * MB damage roll - can crit)

    $critrollthree = mt_rand(1, 100);
    $criticalstrikembtwo = "false";

    $mbtwo = mt_rand(708, 748) + ($spellpower * 0.4286);

    if ($critrollthree <= $critchance) {
        $mbtwo = $mbtwo * 1.5;
        $criticalstrikembtwo = "true";
    }

    $dmgphasetwelvecrit = "false";
    $dmgphasetwelve = (($svfive + $misery) * ($mbtwo)) * ($damagemultiplier);
    if ($criticalstrikembtwo == "true") {
        $dmgphasetwelvecrit = "true";
    }
    $dmgphasetwelve = round($dmgphasetwelve);
    if ($dmgphasetwelvecrit == "true") {
        $dmgphasetwelvecrit = " damage and it was a critical strike.</li>";
    } else {
        $dmgphasetwelvecrit = " damage.</li>";
    }

    echo "<li class=mb>&nbsp;&nbsp;<span class=font-weight-bold>Mind Blast</span> hits for " . $dmgphasetwelve . $dmgphasetwelvecrit;


    // $dmgphasethirteen
    // (1.1SV + 0.05M) ((1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks))

    $dmgphasethirteenswp = (($svtwo + $misery) * ($swptick)) * ($damagemultiplier);
    $dmgphasethirteenswp = round($dmgphasethirteenswp);

    $dmgphasethirteenvt = (($svone + $misery) * ($vttick)) * ($damagemultiplier);
    $dmgphasethirteenvt = round($dmgphasethirteenvt);

    $dmgphasethirteen = $dmgphasethirteenswp + $dmgphasethirteenvt;

    echo '<li class=swp>&nbsp;&nbsp;<span class=font-weight-bold>Shadow Word Pain</span> ticks for ' . $dmgphasethirteenswp . " damage.</li>";
    echo "<li class=vt>&nbsp;&nbsp;<span class=font-weight-bold>Vampiric Touch</span> ticks for " . $dmgphasethirteenvt . " damage.</li>";

    // $dmgphasefourteen
    // (1.1SV + 0.05M * MF tick)

    $dmgphasefourteen = (($svfive + $misery) * ($mftick)) * ($damagemultiplier);
    $dmgphasefourteen = round($dmgphasefourteen);

    echo "<li class=mf>&nbsp;&nbsp;<span class=font-weight-bold>Mind Flay</span> ticks for " . $dmgphasefourteen . " damage.</li>";

    // $dmgphasefifteen
    // (1.1SV + 0.05M) (1.1SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)

    $dmgphasefifteenswp = (($svtwo + $misery) * ($swptick)) * ($damagemultiplier);
    $dmgphasefifteenswp = round($dmgphasefifteenswp);

    $dmgphasefifteenvt = (($svfive + $misery) * ($vttick)) * ($damagemultiplier);
    $dmgphasefifteenvt = round($dmgphasefifteenvt);

    $dmgphasefifteen = $dmgphasefifteenswp + $dmgphasefifteenvt;

    echo '<li class=swp>&nbsp;&nbsp;<span class=font-weight-bold>Shadow Word Pain</span> ticks for ' . $dmgphasefifteenswp . " damage.</li>";
    echo "<li class=vt>&nbsp;&nbsp;<span class=font-weight-bold>Vampiric Touch</span> ticks for " . $dmgphasefifteenvt . " damage.</li>";

    // $dmgphasesixteen
    // (1.1SV + 0.05M * MF tick)

    $dmgphasesixteen = (($svfive + $misery) * ($mftick)) * ($damagemultiplier);
    $dmgphasesixteen = round($dmgphasesixteen);

    echo "<li class=mf>&nbsp;&nbsp;<span class=font-weight-bold>Mind Flay</span> ticks for " . $dmgphasesixteen . " damage.</li>";

    // $dmgphaseseventeen
    // (1.1SV + 0.05M * MF tick)

    $dmgphaseseventeen = (($svfive + $misery) * ($mftick)) * ($damagemultiplier);
    $dmgphaseseventeen = round($dmgphaseseventeen);

    echo "<li class=mf>&nbsp;&nbsp;<span class=font-weight-bold>Mind Flay</span> ticks for " . $dmgphaseseventeen . " damage.</li>";

    // $dmgphaseeighteen
    // (1.1SV + 0.05M * (MF tick, (1.1SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks))

    $dmgphaseeighteenmf = (($svfive + $misery) * ($mftick)) * ($damagemultiplier);
    $dmgphaseeighteenmf = round($dmgphaseeighteenmf);

    $dmgphaseeighteenswp = (($svtwo + $misery) * ($swptick)) * ($damagemultiplier);
    $dmgphaseeighteenswp = round($dmgphaseeighteenswp);

    $dmgphaseeighteenvt = (($svfive + $misery) * ($vttick)) * ($damagemultiplier);
    $dmgphaseeighteenvt = round($dmgphaseeighteenvt);

    $dmgphaseeighteen = $dmgphaseeighteenmf + $dmgphaseeighteenswp + $dmgphaseeighteenvt;

    echo "<li class=mf>&nbsp;&nbsp;<span class=font-weight-bold>Mind Flay</span> ticks for " . $dmgphaseeighteenmf . " damage.</li>";
    echo '<li class=swp>&nbsp;&nbsp;<span class=font-weight-bold>Shadow Word Pain</span> ticks for ' . $dmgphaseeighteenswp . " damage.</li>";
    echo "<li class=vt>&nbsp;&nbsp;<span class=font-weight-bold>Vampiric Touch</span> ticks for " . $dmgphaseeighteenvt . " damage.</li>";

    // $dmgphasenineteen
    // (1.1SV + 0.05M * MF tick)

    $dmgphasenineteen = (($svfive + $misery) * ($mftick)) * ($damagemultiplier);
    $dmgphasenineteen = round($dmgphasenineteen);

    echo "<li class=mf>&nbsp;&nbsp;<span class=font-weight-bold>Mind Flay</span> ticks for " . $dmgphasenineteen . " damage.</li>";

    // $dmgphasetwenty
    // (1.1SV + 0.05M * MF tick)

    $dmgphasetwenty = (($svfive + $misery) * ($mftick)) * ($damagemultiplier);
    $dmgphasetwenty = round($dmgphasetwenty);

    echo "<li class=mf>&nbsp;&nbsp;<span class=font-weight-bold>Mind Flay</span> ticks for " . $dmgphasetwenty . " damage.</li>";

    // $dmgphasetwentyone
    // (1.1SV + 0.05M * ((1.1SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks))

    $dmgphasetwentyoneswp = (($svtwo + $misery) * ($swptick)) * ($damagemultiplier);
    $dmgphasetwentyoneswp = round($dmgphasetwentyoneswp);

    $dmgphasetwentyonevt = (($svfive + $misery) * ($vttick)) * ($damagemultiplier);
    $dmgphasetwentyonevt = round($dmgphasetwentyonevt);

    $dmgphasetwentyone = $dmgphasetwentyoneswp + $dmgphasetwentyonevt;

    echo '<li class=swp>&nbsp;&nbsp;<span class=font-weight-bold>Shadow Word Pain</span> ticks for ' . $dmgphasetwentyoneswp . " damage.</li>";
    echo "<li class=vt>&nbsp;&nbsp;<span class=font-weight-bold>Vampiric Touch</span> ticks for " . $dmgphasetwentyonevt . " damage.</li>";

    // $dmgphasetwentytwo
    // (1.1SV + 0.05M * MB damage roll - can crit)

    $critrollfour = mt_rand(1, 100);
    $criticalstrikembthree = "false";

    $mbthree = mt_rand(708, 748) + ($spellpower * 0.4286);

    if ($critrollfour <= $critchance) {
        $mbthree = $mbthree * 1.5;
        $criticalstrikembthree = "true";
    }

    $dmgphasetwentytwocrit = "false";
    $dmgphasetwentytwo = (($svfive + $misery) * ($mbthree)) * ($damagemultiplier);
    if ($criticalstrikembthree == "true") {
        $dmgphasetwentytwocrit = "true";
    }
    $dmgphasetwentytwo = round($dmgphasetwentytwo);
    if ($dmgphasetwentytwocrit == "true") {
        $dmgphasetwentytwocrit = " damage and it was a critical strike.</li>";
    } else {
        $dmgphasetwentytwocrit = " damage.</li>";
    }

    echo "<li class=mb>&nbsp;&nbsp;<span class=font-weight-bold>Mind Blast</span> hits for " . $dmgphasetwentytwo . $dmgphasetwentytwocrit;

    // $dmgphasetwentythree
    // (1.1SV + 0.05M * (1.1SV + 0.05M * VT ticks))

    $dmgphasetwentythree = (($svfive + $misery) * ($vttick)) * ($damagemultiplier);
    $dmgphasetwentythree = round($dmgphasetwentythree);

    echo "<li class=vt>&nbsp;&nbsp;<span class=font-weight-bold>Vampiric Touch</span> ticks for " . $dmgphasetwentythree . " damage.</li>";

    // $dmgphasetwentyfour
    // (1.1SV + 0.05M * MF tick)

    $dmgphasetwentyfour = (($svfive + $misery) * ($mftick)) * ($damagemultiplier);
    $dmgphasetwentyfour = round($dmgphasetwentyfour);

    echo "<li class=mf>&nbsp;&nbsp;<span class=font-weight-bold>Mind Flay</span> ticks for " . $dmgphasetwentyfour . " damage.</li>";

    // $dmgphasetwentyfive
    // (1.1SV + 0.05M * (1.1SV + 0.05M * SWP ticks)

    $dmgphasetwentyfive = (($svtwo + $misery) * ($swptick)) * ($damagemultiplier);
    $dmgphasetwentyfive = round($dmgphasetwentyfive);
    
    echo '<li class=swp>&nbsp;&nbsp;<span class=font-weight-bold>Shadow Word Pain</span> ticks for ' . $dmgphasetwentyfive . " damage.</li></ul></div>";


    $totaldamage = $dmgphaseone + $dmgphasetwo + $dmgphasethree + $dmgphasefour + $dmgphasefive +
                    $dmgphasesix + $dmgphaseseven + $dmgphaseeight + $dmgphasenine + $dmgphaseten +
                    $dmgphaseeleven + $dmgphasetwelve + $dmgphasethirteen + $dmgphasefourteen + $dmgphasefifteen +
                    $dmgphasesixteen + $dmgphaseseventeen + $dmgphaseeighteen + $dmgphasenineteen + $dmgphasetwenty +
                    $dmgphasetwentyone + $dmgphasetwentytwo + $dmgphasetwentythree + $dmgphasetwentyfour + $dmgphasetwentyfive; 
    
    $totalmana = $totaldamage * 0.05;
    $totalmana = round($totalmana);
    
    $totalmps = $totalmana / 30;
    $totalmps = round($totalmps);

    $dps = $totaldamage / 30;
    $dps = round($dps);

    $dpsmin = $dps - 40;
    $dpsmax = $dps + 40;

    // Mind Blast Stats
    $mbdamagetotal = $dmgphasetwentytwo + $dmgphasetwelve + $dmgphaseonemb;

    $mbdamagepercent = $mbdamagetotal / $totaldamage;
    $mbdamagepercent = $mbdamagepercent * 100;
    $mbdamagepercent = round($mbdamagepercent);

    // Mind Flay Stats
    $mfdamagetotal = $dmgphasetwentyfour + $dmgphasetwenty + $dmgphasenineteen + $dmgphaseeighteenmf +
                        $dmgphaseseventeen + $dmgphasesixteen + $dmgphasefourteen + $dmgphaseten +
                        $dmgphasenine + $dmgphaseeight + $dmgphasefive + $dmgphasethree + $dmgphasetwo;
    
    
    $mfdamagepercent = $mfdamagetotal / $totaldamage;
    $mfdamagepercent = $mfdamagepercent * 100;
    $mfdamagepercent = round($mfdamagepercent);

    // Shadow Word Pain Stats
    $swpdamagetotal = $dmgphasetwentyfive + $dmgphasetwentyoneswp + $dmgphaseeighteenswp + $dmgphasefifteenswp +
                        $dmgphasethirteenswp + $dmgphaseelevenswp + $dmgphasesevenswp + $dmgphasefourswp +
                        $dmgphaseoneswp;

    $swpdamagepercent = $swpdamagetotal / $totaldamage;
    $swpdamagepercent = $swpdamagepercent * 100;
    $swpdamagepercent = round($swpdamagepercent);

    // Shadow Word Death Stats
    $swddamagetotal = $dmgphasesix;

    $swddamagepercent = $swddamagetotal / $totaldamage;
    $swddamagepercent = $swddamagepercent * 100;
    $swddamagepercent = round($swddamagepercent);

    // Vampiric Touch Stats
    $vtdamagetotal = $dmgphaseonevt + $dmgphasefourvt + $dmgphasesevenvt + $dmgphaseelevenvt +
                        $dmgphasethirteenvt + $dmgphasefifteenvt + $dmgphaseeighteenvt +
                        $dmgphasetwentyonevt + $dmgphasetwentythree;

    $vtdamagepercent = $vtdamagetotal / $totaldamage;
    $vtdamagepercent = $vtdamagepercent * 100;
    $vtdamagepercent = round($vtdamagepercent);

    echo "<div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mt-2 ml-lg-0 mr-lg-0 ml-5 mr-5 ml-lg-0'><h4 class=mb-3>Damage:</h4>";
    echo "<div class=row><div class='col-6 font-weight-bold'>Spell Power: </div>" . "<div class=col-6>" . $spellpower . "</div></div>";
    echo "<div class=row><div class='col-6 font-weight-bold'>Crit Chance: </div>" . "<div class=col-6>" . $critchance . "%</div></div>";
    echo "<div class=row><div class='col-6 font-weight-bold'>Total Damage: </div>" . "<div class=col-6>" . $totaldamage . " damage</div></div>";
    echo "<div class=row><div class='col-6 font-weight-bold'>Total Mana Regenerated: </div>" . "<div class=col-6>" . $totalmana . " mana</div></div>";
    echo "<div class=row><div class='col-6 font-weight-bold'>Total Mana per Second: </div>" . "<div class=col-6>" . $totalmps . " mana per/sec</div></div>";
    echo "<div class=row><div class='col-6 font-weight-bold'>Total - Mind Blast: </div>" . "<div class=col-6>" . $mbdamagetotal . " damage (" . $mbdamagepercent . "%)</div></div>";
    echo "<div class=row><div class='col-6 font-weight-bold'>Total - Mind Flay: </div>" . "<div class=col-6>" . $mfdamagetotal . " damage (" . $mfdamagepercent . "%)</div></div>";
    echo "<div class=row><div class='col-6 font-weight-bold'>Total - Shadow Word Death: </div>" . "<div class=col-6>" . $swddamagetotal . " damage (" . $swddamagepercent . "%)</div></div>";
    echo "<div class=row><div class='col-6 font-weight-bold'>Total - Shadow Word Pain: </div>" . "<div class=col-6>" . $swpdamagetotal . " damage (" . $swpdamagepercent . "%)</div></div>";
    echo "<div class=row><div class='col-6 font-weight-bold'>Total - Vampiric Touch: </div>" . "<div class=col-6>" . $vtdamagetotal . " damage (" . $vtdamagepercent . "%)</div></div>";
    echo "<div class=row><div class='col-6 font-weight-bold'>Average DPS: </div>" . "<div class=col-6>" . $dpsmin . "-" . $dpsmax . " per/sec</div></div>";
    echo "<div class=row><div class='col-6 font-weight-bold'>Damage per Second: </div>" . "<div class=col-6>" . $dps . " per/sec</div></div></div></div>";

    //</div></div></div>