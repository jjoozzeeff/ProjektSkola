<?php
include "parts/header.php";
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $auth = new Auth($db);

    $error = $auth->login($username, $password);
}
?>
<div class="container p-5">
    <form class="p-5" style="background-color: white; border-radius: 10px;" method="POST" action="">
        <div class="mb-3">
            <label for="username" class="form-label">Meno</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" style="background-color: #ededed;">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Heslo</label>
            <input type="password" class="form-control" id="password" name="password" style="background-color: #ededed;">
        </div>
        <?php if ($error) : ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Potvrdiť</button>
    </form>
</div>
<?php include "parts/footer.php"; ?>