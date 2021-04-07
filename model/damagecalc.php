<?php

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
    $spellpower = 600;

    $critchance = 10;
    $critroll = rand(1, 100);
    $criticalstrike = "false";

    $svone = 1.02;
    $svtwo = 1.04;
    $svthree = 1.06;
    $svfour = 1.08;
    $svfive = 1.1;

    $misery = 0.05;

    $mftick = 176 + ($spellpower * 0.19);

    $mb = rand(708, 748) + ($spellpower * 0.4286);
    
    if ($critroll <= $critchance) {
        $mb = $mb * 1.5;
        $criticalstrike = "true";
    }

    $swd = rand(572,662) + ($spellpower * 0.4286);

    if ($critroll <= $critchance) {
        $swd = $swd * 1.5;
        $criticalstrike = "true";
    }


    $swptick = 1648 + ($spellpower * 1.1);
    $swptick = $swptick / 8;

    $vttick = 650 + $spellpower;
    $vttick = $vttick / 5;

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
    -Second 13.5($dmgphaseeleven) (1.1SV + 0.05M) (Cast MB - 1.5 sec cast time) ((1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)) (VT has 3 seconds left, SWP has 12 seconds left))
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

    
    echo "<h3>Combat Log:</h3><ol><br>";

    // $dmgphaseone
    // (1.04SV + 0.05M * (MB damage roll - can crit)) ((1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks))

    $dmgphaseonecrit = false;
    $dmgphaseonemb = (($svtwo + $misery) * ($mb)) * ($damagemultiplier);
    if ($criticalstrike == "true") { $dmgphaseonecrit = true; }
    $dmgphaseonemb = round($dmgphaseonemb);
    if ($dmgphaseonecrit == true) {
        $dmgphaseonecrit = " damage and it was a critical strike.</li>";
    } else {
        $dmgphaseonecrit = " damage.</li>";
    }

    $dmgphaseoneswp = (($svtwo + $misery) * ($swptick)) * ($damagemultiplier);
    $dmgphaseoneswp = round($dmgphaseoneswp);

    $dmgphaseonevt = (($svone + $misery) * ($vttick)) * ($damagemultiplier);
    $dmgphaseonevt = round($dmgphaseonevt);


    echo "<li class=mb>&nbsp;&nbsp;Mind Blast hits the target for " . $dmgphaseonemb . $dmgphaseonecrit;
    echo "<li class=swp>&nbsp;&nbsp;Shadow Word Pain ticks for " . $dmgphaseoneswp . " damage.</li>";
    echo "<li class=vt>&nbsp;&nbsp;Vampiric Touch ticks for " . $dmgphaseonevt . " damage.</li>";

    // $dmgphasetwo
    // (1.08SV + 0.05M * (MF Tick))

    $dmgphasetwo = (($svfour + $misery) * ($mftick)) * ($damagemultiplier);
    $dmgphasetwo = round($dmgphasetwo);

    echo "<li class=mf>&nbsp;&nbsp;Mind Flay ticks for " . $dmgphasetwo . " damage.</li>";

    // $dmgphasethree
    // (1.08SV + 0.05M * (MF Tick))

    $dmgphasethree = (($svfour + $misery) * ($mftick)) * ($damagemultiplier);
    $dmgphasethree = round($dmgphasethree);

    echo "<li class=mf>&nbsp;&nbsp;Mind Flay ticks for " . $dmgphasethree . " damage.</li>";

    // $dmgphasefour
    // (1.02SV + 0.05M * VT ticks), (1.04SV + 0.05M * SWP ticks)

    $dmgphasefourvt = (($svone + $misery) * ($vttick)) * ($damagemultiplier);
    $dmgphasefourvt = round($dmgphasefourvt);

    $dmgphasefourswp = (($svtwo + $misery) * ($swptick)) * ($damagemultiplier);
    $dmgphasefourswp = round($dmgphasefourswp);

    echo '<li class=swp>&nbsp;&nbsp;Shadow Word Pain ticks for ' . $dmgphasefourswp . " damage.</li>";
    echo "<li class=vt>&nbsp;&nbsp;Vampiric Touch ticks for " . $dmgphasefourvt . " damage.</li>";

    