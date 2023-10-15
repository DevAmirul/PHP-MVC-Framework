<?php setTitle('login');?>


<div class="container">
    <div class="row">
        <div class="col-4 m-auto ">

        <?php if (flushMessage()->has('success')): ?>
            <div class="alert alert-success mt-3" role="alert">
                <?=flushMessage()->get('success')?>
            </div>
        <?php endif?>

        <form action="/login" method="POST" class="mt-5">

            <?=setCsrf()?>

            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">

                <div id="emailHelp" class="form-text"> <?= errors('email')?> </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword">

                <div id="emailHelp" class="form-text"> <?= errors('password')?> </div>
            </div>

            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div> -->

            <button type="submit" class="btn btn-primary">Login</button>

            <a class="mx-5" href="/forgot-password">Forgot password?</a>
            <div>
                <br>
                <a class="" href="/register">Create an account</a>
            </div>

        </form>

        <?php if (flushMessage()->has('error')): ?>
            <div class="alert alert-success mt-3" role="alert">
                <?= error() ?>
            </div>
        <?php endif?>


        </div>
    </div>
</div>