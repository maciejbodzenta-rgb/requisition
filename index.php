<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise Requisition Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-body: #f3f4f6;
            --sidebar-bg: #111827;
            --sidebar-hover: #1f2937;
            --sidebar-text: #9ca3af;
            --sidebar-text-active: #ffffff;
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --text-main: #111827;
            --text-muted: #6b7280;
            --border: #e5e7eb;
            --white: #ffffff;
            --success: #10b981;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar Navigation */
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            color: var(--sidebar-text);
            flex-shrink: 0;
        }

        .sidebar-brand {
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--white);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-brand svg {
            width: 24px;
            height: 24px;
            color: var(--primary);
        }

        .sidebar-nav {
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 8px;
            text-decoration: none;
            color: var(--sidebar-text);
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .nav-item:hover {
            background-color: var(--sidebar-hover);
            color: var(--sidebar-text-active);
        }

        .nav-item.active {
            background-color: var(--primary);
            color: var(--white);
        }

        .nav-item svg {
            width: 20px;
            height: 20px;
        }

        /* Main Content Area */
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        /* Top Header */
        .header {
            background-color: var(--white);
            height: 72px;
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border);
            flex-shrink: 0;
        }

        .header-title h1 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-main);
        }

        .header-title p {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 12px;
            border-radius: 20px;
            background-color: var(--bg-body);
            border: 1px solid var(--border);
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .user-info span {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-main);
        }
        
        .user-info small {
            display: block;
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        /* Page Content */
        .page-content {
            padding: 32px;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .welcome-banner {
            background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);
            border-radius: 12px;
            padding: 32px;
            color: white;
            margin-bottom: 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .welcome-text h2 {
            font-size: 1.5rem;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .welcome-text p {
            color: #c7d2fe;
            font-size: 0.95rem;
            max-width: 500px;
            line-height: 1.5;
        }

        .status-badge {
            background-color: rgba(16, 185, 129, 0.2);
            color: #34d399;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .status-badge::before {
            content: '';
            display: block;
            width: 8px;
            height: 8px;
            background-color: #34d399;
            border-radius: 50%;
        }

        /* Grid Layout for Cards */
        .grid-2 {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
        }

        .card {
            background-color: var(--white);
            border-radius: 12px;
            border: 1px solid var(--border);
            padding: 24px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-main);
        }

        /* Upload Dropzone */
        .dropzone {
            border: 2px dashed #cbd5e1;
            border-radius: 8px;
            padding: 40px 20px;
            text-align: center;
            background-color: #f8fafc;
            transition: all 0.2s;
            cursor: pointer;
        }

        .dropzone:hover {
            border-color: var(--primary);
            background-color: #f1f5f9;
        }

        .dropzone svg {
            width: 40px;
            height: 40px;
            color: #94a3b8;
            margin-bottom: 12px;
        }

        .dropzone h3 {
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--text-main);
            margin-bottom: 4px;
        }

        .dropzone p {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        /* Requisition List */
        .requisition-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
            border-bottom: 1px solid var(--border);
        }

        .requisition-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .req-info h4 {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 4px;
        }

        .req-info p {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .req-status {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 12px;
            background-color: #dbeafe;
            color: #1e40af;
        }

        .req-status.pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        /* CTA Section */
        .cta-section {
            margin-top: 32px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 16px;
            padding-top: 24px;
            border-top: 1px solid var(--border);
        }

        .security-note {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-right: auto;
        }

        .security-note svg {
            width: 16px;
            height: 16px;
            color: var(--success);
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        .btn-primary svg {
            width: 18px;
            height: 18px;
        }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            Apex Procurement
        </div>
        <nav class="sidebar-nav">
            <a href="#" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                Dashboard
            </a>
            <a href="#" class="nav-item active">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                Requisitions
            </a>
            <a href="#" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                Secure Uploads
            </a>
            <a href="#" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                Settings
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        
        <!-- Top Header -->
        <header class="header">
            <div class="header-title">
                <h1>Requisition Portal</h1>
                <p>Manage and track your organization's secure document uploads.</p>
            </div>
            <div class="header-actions">
                <div class="user-profile">
                    <div class="avatar">JD</div>
                    <div class="user-info">
                        <span>Jane Doe</span>
                        <small>Procurement Manager</small>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="page-content">
            
            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <div class="welcome-text">
                    <h2>Welcome back, Jane.</h2>
                    <p>Your workspace is fully encrypted and ready. You have 3 pending requisitions requiring your review and secure documentation.</p>
                </div>
                <div class="status-badge">System Secure</div>
            </div>

            <!-- Grid Layout -->
            <div class="grid-2">
                
                <!-- Left Column: Uploads -->
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">Secure File Upload</span>
                    </div>
                    <div class="dropzone">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                        <h3>Click to upload or drag and drop</h3>
                        <p>PDF, DOCX, XLSX, or ZIP (max. 50MB)</p>
                    </div>
                </div>

                <!-- Right Column: Recent Requisitions -->
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">Recent Requisitions</span>
                    </div>
                    <div class="requisition-item">
                        <div class="req-info">
                            <h4>REQ-2026-084</h4>
                            <p>Uploaded 2 hours ago</p>
                        </div>
                        <span class="req-status">Approved</span>
                    </div>
                    <div class="requisition-item">
                        <div class="req-info">
                            <h4>REQ-2026-085</h4>
                            <p>Uploaded Yesterday</p>
                        </div>
                        <span class="req-status pending">In Review</span>
                    </div>
                    <div class="requisition-item">
                        <div class="req-info">
                            <h4>REQ-2026-086</h4>
                            <p>Uploaded 2 days ago</p>
                        </div>
                        <span class="req-status pending">Action Req.</span>
                    </div>
                </div>
            </div>

            <!-- Action Footer (CTA) -->
            <div class="cta-section">
                <div class="security-note">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    256-bit AES Encrypted & SOC2 Compliant
                </div>
                <!-- This is the CTA that leads to Google -->
                <a href="https://google.com" class="btn-primary">
                    View Secure Documents
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                </a>
            </div>

        </div>
    </main>

</body>
</html>
