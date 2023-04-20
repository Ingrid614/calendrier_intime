<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login_page_styles.css">
</head>
<body>
<section class="vh-100">

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">
			<h1 style="text-align:left;margin-left:45px; color:#555B61;font-family:italic;margin-top:45px;margin-bottom:20px;">Inscription</h1>
        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
		
          <form method="POST" action="save.php" style="width: 23rem;">
		  
            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;"></h3>
            <div class="form-outline mb-4">
              <input type="email" name="email" id="form2Example18" class="form-control form-control-lg" />
              <label class="form-label" for="form2Example18">E-mail</label>
            </div>

			<div class="form-outline mb-4">
              <input type="text" name="name" id="form2Example38" class="form-control form-control-lg" />
              <label class="form-label" for="form2Example38">Nom d'utilisateur</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="password" id="form2Example28" class="form-control form-control-lg" />
              <label class="form-label" for="form2Example28">Mot de passe</label>
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="submit" style="background-color:#ce5a82;">Enregistrer</button>
            </div>
            <p>Vous avez deja un compte? <a href="index.php" class="link-info">Se connecter</a></p>

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="images/menstrual_cycle2.jpeg"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
<!-- <div class="container space col-md-6" style="margin-top: 60px">
	<div class="card" style="width:550px">
		<div class="card-header" style="background-color:#CE007C; color:#fff; font-weight:bold;">INSCRIPTION</div>
		<div class="card-body">
			<form method="POST" action="save.php">
                <div class="form-group">
					<label class="label-control">EMAIL</label>
					<input type="email" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label class="label-control">NAME</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div  class="form-group">
					<label class="label-control">PASSWORD</label>
					<input type="password" name="password" class="form-control">
				</div>
				<br>
				<div class="form-group">
					<button type="submit" class="submit_button" style="color:#fff; font-weight:bold;">SIGN UP</button>
				</div>
				<div  style="color:#CE007C;font-size:20px">
					<a href="index.php">already have account? Log in</a>
				</div>
			</form>
		</div>
	</div>
</div> -->
</body>
</html>