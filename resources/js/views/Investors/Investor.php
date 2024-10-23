<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investor Login</title>
    <link rel="stylesheet" href="<?= ('assets/css/style.css') ?>">
</head>
<body>

<div class="container">
    <div class="login-form">
        <h2>Investor Login</h2>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

<form action="<?= ('investor/login_check') ?>" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>

        <div class="mt-3">
            <a href="<?= ('forgot-password') ?>">Forgot Password?</a>
        </div>
    </div>
</div>

</body>
</html>
