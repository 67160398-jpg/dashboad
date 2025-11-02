<?php require __DIR__ . '/config_mysqli.php'; require __DIR__ . '/csrf.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign in</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #6a11cb, #2575fc); 
      font-family: "Segoe UI", Arial, sans-serif;
    }
    .login-card {
      max-width: 420px;
      width: 100%;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    .card-body h1 {
      color: #4a148c;
      font-weight: 600;
    }
    .btn-primary {
      background: linear-gradient(90deg, #6a11cb, #2575fc);
      border: none;
      transition: 0.3s;
    }
    .btn-primary:hover {
      background: linear-gradient(90deg, #5a0fb0, #1b63e0);
      transform: translateY(-2px);
    }
  </style>
</head>
<body>
  <main class="container d-flex justify-content-center">
    <div class="card shadow-sm login-card p-3 p-md-4">
      <div class="card-body">
        <h1 class="h4 mb-3 text-center">Welcome 👋</h1>

        <?php if (!empty($_SESSION['flash'])): ?>
          <div class="alert alert-danger py-2">
            <?php echo htmlspecialchars($_SESSION['flash']); unset($_SESSION['flash']); ?>
          </div>
        <?php endif; ?>

        <form method="post" action="login_process.php" novalidate>
          <input type="hidden" name="csrf" value="<?php echo htmlspecialchars(csrf_token()); ?>">
          <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email" placeholder="you@example.com" required>
          </div>
          <div class="mb-2">
            <label class="form-label d-flex justify-content-between" for="password">
              <span>Password</span>
              <a href="#" class="small text-decoration-none" onclick="alert('Ask admin to reset 🙂');return false;">Forgot?</a>
            </label>
            <input class="form-control" type="password" id="password" name="password" placeholder="••••••••" required>
          </div>
          <div class="d-grid mt-3">
            <button class="btn btn-primary" type="submit">Sign in</button>
          </div>
        </form>

        <p class="text-center text-muted mt-3 mb-0 small">Demo only — do not use weak passwords.</p>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
