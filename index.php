<?php
/**
 * Aparna Chaurasia - Official Portfolio
 * Full Stack Developer (MERN Stack • Next.js • Core PHP)
 */

$config = require __DIR__ . '/config.php';
$name = htmlspecialchars($config['name'] ?? 'Aparna Chaurasia');
$title = htmlspecialchars($config['title'] ?? 'Full Stack Developer');
$email = htmlspecialchars($config['email'] ?? 'aparna2112003@gmail.com');
$phone = htmlspecialchars($config['phone'] ?? '+91-7985584351');
$location = htmlspecialchars($config['location'] ?? 'Varanasi, UP, India');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $name ?> | <?= $title ?> Portfolio</title>
    
    <!-- Primary Meta Tags for HR & Recruiters -->
    <meta name="title" content="<?= $name ?> | <?= $title ?> Portfolio">
    <meta name="description" content="<?= htmlspecialchars($config['bio']) ?>">
    <meta name="keywords" content="Aparna Chaurasia, Full Stack Developer, MERN Stack, React Developer, Next.js Developer, PHP Developer, Varanasi, Web Developer Portfolio">
    <meta name="author" content="<?= $name ?>">

    <!-- Open Graph / Social Sharing -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $name ?> | <?= $title ?> Portfolio">
    <meta property="og:description" content="Explore production projects, full stack web apps, MERN & PHP systems built by Aparna Chaurasia.">
    <meta property="og:image" content="<?= $config['profile_image'] ?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600&family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <link rel="icon" type="image/jpeg" href="assets/aparna-profile.jpg">
