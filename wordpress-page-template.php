<?php
/**
 * Template Name: Design Terminal Studio Page
 * Description: A premium, technology-inspired, full-bleed single-page landing portfolio for Design Terminal's POD Studio.
 * Set this file under your active WordPress theme directory (e.g., wp-content/themes/[your-theme]/template-design-terminal.php)
 * 
 * Then create a page in WordPress and select "Design Terminal Studio Page" from the Page Attributes Template dropdown.
 */

// If you want standard WordPress headers/footers, uncomment get_header() below. 
// However, since Design Terminal uses a specific layout with a persistent custom left sidebar, 
// this template is self-contained with its own structural header to guarantee exact pixel-perfect aesthetics.
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0563bb',
                        secondary: '#45505b',
                        dark: '#040b14',
                    },
                    fontFamily: {
                        sans: ['Roboto', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        poppins: ['Poppins', 'sans-serif'],
                        raleway: ['Raleway', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style type="text/css">
        body {
            font-family: 'Roboto', sans-serif;
            color: #45505b;
            background-color: #ffffff;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Raleway', sans-serif;
            color: #040b14;
            font-weight: 700;
        }
        section {
            padding: 4rem 0;
            overflow: hidden;
        }
        .section-title {
            margin-bottom: 2rem;
        }
        .section-title h2 {
            font-size: 1.875rem; /* 30px */
            font-weight: 700;
            margin-bottom: 1.25rem;
            padding-bottom: 1.25rem;
            position: relative;
        }
        .section-title h2::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 3rem;
            height: 4px;
            background-color: #0563bb;
        }
        .section-title p {
            color: #4b5563;
        }
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #0563bb;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #044b8d;
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class('relative'); ?>>

    <!-- Copyright Watermark -->
    <div class="fixed bottom-4 right-4 z-[60] bg-black/20 backdrop-blur-md px-3 py-1 rounded-full text-[10px] text-white/50 pointer-events-none select-none border border-white/10 hidden md:block">
        &copy; adalovelaceabir.com
    </div>

    <!-- Mobile Header -->
    <div class="lg:hidden fixed top-0 left-0 right-0 z-50 bg-dark p-4 flex justify-between items-center text-white shadow-md">
        <h1 class="text-xl font-bold tracking-tight text-white"><?php bloginfo('name'); ?></h1>
        <button id="mobile-menu-toggle" class="p-2 bg-primary rounded-full hover:bg-blue-600 transition-colors focus:outline-none">
            <i data-lucide="menu" id="menu-icon" class="w-6 h-6"></i>
        </button>
    </div>

    <!-- Mobile Sidebar Dynamic Overlay -->
    <div id="sidebar-overlay" class="lg:hidden fixed inset-0 bg-black/60 z-40 backdrop-blur-sm hidden transition-opacity duration-300 opacity-0"></div>

    <!-- Sidebar Layout -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-72 bg-dark text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 flex flex-col p-8 overflow-y-auto">
        <!-- Profile info -->
        <div class="flex flex-col items-center mb-8">
            <img 
                src="https://picsum.photos/seed/designterminal/160/160" 
                alt="Design Terminal Logo" 
                class="w-32 h-32 rounded-full border-8 border-gray-800 mb-4 object-cover animate-pulse"
            >
            <h1 class="text-2xl font-bold font-raleway text-white text-center">Design Terminal</h1>
            <p class="text-xs text-gray-400 mt-1 font-mono tracking-wider">by Ada Lovelace Abir</p>
            <div class="flex gap-2 mt-4">
                <a href="#" class="w-9 h-9 rounded-full bg-gray-800 hover:bg-primary transition-colors flex items-center justify-center">
                    <i data-lucide="twitter" class="w-4.5 h-4.5"></i>
                </a>
                <a href="#" class="w-9 h-9 rounded-full bg-gray-800 hover:bg-primary transition-colors flex items-center justify-center">
                    <i data-lucide="facebook" class="w-4.5 h-4.5"></i>
                </a>
                <a href="#" class="w-9 h-9 rounded-full bg-gray-800 hover:bg-primary transition-colors flex items-center justify-center">
                    <i data-lucide="instagram" class="w-4.5 h-4.5"></i>
                </a>
                <a href="#" class="w-9 h-9 rounded-full bg-gray-800 hover:bg-primary transition-colors flex items-center justify-center">
                    <i data-lucide="linkedin" class="w-4.5 h-4.5"></i>
                </a>
                <a href="#" class="w-9 h-9 rounded-full bg-gray-800 hover:bg-primary transition-colors flex items-center justify-center">
                    <i data-lucide="github" class="w-4.5 h-4.5"></i>
                </a>
            </div>
        </div>

        <!-- Static Navigation -->
        <nav class="flex-1 mt-4">
            <ul class="space-y-4">
                <li>
                    <a href="#hero" class="nav-link flex items-center gap-4 w-full text-left py-2 transition-colors group text-primary" data-section="hero">
                        <span class="nav-icon-box p-2 rounded-full transition-colors bg-primary text-white">
                            <i data-lucide="home" class="w-5 h-5"></i>
                        </span>
                        <span class="font-medium font-poppins text-sm">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#about" class="nav-link flex items-center gap-4 w-full text-left py-2 transition-colors group text-gray-400 hover:text-white" data-section="about">
                        <span class="nav-icon-box p-2 rounded-full transition-colors bg-gray-800 group-hover:bg-primary group-hover:text-white">
                            <i data-lucide="user" class="w-5 h-5"></i>
                        </span>
                        <span class="font-medium font-poppins text-sm">About</span>
                    </a>
                </li>
                <li>
                    <a href="#resume" class="nav-link flex items-center gap-4 w-full text-left py-2 transition-colors group text-gray-400 hover:text-white" data-section="resume">
                        <span class="nav-icon-box p-2 rounded-full transition-colors bg-gray-800 group-hover:bg-primary group-hover:text-white">
                            <i data-lucide="file-text" class="w-5 h-5"></i>
                        </span>
                        <span class="font-medium font-poppins text-sm">Resume</span>
                    </a>
                </li>
                <li>
                    <a href="#portfolio" class="nav-link flex items-center gap-4 w-full text-left py-2 transition-colors group text-gray-400 hover:text-white" data-section="portfolio">
                        <span class="nav-icon-box p-2 rounded-full transition-colors bg-gray-800 group-hover:bg-primary group-hover:text-white">
                            <i data-lucide="briefcase" class="w-5 h-5"></i>
                        </span>
                        <span class="font-medium font-poppins text-sm">Portfolio</span>
                    </a>
                </li>
                <li>
                    <a href="#services" class="nav-link flex items-center gap-4 w-full text-left py-2 transition-colors group text-gray-400 hover:text-white" data-section="services">
                        <span class="nav-icon-box p-2 rounded-full transition-colors bg-gray-800 group-hover:bg-primary group-hover:text-white">
                            <i data-lucide="server" class="w-5 h-5"></i>
                        </span>
                        <span class="font-medium font-poppins text-sm">Services</span>
                    </a>
                </li>
                <li>
                    <a href="#contact" class="nav-link flex items-center gap-4 w-full text-left py-2 transition-colors group text-gray-400 hover:text-white" data-section="contact">
                        <span class="nav-icon-box p-2 rounded-full transition-colors bg-gray-800 group-hover:bg-primary group-hover:text-white">
                            <i data-lucide="mail" class="w-5 h-5"></i>
                        </span>
                        <span class="font-medium font-poppins text-sm">Contact</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Sidebar footer -->
        <footer class="mt-auto pt-8 text-xs text-gray-500 text-center border-t border-gray-805">
            <p>&copy; <?php echo date('Y'); ?> <strong>Design Terminal</strong></p>
            <p class="mt-1">License: <a href="https://adalovelaceabir.com" class="hover:text-primary transition-colors text-gray-400" target="_blank">adalovelaceabir.com</a></p>
        </footer>
    </aside>

    <!-- Main Content Wrapper -->
    <main class="flex-1 lg:ml-72 bg-white min-h-screen">
        
        <!-- Hero Section -->
        <section id="hero" class="h-screen relative flex items-center bg-cover bg-center overflow-hidden pt-0 pb-0" 
            style="background-image: linear-gradient(rgba(4, 11, 20, 0.45), rgba(4, 11, 20, 0.45)), url('https://picsum.photos/seed/abir-bg/1920/1080');">
            <div class="container px-8 lg:px-20 z-10 text-white">
                <h2 class="text-4xl lg:text-7xl font-extrabold font-raleway mb-4 tracking-tight drop-shadow-md text-white">
                    Design Terminal
                </h2>
                <p class="text-xl lg:text-3xl font-poppins mb-6 text-gray-200 font-light max-w-3xl">
                    Custom Merchandise & Coding Culture Aesthetics
                </p>
                <p class="text-lg lg:text-xl font-poppins max-w-2xl text-gray-200">
                    I'm <span class="border-b-2 border-primary font-bold text-white tracking-wide" id="typewriter-text"></span>
                    <span class="inline-block w-1 h-7 bg-primary ml-1 align-middle animate-[ping_1s_infinite]"></span>
                </p>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="px-8 lg:px-20">
            <div class="section-title">
                <h2>About the Studio</h2>
                <p class="max-w-4xl leading-relaxed text-gray-600 text-base">
                    Welcome to <strong>Design Terminal</strong>, a specialized print-on-demand creative design studio focused entirely on software engineering culture, software development, zero-day research, and developer lifestyle merchandise. Founded by <strong>Ada Lovelace Abir</strong>, we merge core coding aesthetics with professional typography and modern design patterns.
                </p>
            </div>

            <div class="grid lg:grid-cols-3 gap-12 mt-12 items-start">
                <div class="col-span-1">
                    <img 
                        src="https://picsum.photos/seed/abir-about/600/600" 
                        alt="About Design Terminal & Abir" 
                        class="w-full rounded-2xl shadow-2xl hover:scale-[1.02] transition-transform duration-500"
                    >
                </div>
                <div class="col-span-2 space-y-6">
                    <h3 class="text-3xl font-bold text-dark font-raleway">Coding Culture & Developer Lifestyle Gear</h3>
                    <p class="italic text-gray-500 text-lg">
                        Crafting original artwork, custom layouts, and high-quality gear for tech circles.
                    </p>
                    <div class="grid md:grid-cols-2 gap-y-6 gap-x-4 border-b border-t py-6">
                        <ul class="space-y-4 text-sm">
                            <li class="flex items-center gap-3">
                                <i data-lucide="chevron-right" class="text-primary w-5 h-5 shrink-0"></i> 
                                <span class="font-bold text-dark mr-1">Lead Designer:</span> 
                                <span class="text-gray-600">Ada Lovelace Abir</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i data-lucide="chevron-right" class="text-primary w-5 h-5 shrink-0"></i> 
                                <span class="font-bold text-dark mr-1">Location:</span> 
                                <span class="text-gray-600">Tangail Sadar, Bangladesh</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i data-lucide="chevron-right" class="text-primary w-5 h-5 shrink-0"></i> 
                                <span class="font-bold text-dark mr-1">Website:</span> 
                                <span class="text-gray-600">adalovelaceabir.com</span>
                            </li>
                        </ul>
                        <ul class="space-y-4 text-sm">
                            <li class="flex items-center gap-3">
                                <i data-lucide="chevron-right" class="text-primary w-5 h-5 shrink-0"></i> 
                                <span class="font-bold text-dark mr-1">Email:</span> 
                                <span class="text-gray-600">adalovelaceabir@gmail.com</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i data-lucide="chevron-right" class="text-primary w-5 h-5 shrink-0"></i> 
                                <span class="font-bold text-dark mr-1">Phone:</span> 
                                <span class="text-gray-600">01747973857</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i data-lucide="chevron-right" class="text-primary w-5 h-5 shrink-0"></i> 
                                <span class="font-bold text-dark mr-1">Availability:</span> 
                                <span class="text-gray-600">Custom & Large Orders</span>
                            </li>
                        </ul>
                    </div>
                    <p class="text-gray-600 leading-relaxed text-sm">
                        At <strong>Design Terminal</strong>, we are committed to providing programmers, computer science students, ethical hackers, and IT professionals with superior, highly creative, and original artwork. We believe that technology shouldn't just be loaded on displays—it belongs in high-quality fashion and everyday developer lifestyle items that build pride within tech communities.
                    </p>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section id="stats" class="bg-gray-50 px-8 lg:px-20 py-12">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="flex flex-col items-center text-center p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="mb-6 p-4 bg-blue-50 rounded-full text-primary">
                        <i data-lucide="smile" class="w-8 h-8"></i>
                    </div>
                    <span class="text-3xl font-extrabold text-dark mb-2">1,200+</span>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Happy Customers</p>
                </div>
                <div class="flex flex-col items-center text-center p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="mb-6 p-4 bg-blue-50 rounded-full text-primary">
                        <i data-lucide="file-text" class="w-8 h-8"></i>
                    </div>
                    <span class="text-3xl font-extrabold text-dark mb-2">150+</span>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Original Works</p>
                </div>
                <div class="flex flex-col items-center text-center p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="mb-6 p-4 bg-blue-50 rounded-full text-primary">
                        <i data-lucide="headset" class="w-8 h-8"></i>
                    </div>
                    <span class="text-3xl font-extrabold text-dark mb-2">100%</span>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Quality Guarantee</p>
                </div>
                <div class="flex flex-col items-center text-center p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="mb-6 p-4 bg-blue-50 rounded-full text-primary">
                        <i data-lucide="users" class="w-8 h-8"></i>
                    </div>
                    <span class="text-3xl font-extrabold text-dark mb-2">25+</span>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Tech Circles Supported</p>
                </div>
            </div>
        </section>

        <!-- Capabilities Section -->
        <section id="skills" class="px-8 lg:px-20">
            <div class="section-title">
                <h2>Capabilities</h2>
                <p>Our comprehensive core proficiencies in vector illustration, print production, and tech branding aesthetics.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-x-12 gap-y-8 mt-12">
                <div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold uppercase text-xs tracking-wider text-dark">Merchandise Tech Illustration</span>
                        <span class="font-bold text-xs text-primary">95%</span>
                    </div>
                    <div class="h-3 w-full bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full transition-all duration-1000 width-animate" style="width: 95%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold uppercase text-xs tracking-wider text-dark">Custom Typography & Layouts</span>
                        <span class="font-bold text-xs text-primary">90%</span>
                    </div>
                    <div class="h-3 w-full bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full transition-all duration-1000 width-animate" style="width: 90%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold uppercase text-xs tracking-wider text-dark">Print-on-Demand Production Setups</span>
                        <span class="font-bold text-xs text-primary">85%</span>
                    </div>
                    <div class="h-3 w-full bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full transition-all duration-1000 width-animate" style="width: 85%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold uppercase text-xs tracking-wider text-dark">High-Res Vector Optimization</span>
                        <span class="font-bold text-xs text-primary">95%</span>
                    </div>
                    <div class="h-3 w-full bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full transition-all duration-1000 width-animate" style="width: 95%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold uppercase text-xs tracking-wider text-dark">Programmer Humour & Culture Curation</span>
                        <span class="font-bold text-xs text-primary">90%</span>
                    </div>
                    <div class="h-3 w-full bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full transition-all duration-1000 width-animate" style="width: 90%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold uppercase text-xs tracking-wider text-dark">Blockchain & Tech Hub Styling</span>
                        <span class="font-bold text-xs text-primary">80%</span>
                    </div>
                    <div class="h-3 w-full bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full transition-all duration-1000 width-animate" style="width: 80%"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Journey Section -->
        <section id="resume" class="px-8 lg:px-20">
            <div class="section-title">
                <h2>Our Journey</h2>
                <p>A timeline of academic fundamentals and the growth of our specialized print-on-demand design studio.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 mt-12">
                <!-- Academic & Study -->
                <div class="space-y-12">
                    <h3 class="text-2xl font-extrabold border-l-4 border-primary pl-4 mb-8 text-dark">Academic & Self Study</h3>
                    <div class="relative pl-8 border-l-2 border-gray-100 ml-2">
                        <div class="absolute w-4 h-4 bg-white rounded-full -left-[9px] top-0 border-2 border-primary shadow-sm"></div>
                        <h4 class="text-lg font-bold uppercase text-dark">Higher Secondary Education</h4>
                        <span class="bg-gray-100 inline-block px-3 py-1 rounded text-xs font-bold my-3 text-gray-500">2023 - Present</span>
                        <p class="italic mb-2 font-medium text-gray-400 text-sm">Tangail, Dhaka, Bangladesh</p>
                        <p class="text-sm text-gray-600 leading-relaxed">Focusing on Science, Mathematics, and Computer Science to build a strong theoretical foundation.</p>
                    </div>
                    <div class="relative pl-8 border-l-2 border-gray-100 ml-2 pt-4">
                        <div class="absolute w-4 h-4 bg-white rounded-full -left-[9px] top-4 border-2 border-primary shadow-sm"></div>
                        <h4 class="text-lg font-bold uppercase text-dark">Self-Taught Vector Art & Prints</h4>
                        <span class="bg-gray-100 inline-block px-3 py-1 rounded text-xs font-bold my-3 text-gray-500">2020 - 2023</span>
                        <p class="italic mb-2 font-medium text-gray-400 text-sm">Online Community Guides & Design Specs</p>
                        <p class="text-sm text-gray-600 leading-relaxed">Completed comprehensive exercises in digital vectoring, apparel color separation, and high-DPI scaling presets.</p>
                    </div>
                </div>

                <!-- Studio timeline -->
                <div class="space-y-12">
                    <h3 class="text-2xl font-extrabold border-l-4 border-primary pl-4 mb-8 text-dark">Studio Operations</h3>
                    <div class="relative pl-8 border-l-2 border-gray-100 ml-2">
                        <div class="absolute w-4 h-4 bg-white rounded-full -left-[9px] top-0 border-2 border-primary shadow-sm"></div>
                        <h4 class="text-lg font-bold uppercase text-dark">Founder & Lead Artist at Design Terminal</h4>
                        <span class="bg-gray-100 inline-block px-3 py-1 rounded text-xs font-bold my-3 text-gray-500">2024 - Present</span>
                        <p class="italic mb-2 font-medium text-gray-400 text-sm">Global Remote Studio</p>
                        <ul class="list-disc space-y-3 pl-4 text-sm text-gray-600">
                            <li>Building print-on-demand pipelines for t-shirts, hoodies, and desk accessories.</li>
                            <li>Ensuring 100% original high-contrast design blueprints with zero pixel bleed.</li>
                            <li>Liaising with international printing partners to guarantee premium materials.</li>
                        </ul>
                    </div>
                    <div class="relative pl-8 border-l-2 border-gray-100 ml-2 pt-4">
                        <div class="absolute w-4 h-4 bg-white rounded-full -left-[9px] top-4 border-2 border-primary shadow-sm"></div>
                        <h4 class="text-lg font-bold uppercase text-dark">Tech Community Merch Consultant</h4>
                        <span class="bg-gray-100 inline-block px-3 py-1 rounded text-xs font-bold my-3 text-gray-500">2022 - Present</span>
                        <p class="italic mb-2 font-medium text-gray-400 text-sm">Freelance Portfolio</p>
                        <ul class="list-disc space-y-3 pl-4 text-sm text-gray-600">
                            <li>Customizing developer graphics, system layouts, and sticker themes for dev communities.</li>
                            <li>Deploying web frontends and asset portfolios tailored for tech lifestyle prints.</li>
                            <li>Integrating blockchain and hardware aesthetics into merchandise graphics.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio Section -->
        <section id="portfolio" class="bg-gray-50 px-8 lg:px-20">
            <div class="section-title">
                <h2>Original Portfolio</h2>
                <p>Our creative showcase across 6 primary tech-inspired on-demand merchandise categories.</p>
            </div>

            <!-- Portfolio Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
                
                <!-- Card 1 -->
                <div class="relative overflow-hidden rounded-2xl shadow-lg aspect-[4/3] bg-dark cursor-pointer group">
                    <img src="https://picsum.photos/seed/shirtdes/800/600" alt="Init (0) Classic Tee" class="w-full h-full object-cover opacity-90 transition-transform duration-500 group-hover:scale-108 group-hover:opacity-40">
                    <div class="absolute inset-0 flex flex-col justify-end p-6 bg-gradient-to-t from-dark/95 via-dark/80 to-transparent text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="self-start text-[10px] font-bold tracking-widest uppercase text-primary px-3 py-1 bg-primary/15 rounded-full mb-2 border border-primary/20">Programmer T-Shirts</span>
                        <h4 class="text-xl font-extrabold font-raleway mb-1 text-white">Init (0) Classic Tee</h4>
                        <p class="text-xs text-gray-300 mb-4 line-clamp-2">Minimalist layout optimized, high contrast, breathable premium combed cotton.</p>
                        <div class="flex gap-3">
                            <span class="w-10 h-10 rounded-full bg-primary text-white hover:bg-blue-600 transition-colors flex items-center justify-center shadow-lg"><i data-lucide="zoom-in" class="w-5 h-5"></i></span>
                            <span class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors flex items-center justify-center backdrop-blur-md"><i data-lucide="external-link" class="w-5 h-5"></i></span>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="relative overflow-hidden rounded-2xl shadow-lg aspect-[4/3] bg-dark cursor-pointer group">
                    <img src="https://picsum.photos/seed/hoodierock/800/600" alt="Fullstack Overlord Hoodie" class="w-full h-full object-cover opacity-90 transition-transform duration-500 group-hover:scale-108 group-hover:opacity-40">
                    <div class="absolute inset-0 flex flex-col justify-end p-6 bg-gradient-to-t from-dark/95 via-dark/80 to-transparent text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="self-start text-[10px] font-bold tracking-widest uppercase text-primary px-3 py-1 bg-primary/15 rounded-full mb-2 border border-primary/20">Developer Hoodies</span>
                        <h4 class="text-xl font-extrabold font-raleway mb-1 text-white">Fullstack Overlord Hoodie</h4>
                        <p class="text-xs text-gray-300 mb-4 line-clamp-2">Premium heavy cotton blend featuring complete stack layout vector accents.</p>
                        <div class="flex gap-3">
                            <span class="w-10 h-10 rounded-full bg-primary text-white hover:bg-blue-600 transition-colors flex items-center justify-center shadow-lg"><i data-lucide="zoom-in" class="w-5 h-5"></i></span>
                            <span class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors flex items-center justify-center backdrop-blur-md"><i data-lucide="external-link" class="w-5 h-5"></i></span>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="relative overflow-hidden rounded-2xl shadow-lg aspect-[4/3] bg-dark cursor-pointer group">
                    <img src="https://picsum.photos/seed/coffemug/800/600" alt="Caffeine Compiler Ceramic Mug" class="w-full h-full object-cover opacity-90 transition-transform duration-500 group-hover:scale-108 group-hover:opacity-40">
                    <div class="absolute inset-0 flex flex-col justify-end p-6 bg-gradient-to-t from-dark/95 via-dark/80 to-transparent text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="self-start text-[10px] font-bold tracking-widest uppercase text-primary px-3 py-1 bg-primary/15 rounded-full mb-2 border border-primary/20">Coding Mugs</span>
                        <h4 class="text-xl font-extrabold font-raleway mb-1 text-white">Caffeine Compiler Ceramic Mug</h4>
                        <p class="text-xs text-gray-300 mb-4 line-clamp-2">Heat-activated compilation success messages and system details.</p>
                        <div class="flex gap-3">
                            <span class="w-10 h-10 rounded-full bg-primary text-white hover:bg-blue-600 transition-colors flex items-center justify-center shadow-lg"><i data-lucide="zoom-in" class="w-5 h-5"></i></span>
                            <span class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors flex items-center justify-center backdrop-blur-md"><i data-lucide="external-link" class="w-5 h-5"></i></span>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="relative overflow-hidden rounded-2xl shadow-lg aspect-[4/3] bg-dark cursor-pointer group">
                    <img src="https://picsum.photos/seed/phoneshell/800/600" alt="Zero-Day Hardened Case" class="w-full h-full object-cover opacity-90 transition-transform duration-500 group-hover:scale-108 group-hover:opacity-40">
                    <div class="absolute inset-0 flex flex-col justify-end p-6 bg-gradient-to-t from-dark/95 via-dark/80 to-transparent text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="self-start text-[10px] font-bold tracking-widest uppercase text-primary px-3 py-1 bg-primary/15 rounded-full mb-2 border border-primary/20">Tech Phone Cases</span>
                        <h4 class="text-xl font-extrabold font-raleway mb-1 text-white">Zero-Day Hardened Case</h4>
                        <p class="text-xs text-gray-300 mb-4 line-clamp-2">Durable dual-layer impact absorption case featuring slick debugger logs.</p>
                        <div class="flex gap-3">
                            <span class="w-10 h-10 rounded-full bg-primary text-white hover:bg-blue-600 transition-colors flex items-center justify-center shadow-lg"><i data-lucide="zoom-in" class="w-5 h-5"></i></span>
                            <span class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors flex items-center justify-center backdrop-blur-md"><i data-lucide="external-link" class="w-5 h-5"></i></span>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="relative overflow-hidden rounded-2xl shadow-lg aspect-[4/3] bg-dark cursor-pointer group">
                    <img src="https://picsum.photos/seed/vinyldecal/800/600" alt="Hacker Core Sticker Pack" class="w-full h-full object-cover opacity-90 transition-transform duration-500 group-hover:scale-108 group-hover:opacity-40">
                    <div class="absolute inset-0 flex flex-col justify-end p-6 bg-gradient-to-t from-dark/95 via-dark/80 to-transparent text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="self-start text-[10px] font-bold tracking-widest uppercase text-primary px-3 py-1 bg-primary/15 rounded-full mb-2 border border-primary/20">Stickers</span>
                        <h4 class="text-xl font-extrabold font-raleway mb-1 text-white">Hacker Core Sticker Pack</h4>
                        <p class="text-xs text-gray-300 mb-4 line-clamp-2 font-poppins">Ultra-durable, waterproof, matte workspace graphics package.</p>
                        <div class="flex gap-3">
                            <span class="w-10 h-10 rounded-full bg-primary text-white hover:bg-blue-600 transition-colors flex items-center justify-center shadow-lg"><i data-lucide="zoom-in" class="w-5 h-5"></i></span>
                            <span class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors flex items-center justify-center backdrop-blur-md"><i data-lucide="external-link" class="w-5 h-5"></i></span>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="relative overflow-hidden rounded-2xl shadow-lg aspect-[4/3] bg-dark cursor-pointer group">
                    <img src="https://picsum.photos/seed/totespac/800/600" alt="Tarball Archive Carry Sack" class="w-full h-full object-cover opacity-90 transition-transform duration-500 group-hover:scale-108 group-hover:opacity-40">
                    <div class="absolute inset-0 flex flex-col justify-end p-6 bg-gradient-to-t from-dark/95 via-dark/80 to-transparent text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="self-start text-[10px] font-bold tracking-widest uppercase text-primary px-3 py-1 bg-primary/15 rounded-full mb-2 border border-primary/20">Tote Bags</span>
                        <h4 class="text-xl font-extrabold font-raleway mb-1 text-white">Tarball Archive Carry Sack</h4>
                        <p class="text-xs text-gray-300 mb-4 line-clamp-2 font-poppins">Durable heavy density canvas mimicking bulk module directory folders.</p>
                        <div class="flex gap-3">
                            <span class="w-10 h-10 rounded-full bg-primary text-white hover:bg-blue-600 transition-colors flex items-center justify-center shadow-lg"><i data-lucide="zoom-in" class="w-5 h-5"></i></span>
                            <span class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors flex items-center justify-center backdrop-blur-md"><i data-lucide="external-link" class="w-5 h-5"></i></span>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="px-8 lg:px-20">
            <div class="section-title">
                <h2>Services</h2>
                <p>Professional services we provide for custom tech designs and developer hubs.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12 text-center">
                <!-- Service 1 -->
                <div class="group p-10 rounded-3xl bg-white border-2 border-gray-50 hover:border-primary transition-all duration-300 shadow-sm hover:shadow-2xl">
                    <div class="w-20 h-20 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300 mb-8 mx-auto shadow-inner">
                        <i data-lucide="shirt" class="w-9 h-9"></i>
                    </div>
                    <h4 class="text-xl font-extrabold mb-4 group-hover:text-primary transition-colors">Custom T-Shirt Design</h4>
                    <p class="text-gray-500 leading-relaxed text-sm group-hover:text-gray-600 transition-colors">Bespoke apparel assets tailored for dev teams, conferences, and custom developer community orders.</p>
                </div>
                <!-- Service 2 -->
                <div class="group p-10 rounded-3xl bg-white border-2 border-gray-50 hover:border-primary transition-all duration-300 shadow-sm hover:shadow-2xl">
                    <div class="w-20 h-20 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300 mb-8 mx-auto shadow-inner">
                        <i data-lucide="pocket" class="w-9 h-9"></i>
                    </div>
                    <h4 class="text-xl font-extrabold mb-4 group-hover:text-primary transition-colors">POD Design Creation</h4>
                    <p class="text-gray-500 leading-relaxed text-sm group-hover:text-gray-600 transition-colors">Professional, print-ready graphics formatted perfectly for automated print-on-demand production lines.</p>
                </div>
                <!-- Service 3 -->
                <div class="group p-10 rounded-3xl bg-white border-2 border-gray-50 hover:border-primary transition-all duration-300 shadow-sm hover:shadow-2xl">
                    <div class="w-20 h-20 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300 mb-8 mx-auto shadow-inner">
                        <i data-lucide="type" class="w-9 h-9"></i>
                    </div>
                    <h4 class="text-xl font-extrabold mb-4 group-hover:text-primary transition-colors">Typography Design</h4>
                    <p class="text-gray-500 leading-relaxed text-sm group-hover:text-gray-600 transition-colors">Clean, terminal-styled typography layouts, clean font pairings, and developer lifestyle lettering.</p>
                </div>
                <!-- Service 4 -->
                <div class="group p-10 rounded-3xl bg-white border-2 border-gray-50 hover:border-primary transition-all duration-300 shadow-sm hover:shadow-2xl">
                    <div class="w-20 h-20 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300 mb-8 mx-auto shadow-inner">
                        <i data-lucide="palette" class="w-9 h-9"></i>
                    </div>
                    <h4 class="text-xl font-extrabold mb-4 group-hover:text-primary transition-colors">Merchandise Graphics</h4>
                    <p class="text-gray-500 leading-relaxed text-sm group-hover:text-gray-600 transition-colors">From custom pixel-perfect sticker bundles to high-density heavy embroidery patterns for developers.</p>
                </div>
                <!-- Service 5 -->
                <div class="group p-10 rounded-3xl bg-white border-2 border-gray-50 hover:border-primary transition-all duration-300 shadow-sm hover:shadow-2xl">
                    <div class="w-20 h-20 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300 mb-8 mx-auto shadow-inner">
                        <i data-lucide="users" class="w-9 h-9"></i>
                    </div>
                    <h4 class="text-xl font-extrabold mb-4 group-hover:text-primary transition-colors">Branding for Tech groups</h4>
                    <p class="text-gray-500 leading-relaxed text-sm group-hover:text-gray-600 transition-colors">Complete visual styling, dynamic tech emblems, and customized community merchandise ecosystems.</p>
                </div>
                <!-- Service 6 -->
                <div class="group p-10 rounded-3xl bg-white border-2 border-gray-50 hover:border-primary transition-all duration-300 shadow-sm hover:shadow-2xl">
                    <div class="w-20 h-20 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300 mb-8 mx-auto shadow-inner">
                        <i data-lucide="laptop" class="w-9 h-9"></i>
                    </div>
                    <h4 class="text-xl font-extrabold mb-4 group-hover:text-primary transition-colors">Lifestyle Products</h4>
                    <p class="text-gray-500 leading-relaxed text-sm group-hover:text-gray-600 transition-colors">Stylized coding designs crafted for phone cases, ceramic mugs, tote bags, and tech workstation gear.</p>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="bg-gray-50 px-8 lg:px-20">
            <div class="section-title">
                <h2>Contact</h2>
                <p>Feel free to reach out for collaborations, specialized merch bundles, or custom team designs.</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-12 mt-12">
                <div class="col-span-1 space-y-6">
                    <div class="p-8 bg-white rounded-3xl shadow-lg space-y-10 border border-gray-50">
                        <div class="flex gap-6 group">
                            <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all shadow-sm">
                                <i data-lucide="map-pin" class="w-7 h-7"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold mb-1 col-dark">Locality:</h4>
                                <p class="text-gray-500 text-sm">Char Hugra, Hugra, Tangail Sadar, Bangladesh</p>
                            </div>
                        </div>
                        <div class="flex gap-6 group">
                            <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all shadow-sm">
                                <i data-lucide="mail" class="w-7 h-7"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold mb-1 col-dark">Email:</h4>
                                <p class="text-gray-500 text-sm">adalovelaceabir@gmail.com</p>
                            </div>
                        </div>
                        <div class="flex gap-6 group">
                            <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all shadow-sm">
                                <i data-lucide="phone" class="w-7 h-7"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold mb-1 col-dark">Phone:</h4>
                                <p class="text-gray-500 text-sm">01747973857</p>
                            </div>
                        </div>
                        
                        <div class="rounded-2xl overflow-hidden h-72 shadow-inner border border-gray-100">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116345.932971239!2d89.8519634!3d24.2514101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fdfbc26a3f3a97%3A0x6d859187399587!2sTangail%20Sadar%20Upazila!5e0!3m2!1sen!2sbd!4v1676961268712!5m2!1sen!2sbd" 
                                width="100%" 
                                height="100%" 
                                style="border: 0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <form class="p-10 bg-white rounded-3xl shadow-xl space-y-8 border border-gray-50" onsubmit="event.preventDefault(); alert('Message sent successfully!'); this.reset();">
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-dark tracking-tight">Your Name</label>
                                <input type="text" class="w-full px-5 py-4 rounded-xl border-2 border-gray-100 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" required>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-dark tracking-tight">Your Email</label>
                                <input type="email" class="w-full px-5 py-4 rounded-xl border-2 border-gray-100 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" required>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-dark tracking-tight">Subject</label>
                            <input type="text" class="w-full px-5 py-4 rounded-xl border-2 border-gray-100 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" required>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-dark tracking-tight">Message</label>
                            <textarea rows="6" class="w-full px-5 py-4 rounded-xl border-2 border-gray-100 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all resize-none" required></textarea>
                        </div>
                        <div class="text-center pt-4">
                            <button type="submit" class="bg-primary hover:bg-blue-700 text-white font-extrabold py-4 px-12 rounded-full transition-all flex items-center justify-center gap-3 mx-auto shadow-lg hover:shadow-primary/30 active:scale-95">
                                <i data-lucide="send" class="w-5 h-5"></i>
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Outer Footer -->
        <footer class="py-20 bg-dark text-white text-center">
            <div class="container mx-auto px-8 lg:px-20">
                <h3 class="text-4xl font-extrabold font-raleway mb-6 text-white">
                    Design Terminal
                </h3>
                <p class="text-gray-400 italic mb-10 max-w-xl mx-auto text-lg leading-relaxed">
                    &quot;Original, high-quality merchandise dedicated to software culture and developer pride.&quot;
                </p>
                <div class="flex justify-center gap-4 mb-12">
                    <a href="#" class="w-12 h-12 rounded-full bg-gray-800 hover:bg-primary transition-all duration-300 flex items-center justify-center group shadow-lg">
                        <i data-lucide="twitter" class="w-6 h-6 group-hover:scale-110 transition-transform text-white"></i>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-full bg-gray-800 hover:bg-primary transition-all duration-300 flex items-center justify-center group shadow-lg">
                        <i data-lucide="facebook" class="w-6 h-6 group-hover:scale-110 transition-transform text-white"></i>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-full bg-gray-800 hover:bg-primary transition-all duration-300 flex items-center justify-center group shadow-lg">
                        <i data-lucide="instagram" class="w-6 h-6 group-hover:scale-110 transition-transform text-white"></i>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-full bg-gray-800 hover:bg-primary transition-all duration-300 flex items-center justify-center group shadow-lg">
                        <i data-lucide="linkedin" class="w-6 h-6 group-hover:scale-110 transition-transform text-white"></i>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-full bg-gray-800 hover:bg-primary transition-all duration-300 flex items-center justify-center group shadow-lg">
                        <i data-lucide="github" class="w-6 h-6 group-hover:scale-110 transition-transform text-white"></i>
                    </a>
                </div>
                <div class="text-sm text-gray-500 font-medium tracking-tight">
                    <p>&copy; <?php echo date('Y'); ?> <strong><span>Design Terminal</span></strong>. All Rights Reserved</p>
                    <p class="mt-2">Visit: <a href="https://adalovelaceabir.com" class="text-primary hover:underline" target="_blank">adalovelaceabir.com</a></p>
                </div>
            </div>
        </footer>

    </main>

    <!-- Lucide Icon script -->
    <script src="https://cdn.jsdelivr.net/npm/lucide/dist/umd/lucide.min.js"></script>
    <script>
        // Init Lucide Icons
        lucide.createIcons();

        // 1. Mobile Sidebar Logic
        const menuToggleBtn = document.getElementById('mobile-menu-toggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const menuIcon = document.getElementById('menu-icon');

        let isSidebarOpen = false;

        function toggleSidebar() {
            isSidebarOpen = !isSidebarOpen;
            if (isSidebarOpen) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.add('opacity-100'), 10);
                menuToggleBtn.innerHTML = '<i data-lucide="x" class="w-6 h-6 text-white"></i>';
                lucide.createIcons();
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.remove('opacity-100');
                setTimeout(() => overlay.classList.add('hidden'), 300);
                menuToggleBtn.innerHTML = '<i data-lucide="menu" class="w-6 h-6 text-white"></i>';
                lucide.createIcons();
            }
        }

        menuToggleBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        // 2. Auto Typewriter Subtitle
        const typewriterText = document.getElementById('typewriter-text');
        const occupations = [
            'Design Terminal', 
            'Print-on-Demand Studio', 
            'Coding Culture Merch', 
            'Developer Lifestyle Apparel', 
            'Minimal Coder Aesthetics'
        ];

        let wordIndex = 0;
        let charIndex = 0;
        let isDeleting = false;

        function type() {
            const currentWord = occupations[wordIndex % occupations.length];
            
            if (isDeleting) {
                typewriterText.textContent = currentWord.substring(0, charIndex - 1);
                charIndex--;
            } else {
                typewriterText.textContent = currentWord.substring(0, charIndex + 1);
                charIndex++;
            }

            let typingSpeed = isDeleting ? 40 : 100;

            if (!isDeleting && charIndex === currentWord.length) {
                typingSpeed = 2000;
                isDeleting = true;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                wordIndex++;
                typingSpeed = 500;
            }

            setTimeout(type, typingSpeed);
        }

        setTimeout(type, 1000);

        // 3. Scrollspy active link toggle
        const sections = document.querySelectorAll('section');
        const navLinks = document.querySelectorAll('.nav-link');

        window.addEventListener('scroll', () => {
            let current = 'hero';
            const scrollPos = window.scrollY || window.pageYOffset;

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (scrollPos >= sectionTop - 150) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                const sectionId = link.getAttribute('data-section');
                const iconBox = link.querySelector('.nav-icon-box');

                if (sectionId === current) {
                    link.classList.remove('text-gray-400');
                    link.classList.add('text-primary');
                    if (iconBox) {
                        iconBox.classList.remove('bg-gray-800');
                        iconBox.classList.add('bg-primary', 'text-white');
                    }
                } else {
                    link.classList.add('text-gray-400');
                    link.classList.remove('text-primary');
                    if (iconBox) {
                        iconBox.classList.add('bg-gray-800');
                        iconBox.classList.remove('bg-primary', 'text-white');
                    }
                }
            });
        });

        // Close sidebar on responsive navigation click
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 1024) {
                    toggleSidebar();
                }
            });
        });
    </script>
    <?php wp_footer(); ?>
</body>
</html>
