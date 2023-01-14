
<?php
$form = new App\Core\Form\Form( $model );

$this->title = 'Login';

?>

<h1 class="mt-5 mb-5">Login page</h1>

<?=$form->begin( '', 'POST' );?>
<?=$form->field( 'Email', 'email', 'email' )?>
<?=$form->field( 'Password', 'password', 'password' )?>
<?=$form->submit('','Login')?>
<?=$form->end()?>
