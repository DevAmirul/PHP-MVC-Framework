<h1>Register page</h1>


<?php
$form = new App\Core\Form\Form( $model );
?>
<?=$form->begin( '', 'POST' );?>
<?=$form->field( 'Full Name', 'text', 'fullName' )?>
<?=$form->field( 'Email', 'email', 'email' )?>
<?=$form->field( 'Password password', 'password', 'password' )?>
<?=$form->field( 'Confirm password', 'password', 'confirmPassword', )?>
<?=$form->submit()?>
<?=$form->end()?>
