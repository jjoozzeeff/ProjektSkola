<?php include "include/header.php" ?>

<!--formulár-->
      <div class="container py-5">
      <form>
        <label for="form-control">Meno a priezvisko</label>
        <div class="row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Meno">
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Priezvisko">
            </div>
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Emailová adresa</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Vaša poznámka</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Súhlasím so spracovaním osobných údajov</label>
        </div>
        <button type="submit" class="btn btn-primary">Odoslať</button>

      </form>
    </div>
<?php include "include/footer.php" ?>
      