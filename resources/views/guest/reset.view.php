<?php setTitle('Reset password');?>

<div class="container">
    <div class="row">
        <div class="col-4 m-auto ">

            <?php if (hasSuccess()): ?>
                <div class="alert alert-success mt-3" role="alert">
                    <?=success()?>
                </div>
            <?php endif?>

            <form action="/reset" method="POST" class="mt-5">

                <?=setMethod('put')?>
                <?=setCsrf()?>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"> <?=errors('name')?> </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword">
                    <div id="emailHelp" class="form-text"> <?=errors('password')?> </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPasswordConfirm" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="exampleInputPasswordConfirm">
                    <div id="emailHelp" class="form-text"> <?=errors('confirm_password')?> </div>
                </div>

                <button type="submit" class="btn btn-primary">Reset</button>

            </form>

            <?php if (hasError()): ?>
                <div class="alert alert-success mt-3" role="alert">
                    <?=error()?>
                </div>
            <?php endif?>
            
        </div>
    </div>
</div>