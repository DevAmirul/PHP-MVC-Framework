
<?php
$form = new App\Core\Form\Form( $model );
?>

<h1>Login page</h1>

<?=$form->begin( '', 'POST' );?>
<?=$form->field( 'Email', 'email', 'email' )?>
<?=$form->field( 'Password password', 'password', 'password' )?>
<?=$form->submit()?>
<?=$form->end()?>
