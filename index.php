<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Requisition Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --bg: #ffffff;
            --bg-alt: #f8fafc;
            --text: #0f172a;
            --text-light: #475569;
            --border: #e2e8f0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 5%;
            border-bottom: 1px solid var(--border);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--text);
            text-decoration: none;
        }

        .logo svg {
            width: 28px;
            height: 28px;
            color: var(--primary);
        }

        .nav-links {
            display: flex;
            gap: 32px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-light);
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-cta {
            background-color: var(--text);
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: background 0.2s;
        }

        .nav-cta:hover {
            background-color: var(--primary);
        }

        /* Hero Section */
        .hero {
            padding: 100px 5% 80px;
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #eff6ff;
            color: var(--primary);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 24px;
            border: 1px solid #bfdbfe;
        }

        .hero-badge svg {
            width: 14px;
            height: 14px;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.1;
            letter-spacing: -0.02em;
            margin-bottom: 24px;
            color: var(--text);
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero p {
            font-size: 1.2rem;
            color: var(--text-light);
            max-width: 650px;
            margin: 0 auto 40px;
        }

        .hero-cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background-color: var(--primary);
            color: white;
            padding: 16px 36px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s;
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
        }

        .hero-cta:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 6px 8px -1px rgba(37, 99, 235, 0.3);
        }

        .hero-cta svg {
            width: 20px;
            height: 20px;
        }

        .hero-subtext {
            margin-top: 16px;
            font-size: 0.85rem;
            color: var(--text-light);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .hero-subtext svg {
            width: 14px;
            height: 14px;
            color: #10b981;
        }

        /* Features Section */
        .features {
            background-color: var(--bg-alt);
            padding: 80px 5%;
            border-top: 1px solid var(--border);
        }

        .features-container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .features-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .features-header h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .features-header p {
            color: var(--text-light);
            font-size: 1.1rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
        }

        .feature-card {
            background: var(--bg);
            padding: 32px;
            border-radius: 12px;
            border: 1px solid var(--border);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            background: #eff6ff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: var(--primary);
        }

        .feature-icon svg {
            width: 24px;
            height: 24px;
        }

        .feature-card h3 {
            font-size: 1.15rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .feature-card p {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        /* Footer */
        .footer {
            padding: 40px 5%;
            border-top: 1px solid var(--border);
            text-align: center;
            color: var(--text-light);
            font-size: 0.9rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1100px;
            margin: 0 auto;
        }

        .footer-links {
            display: flex;
            gap: 24px;
        }

        .footer-links a {
            color: var(--text-light);
            text-decoration: none;
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        @media (max-width: 768px) {
            .hero h1 { font-size: 2.5rem; }
            .nav-links { display: none; }
            .footer { flex-direction: column; gap: 20px; }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <a href="#" class="logo">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            Requisition Portal
        </a>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <div class="hero-badge">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            Enterprise-Grade Security
        </div>
        
        <h1>Welcome to our Secure <span>Requisition Portal</span></h1>
        
        <p>Your centralized hub for secure document uploads, requisition tracking, and encrypted vendor communications. Access your files safely and efficiently.</p>
        
        <!-- This is the CTA leading to Google -->
        <a href="https://u116936129.ct.sendgrid.net/ls/click?upn=u001.isK5apfxXfsQnEwXb9oaPDR-2Bm14-2FOK-2F03ePyGfMYCejVlI9L2xPyG87stmldyz2gdzmhM4u82pXsnnMPuHASIL7ADLFAx1UJniK6eLKJ96B9qFvG-2BwRBpBQxXGe2TwMj_n4f_82Tygn-2Bd0Ni0utBTOazOzyGhr7hhfpfg2ua3XNv4SPhO-2B-2BDD2uR8s7OgZ-2F2xW6Gn-2B3osd7Dxej0x1o7iVWQOGKdVaOl-2FUyOQKKRFeQjWU065bOtabuEIXHDnht7W-2Bt4eeeRwTZ24pDEwLjWBPIOuxnoWnktBx1xf-2BHIsGP3-2Brwy3Ra6YhZItwkGXkRcOY7WAnZMi5kh0kt-2FdGw2HtSG1P9hrzOZkzJJsi7TGg5hHOBiHShk7DePs-2FWNoUAEUEUOMKj34JQlGJNmf1cBDOakzJ4BroYwxqpmRqUXA0HfdWcxpH5eh1lV7xO5l3p07Kx8NPJU-2BLkV-2F2szzp5EyBsJqHFniMwhEYIcnRHA2FYb-2FDBi0Y05h5H5D5oaQI6Az-2BITwY3wxoqKkwRnCY4CaoXi0D9tbST9B3yg9IkZGWzzZbegF8iuzRe-2B-2BkXnC8ThDZf5p9doueMVGxYHTi2-2FExoPNgqZFpWzxJU-2BSsaGpiO-2Boc0FWrN29hZ87dc8a5G4Bmx4o3xL41CrVeAlOlZELYz-2B6NfF0B-2F77Ge8kMeGG7iCNFyZvp38TK9EFdR4GYNAZ7gt418EHDotOrGKCDWnkqnwY82XgoINKXJE2naiZ8ZRrpkonY5FUww2L-2BtxabM28THjvlG2HYbtkfUvB-2FyUw1jJsGYSkeCMU-2BbYnrwpm0WSOwK7xRozfSzQORn6aT7E5z81W" class="hero-cta">
            View Secure Documents
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
        </a>
        
        <div class="hero-subtext">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            End-to-end encrypted & SOC2 compliant
        </div>
    </header>

    <!-- Features Section -->
    <section class="features">
        <div class="features-container">
            <div class="features-header">
                <h2>Everything you need to manage secure bids</h2>
                <p>A streamlined experience for uploading, reviewing, and approving your requisition documents.</p>
            </div>
            
            <div class="features-grid">
                <!-- Feature 1 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                    </div>
                    <h3>Secure Uploads</h3>
                    <p>Drag and drop your PDFs, spreadsheets, and proposals into our 256-bit AES encrypted vault.</p>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <h3>Requisition Tracking</h3>
                    <p>Monitor the status of your bids and documents in real-time. Never lose track of a submission again.</p>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    </div>
                    <h3>Compliance Ready</h3>
                    <p>Built to meet the strictest enterprise standards, keeping your vendor data private and secure.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div>&copy; 2026 Apex Procurement. All rights reserved.</div>
        <div class="footer-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Contact Support</a>
        </div>
    </footer>

</body>
</html>
