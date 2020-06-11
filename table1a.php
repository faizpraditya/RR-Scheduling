<table border=1 bgcolor="#fff">
    <tr>
    <?php
        // Proses cetak tabel
        $noAkhir = 1;
        cetakproses:
        $tess=0;
        $cetakdulu = 0; // belum dites lebih rumit
        for($i=0;$i<$jmlProses;$i++){
            $tess++;
            // echo "$tess ";
            $sisa[$i]=$lama[$i]-$quantum;
            $noAwal=$noAkhir-1; // wes bener
            // Looping j untuk mencetak proses per blok
            // kondisi jika tidak bolong dan proses sudah datang (done)
            if ($tiba[$i]<=$noAwal) {
                $sisa[$i]=$lama[$i]-$quantum;
                if($sisa[$i]<=0){
                    $sisa[$i]=0;
                }
                $gproses=$lama[$i]-$sisa[$i];
                $ptabel = 0;
                for($j=0;$j<$gproses;$j++){
                    $ptabel++;
                    if($j==$gproses-1){
    ?>
        <td align="center" height="40px" width="<?php echo $ptabel*40 ?>px">P<?php echo $noProses[$i] ?></td>
    <?php
                        $selesai[$i]=$noAkhir;
                    }
                    // Kondisi proses pertama
                    if($i==0&&$j==0&&$tiba[$i]==0){
                        $mulai[$i]=0;
                    }
                    // Kondisi jika proses lebih kecil atau samadengan quantum
                    else if($lamafix[$i]-$quantum<=0){
                        $mulai[$i]=$noAkhir-$gproses;
                    }
                    // Kondisi jika proses lebih besar dari quantum
                    else if($sisa[$i]!=0&&$sisa[$i]==($lamafix[$i]-$quantum)){
                        $mulai[$i]=$noAkhir-$gproses;
                    }
                    $noAkhir++;
                }
                $ptabel = 0;
                $lama[$i]=$sisa[$i];
            }
            // kondisi jika bolong dan proses belum datang
            else {
                for ($k=0; $k < $i; $k++) { 
                    if ($sisa[$k]==0) { // cek kosong
                        $cek++;
                    }
                }
                // Awal kosong
                if ($noAwal==0&&$tiba[$i]>0) {
                    // echo "Tiba [0] = ".$tiba[0]." No Akhir = ".$noAkhir;
                    for($j=0;$j<$tiba[$i];$j++){
                        $ptabel=$noAkhir-$noAwal;
                        if ($tiba[$i]==$noAkhir) {
    ?>
        <td align="center" height="40px" width="<?php echo $ptabel*40 ?>px"></td>
    <?php
                        }
                        $noAkhir++;
                    }
                    $i--;
                }
                // kondisi jika bolong, proses belum datang, dan tidak ada sisa di proses sebelumnya (done)
                else if ($cek>=$i) {
                    for($j=$noAwal;$j<$tiba[$i];$j++){
                        $ptabel=$noAkhir-$noAwal;
                        if ($tiba[$i]==$noAkhir) {
    ?>
        <td align="center" height="40px" width="<?php echo $ptabel*40 ?>px"></td>
    <?php
                        }
                        $noAkhir++;
                    }
                    $i--;
                }
                // kondisi jika bolong, proses belum datang, dan ada sisa di proses sebelumnya (belum clear)
                else {
                    while ($sisa[$cetakdulu]<=0) {
                        $cetakdulu++;
                    }
                    if ($sisa[$cetakdulu]>0) {
                        $sisa[$cetakdulu]=$lama[$cetakdulu]-$quantum;
                        if($sisa[$cetakdulu]<=0){
                            $sisa[$cetakdulu]=0;
                        }
                        $gproses=$lama[$cetakdulu]-$sisa[$cetakdulu];
                        $ptabel = 0;
                        for($j=0;$j<$gproses;$j++){
                            $ptabel++;
                            if($j==$gproses-1){
    ?>
        <td align="center" height="40px" width="<?php echo $ptabel*40 ?>px">P<?php echo $noProses[$cetakdulu] ?></td>
    <?php
                                $selesai[$cetakdulu]=$noAkhir;
                            }
                            // Kondisi proses pertama
                            if($i==0&&$j==0){
                                $mulai[$cetakdulu]=0;
                            }
                            // Kondisi jika proses lebih kecil atau samadengan quantum
                            else if($lamafix[$cetakdulu]-$quantum<=0){
                                $mulai[$cetakdulu]=$noAkhir-$gproses;
                            }
                            // Kondisi jika proses lebih besar dari quantum
                            else if($sisa[$cetakdulu]!=0&&$sisa[$cetakdulu]==($lamafix[$cetakdulu]-$quantum)){
                                $mulai[$cetakdulu]=$noAkhir-$gproses;
                            }
                            $noAkhir++;
                        }
                        $ptabel = 0;
                        // $i--;
                        $lama[$cetakdulu]=$sisa[$cetakdulu];
                    }
                    $cetakdulu++;
                }
            }
        }

        for($i=0;$i<$jmlProses;$i++){
            $tat[$i]=$selesai[$i]-$mulai[$i];
            // $wt[$i]=$mulai[$i]-$tiba[$i];
            // Untuk debug
            // echo "loop ke $i -> ";
            // echo "sisa[$i] = $sisa[$i]<br>";
            if($sisa[$i]>0){
                goto cetakproses;
            }
            // Kondisi yang akan dibuat untuk table yang memiliki waktu tanpa melakukan proses (kosong ditengah)
            // if($lama[$i]>$quantum){
            //     $sisa[$i] = $lama[$i]-$quantum;
            // }
        }
    ?>
    </tr>
</table>