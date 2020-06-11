<?php
    $jmlProses = 0;

    // sub adalah input name submit (cek html)
    if(isset($_POST['sub'])) {
        $jmlProses = ($_POST['jmlProses']);
    }

    if(isset($_POST['res'])) {
        $jmlProses = 0;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Algoritma Round Robin</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="title.png">
</head>
<body>
<div class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Round Robin Scheduling</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Simulator <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <span class="navbar-text">
          Sistem Operasi
        </span>
      </div>
    </nav>
</div>
<div class="main">
    <div class="container main-content">
      <div class="col-12">
      <div class="jumbotron">
        <h1 class="display-4">Input detail proses</h1>
        <form action="hasil.php" method="post">
            <div class="form-group">
                <table class="table table-hover">
                  <thead>
                    <tr>
                        <th width="20%">Nama Proses</th>
                        <th>Waktu Tiba</th>
                        <th>Burst Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $i=0;
                        for ($i=0; $i < $jmlProses; $i++) {
                    ?>
                    <tr>
                        <td><b>P<?php echo $i+1?></b></td>
                        <td>
                            <input class="form-control" id="validationDefault01" placeholder="Waktu Tiba" type="number" min="0" max="20" name="tiba<?php echo$i?>" required>
                        </td>
                        <td>
                            <input class="form-control" id="validationDefault01" placeholder="Burst Time" type="number" min="1" max="20" name="lama<?php echo$i?>" required>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                <table class="table">
                    <tr>
                        <th width="20%">
                            <label for="validationDefault01">Quantum Time</label>
                        </th>
                        <td>
                            <input class="form-control" id="validationDefault01" placeholder="Quantum" type="number" min="1" max="10" name="quantum" required>
                        </td>
                    </tr>
                    <input class="form-control" type="hidden" name="jmlProses" value="<?php echo$jmlProses?>" readonly>
                  </tbody>
                </table>
                <table class="table">
                    <tr>
                        <td>
                            <a class="btn btn-secondary" href="start.php">Kembali</a>
                        </td>
                        <td></td>
                        <td align="right">
                            <input class="btn btn-primary" type="submit" name="sub" value="Next">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
      </div>
      </div>
    </div>
</div>
</body>
</html>