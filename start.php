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
        <h1 class="display-4">Input Jumlah Proses</h1>
        <form action="proses.php" method="post">
            <div class="form-group">
                <table class="table table-hover">
                    <tr>
                        <td width="30%">
                            <label for="validationDefault01">Jumlah Proses</label>
                        </td>
                        <td colspan="4">
                            <input class="form-control" maxlength="6" id="validationDefault01" placeholder="Jumlah Proses" type="number" min="1" max="10" name="jmlProses" required>
                        </td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
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