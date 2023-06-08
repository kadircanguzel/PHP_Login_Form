<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <div>
        <div id="main">
            <div class="text-center" id="info" style="border-radius: 29px;"><img id="ventaspro-logo"
                    src="assets/img/aybilgenweblogo.png" width="200">
                <h3 class="text-center" style="padding-top: 0px;margin-bottom: -33px;">Kullanıcı Girişi</h3>
                <form class="text-start" id="form-login" method="POST" action="login.php">
                    <div class="text-center">
                        <?php
                        if (isset($_GET['error'])) {
                            echo '<p style="color: red;">' . $_GET['error'] . '</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" id="lbl-usuario" for="txt-usuario">Kullanıcı Adı</label>
                        <input class="form-control" name="username" type="text" id="txt-usuario">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" id="lbl-password" for="txt-password">Şifre</label>
                        <input class="form-control" name="password" type="password" id="txt-password">
                    </div>
                    <button class="btn btn-secondary" type="submit">Giriş Yap<svg xmlns="http://www.w3.org/2000/svg"
                            width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                            class="bi bi-arrow-right text-end" style="margin-left: 3px;">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                            </path>
                        </svg></button>
                </form>

                <p class="text-center" style="padding-top: 14px;">Aybilgen Teknoloji A.Ş Copyright 2023 <br />Tüm
                    hakları saklıdır.</p>
            </div>
        </div>
    </div>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>

</html>