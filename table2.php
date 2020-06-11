<table class="table table-hover table-dark">
  <thead>
    <tr>
        <th scope="col">Proses</th>
        <th scope="col">Waktu Tiba</th>
        <th scope="col">Burst Time</th>
        <th scope="col">Mulai</th>
        <th scope="col">Selesai</th>
        <th scope="col">Waiting Time</th>
        <th scope="col">Turnaround Time</th>
    </tr>                      
  </thead>
  <tbody>
    <?php
        $i=0;
        for ($i=0; $i < $jmlProses; $i++) {
    ?>
    <tr>
        <th scope="row">P<?php echo $noProses[$i] ?></th>
        <td><?php echo $tiba[$i] ?></td>
        <td><?php echo $lamafix[$i] ?></td>
        <td><?php echo $mulai[$i] ?></td>
        <td><?php echo $selesai[$i] ?></td>
        <td><?php echo $wt[$i] ?></td>
        <td><?php echo $tat[$i] ?></td>
    </tr>
    <?php
            $twt+=$wt[$i];
            $ttat+=$tat[$i];
        }
        $awt=$twt/$jmlProses;
        $atat=$ttat/$jmlProses;
    ?>                  
  </tbody>
  <thead>
    <tr>
        <th scope="row">Quantum Time</th>
        <td><?php echo $quantum ?></td>
        <td></td>
        <td></td>
        <th scope="row">Average</th>
        <td><?php echo number_format($awt,2) ?></td>
        <td><?php echo number_format($atat,2) ?></td>
    </tr> 
  </thead>
</table>