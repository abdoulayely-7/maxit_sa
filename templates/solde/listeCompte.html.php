<div class="flex-1 flex flex-col px-8 py-6 space-y-6 overflow-auto">
  <!-- Titre -->
  <div class=" flex  justify-between border-b border-gray-300 pb-2 sticky top-0 z-10 bg-white pb-2">
    <h1 class="text-2xl font-bold text-gray-900 ">
      <i class="fa-solid fa-mobile text-orange-500"></i>

      Liste de mes comptes
    </h1>

    <a href="<?php echo WEB_URL ?>/addcompte" class="bg-orange-500 text-white rounded-full p-4 shadow-lg hover:bg-orange-600 transition">
      <i class="fa-solid fa-plus"></i>
    </a>
  </div>

  <!-- Liste des comptes -->
  <div class="grid gap-6 w-full sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">

    <!-- Carte compte -->
    <?php foreach ($comptes as $compte): ?>
      <div class="bg-black rounded-2xl p-8 text-orange-400 shadow-lg flex flex-col gap-4">
        <div class="flex items-center justify-between">
          <div>
            <span class="text-2xl font-semibold tracking-[.15em]">
              <i class="fa-solid fa-mobile text-white"></i>
              <?= $compte['numero_tel'] ?>
            </span> <br>
            <div class="text-xl font-semibold"><span class="text-white">Solde : </span> <?= $compte['solde'] - $compte['typecompte'] ?> FCFA</div>
          </div>
          <button class="bg-white text-black text-sm font-semibold px-4 py-1.5 rounded-full hover:bg-gray-200 transition">
            Activer Principal
            <i class="fa-solid fa-exchange-alt ml-2"></i>
          </button>
        </div>
        <!-- <div class="mt-4">
          <button class="bg-orange-500 text-white font-semibold px-4 py-2 rounded-full hover:bg-orange-600 transition">
            <a href="<?php echo WEB_URL ?>/solde/<?= $compte['id'] ?>">Voir les transactions</a>
          </button>
        </div> -->
      </div>
    <?php endforeach; ?>

  </div>
</div>