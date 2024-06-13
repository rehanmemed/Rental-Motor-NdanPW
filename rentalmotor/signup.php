<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>NdanPW || Signup</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet" />
</head>
<body>
    <!--header-->
    <header>
        <div class="container">
            <h1><a>NdanPW</a></h1>
        </div>
    </header>
    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Registrasi Akun</h3>
            <div class="box">
                <form action="signupproses.php" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" name="nama" size="20" placeholder="Nama Lengkap" class="input-control" required /></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="email" size="20" placeholder="Email Anda" class="input-control" required /></td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td><input type="number" name="telepon" size="20" placeholder="No Telepon" class="input-control" required /></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" name="alamat" size="20" placeholder="Alamat" class="input-control" required /></td>
                        </tr>
                        <tr>
                            <td>Masukkan Kartu Identitas (KTP/SIM/KK)</td>
                            <td><input type="file" name="kartu_identitas" class="input-control" required /></td>
                        </tr>
                        <tr>
                            <td>Masukkan Username</td>
                            <td><input type="text" name="username" size="20" placeholder="Username" class="input-control" required /></td>
                        </tr>
                        <tr>
                            <td>Masukkan Password</td>
                            <td><input type="password" name="password" size="20" placeholder="Password" class="input-control" required /></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="submit" size="20" class="btn" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2023 - @raihanardianto.</small>
        </div>
    </footer>
</body>
</html>
