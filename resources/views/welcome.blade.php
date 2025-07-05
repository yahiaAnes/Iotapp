<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroTech Solutions - Digital Agricultural Intelligence</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'green-light': '#f0fdf4',
                        'green-light-2': '#dcfce7',
                        'green-light-3': '#bbf7d0',
                        'green-medium': '#10b981',
                        'green-medium-2': '#059669',
                        'green-dark': '#047857',
                        'green-dark-2': '#065f46',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'spin-slow': 'spin 20s linear infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 3s infinite',
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        .gradient-bg {
            background: linear-gradient(135deg, #10b981 0%, #047857 100%);
        }
        .glass-effect {
            backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="bg-white text-gray-800 overflow-x-hidden">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-64 h-64 bg-green-light-3 rounded-full opacity-30 animate-float blur-xl"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-green-light-2 rounded-full opacity-20 animate-pulse-slow blur-2xl"></div>
        <div class="absolute bottom-20 left-1/3 w-80 h-80 bg-green-light rounded-full opacity-25 animate-bounce-slow blur-xl"></div>
        <div class="absolute top-1/2 right-10 w-72 h-72 bg-green-light-3 rounded-full opacity-20 animate-spin-slow blur-xl"></div>
    </div>

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 glass-effect">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="text-2xl font-bold bg-gradient-to-r from-green-medium to-green-dark bg-clip-text text-transparent">
                    AgroTech Solutions
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="hover:text-green-medium transition-colors duration-300">Home</a>
                    <a href="#about" class="hover:text-green-medium transition-colors duration-300">About</a>
                    <a href="#services" class="hover:text-green-medium transition-colors duration-300">Services</a>
                    <a href="#how-it-works" class="hover:text-green-medium transition-colors duration-300">How It Works</a>
                    <a href="#blockchain" class="hover:text-green-medium transition-colors duration-300">Blockchain</a>
                    <a href="#contact" class="hover:text-green-medium transition-colors duration-300">Contact</a>
                    <div class="flex items-center space-x-4 ml-8">
                        <a href="/user" class="glass-effect px-6 py-2 rounded-full hover:bg-white hover:bg-opacity-20 transition-all duration-300 hover:scale-105">
                            Login
                        </a>
                        <a href="/user/register" class="bg-gradient-to-r from-green-medium to-green-dark hover:from-green-medium-2 hover:to-green-dark-2 px-6 py-2 rounded-full transition-all duration-300 hover:scale-105 shadow-lg text-white">
                            Sign Up
                        </a>
                    </div>
                </div>
                <button class="md:hidden text-gray-800 focus:outline-none" onclick="toggleMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed top-0 left-0 w-full h-full bg-white bg-opacity-95 z-40 hidden">
        <div class="flex flex-col items-center justify-center h-full space-y-8 text-xl">
            <a href="#home" onclick="toggleMenu()" class="hover:text-green-medium transition-colors duration-300">Home</a>
            <a href="#about" onclick="toggleMenu()" class="hover:text-green-medium transition-colors duration-300">About</a>
            <a href="#services" onclick="toggleMenu()" class="hover:text-green-medium transition-colors duration-300">Services</a>
            <a href="#how-it-works" onclick="toggleMenu()" class="hover:text-green-medium transition-colors duration-300">How It Works</a>
            <a href="#blockchain" onclick="toggleMenu()" class="hover:text-green-medium transition-colors duration-300">Blockchain</a>
            <a href="#contact" onclick="toggleMenu()" class="hover:text-green-medium transition-colors duration-300">Contact</a>
        </div>
    </div>

    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center justify-center pt-20">
        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-green-medium via-green-dark to-green-dark-2 bg-clip-text text-transparent animate-pulse-slow">
                    Smart Agriculture
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-gray-600 leading-relaxed">
                    Digital solution based on IoT and blockchain to control crop quality, 
                    ensure their traceability and facilitate export according to international standards
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-gradient-to-r from-green-medium to-green-dark hover:from-green-medium-2 hover:to-green-dark-2 px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 shadow-2xl hover:shadow-green-medium/25 hover:scale-105 text-white">
                        Discover Our Solutions
                    </button>
                    <button class="glass-effect px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 hover:bg-white hover:bg-opacity-20 hover:scale-105">
                        View Demo
                    </button>
                </div>
            </div>
        </div>
        
        <!-- 3D Floating Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-10 w-20 h-20 bg-gradient-to-r from-green-medium to-green-dark rounded-lg opacity-70 animate-float shadow-2xl"></div>
            <div class="absolute top-1/3 right-16 w-16 h-16 bg-gradient-to-r from-green-light-3 to-green-medium rounded-full opacity-60 animate-bounce-slow shadow-2xl"></div>
            <div class="absolute bottom-1/4 left-1/4 w-12 h-12 bg-gradient-to-r from-green-dark to-green-dark-2 rounded-lg opacity-80 animate-spin-slow shadow-2xl"></div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-20 relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-green-medium to-green-dark bg-clip-text text-transparent">
                    About Us
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-medium to-green-dark mx-auto mb-8"></div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <p class="text-lg text-gray-600 leading-relaxed">
                        We are an innovative company specializing in developing technological solutions 
                        for modern agriculture. Our mission is to revolutionize the agri-food sector through 
                         IoT and blockchain.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Our solutions enable agricultural operations and agri-food industries to maintain 
                        the highest quality standards while meeting international export standards.
                    </p>
                    <div class="grid grid-cols-2 gap-6 mt-8">
                        <div class="glass-effect p-6 rounded-xl hover:bg-opacity-20 transition-all duration-300">
                            <h4 class="text-2xl font-bold text-green-medium mb-2">50+</h4>
                            <p class="text-gray-600">Connected Farms</p>
                        </div>
                        <div class="glass-effect p-6 rounded-xl hover:bg-opacity-20 transition-all duration-300">
                            <h4 class="text-2xl font-bold text-green-dark mb-2">99.9%</h4>
                            <p class="text-gray-600">Guaranteed Traceability</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="glass-effect p-8 rounded-2xl shadow-2xl transform hover:scale-105 transition-all duration-300">
                        <div class="w-full h-64 bg-gradient-to-br from-green-light via-green-light-2 to-green-light-3 rounded-xl opacity-80 flex items-center justify-center">
                            <span class="text-6xl">🌱</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 relative bg-green-light bg-opacity-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-green-medium to-green-dark bg-clip-text text-transparent">
                    Our Services
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-medium to-green-dark mx-auto mb-8"></div>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass-effect p-8 rounded-2xl hover:bg-opacity-20 transition-all duration-300 group hover:scale-105">
                    <div class="text-5xl mb-6 group-hover:animate-bounce">🌾</div>
                    <h3 class="text-2xl font-bold mb-4 text-green-medium">Quality Control</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Real-time monitoring of crop quality through our advanced IoT sensors 
                        .
                    </p>
                </div>
                
                <div class="glass-effect p-8 rounded-2xl hover:bg-opacity-20 transition-all duration-300 group hover:scale-105">
                    <div class="text-5xl mb-6 group-hover:animate-bounce">🔗</div>
                    <h3 class="text-2xl font-bold mb-4 text-green-dark">Blockchain Traceability</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Complete and transparent traceability of your products from farm to fork 
                        through secure blockchain technology.
                    </p>
                </div>
                
                <div class="glass-effect p-8 rounded-2xl hover:bg-opacity-20 transition-all duration-300 group hover:scale-105">
                    <div class="text-5xl mb-6 group-hover:animate-bounce">🌍</div>
                    <h3 class="text-2xl font-bold mb-4 text-green-medium-2">International Standards</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Automatic compliance with international export standards to facilitate 
                        access to global markets.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How it Works Section -->
    <section id="how-it-works" class="py-20 relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-green-medium to-green-dark bg-clip-text text-transparent">
                    How It Works
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-medium to-green-dark mx-auto mb-8"></div>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="glass-effect w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-all duration-300">
                        <span class="text-2xl">📡</span>
                    </div>
                    <div class="w-8 h-8 bg-green-medium rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold">1</div>
                    <h3 class="text-xl font-bold mb-3 text-green-medium">IoT Installation</h3>
                    <p class="text-gray-600">Deployment of smart sensors in your crops</p>
                </div>
                
                <div class="text-center group">
                    <div class="glass-effect w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-all duration-300">
                        <span class="text-2xl">📊</span>
                    </div>
                    <div class="w-8 h-8 bg-green-dark rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold">2</div>
                    <h3 class="text-xl font-bold mb-3 text-green-dark">Data Collection</h3>
                    <p class="text-gray-600">Continuous monitoring and analysis of critical parameters</p>
                </div>
                
                <div class="text-center group">
                    <div class="glass-effect w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-all duration-300">
                        <span class="text-2xl">🔗</span>
                    </div>
                    <div class="w-8 h-8 bg-green-medium-2 rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold">3</div>
                    <h3 class="text-xl font-bold mb-3 text-green-medium-2">Blockchain</h3>
                    <p class="text-gray-600">Secure storage and transparent data traceability</p>
                </div>
                
                <div class="text-center group">
                    <div class="glass-effect w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-all duration-300">
                        <span class="text-2xl">✅</span>
                    </div>
                    <div class="w-8 h-8 bg-green-dark-2 rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold">4</div>
                    <h3 class="text-xl font-bold mb-3 text-green-dark-2">Certification</h3>
                    <p class="text-gray-600">Automatic generation of blockchain certifications</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blockchain Section -->
    <section id="blockchain" class="py-20 relative bg-green-light bg-opacity-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-green-medium to-green-dark bg-clip-text text-transparent">
                    What is Blockchain?
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-medium to-green-dark mx-auto mb-8"></div>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Blockchain is a transparent, secure and decentralized information storage and transmission technology. 
                        In the agricultural context, it guarantees the authenticity and 
                        integrity of traceability data.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="glass-effect p-6 rounded-xl hover:bg-opacity-20 transition-all duration-300">
                            <h4 class="text-xl font-bold text-green-medium mb-2">🔒 Absolute Security</h4>
                            <p class="text-gray-600">Encrypted and immutable data, protection against falsification</p>
                        </div>
                        
                        <div class="glass-effect p-6 rounded-xl hover:bg-opacity-20 transition-all duration-300">
                            <h4 class="text-xl font-bold text-green-dark mb-2">👁️ Total Transparency</h4>
                            <p class="text-gray-600">Complete and verifiable history of each product</p>
                        </div>
                        
                        <div class="glass-effect p-6 rounded-xl hover:bg-opacity-20 transition-all duration-300">
                            <h4 class="text-xl font-bold text-green-medium-2 mb-2">⚡ Instant Traceability</h4>
                            <p class="text-gray-600">Real-time tracking from farm to consumer</p>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="glass-effect p-8 rounded-2xl shadow-2xl">
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4 p-4 bg-green-light-3 bg-opacity-50 rounded-lg animate-pulse-slow">
                                <div class="w-4 h-4 bg-green-medium rounded-full"></div>
                                <span class="text-green-medium font-semibold">Block 1: Seeding</span>
                            </div>
                            <div class="flex items-center space-x-4 p-4 bg-green-light-2 bg-opacity-50 rounded-lg">
                                <div class="w-4 h-4 bg-green-dark rounded-full"></div>
                                <span class="text-green-dark font-semibold">Block 2: Growth</span>
                            </div>
                            <div class="flex items-center space-x-4 p-4 bg-green-light bg-opacity-50 rounded-lg">
                                <div class="w-4 h-4 bg-green-medium-2 rounded-full"></div>
                                <span class="text-green-medium-2 font-semibold">Block 3: Harvest</span>
                            </div>
                            <div class="flex items-center space-x-4 p-4 bg-green-light-3 bg-opacity-50 rounded-lg">
                                <div class="w-4 h-4 bg-green-dark-2 rounded-full"></div>
                                <span class="text-green-dark-2 font-semibold">Block 4: Distribution</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-green-medium to-green-dark bg-clip-text text-transparent">
                    Contact Us
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-medium to-green-dark mx-auto mb-8"></div>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12">
                <div class="space-y-8">
                    <div>
                        <h3 class="text-2xl font-bold mb-6 text-green-medium">Ready to Revolutionize Your Agriculture?</h3>
                        <p class="text-lg text-gray-600 leading-relaxed mb-8">
                            Contact our experts to discover how our solutions can transform 
                            your agricultural operation and improve the quality of your productions.
                        </p>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="glass-effect w-12 h-12 rounded-full flex items-center justify-center">
                                <span class="text-green-medium">📧</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Email</h4>
                                <p class="text-gray-600">agrotech-solutions@gmail.com</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <div class="glass-effect w-12 h-12 rounded-full flex items-center justify-center">
                                <span class="text-green-dark">📱</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Phone</h4>
                                <p class="text-gray-600">+213 549 89 54 15</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <div class="glass-effect w-12 h-12 rounded-full flex items-center justify-center">
                                <span class="text-green-medium-2">📍</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Address</h4>
                                <p class="text-gray-600">Setif, Algeria</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="glass-effect p-8 rounded-2xl">
                    <form class="space-y-6" onsubmit="handleSubmit(event)">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold mb-2 text-gray-700">Last Name</label>
                                <input type="text" class="w-full px-4 py-3 bg-white bg-opacity-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-medium focus:border-transparent text-gray-800" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2 text-gray-700">First Name</label>
                                <input type="text" class="w-full px-4 py-3 bg-white bg-opacity-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-medium focus:border-transparent text-gray-800" required>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-gray-700">Email</label>
                            <input type="email" class="w-full px-4 py-3 bg-white bg-opacity-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-medium focus:border-transparent text-gray-800" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-gray-700">Company</label>
                            <input type="text" class="w-full px-4 py-3 bg-white bg-opacity-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-medium focus:border-transparent text-gray-800">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-gray-700">Message</label>
                            <textarea rows="4" class="w-full px-4 py-3 bg-white bg-opacity-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-medium focus:border-transparent text-gray-800" required></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-gradient-to-r from-green-medium to-green-dark hover:from-green-medium-2 hover:to-green-dark-2 px-8 py-4 rounded-lg text-lg font-semibold transition-all duration-300 shadow-2xl hover:shadow-green-medium/25 hover:scale-105 text-white">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-green-50 border-t border-gray-200 py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="col-span-2">
                    <div class="text-2xl font-bold bg-gradient-to-r from-emerald-500 to-emerald-700 bg-clip-text text-transparent mb-4">
                        AgroTech Solutions
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Revolutionizing agriculture with artificial intelligence, IoT and blockchain 
                        for a sustainable and traceable food future.
                    </p>
                    <div class="flex space-x-4">
                        <div class="glass-effect w-10 h-10 rounded-full flex items-center justify-center hover:bg-opacity-20 transition-all duration-300 cursor-pointer">
                            <span class="text-emerald-500">📘</span>
                        </div>
                        <div class="glass-effect w-10 h-10 rounded-full flex items-center justify-center hover:bg-opacity-20 transition-all duration-300 cursor-pointer">
                            <span class="text-emerald-700">🐦</span>
                        </div>
                        <div class="glass-effect w-10 h-10 rounded-full flex items-center justify-center hover:bg-opacity-20 transition-all duration-300 cursor-pointer">
                            <span class="text-emerald-600">💼</span>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-gray-800">Navigation</h4>
                    <div class="space-y-2">
                        <a href="#about" class="block text-gray-600 hover:text-emerald-500 transition-colors duration-300">About</a>
                        <a href="#services" class="block text-gray-600 hover:text-emerald-500 transition-colors duration-300">Services</a>
                        <a href="#how-it-works" class="block text-gray-600 hover:text-emerald-500 transition-colors duration-300">How It Works</a>
                        <a href="#blockchain" class="block text-gray-600 hover:text-emerald-500 transition-colors duration-300">Blockchain</a>
                    </div>
                </div>
            
                
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-gray-800">Contact</h4>
                    <div class="space-y-2 text-gray-600">
                        <p>📧 agrotech-solutions@gmail.com</p>
                        <p>📱 +213 549 89 54 15</p>
                        <p>📍 Setif, Algeria</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-300 mt-8 pt-8 text-center">
                <p class="text-gray-600">
                    © 2025 AgroTech Solutions. Tous droits réservés. 
                    <span class="text-emerald-500">Cultivons l'avenir ensemble</span> 🌱
                </p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        function handleSubmit(event) {
            event.preventDefault();
            alert('Merci pour votre message ! Nous vous contacterons bientôt.');
            event.target.reset();
        }

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar background opacity on scroll
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
            } else {
                nav.style.backgroundColor = 'rgba(255, 255, 255, 0.1)';
            }
        });

        // Intersection Observer for fade-in animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all sections for animations
        document.querySelectorAll('section').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(30px)';
            section.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            observer.observe(section);
        });

        // Parallax effect for background elements
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.fixed');
            
            parallaxElements.forEach(element => {
                if (element.classList.contains('inset-0')) {
                    const speed = scrolled * 0.5;
                    element.style.transform = `translateY(${speed}px)`;
                }
            });
        });

        // Dynamic text animation
        function animateText() {
            const heroTitle = document.querySelector('h1');
            if (heroTitle) {
                heroTitle.style.backgroundSize = '200% 200%';
                heroTitle.style.animation = 'gradient 3s ease infinite';
            }
        }

        // Add gradient animation keyframes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes gradient {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
        `;
        document.head.appendChild(style);

        // Initialize animations
        document.addEventListener('DOMContentLoaded', function() {
            animateText();
            
            // Add hover effects to cards
            const cards = document.querySelectorAll('.glass-effect');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px) scale(1.02)';
                    this.style.boxShadow = '0 20px 40px rgba(0, 0, 0, 0.3)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                    this.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.2)';
                });
            });
        });
    </script>
</body>
</html>