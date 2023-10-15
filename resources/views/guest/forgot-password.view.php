<?php setTitle('Forgot password');?>

<div class="container">
    <div class="row">
        <div class="col-4 m-auto ">

            <?php if (hasSuccess()): ?>
                <div class="alert alert-success mt-3" role="alert">
                    <?=success()?>
                </div>
            <?php endif?>

            <form action="/forgot-password" method="POST" class="mt-5">

                <?=setMethod('put')?>

                <?=setCsrf()?>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Your Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    <div id="emailHelp" class="form-text"> <?php errors('email')?> </div>

                </div>
                <button type="submit" class="btn btn-primary">Send</button>

            </form>

            <?php if (hasError()): ?>
                <div class="alert alert-success mt-3" role="alert">
                    <?=error()?>
                </div>
            <?php endif?>

        </div>
    </div>
</div>