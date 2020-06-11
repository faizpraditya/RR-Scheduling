<?php
    for ($i=0; $i < $jmlProses-1; $i++) { 
        for ($j=$i+1; $j < $jmlProses; $j++) { 
            if($noProses[$i]>$noProses[$j]){
                swap($noProses[$i],$noProses[$j]);
                swap($tiba[$i],$tiba[$j]);
                swap($lama[$i],$lama[$j]);
                swap($lamafix[$i],$lamafix[$j]);
                swap($mulai[$i],$mulai[$j]);
                swap($selesai[$i],$selesai[$j]);
                swap($wt[$i],$wt[$j]);
                swap($tat[$i],$tat[$j]);

            }
        }
    }
?>