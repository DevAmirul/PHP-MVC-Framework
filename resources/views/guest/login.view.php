<?php setTitle('login');?>

<div class="container">
    <div class="row">
        <div class="col-4 m-auto ">

            <form action="/login" method="POST" class="mt-5">

                <?= setCsrf() ?>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
                <a class="mx-5" href="/forgot-password">Forgot password?</a>
                <div><br>
                    <a class="" href="/register">Create an account</a>
                </div>

            </form>

        </div>
    </div>
</div>