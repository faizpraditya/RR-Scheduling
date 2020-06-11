<!DOCTYPE html>
<html>
<head>

    <title>Algoritma Round Robin</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="title.png">

    <?php include 'header.php'; ?>
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
        <h1 class="display-4">Gantt Chart & Tabel</h1>
        <form action="" method="post">
            <div class="form-group">
                <br />
                <h3>1. Gantt Chart</h3>
                <?php include 'table1a.php'; ?>
                <?php include 'table1b.php'; ?>
                <?php include 'swap.php'; ?>
                <br />
                <h3>2. Tabel</h3>
                <?php include 'table2.php'; ?>
                <table class="table">
                    <tr>
                        <td align="right" colspan="10">
                            <a class="btn btn-primary" href="start.php">Hitung lagi</a>
                        </td>
                    </tr> 
                </table>
            </div>
        </form>
      </div>
      </div>
    </div>
</div>

    <script type="text/javascript">
        alert("TOTAL WT = <?php 
            for ($i=0; $i < $jmlProses; $i++){
                if ($i==0) {
                    echo($wt[$i]);
                }else{
                    echo(" + ".$wt[$i]);
                }
                
            } 
            echo " = ".$twt
        ?>");
    </script>


</body>
</html>