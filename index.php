<?php
// Handle the form submission (CAPTCHA verification)
$isVerified = false;
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $turnstileResponse = $_POST['cf-turnstile-response'] ?? '';
    $secretKey = getenv('TURNSTILE_SECRET_KEY'); // Set this in Render environment variables

    if (empty($turnstileResponse)) {
        $errorMessage = "Please complete the CAPTCHA to proceed.";
    } else {
        // Verify with Cloudflare
        $url = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
        $data = [
            'secret' => $secretKey,
            'response' => $turnstileResponse,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ];

        $options = [
            'http' => [
                'method' => 'POST',
                'content' => http_build_query($data),
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $responseData = json_decode($result);

        if ($responseData && $responseData->success) {
            $isVerified = true;
        } else {
            $errorMessage = "Security verification failed. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Requisition Portal</title>
    <!-- Cloudflare Turnstile Script -->
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <style>
        :root {
            --primary: #0f172a;
            --primary-hover: #1e293b;
            --accent: #3b82f6;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --text: #334155;
            --text-light: #64748b;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: var(--bg);
            color: var(--text);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 1rem;
            box-sizing: border-box;
        }
        .card {
            background: var(--card-bg);
            padding: 3rem 2.5rem;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
            width: 100%;
            max-width: 500px;
            text-align: center;
            border: 1px solid #e2e8f0;
        }
        .icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            display: inline-block;
        }
        h1 {
            font-size: 1.5rem;
            margin: 0 0 0.75rem 0;
            color: var(--primary);
            font-weight: 700;
        }
        p.subtitle {
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 2.5rem;
        }
        .cf-turnstile {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
        button {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.875rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.2s, transform 0.1s;
        }
        button:hover {
            background-color: var(--primary-hover);
        }
        button:active {
            transform: scale(0.98);
        }
        .error {
            color: #b91c1c;
            background: #fef2f2;
            border: 1px solid #fecaca;
            padding: 0.75rem;
            border-radius: 8px;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
        }
        .success-message {
            margin-bottom: 2rem;
        }
        .success-message h2 {
            font-size: 1.25rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }
        .success-message p {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-top: 0;
        }
        .cta-btn {
            display: block;
            text-decoration: none;
            width: 100%;
        }
        .cta-btn button {
            background-color: var(--accent);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }
        .cta-btn button:hover {
            background-color: #2563eb;
        }
        .footer {
            margin-top: 2.5rem;
            font-size: 0.75rem;
            color: var(--text-light);
        }
    </style>
</head>
<body>

<div class="card">
    <?php if (!$isVerified): ?>
        <!-- Step 1: Welcome & CAPTCHA Phase -->
        <div class="icon">🔒</div>
        <h1>Secure Requisition Portal</h1>
        <p class="subtitle">
            Welcome to our secure portal. Please verify you are human to access your requisition documents and secure uploads.
        </p>

        <?php if ($errorMessage): ?>
            <div class="error"><?= htmlspecialchars($errorMessage) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <!-- Replace with your actual Cloudflare Site Key via environment variable -->
            <div class="cf-turnstile" data-sitekey="<?= getenv('TURNSTILE_SITE_KEY') ?>" data-theme="light"></div>
            <button type="submit">Unlock Portal</button>
        </form>

    <?php else: ?>
        <!-- Step 2: Success Phase (Content Revealed) -->
        <div class="icon">📂</div>
        <div class="success-message">
            <h2>Access Granted</h2>
            <p>Your identity has been verified. You can now securely view your requisition documents.</p>
        </div>

        <a href="https://google.com" class="cta-btn">
            <button type="button">
                View Documents 
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
            </button>
        </a>
        
        <div class="footer">
            <a href="/" style="color: var(--text-light); text-decoration: none;">Return to Home</a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
