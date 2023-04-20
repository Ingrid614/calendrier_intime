
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>settings page</title>
	<link rel="stylesheet" type="text/css" href="css/settings_styles.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div id="settings_page">
	<?php require_once("entete.php"); ?>
		<div id="settings_section">
			<div id="second_div">
				<ul class="list-group">
				<li class="list-group-item d-flex justify-content-between align-items-center"><p class="display-4">PROFIL</p></li>
				<li class="list-group-item d-flex justify-content-between align-items-center"><p class="lead">Nom: <span class="badge badge-primary badge-pill"><?= $_SESSION['user_name'];?></span></p></li>
				<li class="list-group-item d-flex justify-content-between align-items-center"><p class="lead">Duree du cycle: <span class="badge badge-primary badge-pill"><?= $_SESSION['cycle']; ?></span> jours</p></li>
				<li class="list-group-item d-flex justify-content-between align-items-center"><p class="lead">Duree des menstruations : <span class="badge badge-primary badge-pill"><?= $_SESSION['duree'];?></span> jours</p></li>
				</ul>
				<button class="settings_button" type="button" data-toggle="modal" data-target="#Modal1">Modifier le cycle menstruel</button>
				<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="Modal1" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="ModalLabel">Modifier le cycle</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">x</span>
								</button>
							</div>
							
							<div class="modal-body">
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
										<div class="form-group modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-warning">Save</button>
										</div>
								</form>
							</div>
							
								
								
							
						</div>
					</div>
				</div>
				<button class="settings_button" type="button" data-toggle="modal" data-target="#Modal2">nouveau mot de passe</button>
				<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="Modal2" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="ModalLabel">Modifier le cycle</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">x</span>
								</button>
							</div>
							
							<div class="modal-body">
								<form method="POST" action="new_password.php?id=<?php echo($_GET["id"]);?>">
										<div class="form-group">
											<label class="label-control">Entrez l'ancien mot de passe</label>
											<input type="text" name="previous_password" class="form-control">
										</div>
										<div class="form-group">
											<label class="label-control">Entrez le nouveau mot de passe</label>
											<input type="text" name="new_password" class="form-control">
										</div>
										<div class="form-group">
											<label class="label-control">Confirmez le nouveau mot de passe</label>
											<input type="text" name="confirm_password" class="form-control">
										</div>
										<div class="form-group modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-warning">Save</button>
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>