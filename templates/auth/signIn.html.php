<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maxitsa Money Transfer - Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<?php
    $errors = $_SESSION['errors'] ?? [];
    $oldInput = $_SESSION['old_input'] ?? [];

    unset($_SESSION['errors']);
    unset($_SESSION['old_input']);
?>
<body class="bg-gray-100 min-h-screen">
    <!-- Container principal -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Card de connexion -->
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

                <!-- Titre -->
                <div class="text-center mb-8">
                    <h2 class="text-xl font-semibold text-gray-900">
                        Connectez-vous à votre compte
                    </h2>
                    <?php if (!empty($errors['connexion'])): ?>
                            <p class="text-red-500"><?= htmlspecialchars($errors['connexion'][0]) ?></p>
                        <?php endif; ?>
                </div>

                <!-- Formulaire -->
                <form action="<?= WEB_URL ?>/signin" method="POST" class="space-y-6">
                    <!-- Champ téléphone -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Téléphone
                        </label>
                        <input 
                            type="tel" 
                            name="telephone"
                            placeholder="entrez votre numéro"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-gray-50"
                        />
                        <?php if (!empty($errors['telephone'])): ?>
                            <p class="text-sm text-red-500"><?= htmlspecialchars($errors['telephone'][0]) ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Champ mot de passe -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Mot de passe
                        </label>
                        <input 
                            type="password" 
                            name="password"
                            placeholder="entrez votre mot de passe"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 bg-gray-50"
                        />
                        <?php if (!empty($errors['password'])): ?>
                            <p class="text-sm text-red-500"><?= htmlspecialchars($errors['password'][0]) ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Bouton Se connecter -->
                    <div class="pt-4">
                        <button 
                            type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors"
                        >
                            Se connecter
                        </button>
                    </div>

                    <!-- Séparateur OU -->
                    <div class="relative flex items-center justify-center py-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white text-gray-500">OU</span>
                        </div>
                    </div>

                    <!-- Bouton Créer un compte -->
                    <div>
                        <a 
                        href="<?php WEB_URL ?>/signup"
                            class="w-full flex justify-center py-3 px-4 border border-orange-500 rounded-md shadow-sm text-sm font-medium text-orange-500 bg-white hover:bg-orange-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors"
                        >
                            Créer un compte
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>