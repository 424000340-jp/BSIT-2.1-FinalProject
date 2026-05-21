<?php
// Enforce strict post request submission tracking
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Capture incoming form payload parameters
    $name    = isset($_POST['name'])    ? trim($_POST['name'])    : '';
    $email   = isset($_POST['email'])   ? trim($_POST['email'])   : '';
    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    // 2. Server-side validation check (Ensures fields aren't empty)
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "<div style='color: red; font-family: sans-serif; padding: 20px;'>";
        echo "<h3>Error: All input fields are required.</h3>";
        echo "<p><a href='index.html'>Click here to return to the form</a></p>";
        echo "</div>";
        exit;
    }

    // 3. Apply XSS Sanitization guards to prevent malicious script execution
    $clean_name    = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $clean_email   = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $clean_subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
    $clean_message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

    // 4. Output a clean, assignment-compliant confirmation dashboard summary
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Message Transmission Receipt</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow border-0">
                        <div class="card-body p-5">
                            <h1 class="text-success h3 fw-bold mb-3">✓ Message Transmitted Successfully</h1>
                            <p class="text-muted mb-4">Your dynamic backend application handler processed the submission securely.</p>
                            
                            <hr class="my-4">
                            
                            <h5 class="fw-bold text-secondary mb-3">Payload Receipt Summary</h5>
                            <ul class="list-group list-group-flush mb-4 rounded border">
                                <li class="list-group-item"><strong>Sender Identity:</strong> <?php echo $clean_name; ?></li>
                                <li class="list-group-item"><strong>Electronic Mail Address:</strong> <?php echo $clean_email; ?></li>
                                <li class="list-group-item"><strong>Subject Line:</strong> <?php echo $clean_subject; ?></li>
                                <li class="list-group-item p-3 bg-white">
                                    <strong>Sanitized Message Payload:</strong><br>
                                    <p class="text-dark mt-2 mb-0 border rounded p-3 bg-light" style="white-space: pre-wrap;"><?php echo $clean_message; ?></p>
                                </li>
                            </ul>
                            
                            <a href="index.html" class="btn btn-outline-primary px-4">Return to Portfolio Site</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
} else {
    // Intercept rogue structural direct request routing
    header("Location: index.html");
    exit;
}
?>