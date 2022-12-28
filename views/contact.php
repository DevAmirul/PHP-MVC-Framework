<h1>contact us</h1>
<?php
    echo $name;
?>
<form action="" method="POST">
  <div class="mb-3">
    <label class="form-label">Subject</label>
    <input type="text" name="subject" class="form-control"  >
  </div>
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control"  >
    <div id="emailHelp" name="email" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Body</label>
    <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
