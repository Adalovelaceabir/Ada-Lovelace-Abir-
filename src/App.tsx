import React, { useState, useEffect } from 'react';
import { 
  Home, 
  User, 
  FileText, 
  Briefcase, 
  Server, 
  Mail, 
  Twitter, 
  Facebook, 
  Instagram, 
  Linkedin, 
  Github,
  Menu,
  X,
  ChevronRight,
  Smile,
  BookOpen as JournalText,
  Headset,
  Users,
  ExternalLink,
  Search as ZoomIn,
  MapPin,
  Phone,
  Send
} from 'lucide-react';
import { motion, AnimatePresence } from 'motion/react';

// --- Types ---
interface NavItem {
  id: string;
  label: string;
  icon: React.ReactNode;
}

const navItems: NavItem[] = [
  { id: 'hero', label: 'Home', icon: <Home size={20} /> },
  { id: 'about', label: 'About', icon: <User size={20} /> },
  { id: 'resume', label: 'Resume', icon: <FileText size={20} /> },
  { id: 'portfolio', label: 'Portfolio', icon: <Briefcase size={20} /> },
  { id: 'services', label: 'Services', icon: <Server size={20} /> },
  { id: 'contact', label: 'Contact', icon: <Mail size={20} /> },
];

export default function App() {
  const [activeSection, setActiveSection] = useState('hero');
  const [isSidebarOpen, setIsSidebarOpen] = useState(false);
  const [typedText, setTypedText] = useState('');
  const [typedIndex, setTypedIndex] = useState(0);
  const [isDeleting, setIsDeleting] = useState(false);
  
  const occupations = ['Design Terminal', 'Print-on-Demand Studio', 'Coding Culture Merch', 'Developer Lifestyle Apparel', 'Minimal Coder Aesthetics'];

  useEffect(() => {
    const typingSpeed = isDeleting ? 50 : 100;
    const handleTyping = () => {
      const current = occupations[typedIndex % occupations.length];
      if (isDeleting) {
        setTypedText(current.substring(0, typedText.length - 1));
        if (typedText === '') {
          setIsDeleting(false);
          setTypedIndex(typedIndex + 1);
        }
      } else {
        setTypedText(current.substring(0, typedText.length + 1));
        if (typedText === current) {
          setTimeout(() => setIsDeleting(true), 2000);
        }
      }
    };

    const timer = setTimeout(handleTyping, typingSpeed);
    return () => clearTimeout(timer);
  }, [typedText, isDeleting, typedIndex]);

  useEffect(() => {
    const handleScroll = () => {
      const sections = document.querySelectorAll('section');
      let current = 'hero';
      sections.forEach((section) => {
        const rect = section.getBoundingClientRect();
        if (rect.top <= 150) {
          current = section.getAttribute('id') || 'hero';
        }
      });
      setActiveSection(current);
    };

    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const scrollTo = (id: string) => {
    const element = document.getElementById(id);
    if (element) {
      const offset = 0;
      const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
      window.scrollTo({
        top: elementPosition - offset,
        behavior: 'smooth'
      });
    }
    setIsSidebarOpen(false);
  };

  return (
    <div className="flex flex-col lg:flex-row min-h-screen relative">
      {/* Copyright Watermark */}
      <div className="fixed bottom-4 right-4 z-[60] bg-dark/20 backdrop-blur-md px-3 py-1 rounded-full text-[10px] text-white/50 pointer-events-none select-none border border-white/10 hidden md:block">
        &copy; adalovelaceabir.com
      </div>

      {/* Mobile Header */}
      <div className="lg:hidden fixed top-0 left-0 right-0 z-50 bg-dark p-4 flex justify-between items-center text-white">
        <h1 className="text-xl font-bold tracking-tight">Design Terminal</h1>
        <button onClick={() => setIsSidebarOpen(!isSidebarOpen)} className="p-2 bg-primary rounded-full">
          {isSidebarOpen ? <X size={24} /> : <Menu size={24} />}
        </button>
      </div>

      {/* Sidebar Overlay */}
      <AnimatePresence>
        {isSidebarOpen && (
          <motion.div 
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            exit={{ opacity: 0 }}
            onClick={() => setIsSidebarOpen(false)}
            className="lg:hidden fixed inset-0 bg-black/60 z-40 backdrop-blur-sm"
          />
        )}
      </AnimatePresence>

      {/* Sidebar */}
      <aside className={`
        fixed inset-y-0 left-0 z-50 w-72 bg-dark text-white transform transition-transform duration-300 lg:translate-x-0
        ${isSidebarOpen ? 'translate-x-0' : '-translate-x-full'}
      `}>
        <div className="h-full flex flex-col p-8 overflow-y-auto">
          {/* Profile */}
          <div className="flex flex-col items-center mb-8">
            <img 
              src="https://picsum.photos/seed/designterminal/160/160" 
              alt="Design Terminal" 
              className="w-32 h-32 rounded-full border-8 border-gray-800 mb-4 object-cover animate-pulse"
              referrerPolicy="no-referrer"
            />
            <h1 className="text-2xl font-bold font-raleway text-center">Design Terminal</h1>
            <p className="text-xs text-gray-400 mt-1 font-mono tracking-wider">by Ada Lovelace Abir</p>
            <div className="flex gap-2 mt-4">
              {[Twitter, Facebook, Instagram, Linkedin, Github].map((Icon, idx) => (
                <a key={idx} href="#" className="w-9 h-9 rounded-full bg-gray-800 hover:bg-primary transition-colors flex items-center justify-center">
                  <Icon size={18} />
                </a>
              ))}
            </div>
          </div>

          {/* Nav */}
          <nav className="flex-1 mt-4">
            <ul className="space-y-4">
              {navItems.map((item) => (
                <li key={item.id}>
                  <button
                    onClick={() => scrollTo(item.id)}
                    className={`
                      flex items-center gap-4 w-full text-left py-2 transition-colors group
                      ${activeSection === item.id ? 'text-primary' : 'text-gray-400 hover:text-white'}
                    `}
                  >
                    <span className={`p-2 rounded-full transition-colors ${activeSection === item.id ? 'bg-primary text-white' : 'bg-gray-800 group-hover:bg-primary group-hover:text-white'}`}>
                        {item.icon}
                    </span>
                    <span className="font-medium font-poppins">{item.label}</span>
                  </button>
                </li>
              ))}
            </ul>
          </nav>

          <footer className="mt-auto pt-8 text-xs text-gray-500 text-center">
            <p>&copy; Copyright <strong>Design Terminal</strong></p>
            <p className="mt-1">License: <a href="https://adalovelaceabir.com" className="hover:text-primary">adalovelaceabir.com</a></p>
          </footer>
        </div>
      </aside>

      {/* Main Content */}
      <main className="flex-1 lg:ml-72 bg-white">
        
        {/* Hero Section */}
        <section id="hero" className="h-screen relative flex items-center bg-cover bg-center overflow-hidden" 
          style={{ backgroundImage: `linear-gradient(rgba(4, 11, 20, 0.4), rgba(4, 11, 20, 0.4)), url('https://picsum.photos/seed/abir-bg/1920/1080')` }}>
          <div className="container px-8 lg:px-20 z-10 text-white">
            <motion.h2 
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.8 }}
              className="text-4xl lg:text-7xl font-extrabold font-raleway mb-4"
            >
              Design Terminal
            </motion.h2>
            <motion.p 
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              transition={{ delay: 0.3, duration: 0.8 }}
              className="text-xl lg:text-3xl font-poppins mb-6 text-gray-200"
            >
              Custom Merchandise & Coding Culture Aesthetics
            </motion.p>
            <motion.p 
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              transition={{ delay: 0.5, duration: 0.8 }}
              className="text-lg lg:text-xl font-poppins max-w-2xl text-gray-300 mb-8"
            >
              I'm <span className="border-b-2 border-primary font-bold text-white">{typedText}</span>
              <span className="animate-pulse inline-block w-1 h-8 bg-primary ml-1 align-middle"></span>
            </motion.p>
          </div>
        </section>

        {/* About Section */}
        <section id="about" className="px-8 lg:px-20">
          <div className="section-title">
            <motion.h2
              initial={{ opacity: 0, x: -20 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
            >
              About the Studio
            </motion.h2>
            <p className="max-w-3xl leading-relaxed text-gray-600">
              Welcome to <strong>Design Terminal</strong>, a specialized print-on-demand creative design studio focused entirely on software engineering culture, software development, zero-day research, and developer lifestyle merchandise. Founded by <strong>Ada Lovelace Abir</strong>, we merge core coding aesthetics with professional typography and modern design patterns.
            </p>
          </div>

          <div className="grid lg:grid-cols-3 gap-12 mt-12 items-start">
            <motion.div 
              initial={{ opacity: 0, scale: 0.9 }}
              whileInView={{ opacity: 1, scale: 1 }}
              viewport={{ once: true }}
              className="col-span-1"
            >
              <img 
                src="https://picsum.photos/seed/abir-about/600/600" 
                alt="About Design Terminal & Abir" 
                className="w-full rounded-lg shadow-2xl"
                referrerPolicy="no-referrer"
              />
            </motion.div>
            <motion.div 
              initial={{ opacity: 0, x: 20 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
              className="col-span-2 space-y-6"
            >
              <h3 className="text-3xl font-bold text-dark font-raleway">Coding Culture & Developer Lifestyle Gear</h3>
              <p className="italic text-gray-500 text-lg">
                Crafting original artwork, custom layouts, and high-quality gear for tech circles.
              </p>
              <div className="grid md:grid-cols-2 gap-y-6 gap-x-4 border-b border-t py-6">
                <ul className="space-y-4">
                  <li className="flex items-center gap-2"><ChevronRight size={18} className="text-primary shrink-0" /> <span className="font-bold mr-2">Lead Designer:</span> <span>Ada Lovelace Abir</span></li>
                  <li className="flex items-center gap-2"><ChevronRight size={18} className="text-primary shrink-0" /> <span className="font-bold mr-2">Location:</span> <span>Tangail Sadar, Bangladesh</span></li>
                  <li className="flex items-center gap-2"><ChevronRight size={18} className="text-primary shrink-0" /> <span className="font-bold mr-2">Website:</span> <span>adalovelaceabir.com</span></li>
                </ul>
                <ul className="space-y-4">
                  <li className="flex items-center gap-2"><ChevronRight size={18} className="text-primary shrink-0" /> <span className="font-bold mr-2">Email:</span> <span>adalovelaceabir@gmail.com</span></li>
                  <li className="flex items-center gap-2"><ChevronRight size={18} className="text-primary shrink-0" /> <span className="font-bold mr-2">Phone:</span> <span>01747973857</span></li>
                  <li className="flex items-center gap-2"><ChevronRight size={18} className="text-primary shrink-0" /> <span className="font-bold mr-2">Availability:</span> <span>Custom & Large Orders</span></li>
                </ul>
              </div>
              <p className="text-gray-600 leading-relaxed">
                At <strong>Design Terminal</strong>, we are committed to providing programmers, computer science students, ethical hackers, and IT professionals with superior, highly creative, and original artwork. We believe that technology shouldn't just be loaded on displays—it belongs in high-quality fashion and everyday developer lifestyle items that build pride within tech communities.
              </p>
            </motion.div>
          </div>
        </section>

        {/* Stats Section */}
        <section id="stats" className="bg-gray-50 px-8 lg:px-20">
          <div className="container mx-auto grid grid-cols-2 lg:grid-cols-4 gap-8">
            {[
              { icon: <Smile className="text-primary" size={32} />, value: '1,200+', label: 'Happy Customers' },
              { icon: <JournalText className="text-primary" size={32} />, value: '150+', label: 'Original Works' },
              { icon: <Headset className="text-primary" size={32} />, value: '100%', label: 'Quality Guarantee' },
              { icon: <Users className="text-primary" size={32} />, value: '25+', label: 'Tech Circles Supported' },
            ].map((stat, i) => (
              <motion.div 
                key={i}
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ delay: i * 0.1 }}
                className="flex flex-col items-center text-center p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1"
              >
                <div className="mb-6 p-4 bg-blue-50 rounded-full">{stat.icon}</div>
                <span className="text-4xl font-extrabold text-dark mb-2">{stat.value}</span>
                <p className="text-xs font-bold text-gray-400 uppercase tracking-widest">{stat.label}</p>
              </motion.div>
            ))}
          </div>
        </section>

        {/* Skills Section */}
        <section id="skills" className="px-8 lg:px-20">
          <div className="section-title">
            <motion.h2
              initial={{ opacity: 0, x: -20 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
            >
              Capabilities
            </motion.h2>
            <p>Our comprehensive core proficiencies in vector illustration, print production, and tech branding aesthetics.</p>
          </div>

          <div className="grid lg:grid-cols-2 gap-x-12 gap-y-8 mt-12">
            {[
              { name: 'Merchandise Tech Illustration', progress: 95 },
              { name: 'Custom Typography & Layouts', progress: 90 },
              { name: 'Print-on-Demand Production Setups', progress: 85 },
              { name: 'High-Res Vector Optimization', progress: 95 },
              { name: 'Programmer Humour & Culture Curation', progress: 90 },
              { name: 'Blockchain & Tech Hub Styling', progress: 80 },
             ].map((skill, i) => (
              <motion.div 
                key={i} 
                initial={{ opacity: 0, y: 15 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true, margin: "-20px" }}
                transition={{ duration: 0.6, delay: i * 0.08, ease: "easeOut" }}
                className="skill-box"
              >
                <div className="flex justify-between mb-2">
                  <span className="font-bold uppercase text-xs tracking-wider text-dark">{skill.name}</span>
                  <span className="font-bold text-xs text-primary">{skill.progress}%</span>
                </div>
                <div className="h-3 w-full bg-gray-100 rounded-full overflow-hidden relative">
                  <motion.div 
                    initial={{ width: 0 }}
                    whileInView={{ width: `${skill.progress}%` }}
                    viewport={{ once: true }}
                    transition={{ duration: 1.4, ease: "easeOut", delay: i * 0.08 }}
                    className="h-full bg-primary rounded-full"
                  />
                </div>
              </motion.div>
            ))}
          </div>
        </section>

        {/* Resume Section */}
        <section id="resume" className="px-8 lg:px-20">
          <div className="section-title">
            <motion.h2
              initial={{ opacity: 0, x: -20 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
            >
              Our Journey
            </motion.h2>
            <p>A timeline of academic fundamentals and the growth of our specialized print-on-demand design studio.</p>
          </div>

          <div className="grid lg:grid-cols-2 gap-12 mt-12">
            {/* Education */}
            <div className="space-y-12">
              <h3 className="text-2xl font-extrabold border-l-4 border-primary pl-4 mb-10">Academic & Self Study</h3>
              <div className="relative pl-8 border-l-2 border-gray-100 ml-2">
                <div className="absolute w-4 h-4 bg-white rounded-full -left-[9px] top-0 border-2 border-primary shadow-sm" />
                <h4 className="text-lg font-bold uppercase text-dark">Higher Secondary Education</h4>
                <p className="bg-gray-100 inline-block px-3 py-1 rounded text-xs font-bold my-4">2023 - Present</p>
                <p className="italic mb-4 font-medium text-gray-500">Tangail, Dhaka, Bangladesh</p>
                <p className="text-sm text-gray-600 leading-relaxed">Focusing on Science, Mathematics, and Computer Science to build a strong theoretical foundation.</p>
              </div>
              <div className="relative pl-8 border-l-2 border-gray-100 ml-2 pt-4">
                <div className="absolute w-4 h-4 bg-white rounded-full -left-[9px] top-4 border-2 border-primary shadow-sm" />
                <h4 className="text-lg font-bold uppercase text-dark">Self-Taught Vector Art & Prints</h4>
                <p className="bg-gray-100 inline-block px-3 py-1 rounded text-xs font-bold my-4">2020 - 2023</p>
                <p className="italic mb-4 font-medium text-gray-500">Online Community Guides & Design Specs</p>
                <p className="text-sm text-gray-600 leading-relaxed">Completed comprehensive exercises in digital vectoring, apparel color separation, and high-DPI scaling presets.</p>
              </div>
            </div>

            {/* Experience */}
            <div className="space-y-12">
              <h3 className="text-2xl font-extrabold border-l-4 border-primary pl-4 mb-10">Studio Operations</h3>
              <div className="relative pl-8 border-l-2 border-gray-100 ml-2">
                <div className="absolute w-4 h-4 bg-white rounded-full -left-[9px] top-0 border-2 border-primary shadow-sm" />
                <h4 className="text-lg font-bold uppercase text-dark">Founder & Lead Artist at Design Terminal</h4>
                <p className="bg-gray-100 inline-block px-3 py-1 rounded text-xs font-bold my-4">2024 - Present</p>
                <p className="italic mb-4 font-medium text-gray-500">Global Remote Studio</p>
                <ul className="list-disc space-y-3 pl-4 text-sm text-gray-600">
                  <li>Building print-on-demand pipelines for t-shirts, hoodies, and desk accessories.</li>
                  <li>Ensuring 100% original high-contrast design blueprints with zero pixel bleed.</li>
                  <li>Liaising with international printing partners to guarantee premium materials.</li>
                </ul>
              </div>
              <div className="relative pl-8 border-l-2 border-gray-100 ml-2 pt-4">
                <div className="absolute w-4 h-4 bg-white rounded-full -left-[9px] top-4 border-2 border-primary shadow-sm" />
                <h4 className="text-lg font-bold uppercase text-dark">Tech Community Merch Consultant</h4>
                <p className="bg-gray-100 inline-block px-3 py-1 rounded text-xs font-bold my-4">2022 - Present</p>
                <p className="italic mb-4 font-medium text-gray-500">Freelance Portfolio</p>
                <ul className="list-disc space-y-3 pl-4 text-sm text-gray-600">
                  <li>Customizing developer graphics, system layouts, and sticker themes for dev communities.</li>
                  <li>Deploying web frontends and asset portfolios tailored for tech lifestyle prints.</li>
                  <li>Integrating blockchain and hardware aesthetics into merchandise graphics.</li>
                </ul>
              </div>
            </div>
          </div>
        </section>

        {/* Portfolio Section */}
        <section id="portfolio" className="bg-gray-50 px-8 lg:px-20">
          <div className="section-title">
            <motion.h2
              initial={{ opacity: 0, x: -20 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
            >
              Original Portfolio
            </motion.h2>
            <p>Our creative showcase across 6 primary tech-inspired on-demand merchandise categories.</p>
          </div>

          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
            {[
              { id: 1, type: 'Programmer T-Shirts', title: 'Init (0) Classic Tee', seed: 'shirtdes', desc: 'Minimalist layout optimized, high contrast, breathable premium combed cotton.' },
              { id: 2, type: 'Developer Hoodies', title: 'Fullstack Overlord Hoodie', seed: 'hoodierock', desc: 'Premium heavy cotton blend featuring complete stack layout vector accents.' },
              { id: 3, type: 'Coding Mugs', title: 'Caffeine Compiler Ceramic Mug', seed: 'coffemug', desc: 'Heat-activated compilation success messages and system details.' },
              { id: 4, type: 'Tech Phone Cases', title: 'Zero-Day Hardened Case', seed: 'phoneshell', desc: 'Durable dual-layer impact absorption case featuring slick debugger logs.' },
              { id: 5, type: 'Stickers', title: 'Hacker Core Sticker Pack', seed: 'vinyldecal', desc: 'Ultra-durable, waterproof, matte workspace graphics package.' },
              { id: 6, type: 'Tote Bags', title: 'Tarball Archive Carry Sack', seed: 'totespac', desc: 'Durable heavy density canvas mimicking bulk module directory folders.' },
            ].map((project, i) => (
              <motion.div 
                key={project.id}
                initial={{ opacity: 0, y: 30 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true, margin: "-40px" }}
                transition={{ duration: 0.5, delay: i * 0.08 }}
                whileHover="hover"
                className="relative overflow-hidden rounded-2xl shadow-lg aspect-[4/3] bg-dark cursor-pointer group"
              >
                <motion.div
                  className="w-full h-full"
                  variants={{
                    hover: { scale: 1.08 }
                  }}
                  transition={{ duration: 0.6, ease: [0.25, 1, 0.5, 1] }}
                >
                  <img 
                    src={`https://picsum.photos/seed/${project.seed}/800/600`} 
                    alt={project.title} 
                    className="w-full h-full object-cover opacity-90 transition-opacity duration-300 group-hover:opacity-40"
                    referrerPolicy="no-referrer"
                  />
                </motion.div>

                {/* Animated Overlay */}
                <motion.div 
                  className="absolute inset-0 flex flex-col justify-end p-6 bg-gradient-to-t from-dark/95 via-dark/85 to-transparent text-white opacity-0"
                  variants={{
                    hover: { opacity: 1 }
                  }}
                  transition={{ duration: 0.3 }}
                >
                  {/* Category Pill */}
                  <motion.span 
                    className="self-start text-[10px] font-bold tracking-widest uppercase text-primary px-3 py-1 bg-primary/15 rounded-full mb-2.5 border border-primary/20"
                    variants={{
                      hover: { y: 0, opacity: 1 }
                    }}
                    initial={{ y: 15, opacity: 0 }}
                    transition={{ duration: 0.4, delay: 0.05 }}
                  >
                    {project.type}
                  </motion.span>
                  
                  {/* Title */}
                  <motion.h4 
                    className="text-xl font-extrabold font-raleway mb-1 text-white leading-tight"
                    variants={{
                      hover: { y: 0, opacity: 1 }
                    }}
                    initial={{ y: 15, opacity: 0 }}
                    transition={{ duration: 0.4, delay: 0.1 }}
                  >
                    {project.title}
                  </motion.h4>
                  
                  {/* Interactive details */}
                  <motion.p 
                    className="text-xs text-gray-300 font-poppins mb-4 line-clamp-2"
                    variants={{
                      hover: { y: 0, opacity: 1 }
                    }}
                    initial={{ y: 15, opacity: 0 }}
                    transition={{ duration: 0.4, delay: 0.15 }}
                  >
                    {project.desc}
                  </motion.p>

                  <motion.div 
                    className="flex gap-3"
                    variants={{
                      hover: { y: 0, opacity: 1 }
                    }}
                    initial={{ y: 15, opacity: 0 }}
                    transition={{ duration: 0.4, delay: 0.2 }}
                  >
                    <button className="w-10 h-10 rounded-full bg-primary text-white hover:bg-blue-600 transition-colors flex items-center justify-center shadow-lg">
                      <ZoomIn size={18} />
                    </button>
                    <button className="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors flex items-center justify-center backdrop-blur-md">
                      <ExternalLink size={18} />
                    </button>
                  </motion.div>
                </motion.div>
              </motion.div>
            ))}
          </div>
        </section>

        {/* Services Section */}
        <section id="services" className="px-8 lg:px-20">
          <div className="section-title">
            <motion.h2
              initial={{ opacity: 0, x: -20 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
            >
              Services
            </motion.h2>
            <p>Professional services I provide as a freelancer and technical consultant.</p>
          </div>

          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12 text-center">
            {[
              { title: 'Custom T-Shirt Design', desc: 'Bespoke apparel assets tailored for dev teams, conferences, and custom developer community orders.' },
              { title: 'POD Design Creation', desc: 'Professional, print-ready graphics formatted perfectly for automated print-on-demand production lines.' },
              { title: 'Typography Design', desc: 'Clean, terminal-styled typography layouts, clean font pairings, and developer lifestyle lettering.' },
              { title: 'Merchandise Graphics', desc: 'From custom pixel-perfect sticker bundles to high-density heavy embroidery patterns for developers.' },
              { title: 'Branding for Tech groups', desc: 'Complete visual styling, dynamic tech emblems, and customized community merchandise ecosystems.' },
              { title: 'Lifestyle Products', desc: 'Stylized coding designs crafted for phone cases, ceramic mugs, tote bags, and tech workstation gear.' },
            ].map((service, i) => (
              <motion.div 
                key={i}
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ delay: i * 0.1 }}
                className="group p-10 rounded-3xl bg-white border-2 border-gray-50 hover:border-primary transition-all duration-300 shadow-sm hover:shadow-2xl"
              >
                <div className="w-20 h-20 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300 mb-8 mx-auto shadow-inner">
                  <Server size={36} />
                </div>
                <h4 className="text-xl font-extrabold mb-4 group-hover:text-primary transition-colors">{service.title}</h4>
                <p className="text-gray-500 leading-relaxed text-sm group-hover:text-gray-600 transition-colors">{service.desc}</p>
              </motion.div>
            ))}
          </div>
        </section>

        {/* Contact Section */}
        <section id="contact" className="bg-gray-50 px-8 lg:px-20">
          <div className="section-title">
            <motion.h2
              initial={{ opacity: 0, x: -20 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
            >
              Contact
            </motion.h2>
            <p>Feel free to reach out for collaborations or project inquiries.</p>
          </div>

          <div className="grid lg:grid-cols-3 gap-12 mt-12">
            <div className="col-span-1 space-y-6">
              <div className="p-8 bg-white rounded-3xl shadow-lg space-y-10 border border-gray-50">
                <div className="flex gap-6 group">
                  <div className="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all shadow-sm">
                    <MapPin size={28} />
                  </div>
                  <div>
                    <h4 className="text-xl font-bold mb-1">Locality:</h4>
                    <p className="text-gray-500 text-sm">Char Hugra, Hugra, Tangail Sadar, Bangladesh</p>
                  </div>
                </div>
                <div className="flex gap-6 group">
                  <div className="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all shadow-sm">
                    <Mail size={28} />
                  </div>
                  <div>
                    <h4 className="text-xl font-bold mb-1">Email:</h4>
                    <p className="text-gray-500 text-sm">adalovelaceabir@gmail.com</p>
                  </div>
                </div>
                <div className="flex gap-6 group">
                  <div className="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all shadow-sm">
                    <Phone size={28} />
                  </div>
                  <div>
                    <h4 className="text-xl font-bold mb-1">Phone:</h4>
                    <p className="text-gray-500 text-sm">01747973857</p>
                  </div>
                </div>
                
                <div className="rounded-2xl overflow-hidden h-72 shadow-inner border border-gray-100">
                  <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116345.932971239!2d89.8519634!3d24.2514101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fdfbc26a3f3a97%3A0x6d859187399587!2sTangail%20Sadar%20Upazila!5e0!3m2!1sen!2sbd!4v1676961268712!5m2!1sen!2sbd" 
                    width="100%" 
                    height="100%" 
                    style={{ border: 0 }} 
                    allowFullScreen 
                    loading="lazy" 
                    referrerPolicy="no-referrer-when-downgrade"
                  />
                </div>
              </div>
            </div>

            <div className="lg:col-span-2">
              <form className="p-10 bg-white rounded-3xl shadow-xl space-y-8 border border-gray-50" onSubmit={(e) => e.preventDefault()}>
                <div className="grid md:grid-cols-2 gap-8">
                  <div className="space-y-2">
                    <label className="block text-sm font-bold text-dark tracking-tight">Your Name</label>
                    <input type="text" className="w-full px-5 py-4 rounded-xl border-2 border-gray-100 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" required />
                  </div>
                  <div className="space-y-2">
                    <label className="block text-sm font-bold text-dark tracking-tight">Your Email</label>
                    <input type="email" className="w-full px-5 py-4 rounded-xl border-2 border-gray-100 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" required />
                  </div>
                </div>
                <div className="space-y-2">
                  <label className="block text-sm font-bold text-dark tracking-tight">Subject</label>
                  <input type="text" className="w-full px-5 py-4 rounded-xl border-2 border-gray-100 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" required />
                </div>
                <div className="space-y-2">
                  <label className="block text-sm font-bold text-dark tracking-tight">Message</label>
                  <textarea rows={6} className="w-full px-5 py-4 rounded-xl border-2 border-gray-100 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all resize-none" required />
                </div>
                <div className="text-center pt-4">
                  <button type="submit" className="bg-primary hover:bg-blue-700 text-white font-extrabold py-4 px-12 rounded-full transition-all flex items-center gap-3 mx-auto shadow-lg hover:shadow-primary/30 active:scale-95">
                    <Send size={20} />
                    Send Message
                  </button>
                </div>
              </form>
            </div>
          </div>
        </section>

        {/* Outer Footer */}
        <footer className="py-20 bg-dark text-white text-center">
          <div className="container mx-auto px-8 lg:px-20">
            <motion.h3 
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              className="text-4xl font-extrabold font-raleway mb-6"
            >
              Design Terminal
            </motion.h3>
            <p className="text-gray-400 italic mb-10 max-w-xl mx-auto text-lg leading-relaxed">
              &quot;Original, high-quality merchandise dedicated to software culture and developer pride.&quot;
            </p>
            <div className="flex justify-center gap-4 mb-12">
              {[Twitter, Facebook, Instagram, Linkedin, Github].map((Icon, idx) => (
                <a key={idx} href="#" className="w-12 h-12 rounded-full bg-gray-800 hover:bg-primary transition-all duration-300 flex items-center justify-center group shadow-lg">
                  <Icon size={24} className="group-hover:scale-110 transition-transform" />
                </a>
              ))}
            </div>
            <div className="text-sm text-gray-500 font-medium tracking-tight">
              <p>&copy; Copyright <strong><span>Design Terminal</span></strong>. All Rights Reserved</p>
              <p className="mt-2">Visit: <a href="https://adalovelaceabir.com" className="text-primary hover:underline">adalovelaceabir.com</a></p>
            </div>
          </div>
        </footer>

      </main>
    </div>
  );
}
