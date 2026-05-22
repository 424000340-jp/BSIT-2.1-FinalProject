<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = isset($_POST['name'])    ? trim($_POST['name'])    : '';
    $email   = isset($_POST['email'])   ? trim($_POST['email'])   : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    if (empty($name) || empty($email) || empty($message) || strlen($message) < 20) {
        echo "<div style='color: #ff3333; background: #050b1e; font-family: monospace; padding: 40px; border: 2px solid #ff3333; text-align: center; margin: 50px auto; max-width: 600px; border-radius: 8px;'>";
        echo "<h3>GATEWAY SECURITY ERROR: CRITICAL VALIDATION FAILURE</h3>";
        echo "<p style='color: #888;'>Data input fields are either incomplete or payload length requirement was violated.</p>";
        echo "<p><a href='contact.html' style='color: #00f0ff; text-decoration: none; font-weight: bold;'>&larr; Re-initialize Secure Connection Form</a></p>";
        echo "</div>";
        exit;
    }

    $clean_name    = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $clean_email   = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $clean_message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>System Core | Transaction Receipt</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body class="d-flex flex-column h-100 text-white bg-dark-custom">

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top premium-navbar">
    <div class="container">
      <a class="navbar-brand fw-bold fs-4" href="index.html">SYSTEM<span class="text-info">CORE</span></a>
    </div>
  </nav>

  <main class="container my-auto py-5 mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="p-5 rounded-4 cyber-panel text-start position-relative">
          
          <div class="text-center mb-4">
            <span class="badge bg-success-glow text-success fw-bold mb-2 px-3 py-2">● TRANSACTION EXECUTED SUCCESSFULLY</span>
            <h2 class="fw-bold text-white">Payload Receipt Summary</h2>
            <p class="text-white-50 small mb-2">Your dynamic backend application handler processed the submission securely.</p>
            
            <div class="font-monospace small text-white-50 border border-secondary d-inline-block px-3 py-1 rounded bg-dark mt-2" style="font-size: 0.72rem;">
              EXECUTION TIMESTAMP: <span class="text-warning"><?php echo date('Y-m-d H:i:s'); ?> UTC+8</span> | PORT: <span class="text-info">80/APACHE</span>
            </div>
          </div>

          <hr class="border-secondary my-4">

          <div class="mb-3">
            <span class="text-info d-block small fw-bold tracking-wider mb-1">REGISTERED OPERATOR IDENTITY</span>
            <div class="p-3 bg-dark rounded border border-secondary text-white font-monospace"><?php echo $clean_name; ?></div>
          </div>

          <div class="mb-3">
            <span class="text-info d-block small fw-bold tracking-wider mb-1">NETWORK COORDINATE PATHWAY</span>
            <div class="p-3 bg-dark rounded border border-secondary text-white font-monospace"><?php echo $clean_email; ?></div>
          </div>

          <div class="mb-4">
            <span class="text-info d-block small fw-bold tracking-wider mb-1">TRANSMITTED MESSAGE LOG PAYLOAD</span>
            <div class="p-3 bg-dark rounded border border-secondary text-light small font-monospace" style="white-space: pre-wrap;"><?php echo $clean_message; ?></div>
          </div>

          <div class="text-center pt-2">
            <a href="index.html" class="btn btn-outline-info px-5 py-2 fw-bold btn-sm">&larr; Return to Central Dashboard</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="py-4 text-center text-white-50 mt-auto border-top border-dark">
    <div class="container">
      <p class="m-0 small fw-bold text-white">&copy; 2026 Academic Development Infrastructure Group | Server Validation Matrix Active</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
} else {
    header("Location: contact.html");
    exit;
}
?>