<header>
		<h3 >
			Update of admin <?= $data['id'] ?>
		</h3>
		
	</header>
	<form id="admin_<?= $action ?>" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">

	<!--  Form action buttons - Begin -->
	<div>
		<input id="update" name="update" class="btn btn-primary" type="submit" value="Mettre à jour" />
	</div>
	<!--  Form action buttons - End -->
