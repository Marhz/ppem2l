<?php
	foreach($users as $user)
	{
		?>
		<h4><?= $user['login']; ?></h4>
		<?php
		foreach($user['formations'] as $formation)
		{
			?>
			<p><?= $formation['titre']; ?>
			<form action="valider" method="post">
				<input type="hidden" value="<?= $formation['id_formation']?>" name="id_f">
				<input type="hidden" value="<?= $user['id']?>" name="id_u">
				<input type="hidden" value="1" name="valide">
				<input type="submit" value="valider">
			</form>
			<form action="valider" method="post">
				<input type="hidden" value="<?= $formation['id_formation']?>" name="id_f">
				<input type="hidden" value="<?= $user['id']?>" name="id_u">
				<input type="hidden" value="2" name="valide">
				<input type="submit" value="refuser">
			</form>
			<?php
		}
	}