<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body onload="zoom_auto()" class="sb-nav-fixed" style="font-family: Axiata;">
    <div style="background-image: url('assets/images/login.png'); width: 100%; height: 100%; position: fixed">
        <main>
            <div class="container-fluid" style="width: 35%;">
                <div class="card mb-4 border-0 rounded-lg"
                    style='margin-top: 40%; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);'>
                    <div class="card-header" style='background-color: rgb(255, 255, 255);'>
                        <h4 class="text-center my-2" style='color: white'><b><a
                                    style="text-decoration: none; color: #164396">E-Certification</a></b></h4>
                    </div>
                    <div class="card-body">
                        <form action="login-check.php" method="POST" class="login-email">
                            <div class="row mb-3">
                                <a for="username" style='font-weight: lighter'>Username</a>
                                <div class="col-sm-14">
                                    <input class="form-control" type="text" name="username" id="username"
                                        style='font-weight: lighter'>
                                    <div class='error' style='color:red; font-size: 12px;'>
                                        <?php if (isset($_GET["msg"]) && $_GET["msg"] == 'failed')
                                            echo '*Email / Password anda salah!'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="password" style='font-weight: lighter;'>Password</label>
                                <div class="col-sm-14">
                                    <input class="form-control" type="password" name="password" id="password"
                                        style='font-weight: lighter'>
                                    <div class='error' style='color:red; font-size: 12px;'>
                                        <?php if (isset($_GET["msg"]) && $_GET["msg"] == 'failed')
                                            echo '*Email / Password anda salah!'; ?>
                                    </div>
                                    <input style="color: black; font-size: 12px;" type="checkbox"
                                        onclick="myFunctionreg()"><a style="color: black; font-size: 12px;">
                                        Show
                                        Password</a>
                                </div>
                            </div>
                            <center>
                                <div class="mt-1 mb-0">
                                    <button name="login" type="submit" value="Log in" class="btn btn-primary login"
                                        style='box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);'><b>Login</b></button>
                                </div>
                            </center>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3" style='background-color: rgb(255, 255, 255);'>
                        <div class="small">
                            <i class="bi bi-telephone-outbound-fill" style='color: palegreen'></i>
                            <a href="#" style='color: black' target='blank_'> Need help?</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        function myFunctionreg() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <script type="text/javascript">
        function zoom_auto() {
            document.body.style.zoom = "100%"
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>