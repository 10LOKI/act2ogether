<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Register</h2>
<form method="post" action="/auth/register">
  <label>Name</label>
  <input type="text" name="name">
  <label>Email</label>
  <input type="email" name="email">
  <label>Password</label>
  <input type="password" name="password">
  <button type="submit">Register</button>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
