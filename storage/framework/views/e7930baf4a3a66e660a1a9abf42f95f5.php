<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroTech Solutions - Intelligence Numérique Agricole</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .glass-effect {
            backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="bg-gray-900 text-white overflow-x-hidden">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-64 h-64 bg-green-500 rounded-full opacity-10 animate-float blur-xl"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-blue-500 rounded-full opacity-10 animate-pulse-slow blur-2xl"></div>
        <div class="absolute bottom-20 left-1/3 w-80 h-80 bg-purple-500 rounded-full opacity-10 animate-bounce-slow blur-xl"></div>
        <div class="absolute top-1/2 right-10 w-72 h-72 bg-emerald-500 rounded-full opacity-10 animate-spin-slow blur-xl"></div>
    </div>

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 glass-effect">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="text-2xl font-bold bg-gradient-to-r from-green-400 to-blue-500 bg-clip-text text-transparent">
                    AgroTech Solutions
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#accueil" class="hover:text-green-400 transition-colors duration-300">Accueil</a>
                    <a href="#apropos" class="hover:text-green-400 transition-colors duration-300">À Propos</a>
                    <a href="#services" class="hover:text-green-400 transition-colors duration-300">Services</a>
                    <a href="#fonctionnement" class="hover:text-green-400 transition-colors duration-300">Fonctionnement</a>
                    <a href="#blockchain" class="hover:text-green-400 transition-colors duration-300">Blockchain</a>
                    <a href="#contact" class="hover:text-green-400 transition-colors duration-300">Contact</a>
                    <div class="flex items-center space-x-4 ml-8">
                        <a href="/user" class="glass-effect px-6 py-2 rounded-full hover:bg-white hover:bg-opacity-20 transition-all duration-300 hover:scale-105">
                            Connexion
                        </a>
                        <a href="/user/register" class="bg-gradient-to-r from-green-500 to-blue-600 hover:from-green-600 hover:to-blue-700 px-6 py-2 rounded-full transition-all duration-300 hover:scale-105 shadow-lg">
                            S'inscrire
                        </a>
                    </div>
                </div>
                <button class="md:hidden text-white focus:outline-none" onclick="toggleMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-95 z-40 hidden">
        <div class="flex flex-col items-center justify-center h-full space-y-8 text-xl">
            <a href="#accueil" onclick="toggleMenu()" class="hover:text-green-400 transition-colors duration-300">Accueil</a>
            <a href="#apropos" onclick="toggleMenu()" class="hover:text-green-400 transition-colors duration-300">À Propos</a>
            <a href="#services" onclick="toggleMenu()" class="hover:text-green-400 transition-colors duration-300">Services</a>
            <a href="#fonctionnement" onclick="toggleMenu()" class="hover:text-green-400 transition-colors duration-300">Fonctionnement</a>
            <a href="#blockchain" onclick="toggleMenu()" class="hover:text-green-400 transition-colors duration-300">Blockchain</a>
            <a href="#contact" onclick="toggleMenu()" class="hover:text-green-400 transition-colors duration-300">Contact</a>
        </div>
    </div>

    <!-- Hero Section -->
    <section id="accueil" class="relative min-h-screen flex items-center justify-center pt-20">
        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 bg-clip-text text-transparent animate-pulse-slow">
                    Agriculture Intelligente
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-gray-300 leading-relaxed">
                    Solution numérique basée sur l'IoT et la blockchain pour contrôler la qualité des cultures, 
                    assurer leur traçabilité et faciliter l'exportation selon les normes internationales
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-gradient-to-r from-green-500 to-blue-600 hover:from-green-600 hover:to-blue-700 px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 shadow-2xl hover:shadow-green-500/25 hover:scale-105">
                        Découvrir nos Solutions
                    </button>
                    <button class="glass-effect px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 hover:bg-white hover:bg-opacity-20 hover:scale-105">
                        Voir la Démo
                    </button>
                </div>
            </div>
        </div>
        
        <!-- 3D Floating Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-10 w-20 h-20 bg-gradient-to-r from-green-400 to-blue-500 rounded-lg opacity-70 animate-float shadow-2xl"></div>
            <div class="absolute top-1/3 right-16 w-16 h-16 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full opacity-60 animate-bounce-slow shadow-2xl"></div>
            <div class="absolute bottom-1/4 left-1/4 w-12 h-12 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-lg opacity-80 animate-spin-slow shadow-2xl"></div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="apropos" class="py-20 relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-green-400 to-blue-500 bg-clip-text text-transparent">
                    À Propos de Nous
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-blue-500 mx-auto mb-8"></div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <p class="text-lg text-gray-300 leading-relaxed">
                        Nous sommes une entreprise innovante spécialisée dans le développement de solutions technologiques 
                        pour l'agriculture moderne. Notre mission est de révolutionner le secteur agroalimentaire grâce 
                        à l'intelligence artificielle, l'IoT et la blockchain.
                    </p>
                    <p class="text-lg text-gray-300 leading-relaxed">
                        Nos solutions permettent aux exploitations agricoles et industries agroalimentaires de maintenir 
                        les plus hauts standards de qualité tout en respectant les normes internationales d'exportation.
                    </p>
                    <div class="grid grid-cols-2 gap-6 mt-8">
                        <div class="glass-effect p-6 rounded-xl hover:bg-opacity-20 transition-all duration-300">
                            <h4 class="text-2xl font-bold text-green-400 mb-2">500+</h4>
                            <p class="text-gray-300">Exploitations Connectées</p>
                        </div>
                        <div class="glass-effect p-6 rounded-xl hover:bg-opacity-20 transition-all duration-300">
                            <h4 class="text-2xl font-bold text-blue-400 mb-2">99.9%</h4>
                            <p class="text-gray-300">Traçabilité Garantie</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="glass-effect p-8 rounded-2xl shadow-2xl transform hover:scale-105 transition-all duration-300">
                        <div class="w-full h-64 bg-gradient-to-br from-green-400 via-blue-500 to-purple-600 rounded-xl opacity-80 flex items-center justify-center">
                            <span class="text-white text-6xl">🌱</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 relative bg-gray-800 bg-opacity-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-green-400 to-blue-500 bg-clip-text text-transparent">
                    Nos Services
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-blue-500 mx-auto mb-8"></div>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass-effect p-8 rounded-2xl hover:bg-opacity-20 transition-all duration-300 group hover:scale-105">
                    <div class="text-5xl mb-6 group-hover:animate-bounce">🌾</div>
                    <h3 class="text-2xl font-bold mb-4 text-green-400">Contrôle Qualité</h3>
                    <p class="text-gray-300 leading-relaxed">
                        Surveillance en temps réel de la qualité des cultures grâce à nos capteurs IoT avancés 
                        et algorithmes d'intelligence artificielle.
                    </p>
                </div>
                
                <div class="glass-effect p-8 rounded-2xl hover:bg-opacity-20 transition-all duration-300 group hover:scale-105">
                    <div class="text-5xl mb-6 group-hover:animate-bounce">🔗</div>
                    <h3 class="text-2xl font-bold mb-4 text-blue-400">Traçabilité Blockchain</h3>
                    <p class="text-gray-300 leading-relaxed">
                        Traçabilité complète et transparente de vos produits de la ferme à l'assiette 
                        grâce à la technologie blockchain sécurisée.
                    </p>
                </div>
                
                <div class="glass-effect p-8 rounded-2xl hover:bg-opacity-20 transition-all duration-300 group hover:scale-105">
                    <div class="text-5xl mb-6 group-hover:animate-bounce">🌍</div>
                    <h3 class="text-2xl font-bold mb-4 text-purple-400">Normes Internationales</h3>
                    <p class="text-gray-300 leading-relaxed">
                        Conformité automatique aux normes d'exportation internationales pour faciliter 
                        l'accès aux marchés mondiaux.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How it Works Section -->
    <section id="fonctionnement" class="py-20 relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-green-400 to-blue-500 bg-clip-text text-transparent">
                    Comment ça Fonctionne
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-blue-500 mx-auto mb-8"></div>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="glass-effect w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-all duration-300">
                        <span class="text-2xl">📡</span>
                    </div>
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold">1</div>
                    <h3 class="text-xl font-bold mb-3 text-green-400">Installation IoT</h3>
                    <p class="text-gray-300">Déploiement de capteurs intelligents dans vos cultures</p>
                </div>
                
                <div class="text-center group">
                    <div class="glass-effect w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-all duration-300">
                        <span class="text-2xl">📊</span>
                    </div>
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold">2</div>
                    <h3 class="text-xl font-bold mb-3 text-blue-400">Collecte de Données</h3>
                    <p class="text-gray-300">Monitoring continu et analyse des paramètres critiques</p>
                </div>
                
                <div class="text-center group">
                    <div class="glass-effect w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-all duration-300">
                        <span class="text-2xl">🤖</span>
                    </div>
                    <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold">3</div>
                    <h3 class="text-xl font-bold mb-3 text-purple-400">IA & Analyse</h3>
                    <p class="text-gray-300">Traitement intelligent et recommandations personnalisées</p>
                </div>
                
                <div class="text-center group">
                    <div class="glass-effect w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-all duration-300">
                        <span class="text-2xl">✅</span>
                    </div>
                    <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold">4</div>
                    <h3 class="text-xl font-bold mb-3 text-emerald-400">Certification</h3>
                    <p class="text-gray-300">Génération automatique de certifications blockchain</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blockchain Section -->
    <section id="blockchain" class="py-20 relative bg-gray-800 bg-opacity-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-green-400 to-blue-500 bg-clip-text text-transparent">
                    Qu'est-ce que la Blockchain ?
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-blue-500 mx-auto mb-8"></div>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <p class="text-lg text-gray-300 leading-relaxed">
                        La blockchain est une technologie de stockage et de transmission d'informations transparente, 
                        sécurisée et décentralisée. Dans le contexte agricole, elle garantit l'authenticité et 
                        l'intégrité des données de traçabilité.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="glass-effect p-6 rounded-xl hover:bg-opacity-20 transition-all duration-300">
                            <h4 class="text-xl font-bold text-green-400 mb-2">🔒 Sécurité Absolue</h4>
                            <p class="text-gray-300">Données cryptées et immuables, protection contre la falsification</p>
                        </div>
                        
                        <div class="glass-effect p-6 rounded-xl hover:bg-opacity-20 transition-all duration-300">
                            <h4 class="text-xl font-bold text-blue-400 mb-2">👁️ Transparence Totale</h4>
                            <p class="text-gray-300">Historique complet et vérifiable de chaque produit</p>
                        </div>
                        
                        <div class="glass-effect p-6 rounded-xl hover:bg-opacity-20 transition-all duration-300">
                            <h4 class="text-xl font-bold text-purple-400 mb-2">⚡ Traçabilité Instantanée</h4>
                            <p class="text-gray-300">Suivi en temps réel de la ferme au consommateur</p>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="glass-effect p-8 rounded-2xl shadow-2xl">
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4 p-4 bg-green-500 bg-opacity-20 rounded-lg animate-pulse-slow">
                                <div class="w-4 h-4 bg-green-400 rounded-full"></div>
                                <span class="text-green-400 font-semibold">Bloc 1: Semis</span>
                            </div>
                            <div class="flex items-center space-x-4 p-4 bg-blue-500 bg-opacity-20 rounded-lg">
                                <div class="w-4 h-4 bg-blue-400 rounded-full"></div>
                                <span class="text-blue-400 font-semibold">Bloc 2: Croissance</span>
                            </div>
                            <div class="flex items-center space-x-4 p-4 bg-purple-500 bg-opacity-20 rounded-lg">
                                <div class="w-4 h-4 bg-purple-400 rounded-full"></div>
                                <span class="text-purple-400 font-semibold">Bloc 3: Récolte</span>
                            </div>
                            <div class="flex items-center space-x-4 p-4 bg-emerald-500 bg-opacity-20 rounded-lg">
                                <div class="w-4 h-4 bg-emerald-400 rounded-full"></div>
                                <span class="text-emerald-400 font-semibold">Bloc 4: Distribution</span>
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
                <h2 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-green-400 to-blue-500 bg-clip-text text-transparent">
                    Contactez-Nous
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-blue-500 mx-auto mb-8"></div>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12">
                <div class="space-y-8">
                    <div>
                        <h3 class="text-2xl font-bold mb-6 text-green-400">Prêt à Révolutionner Votre Agriculture ?</h3>
                        <p class="text-lg text-gray-300 leading-relaxed mb-8">
                            Contactez nos experts pour découvrir comment nos solutions peuvent transformer 
                            votre exploitation agricole et améliorer la qualité de vos productions.
                        </p>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="glass-effect w-12 h-12 rounded-full flex items-center justify-center">
                                <span class="text-green-400">📧</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white">Email</h4>
                                <p class="text-gray-300">contact@agrotech-solutions.com</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <div class="glass-effect w-12 h-12 rounded-full flex items-center justify-center">
                                <span class="text-blue-400">📱</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white">Téléphone</h4>
                                <p class="text-gray-300">+33 1 23 45 67 89</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <div class="glass-effect w-12 h-12 rounded-full flex items-center justify-center">
                                <span class="text-purple-400">📍</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white">Adresse</h4>
                                <p class="text-gray-300">123 Avenue de l'Innovation, 75001 Paris</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="glass-effect p-8 rounded-2xl">
                    <form class="space-y-6" onsubmit="handleSubmit(event)">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold mb-2 text-gray-300">Nom</label>
                                <input type="text" class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-transparent text-white" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2 text-gray-300">Prénom</label>
                                <input type="text" class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-transparent text-white" required>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-gray-300">Email</label>
                            <input type="email" class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-transparent text-white" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-gray-300">Entreprise</label>
                            <input type="text" class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-transparent text-white">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-gray-300">Message</label>
                            <textarea rows="4" class="w-full px-4 py-3 bg-gray-800 bg-opacity-50 border border-gray-600 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-transparent text-white" required></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-blue-600 hover:from-green-600 hover:to-blue-700 px-8 py-4 rounded-lg text-lg font-semibold transition-all duration-300 shadow-2xl hover:shadow-green-500/25 hover:scale-105">
                            Envoyer le Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 border-t border-gray-800 py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="col-span-2">
                    <div class="text-2xl font-bold bg-gradient-to-r from-green-400 to-blue-500 bg-clip-text text-transparent mb-4">
                        AgroTech Solutions
                    </div>
                    <p class="text-gray-400 leading-relaxed mb-6">
                        Révolutionnons l'agriculture avec l'intelligence artificielle, l'IoT et la blockchain 
                        pour un avenir alimentaire durable et traçable.
                    </p>
                    <div class="flex space-x-4">
                        <div class="glass-effect w-10 h-10 rounded-full flex items-center justify-center hover:bg-opacity-20 transition-all duration-300 cursor-pointer">
                            <span class="text-blue-400">📘</span>
                        </div>
                        <div class="glass-effect w-10 h-10 rounded-full flex items-center justify-center hover:bg-opacity-20 transition-all duration-300 cursor-pointer">
                            <span class="text-blue-500">🐦</span>
                        </div>
                        <div class="glass-effect w-10 h-10 rounded-full flex items-center justify-center hover:bg-opacity-20 transition-all duration-300 cursor-pointer">
                            <span class="text-blue-600">💼</span>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-white">Liens Rapides</h4>
                    <div class="space-y-2">
                        <a href="#apropos" class="block text-gray-400 hover:text-green-400 transition-colors duration-300">À Propos</a>
                        <a href="#services" class="block text-gray-400 hover:text-green-400 transition-colors duration-300">Services</a>
                        <a href="#fonctionnement" class="block text-gray-400 hover:text-green-400 transition-colors duration-300">Fonctionnement</a>
                        <a href="#blockchain" class="block text-gray-400 hover:text-green-400 transition-colors duration-300">Blockchain</a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-white">Contact</h4>
                    <div class="space-y-2 text-gray-400">
                        <p>📧 contact@agrotech-solutions.com</p>
                        <p>📱 +33 1 23 45 67 89</p>
                        <p>📍 Paris, France</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-400">
                    © 2025 AgroTech Solutions. Tous droits réservés. 
                    <span class="text-green-400">Cultivons l'avenir ensemble</span> 🌱
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
                nav.style.backgroundColor = 'rgba(17, 24, 39, 0.95)';
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
</html><?php /**PATH C:\Users\Dell\Iotapp\resources\views/welcome.blade.php ENDPATH**/ ?>