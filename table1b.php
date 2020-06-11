<table border=0>
    <tr>
        <td>0</td>
    <?php
        // Pemulihan nilai lama
        $cek=0;
        for ($i=0; $i < $jmlProses ; $i++) { 
            $lama[$i]=$lamafix[$i];
            $aw[$i]=0;
            $ak[$i]=$tiba[$i];
        }
        
        // Proses cetak noAkhir
        $noAkhir = 1;
        cetakwaktu:
        $loop++; // untuk wt
        $cetakdulu = 0;
        for($i=0;$i<$jmlProses;$i++){
            $sisa[$i]=$lama[$i]-$quantum;
            $noAwal=$noAkhir-1;
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
        <td align="right" width="<?php echo $ptabel*40 ?>px"><?php echo  $noAkhir ?></td>
    <?php
                        $aw[$i]=$noAwal;
                        $selesai[$i]=$noAkhir;
                        $wt[$i]=$wt[$i]+($aw[$i]-$ak[$i]);
                        $ak[$i]=$noAkhir;
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
                    if ($sisa[$k]==0) {
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
        <td align="right" height="40px" width="<?php echo $ptabel*40 ?>px"><?php echo $noAkhir; ?></td>
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
        <td align="right" width="<?php echo $ptabel*40 ?>px"><?php echo $noAkhir; ?></td>
    <?php
                        }
                        // echo "[noAkhir = $noAkhir]";
                        $noAkhir++;
                    }
                    $i--;
                }
                // kondisi jika bolong, proses belum datang, dan ada sisa di proses sebelumnya (done)
                else {
                    while ($sisa[$cetakdulu]<=0) {
                        $cetakdulu++;
                    }
                    // if ($sisa[$cetakdulu]<=0) {
                    //     $cetakdulu++;
                    // }
                    // echo "*WT [".($cetakdulu)."] = ".$wt[$cetakdulu]." + ".$noAwal." - ".$selesai[$cetakdulu]." | ";
                    $wt[$cetakdulu]=$wt[$cetakdulu]+($noAwal-$selesai[$cetakdulu]);
                    if ($sisa[$cetakdulu]>0) {
                        $sisa[$cetakdulu]=$lama[$cetakdulu]-$quantum;
                        if($sisa[$cetakdulu]<=0){
                            $sisa[$cetakdulu]=0;
                        }
                        $gproses=$lama[$cetakdulu]-$sisa[$cetakdulu];
                        $ptabel = 0;
                        for($j=0;$j<$gproses;$j++){
                            $ptabel=$noAkhir-$noAwal;
                            if($j==$gproses-1){
    ?>
        <td align="right" width="<?php echo $ptabel*40 ?>px"><?php echo $noAkhir ?></td>
    <?php
                                $aw[$cetakdulu]=$noAwal;
                                $selesai[$cetakdulu]=$noAkhir;
                                $wt[$cetakdulu]=$wt[$cetakdulu]+($aw[$cetakdulu]-$ak[$cetakdulu]);
                                $ak[$cetakdulu]=$noAkhir;
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
            // echo "<br>i = $i | ";
        }

        for($i=0;$i<$jmlProses;$i++){
            // Untuk debug
            // echo "loop ke $i -> ";
            // echo "sisa[$i] = $sisa[$i]<br>";
            if($sisa[$i]>0){
                goto cetakwaktu;
            }
        }
    ?>
    </tr>
</table>