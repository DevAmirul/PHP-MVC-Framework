<?php
$form = new App\Core\FormTemplate\Form( $model );

$this->title = 'Register';
?>
<h1 class="mt-3 mb-3">Register page</h1>


<?=$form->begin( '', 'POST' );?>
<?=$form->field( 'Full Name', 'text', 'fullName' )?>
<?=$form->field( 'Email', 'email', 'email' )?>
<?=$form->field( 'Password', 'password', 'password' )?>
<?=$form->field( 'Confirm password', 'password', 'confirmPassword', )?>
<?=$form->submit('','Sign up')?>
<?=$form->end()?>
