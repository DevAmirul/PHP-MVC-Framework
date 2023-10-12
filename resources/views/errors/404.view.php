<?php setTitle($code);?>
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <h1 class="display-1 fw-bold"><?=$code?></h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span> The page you are looking for does not exist.</p>
        <p class="lead">
            <?php
if (isset($message)) {
    echo $message;
}
?>
            </p>
        <a href="<?=(config('app', 'home_url'))?>" class="btn btn-primary">Go Home</a>
    </div>
</div>