<?php
/**
 * Portfolio Configuration File
 * Aparna Chaurasia - Full Stack Developer
 */

return [
    // Personal Information
    'name' => 'Aparna Chaurasia',
    'title' => 'Full Stack Developer',
    'tagline' => 'MERN Stack • Next.js • Core PHP Developer',
    'bio' => 'Full Stack Developer with hands-on experience in building responsive static and dynamic websites, eCommerce platforms, and full-stack web applications using MERN Stack, Next.js, and Core PHP. Proficient in React.js, JavaScript, Node.js, Express.js, PHP, MySQL, and MongoDB, with experience in REST API development, authentication, payment gateway integration and admin dashboards.',
    'location' => 'Varanasi, Uttar Pradesh, India',
    'phone' => '+91-7985584351',
    'email' => 'aparna2112003@gmail.com',
    'linkedin' => 'https://www.linkedin.com/in/aparna-chaurasia-043594247',
    'github' => 'https://github.com/aparna2101',
    'whatsapp' => 'https://wa.me/917985584351',
    'resume_path' => 'assets/Aparna_Chaurasia_Resume.pdf',
    'profile_image' => 'assets/aparna-profile.jpg',

    // Email / SMTP Settings (Gmail App Password Configuration for form submission)
    'smtp' => [
        'enabled'      => true,
        'host'         => 'smtp.gmail.com',
        'port'         => 465,                          // 465 for SSL, 587 for TLS
        'encryption'   => 'ssl',
        'username'     => 'aparnachaurasia210103@gmail.com',
        'password'     => 'uxgs iiym zwkr yhqt',        // Google App Password
        'from_name'    => 'Portfolio Contact Form',
        'to_email'     => 'aparnachaurasia210103@gmail.com', // Form submissions arrive here
    ],

    // Stats / Key Metrics
    'stats' => [
        ['number' => '7+', 'label' => 'Live Projects Delivered'],
        ['number' => '1.5+', 'label' => 'Years Industry Experience'],
        ['number' => '100%', 'label' => 'Dedicated & Job-Ready'],
    ],

    // Skills Categorization
    'skills' => [
        'Frontend' => [
            ['name' => 'React.js', 'level' => '95%', 'icon' => 'fa-brands fa-react'],
            ['name' => 'Next.js', 'level' => '90%', 'icon' => 'fa-solid fa-cube'],
            ['name' => 'Three.js / 3D', 'level' => '80%', 'icon' => 'fa-solid fa-shapes'],
            ['name' => 'Tailwind CSS', 'level' => '95%', 'icon' => 'fa-solid fa-wind'],
            ['name' => 'JavaScript (ES6+)', 'level' => '95%', 'icon' => 'fa-brands fa-js'],
            ['name' => 'TypeScript', 'level' => '85%', 'icon' => 'fa-solid fa-code'],
            ['name' => 'HTML5 / CSS3', 'level' => '98%', 'icon' => 'fa-brands fa-html5'],
            ['name' => 'Framer Motion', 'level' => '85%', 'icon' => 'fa-solid fa-wand-magic-sparkles'],
        ],
        'Backend' => [
            ['name' => 'Node.js', 'level' => '90%', 'icon' => 'fa-brands fa-node-js'],
            ['name' => 'Express.js', 'level' => '90%', 'icon' => 'fa-solid fa-server'],
            ['name' => 'Core PHP', 'level' => '88%', 'icon' => 'fa-brands fa-php'],
            ['name' => 'RESTful APIs', 'level' => '95%', 'icon' => 'fa-solid fa-network-wired'],
            ['name' => 'Socket.IO', 'level' => '85%', 'icon' => 'fa-solid fa-bolt'],
            ['name' => 'Payment Gateways', 'level' => '85%', 'icon' => 'fa-solid fa-credit-card'],
        ],
        'Databases' => [
            ['name' => 'MongoDB', 'level' => '90%', 'icon' => 'fa-solid fa-leaf'],
            ['name' => 'MySQL', 'level' => '88%', 'icon' => 'fa-solid fa-database'],
            ['name' => 'PostgreSQL', 'level' => '80%', 'icon' => 'fa-solid fa-hard-drive'],
            ['name' => 'PDO & Queries', 'level' => '85%', 'icon' => 'fa-solid fa-table'],
        ],
        'Tools & Deployment' => [
            ['name' => 'SSH & Remote Servers', 'level' => '88%', 'icon' => 'fa-solid fa-terminal'],
            ['name' => 'Git / GitHub', 'level' => '92%', 'icon' => 'fa-brands fa-github'],
            ['name' => 'Postman API Testing', 'level' => '90%', 'icon' => 'fa-solid fa-paper-plane'],
            ['name' => 'REST API Architecture', 'level' => '92%', 'icon' => 'fa-solid fa-network-wired'],
        ]
    ],

    // Work Experience
    'experience' => [
        [
            'role' => 'Full Stack Developer',
            'company' => 'Dizi Global Solution',
            'period' => 'Aug 2025 - Aug 2026',
            'type' => 'Full-time',
            'description' => 'Developed business websites and full-stack applications using React.js, Node.js, Express.js, MongoDB, MySQL, and Socket.IO. Handled end-to-end production deployment and live server management via SSH.',
            'highlights' => [
                'Engineered scalable REST APIs and secure authentication flows.',
                'Integrated real-time socket communications and high-traffic admin dashboards.',
                'Managed live server deployments, SSL setups, and performance optimizations via SSH.'
            ]
        ],
        [
            'role' => 'Website Developer Intern',
            'company' => 'Eagle Eye E-Commerce Solutions',
            'period' => 'Jan 2025 - Jul 2025',
            'type' => 'Internship',
            'description' => 'Developed and customized company e-commerce websites, handling theme and layout improvements, plugin integrations, custom landing page creation, and UX enhancements.',
            'highlights' => [
                'Engineered e-commerce storefronts, payment gateways, and checkout funnels.',
                'Optimized web assets for 40%+ faster page load speeds and mobile responsiveness.',
                'Collaborated with marketing and design teams to launch high-converting layouts.'
            ]
        ]
    ],

    // Featured Projects
    'projects' => [
        [
            'title' => 'TaskAura - AI PM SaaS',
            'category' => 'Full Stack / SaaS',
            'description' => 'AI-powered project management SaaS platform featuring AI Copilot, interactive Kanban boards, team collaboration, 3D interactive visuals, Framer Motion animations, and Web Audio API voice interactions.',
            'tech' => ['Next.js', 'React.js', 'Three.js', 'Framer Motion', 'Web Audio API', 'Tailwind CSS'],
            'live_url' => 'https://ai-powered-saas-project-pied.vercel.app',
            'github_url' => 'https://github.com/aparna2101',
            'featured' => true,
            'color' => 'indigo'
        ],
        [
            'title' => 'Hotel Booking & Management System',
            'category' => 'Core PHP / Full Stack',
            'description' => 'Full-stack enterprise hotel booking web application with room inventory management, image uploads, dynamic booking workflows, secure session-based authentication, and dedicated administrative analytics dashboard.',
            'tech' => ['Core PHP', 'MySQL', 'PDO', 'JavaScript', 'CSS3', 'Admin Panel'],
            'live_url' => 'https://hotelbookingphp.freedev.app',
            'github_url' => 'https://github.com/aparna2101',
            'featured' => true,
            'color' => 'amber'
        ],
        [
            'title' => 'Poco Loco Yacht Rental',
            'category' => 'Frontend',
            'description' => 'Ultra-sleek responsive luxury yacht rental platform designed for high-end hospitality. Features customer inquiry and booking forms powered by Web3Forms, luxury gallery, and responsive fleet view.',
            'tech' => ['React.js', 'Tailwind CSS', 'Web3Forms', 'Modern UI/UX'],
            'live_url' => 'https://www.pocoloco.co',
            'github_url' => 'https://github.com/aparna2101',
            'featured' => true,
            'color' => 'cyan'
        ],
        [
            'title' => 'Lascent Perfume E-Commerce',
            'category' => 'MERN Stack',
            'description' => 'Comprehensive full-stack perfume and luxury fragrance e-commerce store with product catalogue, cart & order pipeline, online payment gateway integration, and administrative inventory operations.',
            'tech' => ['MERN Stack', 'Node.js', 'MongoDB', 'Payment Gateway', 'Express.js'],
            'live_url' => 'https://lascentsuganda.com',
            'github_url' => 'https://github.com/aparna2101',
            'featured' => false,
            'color' => 'rose'
        ],
        [
            'title' => 'CTP Mart Multi-Vendor E-Commerce',
            'category' => 'MERN Stack',
            'description' => 'Scalable multi-vendor e-commerce marketplace platform featuring real-time inventory updates using Socket.IO, multi-tier checkout with payment gateway, and comprehensive vendor/admin control panels.',
            'tech' => ['MERN', 'Socket.IO', 'Real-Time Sync', 'Admin Panel', 'REST API'],
            'live_url' => 'https://www.ctpmart.com',
            'github_url' => 'https://github.com/aparna2101',
            'featured' => false,
            'color' => 'emerald'
        ],
        [
            'title' => 'Brassica World',
            'category' => 'MERN',
            'description' => 'Developed a responsive React website with dynamic content and admin management. Implemented admin functionality for managing website content.',
            'tech' => ['MERN Stack', 'React.js', 'Node.js', 'Express.js', 'MongoDB', 'Admin Panel'],
            'live_url' => 'https://brassicaworld.com',
            'github_url' => 'https://github.com/aparna2101',
            'featured' => false,
            'color' => 'teal'
        ],
        [
            'title' => 'Dial4Helps Service Platform',
            'category' => 'MERN Stack',
            'description' => 'On-demand multi-service booking platform with custom REST APIs, service category discovery, customer service bookings, and an administrative panel for operator dispatch.',
            'tech' => ['MERN Stack', 'RESTful API', 'Admin Operations', 'Tailwind CSS'],
            'live_url' => 'https://dial4helps.co.in',
            'github_url' => 'https://github.com/aparna2101',
            'featured' => false,
            'color' => 'blue'
        ]
    ],

    // Education
    'education' => [
        [
            'degree' => 'B.Tech in Computer Science & Engineering',
            'institution' => 'Dr. A.P.J. Abdul Kalam Technical University',
            'location' => 'Varanasi, Uttar Pradesh',
            'period' => '2021 - 2025',
            'score' => 'CGPA: 7.22',
            'highlights' => 'Specialized in Data Structures, Web Engineering, Database Management Systems, and Software Engineering methodologies.'
        ]
    ]
];
