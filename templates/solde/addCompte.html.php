<main class="flex-1 flex items-center justify-center px-4 py-8 bg-white">
  <div class="bg-black text-white rounded-2xl p-8 w-full max-w-lg shadow-2xl space-y-8">

    <!-- Titre -->
    <div class="text-center">
      <h1 class="text-2xl font-bold">
        <i class="fa-solid fa-plus text-orange-500 font-bold text-2xl"></i>
        Ajouter un nouveau compte
      </h1>
      <p class="text-sm text-gray-400 mt-1">Saisissez le numéro de téléphone et le montant initial.</p>
    </div>

    <?php
    // Affichage des messages d'erreur
    $errors = $this->session->get("errors") ?? [];
    ?>
    <!-- Formulaire -->
    <form action="<?php echo WEB_URL ?>/doaddcompte" method="POST" class="space-y-5">
      <!-- Numéro de téléphone -->
      <div>
        <label for="telephone" class="block text-sm mb-1 text-gray-300">Numéro de téléphone</label>
        <input
          type="text"
          name="telephone"
          id="telephone"
          placeholder="77 000 00 00"
          class="w-full px-4 py-3 rounded-xl text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500" />
        <?php if (!empty($errors['telephone'])): ?>
          <p class="text-red-500 text-sm mt-1"><?php echo $errors['telephone'][0]; ?></p>
        <?php endif; ?>
      </div>

      <!-- Montant -->
      <div>
        <label for="solde" class="block text-sm mb-1 text-gray-300">Montant initial</label>
        <input
          type="text"
          name="solde"
          id="solde"
          placeholder="Montant en F CFA"
          class="w-full px-4 py-3 rounded-xl text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500" />
        <?php if (!empty($errors['solde'])): ?>
          <p class="text-red-500 text-sm mt-1"><?php echo $errors['solde'][0]; ?></p>
        <?php endif; ?>
      </div>

      <!-- Bouton -->
      <button
        type="submit"
        class="w-full bg-orange-500 text-white font-semibold py-3 rounded-xl hover:bg-orange-600 transition duration-200">
        <i class="fa-solid fa-plus text-black font-bold text-xl"></i> Ajouter le compte
      </button>
    </form>
  </div>
</main>