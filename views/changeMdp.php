<?php require 'views/plugins/profilMenu.php' ?>
<div class="container">
	<form method="POST" action="changeMdp">
		<div class="row">
			<div class="form-group">
				<label for="oldpassword">Mot de passe actuel : </label>
				<input type="password" name="oldpassword" id="oldpassword" class="form-control " placeholder="" value="" required />
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="newpassword">Nouveau mot de passe :</label>
				<input type="password" name="newpassword" id="newpassword" class="form-control " placeholder="" value="" required />
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="newpasswordconfirm">Confirmation du nouveau mot de passe :</label>
				<input type="password" name="newpasswordconfirm" id="newpasswordconfirm" class="form-control " placeholder="" value="" required />
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<input type="submit" name="submit" class="form-control" value="Valider"/>
			</div>
		</div>
	</form>
</div>