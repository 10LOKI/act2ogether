<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Login</h2>
<form method="post" action="/auth/login">
  <label>Email</label>
  <input type="email" name="email">
  <label>Password</label>
  <input type="password" name="password">
  <button type="submit">Login</button>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
