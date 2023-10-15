<?php setTitle('Forgot password');?>

<div class="container">
    <div class="row">
        <div class="col-4 m-auto ">

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

            <?php
                error();
            ?>

        </div>
    </div>
</div>