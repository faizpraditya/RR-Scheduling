<table border=0>
    <tr>
        <td>0</td>
    <?php
        // Pemulihan nilai lama
        for ($i=0; $i < $jmlProses ; $i++) { 
            $lama[$i]=$lamafix[$i];
        }

        // Proses cetak noAkhir
        $noAkhir = 1;
        cetakwaktu:
        $loop++; // untuk wt
        // For i untuk mencetak banyak tabel
        for($i=0;$i<$jmlProses;$i++){
            $noAwal=$noAkhir-1; // wes bener
            // untuk wt
            if ($loop>1&&$sisa[$i]>0) {
                $wt[$i]=$wt[$i]+($noAwal-$selesai[$i]);
            }
            $sisa[$i]=$lama[$i]-$quantum;
            if($sisa[$i]<=0){
                $sisa[$i]=0;
            }
            $gproses=$lama[$i]-$sisa[$i];
            $ptabel = 0;
            // For j untuk menghitung lama proses pertabel
            for($j=0;$j<$gproses;$j++){
                $ptabel++;
                if($j==$gproses-1){
    ?>
        <td align="right" width="<?php echo $ptabel*40 ?>px"><?php echo $noAkhir ?></td>
    <?php
                    $selesai[$i]=$noAkhir;
                }
                $noAkhir++;
            }
            $lama[$i]=$sisa[$i];
        }
        for($i=0;$i<$jmlProses;$i++){
            if($sisa[$i]>0){
                goto cetakwaktu;
            }
        }
    ?>
    </tr>
</table>

<table border=0>
    <tr>
        <td>0</td>
    <?php
        // Pemulihan nilai lama
        for ($i=0; $i < $jmlProses ; $i++) { 
            $lama[$i]=$lamafix[$i];
        }
        
        // Proses cetak noAkhir
        $noAkhir = 1;
        cetakwaktu:
        $loop++; // untuk wt
        $cetakdulu = 0;
        for($i=0;$i<$jmlProses;$i++){
            $noAwal=$noAkhir-1; // wes bener
            // untuk wt
            if ($loop>1&&$sisa[$i]>0) {
                $wt[$i]=$wt[$i]+($noAwal-$selesai[$i]);
            }
            // Looping j untuk mencetak proses per blok
            // kondisi jika tidak bolong dan proses sudah datang (done)
            if ($tiba[$i]<=$noAkhir) {
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
        <td align="right" width="<?php echo $ptabel*40 ?>px"><?php echo $noAkhir ?></td>
    <?php
                        $selesai[$i]=$noAkhir;
                    }
                    // Kondisi proses pertama
                    if($i==0&&$j==0){
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
                $lama[$i]=$sisa[$i];
            }
            // kondisi jika bolong dan proses belum datang
            else {
                for ($k=0; $k < $i; $k++) { 
                    if ($sisa[$k]==0) {
                        $cek++;
                    }
                }
                // kondisi jika bolong, proses belum datang, dan tidak ada sisa di proses sebelumnya (done)
                if ($cek==$i) {
                    for($j=0;$j<$gproses;$j++){
                        $ptabel++;
                        if($j==$gproses-1){
    ?>
        <td align="right" width="<?php echo $ptabel*40 ?>px"><?php echo $noAkhir ?></td>
    <?php
                        }
                        $noAkhir++;
                        $i--;
                    }
                }
                // kondisi jika bolong, proses belum datang, dan ada sisa di proses sebelumnya (belum clear)
                else {
                    echo "<br />";
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
        <td align="right" width="<?php echo $ptabel*40 ?>px"><?php echo $noAkhir ?></td>
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
                        $i--;
                        $lama[$cetakdulu]=$sisa[$cetakdulu];
                    }
                    $cetakdulu++;
                }
            }
        }

        for($i=0;$i<$jmlProses;$i++){
            $tat[$i]=$selesai[$i]-$mulai[$i];
            $wt[$i]=$mulai[$i]-$tiba[$i];
            if($sisa[$i]>0){
                goto cetakwaktu;
            }
            // Kondisi yang akan dibuat untuk table yang memiliki waktu tanpa melakukan proses (kosong ditengah)
            // if($lama[$i]>$quantum){
            //     $sisa[$i] = $lama[$i]-$quantum;
            // }
        }
    ?>
    </tr>
</table>

<!-- Backup 29/04/2019 | 6:24 | tabel1b.php-->
<table border=0>
    <tr>
        <td>0</td>
    <?php
        // Pemulihan nilai lama
        $cek=0;
        for ($i=0; $i < $jmlProses ; $i++) { 
            $lama[$i]=$lamafix[$i];
        }
        
        // Proses cetak noAkhir
        $noAkhir = 1;
        cetakwaktu:
        $loop++; // untuk wt
        $cetakdulu = 0;
        for($i=0;$i<$jmlProses;$i++){
            $sisa[$i]=$lama[$i]-$quantum;
            $noAwal=$noAkhir-1; // wes bener
            // echo "WT [".($i)."] = ".$wt[$i]." + ".$noAwal." - ".$selesai[$i]." <br/> ";
            // untuk wt
            // problem wt = sebelum loop jadi 2, proses sudah berjalan lagi, jadi intinya belum ada kondisi untuk menambahkan wt di saat loop belum jadi 2 tapi sudah jalan lagi.
            // Rehat sejenak :)
            if ($loop>1&&$sisa[$i]<=0) {
                // $wt[$i]=$wt[$i]+($noAwal-$selesai[$i]);
                $wt[$i]=$wt[$i]+($selesai[$i]-$noAwal);
            }
            if ($cetakdulu>0) {
                // WT [Sekarang] = WT [Sekarang] + (noAwal Sekarang - selesai sebelum Sekarang)
                // echo "*WT [".($cetakdulu-1)."] = ".$wt[$cetakdulu-1]." + ".$noAwal." - ".$selesai[$i-1]." | ";
                // $wt[$cetakdulu-1]=$wt[$cetakdulu-1]+($noAwal-$selesai[$i-1]);
            }
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
                else if ($cek>$i) {
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

<!-- Backup 29/04/2019 | 6:50 | tabel1b.php / Cari wt lama -->

            if ($loop>1&&$sisa[$i]>0) {
                // $wt[$i]=$wt[$i]+($noAwal-$selesai[$i]);
                // $wt[$i]=$wt[$i]+($selesai[$i]-$noAwal);
            }
            if ($cetakdulu>0) {
                // $wt[$cetakdulu-1]=$wt[$cetakdulu-1]+($noAwal-$selesai[$i-1]);
            }