</head>
<body>

    <!-- Ambient Glow & Dynamic Canvas Background -->
    <div class="bg-ambient">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
    </div>
    <div class="bg-grid-pattern"></div>
    <canvas id="ambientCanvas" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; pointer-events: none; z-index: -1;"></canvas>

    <!-- Navigation Header -->
    <header class="navbar" id="navbar">
        <div class="container nav-container">
            <a href="#hero" class="nav-brand" aria-label="Aparna Chaurasia Portfolio">
                <div class="brand-logo-gem">
                    <span class="brand-logo-monogram">AC</span>
                </div>
                <div class="brand-title-group">
                    <span class="brand-title-main">Aparna <span class="text-gradient">Chaurasia</span></span>
                    <span class="brand-title-subtitle">Full Stack Developer</span>
                </div>
            </a>

            <nav>
                <ul class="nav-links" id="navLinks">
                    <li><a href="#hero" class="nav-link active">Home</a></li>
                    <li><a href="#about" class="nav-link">About</a></li>
                    <li><a href="#skills" class="nav-link">Skills</a></li>
                    <li><a href="#experience" class="nav-link">Experience</a></li>
                    <li><a href="#projects" class="nav-link">Projects</a></li>
                    <li><a href="#contact" class="nav-link">Contact</a></li>
                </ul>
            </nav>

            <div class="nav-cta-group">
                <a href="<?= $config['resume_path'] ?>" class="btn btn-secondary btn-sm" download="Aparna_Chaurasia_Resume.pdf" target="_blank">
                    <i class="fa-solid fa-file-arrow-down"></i> Resume
                </a>
                <a href="#contact" class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-paper-plane"></i> Let's Talk
                </a>
                <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-section" id="hero">
            <div class="container">
                <div class="hero-grid">
                    <div class="hero-content">
                        <div class="status-pill">
                            <span class="pulse-dot"></span>
                            Available for Full-time Roles & Projects
                        </div>

                        <h1 class="hero-title">
                            Hi, I'm <span class="text-gradient"><?= $name ?></span>
                        </h1>

                        <div class="hero-role">
                            <span><?= $config['title'] ?></span>
                            <span class="hero-role-badge">MERN &bull; Next.js &bull; Core PHP</span>
                        </div>

                        <p class="hero-description">
                            <?= htmlspecialchars($config['bio']) ?>
                        </p>

                        <div class="hero-actions">
                            <a href="#projects" class="btn btn-primary">
                                <i class="fa-solid fa-laptop-code"></i> View Projects
                            </a>
                            <a href="<?= $config['resume_path'] ?>" class="btn btn-secondary" download="Aparna_Chaurasia_Resume.pdf" target="_blank">
                                <i class="fa-solid fa-download"></i> Download CV
                            </a>
                            <a href="#contact" class="btn btn-secondary">
                                <i class="fa-regular fa-envelope"></i> Contact Me
                            </a>
                        </div>

                        <div class="hero-socials">
                            <a href="<?= $config['github'] ?>" target="_blank" rel="noopener noreferrer" class="social-link" title="GitHub Profile">
                                <i class="fa-brands fa-github"></i>
                            </a>
                            <a href="<?= $config['linkedin'] ?>" target="_blank" rel="noopener noreferrer" class="social-link" title="LinkedIn Profile">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                            <a href="mailto:<?= $email ?>" class="social-link" title="Direct Email">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                            <a href="<?= $config['whatsapp'] ?>" target="_blank" rel="noopener noreferrer" class="social-link" title="WhatsApp Chat">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>

                    <div class="hero-visual">
                        <div class="avatar-wrapper">
                            <div class="avatar-glow"></div>
                            <div class="avatar-card">
                                <img src="<?= $config['profile_image'] ?>" alt="<?= $name ?>" class="avatar-img">
                                <div class="avatar-overlay-gradient"></div>
                            </div>

                            <!-- Floating Badges -->
                            <div class="floating-badge floating-badge-1">
                                <div class="badge-icon-box tech">
                                    <i class="fa-solid fa-layer-group"></i>
                                </div>
                                <div>
                                    <div class="badge-text-title">Full Stack Mastery</div>
                                    <div class="badge-text-sub">React &bull; Node &bull; PHP</div>
                                </div>
                            </div>

                            <div class="floating-badge floating-badge-2">
                                <div class="badge-icon-box exp">
                                    <i class="fa-solid fa-rocket"></i>
                                </div>
                                <div>
                                    <div class="badge-text-title">7+ Live Projects</div>
                                    <div class="badge-text-sub">Deployed & Verified</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Bar -->
                <div class="stats-bar">
                    <?php foreach ($config['stats'] as $stat): ?>
                        <div class="stat-item">
                            <div class="stat-number"><?= $stat['number'] ?></div>
                            <div class="stat-label"><?= $stat['label'] ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="section" id="about">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag"><i class="fa-solid fa-user"></i> Professional Overview</span>
                    <h2 class="section-title">Bridging Clean Frontend with Scalable Backend Architecture</h2>
                    <p class="section-subtitle">Dedicated developer focused on high-performance web systems, intuitive UI, and secure APIs.</p>
                </div>

                <div class="about-grid">
                    <div class="about-card">
                        <h3 style="font-size: 1.5rem; margin-bottom: 1rem;">Profile Summary</h3>
                        <p>
                            Full Stack Developer with hands-on experience in building responsive static and dynamic websites, eCommerce platforms, and full-stack web applications using <strong>MERN Stack, Next.js, and Core PHP</strong>. Proficient in <strong>React.js, JavaScript, Node.js, Express.js, PHP, MySQL, and MongoDB</strong>, with experience in REST API development, authentication, payment gateway integration and admin dashboards.
                        </p>

                        <div class="info-pills-list">
                            <div class="info-pill">
                                <i class="fa-solid fa-location-dot info-pill-icon"></i>
                                <div>
                                    <span class="info-pill-label">Location</span>
                                    <span class="info-pill-value"><?= $location ?></span>
                                </div>
                            </div>
                            <div class="info-pill">
                                <i class="fa-solid fa-envelope info-pill-icon"></i>
                                <div>
                                    <span class="info-pill-label">Email</span>
                                    <a href="mailto:<?= $email ?>" class="info-pill-value info-pill-link" title="Send email"><?= $email ?></a>
                                </div>
                            </div>
                            <div class="info-pill">
                                <i class="fa-solid fa-phone info-pill-icon"></i>
                                <div>
                                    <span class="info-pill-label">Phone</span>
                                    <a href="tel:<?= str_replace([' ', '-'], '', $phone) ?>" class="info-pill-value info-pill-link" title="Call phone"><?= $phone ?></a>
                                </div>
                            </div>
                            <div class="info-pill">
                                <i class="fa-solid fa-briefcase info-pill-icon"></i>
                                <div>
                                    <span class="info-pill-label">Availability</span>
                                    <span class="info-pill-value" style="color: #34d399;">Immediate Joiner</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Education Spotlight Card -->
                    <div class="edu-card">
                        <span class="edu-badge"><i class="fa-solid fa-graduation-cap"></i> Formal Education</span>
                        <?php $edu = $config['education'][0]; ?>
                        <h3 class="edu-title"><?= $edu['degree'] ?></h3>
                        <div class="edu-institution"><?= $edu['institution'] ?></div>
                        <div class="edu-meta">
                            <span><i class="fa-regular fa-calendar"></i> <?= $edu['period'] ?></span>
                            <span><i class="fa-solid fa-location-dot"></i> <?= $edu['location'] ?></span>
                        </div>
                        <div>
                            <span class="edu-score-pill"><i class="fa-solid fa-award"></i> <?= $edu['score'] ?></span>
                        </div>
                        <p style="color: var(--text-secondary); font-size: 0.95rem; margin-top: 0.5rem;">
                            <?= $edu['highlights'] ?>
                        </p>
                        <div style="margin-top: 1.5rem;">
                            <a href="<?= $config['resume_path'] ?>" class="btn btn-secondary btn-sm" target="_blank">
                                <i class="fa-solid fa-file-pdf"></i> View Verified Resume
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technical Skills Section -->
        <section class="section" id="skills" style="background: rgba(13, 18, 34, 0.4);">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag"><i class="fa-solid fa-microchip"></i> Technical Proficiency</span>
                    <h2 class="section-title">Core Competencies & Tooling</h2>
                    <p class="section-subtitle">A balanced toolkit designed for full-lifecycle software delivery.</p>
                </div>

                <div class="skills-container">
                    <?php foreach ($config['skills'] as $category => $items): ?>
                        <div class="skill-category-card">
                            <div class="skill-category-header">
                                <div class="skill-cat-icon">
                                    <?php 
                                        $catIcons = [
                                            'Frontend' => 'fa-solid fa-desktop',
                                            'Backend' => 'fa-solid fa-server',
                                            'Databases' => 'fa-solid fa-database',
                                            'Tools & Deployment' => 'fa-solid fa-screwdriver-wrench'
                                        ];
                                    ?>
                                    <i class="<?= $catIcons[$category] ?? 'fa-solid fa-code' ?>"></i>
                                </div>
                                <h3 class="skill-cat-title"><?= $category ?></h3>
                            </div>

                            <div class="skills-grid">
                                <?php foreach ($items as $skill): ?>
                                    <div class="skill-chip">
                                        <div class="skill-info">
                                            <i class="<?= $skill['icon'] ?> skill-icon"></i>
                                            <span class="skill-name"><?= $skill['name'] ?></span>
                                        </div>
                                        <span class="skill-badge"><?= $skill['level'] ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Experience Timeline Section -->
        <section class="section" id="experience">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag"><i class="fa-solid fa-briefcase"></i> Career Journey</span>
                    <h2 class="section-title">Work Experience</h2>
                    <p class="section-subtitle">Real-world engineering contributions and production deliverables.</p>
                </div>

                <div class="timeline">
                    <?php foreach ($config['experience'] as $exp): ?>
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <div class="timeline-header">
                                    <div>
                                        <h3 class="timeline-role"><?= $exp['role'] ?></h3>
                                        <div class="timeline-company"><?= $exp['company'] ?></div>
                                    </div>
                                    <span class="timeline-period">
                                        <i class="fa-regular fa-clock"></i> <?= $exp['period'] ?> &bull; <?= $exp['type'] ?>
                                    </span>
                                </div>

                                <p class="timeline-desc"><?= $exp['description'] ?></p>

                                <ul class="timeline-highlights">
                                    <?php foreach ($exp['highlights'] as $hl): ?>
                                        <li><?= $hl ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Featured Projects Section -->
        <section class="section" id="projects" style="background: rgba(13, 18, 34, 0.4);">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag"><i class="fa-solid fa-folder-open"></i> Portfolio Work</span>
                    <h2 class="section-title">Featured Projects</h2>
                    <p class="section-subtitle">Live web applications and production-ready platforms developed by me.</p>
                </div>

                <!-- Filter Tabs -->
                <div class="project-filters">
                    <button class="filter-btn active" data-filter="all">All Projects</button>
                    <button class="filter-btn" data-filter="full stack">Full Stack & SaaS</button>
                    <button class="filter-btn" data-filter="php">Core PHP</button>
                    <button class="filter-btn" data-filter="mern">MERN Stack</button>
                    <button class="filter-btn" data-filter="frontend">Frontend / React</button>
                </div>

                <div class="projects-grid">
                    <?php foreach ($config['projects'] as $project): ?>
                        <div class="project-card" data-category="<?= htmlspecialchars($project['category']) ?>" data-tech="<?= htmlspecialchars(implode(' ', $project['tech'])) ?>">
                            <div>
                                <div class="project-top">
                                    <span class="project-category-tag"><?= $project['category'] ?></span>
                                    <div class="project-links">
                                        <?php if (!empty($project['github_url'])): ?>
                                            <a href="<?= $project['github_url'] ?>" target="_blank" rel="noopener noreferrer" class="project-icon-link" title="View Source Code">
                                                <i class="fa-brands fa-github"></i>
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?= $project['live_url'] ?>" target="_blank" rel="noopener noreferrer" class="project-icon-link" title="Open Live Website">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>
                                    </div>
                                </div>

                                <h3 class="project-title"><?= $project['title'] ?></h3>
                                <p class="project-desc"><?= $project['description'] ?></p>

                                <div class="project-live-url-row" style="margin-bottom: 1.25rem; font-size: 0.88rem; display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
                                    <span style="color: var(--text-secondary); font-weight: 600;"><i class="fa-solid fa-link" style="color: var(--accent-secondary); margin-right: 4px;"></i> Live Link:</span>
                                    <a href="<?= $project['live_url'] ?>" target="_blank" rel="noopener noreferrer" style="color: #38bdf8; text-decoration: none; word-break: break-all; font-family: var(--font-mono); font-size: 0.83rem; background: rgba(6, 182, 212, 0.08); padding: 0.2rem 0.5rem; border-radius: 6px; border: 1px solid rgba(6, 182, 212, 0.2);">
                                        <?= $project['live_url'] ?>
                                    </a>
                                </div>

                                <div class="project-tech-tags">
                                    <?php foreach ($project['tech'] as $t): ?>
                                        <span class="tech-tag"><?= $t ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="project-bottom-cta">
                                <a href="<?= $project['live_url'] ?>" target="_blank" rel="noopener noreferrer" class="live-preview-link">
                                    <span>Visit Live Project</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                                <span style="font-size: 0.8rem; color: #10b981; font-weight: 600;">
                                    <i class="fa-solid fa-circle-check"></i> Live
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="section" id="contact">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag"><i class="fa-solid fa-paper-plane"></i> Get in Touch</span>
                    <h2 class="section-title">Let's Build Something Exceptional</h2>
                    <p class="section-subtitle">Interested in collaborating or hiring? Send me a message and I'll respond promptly.</p>
                </div>

                <div class="contact-grid">
                    <!-- Contact Details -->
                    <div class="contact-info-card">
                        <h3 class="contact-info-title">Direct Contact Information</h3>
                        <p class="contact-info-desc">
                            Feel free to reach out directly via email, phone, or WhatsApp. I am currently open to full-time engineering opportunities and selective projects.
                        </p>

                        <div class="contact-channels">
                            <div class="channel-item">
                                <div class="channel-icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div>
                                    <div class="channel-title">Email</div>
                                    <a href="mailto:<?= $email ?>" class="channel-value" style="color: inherit; text-decoration: none;"><?= $email ?></a>
                                </div>
                                <button class="channel-copy-btn" data-copy="<?= $email ?>" title="Copy Email">
                                    <i class="fa-regular fa-copy"></i>
                                </button>
                            </div>

                            <div class="channel-item">
                                <div class="channel-icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div>
                                    <div class="channel-title">Phone / WhatsApp</div>
                                    <a href="tel:<?= str_replace([' ', '-'], '', $phone) ?>" class="channel-value" style="color: inherit; text-decoration: none;"><?= $phone ?></a>
                                </div>
                                <button class="channel-copy-btn" data-copy="<?= $phone ?>" title="Copy Phone Number">
                                    <i class="fa-regular fa-copy"></i>
                                </button>
                            </div>

                            <div class="channel-item">
                                <div class="channel-icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div>
                                    <div class="channel-title">Location</div>
                                    <div class="channel-value"><?= $location ?></div>
                                </div>
                            </div>
                        </div>

                        <div style="display: flex; gap: 0.85rem; flex-wrap: wrap;">
                            <a href="<?= $config['whatsapp'] ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary btn-sm" style="background: rgba(37, 211, 102, 0.12); border-color: rgba(37, 211, 102, 0.3); color: #25d366;">
                                <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
                            </a>
                            <a href="<?= $config['linkedin'] ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary btn-sm">
                                <i class="fa-brands fa-linkedin"></i> Connect on LinkedIn
                            </a>
                        </div>
                    </div>

                    <!-- Contact Form with AJAX & PHP SMTP -->
                    <div class="contact-form-container">
                        <div id="toastNotice" class="toast-notice"></div>

                        <form id="contactForm" class="contact-form" novalidate>
                            <!-- Honeypot anti-spam -->
                            <input type="text" name="website_hp" style="display: none;" tabindex="-1" autocomplete="off">

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name" class="form-label">Your Name <span style="color: var(--accent-rose);">*</span></label>
                                    <input type="text" id="name" name="name" class="form-input" placeholder="e.g. Rahul Sharma" required minlength="2">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email Address <span style="color: var(--accent-rose);">*</span></label>
                                    <input type="email" id="email" name="email" class="form-input" placeholder="e.g. rahul@company.com" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-input" placeholder="Job Opportunity / Project Collaboration" required>
                            </div>

                            <div class="form-group">
                                <label for="message" class="form-label">Message <span style="color: var(--accent-rose);">*</span></label>
                                <textarea id="message" name="message" class="form-textarea" placeholder="Hello Aparna, we loved your work and would like to discuss..." required minlength="10"></textarea>
                            </div>

                            <button type="submit" id="submitBtn" class="btn btn-primary" style="width: 100%; border-radius: var(--radius-md); padding: 1rem;">
                                <i class="fa-solid fa-paper-plane"></i> Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-content">
            <div class="footer-copy">
                &copy; <?= date('Y') ?> <strong><?= $name ?></strong>. Crafted with clean PHP, modern CSS & JavaScript. All rights reserved.
            </div>

            <div style="display: flex; align-items: center; gap: 1rem;">
                <a href="<?= $config['github'] ?>" target="_blank" rel="noopener noreferrer" style="color: var(--text-secondary); text-decoration: none;" title="GitHub">
                    <i class="fa-brands fa-github fa-lg"></i>
                </a>
                <a href="<?= $config['linkedin'] ?>" target="_blank" rel="noopener noreferrer" style="color: var(--text-secondary); text-decoration: none;" title="LinkedIn">
                    <i class="fa-brands fa-linkedin fa-lg"></i>
                </a>
                <a href="#hero" class="footer-back-top" title="Back to top">
                    <i class="fa-solid fa-chevron-up"></i>
                </a>
            </div>
        </div>
    </footer>

    <!-- Custom JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html>
