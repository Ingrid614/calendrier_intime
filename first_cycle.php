<?php require_once("connexion.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>cycle</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login_page_styles.css">
</head>
<body>
<section class="vh-100">

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">
	  <h1 style="text-align:left;margin-left:45px; color:#555B61;font-family:italic;margin-top:45px;margin-bottom:20px;">Bienvenue <span style="color:#ce5a82;font-family:italic;"><?php
        $user_id = $_GET["id"];
        $req = $pdo->prepare("SELECT (user_name) FROM users where user_id=?");
        $params = array($user_id);
        $req->execute($params);
        $result = $req->fetch();
        $user_name = $result['user_name'];
        echo($user_name);
        ?>
        </span>
        </h1>
        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
		
          <form method="POST" action="save_cycle.php?id=<?php echo($_GET["id"]);?>" style="width: 23rem;">
		  
            <p><h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;"></h3></p>
            <div class="form-outline mb-4">
              <input type="date" name="date" id="form2Example18" class="form-control form-control-lg" />
              <label class="form-label" for="form2Example18">Quand avez-vous eu vos dernieres regles?</label>
            </div>

            <div class="form-outline mb-4">
              <input type="text" name="cycle" id="form2Example28" class="form-control form-control-lg" />
              <label class="form-label" for="form2Example28">Combien de jours comptent votre cycle?</label>
            </div>

			<div class="form-outline mb-4">
              <input type="text" name="duree" id="form2Example38" class="form-control form-control-lg" />
              <label class="form-label" for="form2Example38">Vos regles durent combien de jours?</label>
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="submit" style="background-color:#ce5a82;">Enregistrer</button>
            </div>

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
        <div class="card-header" style="background-color:#CE007C; color:#fff; font-weight:bold;">BIENVENUE <?php
        $user_id = $_GET["id"];
        $req = $pdo->prepare("SELECT (user_name) FROM users where user_id=?");
        $params = array($user_id);
        $req->execute($params);
        $result = $req->fetch();
        $user_name = $result['user_name'];
        echo($user_name);
        ?>
        </div>
		<div class="card-body">
			<form method="POST" action="save_cycle.php?id=<?php echo($_GET["id"]);?>">
				<div class="form-group">
					<label class="label-control">Quand avez-vous eu vos dernieres regles?</label>
					<input type="date" name="date" class="form-control">
				</div>
				<div class="form-group">
					<label class="label-control">Combien de jours compte votre cycle?</label>
					<input type="text" name="cycle" class="form-control">
				</div>
                <div class="form-group">
					<label class="label-control">Vos regles durent combien de jours?</label>
					<input type="text" name="duree" class="form-control">
				</div>
				<br>
				<div class="form-group">
					<button type="submit" class="submit_button" style="color:#fff; font-weight:bold;">Enregistrer</button>
				</div>
			</form>
		</div>
	</div>
</div> -->
</body>
</html>