# Aparna Chaurasia - Professional Portfolio

Modern, executive-grade developer portfolio built with **Core PHP**, **Vanilla CSS**, and **Modern JavaScript**.

---

## 🌟 Key Highlights

- **Executive Aesthetic**: Deep slate & obsidian theme with frosted glassmorphism, glowing micro-animations, and interactive ambient canvas.
- **Genuine Resume Data**: Incorporates your actual B.Tech education (CGPA: 7.22), work experience at Dizi Global Solution & Eagle Eye, and 7 live production projects.
- **Your Photo & Resume**: Integrated profile portrait and downloadable/viewable verified PDF resume (`assets/Aparna_Chaurasia_Resume.pdf`).
- **PHP Form Submission with Gmail SMTP**: Ready for Gmail SMTP authentication via port 465 (SSL) / 587 (TLS). No Composer or third-party dependencies required.
- **Fail-Safe Inquiry Backup**: All submitted inquiries are safely logged into `data/messages.json` with `.htaccess` security protection.

---

## 📁 Project Structure

```
portfolio/
├── config.php                  # Central settings, resume data, and Gmail SMTP credentials
├── index.php                   # Dynamic PHP portfolio template
├── index.html                  # Instant static preview version (double-click to preview)
├── send-mail.php               # Contact form backend with Gmail Socket SMTP
├── data/
│   ├── .htaccess               # Security rule preventing direct web access to messages
│   └── messages.json           # Local backup of all contact submissions
└── assets/
    ├── aparna-profile.jpg      # Profile photo
    ├── Aparna_Chaurasia_Resume.pdf # Resume PDF
    ├── css/
    │   └── style.css           # Modern styling & responsive design
    └── js/
        └── main.js             # Interactive filtering, particle canvas, copy buttons & AJAX
```

---

## 🚀 How to Run with PHP (XAMPP / WAMP / Built-in Server)

### Option 1: PHP Built-in Server (Easiest)
In PowerShell or Terminal inside this folder:
```bash
php -S localhost:8000
```
Then open: [http://localhost:8000](http://localhost:8000)

### Option 2: XAMPP / WAMP
1. Copy the `portfolio` folder into `C:\xampp\htdocs\`
2. Start Apache from the XAMPP Control Panel.
3. Open: `http://localhost/portfolio/`

---

## ✉️ Setting Up Gmail & 16-Digit App Password

When you are ready to receive emails directly into your inbox, open [`config.php`](file:///c:/Users/aparn/OneDrive/Desktop/portfolio/config.php) and update the `smtp` section:

```php
'smtp' => [
    'enabled'      => true,
    'host'         => 'smtp.gmail.com',
    'port'         => 465,
    'encryption'   => 'ssl',
    'username'     => 'aparna2112003@gmail.com',
    'password'     => 'xxxx xxxx xxxx xxxx', // Paste your 16-digit Google App Password here
    'from_name'    => 'Portfolio Contact Form',
    'to_email'     => 'aparna2112003@gmail.com',
],
```

> **How to generate a Gmail 16-digit App Password:**
> 1. Go to your **Google Account** (`myaccount.google.com`).
> 2. Go to **Security** -> Enable **2-Step Verification** (if not already enabled).
> 3. Search for **App Passwords**.
> 4. Create a new App password named `Portfolio` and copy the 16 characters into `config.php`.
