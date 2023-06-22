
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UKK SPP</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">

		  <form action="proses_login_siswa.php" method="post" autocomplete="off" class="sign-up-form">
              <!-- <div class="logo">
                <img src="../assets/images/logo.png" alt="easyclass" />
                <h4>easyclass</h4>
              </div> -->

              <div class="heading">
                <h2>Login Siswa</h2>
                <!-- <h6>Login Halaman Admin/Petugas</h6> -->
                <a href="#" class="toggle">Login Sebagai Admin/Petugas</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="nisn"
                  />
                  <label>NISN</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="text"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="nis"
                  />
                  <label>NIS</label>
                </div>

                <input type="submit" value="Login" class="sign-btn" />

                <!-- <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p> -->
              </div>
            </form>

            <form action="proses_login_admin.php" method="post" autocomplete="off" class="sign-in-form">
              <!-- <div class="logo">
                <img src="../assets/images/logo.png" alt="easyclass" />
                <h4>easyclass</h4>
              </div> -->

              <div class="heading">
                <h2>Login Admin</h2>
                <!-- <h6>Login Halaman Siswa</h6> -->
                <a href="#" class="toggle">Login Sebagai Siswa</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="username"
                  />
                  <label>Username</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="password"
                  />
                  <label>Password</label>
                </div>

                <input type="submit" value="Login" class="sign-btn" />

                <!-- <p class="text">
                  Forgotten your password or you login datails?
                  <a href="#">Get help</a> signing in
                </p> -->
              </div>
            </form>

            
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="../assets/images/image1.png" class="image img-1 show" alt="" />
              <img src="../assets/images/image2.png" class="image img-2" alt="" />
              <img src="../assets/images/image3.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Create your own courses</h2>
                  <h2>Customize as you like</h2>
                  <h2>Invite students to your class</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="../assets/js/app1.js"></script>
  </body>
</html>
