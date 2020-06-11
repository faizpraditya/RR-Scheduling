<?php
    // Catatan
    // 1. Preemptive/Non-Preemptive ( Semoga lekas selesai :) )
    // 2. Tabel bolong tengah ( Cek lagi )
    // 3. WT bolong tengah ( Cek lagi )
    // 4. WT sisipkan ( Cek lagi )

    $jmlProses = 0;
    $noProses = [];
    $tiba = [];
    $lamafix = [];
    $lama = [];
    $mulai = [];
    $selesai = [];
    $tat = [];
    $wt = [];
    $sisa = [];
    $aw = [];
    $ak = [];
    $loop = 0;
    $twt = 0;
    $ttat = 0;
    $awt = 0;
    $atat = 0;
    $gproses = 0;
    $ptabel = 0;
    $noAwal = 0;
    $noAkhir = 0;
    $quantum = 0;
    $cek = 0;

    if(isset($_POST['sub'])) {
        $jmlProses = $_POST['jmlProses'];
        for ($i=0; $i < $jmlProses ; $i++) { 
            $noProses[$i] = $i+1;
            $tiba[$i] = $_POST['tiba'.$i.''];
            $lama[$i] = $_POST['lama'.$i.''];
            $lamafix[$i] = $lama[$i];
        }
        $quantum = $_POST['quantum'];
    }

    function swap(&$x, &$y) {
        $tmp=$x;
        $x=$y;
        $y=$tmp;
    }

    for ($i=0; $i < $jmlProses; $i++) { 
        $mulai[$i] = 0;
        $selesai[$i] = 0;
        $tat[$i] = 0;
        $wt[$i] = 0;
        $sisa[$i] = 0;
    }

    for ($i=0; $i < $jmlProses-1; $i++) { 
        for ($j=$i+1; $j < $jmlProses; $j++) { 
            $wt[$i]=0;
            if($tiba[$i]>$tiba[$j]){
                swap($noProses[$i],$noProses[$j]);
                swap($tiba[$i],$tiba[$j]);
                swap($lama[$i],$lama[$j]);
                swap($lamafix[$i],$lamafix[$j]);
            }
        }
    }
?>