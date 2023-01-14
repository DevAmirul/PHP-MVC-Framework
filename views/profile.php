<?php
use App\Core\Application;
$this->title = 'Profile';
?>

<h2 class="mt-5">Profile Page</h2>

<h3 class="mt-2">Welcome <?=Application::$app->session->get( 'user' )->fullName?></h3>

<p class="mt-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet aliquam reiciendis suscipit inventore id veniam, at saepe ratione quaerat nihil, labore ut soluta. Quia omnis velit sint quis autem est.</p>


<p class="mt-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet aliquam reiciendis suscipit inventore id veniam, at saepe ratione quaerat nihil, labore ut soluta. Quia omnis velit sint quis autem est.</p>