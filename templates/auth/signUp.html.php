<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maxitsa Money Transfer - Créer un Compte</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Container principal -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Card de création de compte -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <!-- Logo -->
                <div class="text-center mb-8">
                    <div class="flex items-center justify-center mb-4">
                        <!-- Logo Maxitsa -->
                        <div class="flex items-center">
                            <!-- Icône dollar avec lignes -->
                            <div class="relative mr-3">
                                <svg class="w-8 h-8 text-orange-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                                </svg>
                                <!-- Lignes horizontales -->
                                <div class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-4">
                                    <div class="w-3 h-0.5 bg-orange-500 mb-1"></div>
                                    <div class="w-4 h-0.5 bg-orange-500 mb-1"></div>
                                    <div class="w-3 h-0.5 bg-orange-500"></div>
                                </div>
                            </div>
                            <!-- Texte MAXITSA -->
                            <div>
                                <div class="text-2xl font-bold text-orange-500 tracking-wide">MAXITSA</div>
                                <div class="text-xs font-medium text-white bg-orange-500 px-2 py-1 rounded mt-1">
                                    MONEY TRANSFER
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulaire -->
                <form action="<?php WEB_URL ?>/dosignup" method="POST" class="space-y-6">
                    <!-- Prénom et Nom sur la même ligne -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Prénom
                            </label>
                            <input 
                                type="text" 
                                name="prenom"
                                placeholder="Entrez votre prénom"
                                class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-gray-50"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nom
                            </label>
                            <input 
                                type="text" 
                                name="nom"
                                placeholder="Entrez votre nom"
                                class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-gray-50"
                            />
                        </div>
                    </div>

                    <!-- Numéro de téléphone -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Numéro
                        </label>
                        <input 
                            type="tel" 
                            name="telephone"
                            placeholder="Entrez votre numéro de téléphone"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-gray-50"
                        />
                    </div>
                    <!-- mot de passe -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Mot de passe
                        </label>
                        <input 
                            type="password" 
                            name="password"
                            placeholder="Entrez votre mot de passe"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-gray-50"
                        />
                    </div>

                    <!-- Adresse -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Adresse
                        </label>
                        <input 
                            type="text" 
                            name="adresse"
                            placeholder="Entrez votre adresse"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-gray-50"
                        />
                    </div>

                    <!-- CNI -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            CNI
                        </label>
                        <input 
                            type="text" 
                            name="cni"
                            placeholder="Numéro nationale d'identité"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-gray-50"
                        />
                    </div>

                    <!-- Upload de documents -->
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Recto -->
                        <div>
                            <label class="block w-full">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-orange-500 transition-colors cursor-pointer bg-gray-50">
                                    <div class="flex flex-col items-center space-y-2">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <div class="text-sm text-gray-600">
                                            <div class="font-medium">Recto Carte d'identité</div>
                                            <div class="text-xs text-gray-500 mt-1">Front</div>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" name="photo_recto" accept="image/*" class="hidden">
                            </label>
                        </div>
                        
                        <!-- Verso -->
                        <div>
                            <label class="block w-full">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-orange-500 transition-colors cursor-pointer bg-gray-50">
                                    <div class="flex flex-col items-center space-y-2">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <div class="text-sm text-gray-600">
                                            <div class="font-medium">Verso Carte d'identité</div>
                                            <div class="text-xs text-gray-500 mt-1">Back</div>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" name="photo_verso" accept="image/*" class="hidden">
                            </label>
                        </div>
                    </div>

                    <!-- Bouton Créer un compte -->
                    <div class="pt-4">
                        <button 
                            type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors"
                        >
                            Créer un compte
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Gestion des uploads de fichiers
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const parent = e.target.closest('label');
                    const textDiv = parent.querySelector('.text-sm.text-gray-600');
                    textDiv.innerHTML = `
                        <div class="font-medium text-orange-600">${file.name}</div>
                        <div class="text-xs text-gray-500 mt-1">Fichier sélectionné</div>
                    `;
                    parent.querySelector('div').classList.add('border-orange-500', 'bg-orange-50');
                }
            });
        });
    </script>
</body>
</html>