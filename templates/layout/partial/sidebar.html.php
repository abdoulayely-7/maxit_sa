<aside class="w-64 bg-black text-white flex flex-col justify-between py-8">
  <!-- Haut : Logo + Menu -->
  <div>
    <!-- Logo -->
    <div class="flex items-center justify-center">
      <div class="relative mr-3">
        <svg class="w-8 h-8 text-orange-500" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" />
        </svg>
        <div class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-4">
          <div class="w-3 h-0.5 bg-orange-500 mb-1"></div>
          <div class="w-4 h-0.5 bg-orange-500 mb-1"></div>
          <div class="w-3 h-0.5 bg-orange-500"></div>
        </div>
      </div>
      <div>
        <div class="text-xl font-bold text-orange-500 tracking-wide">MAXITSA</div>
        <div class="text-xs font-medium text-white bg-orange-500 px-2 py-1 rounded mt-1">
          MONEY TRANSFER
        </div>
      </div>
    </div>

    <!-- Menu -->
    <nav class="flex flex-col mt-14 space-y-10 w-full px-6">
      <a href="#" class="flex items-center space-x-3 py-3 px-4 rounded-md bg-white text-black">
        <span><i class="fa-solid fa-house"></i></span>
        <span class="font-semibold">Accueil</span>
      </a>
      <a href="#" class="flex text-black items-center space-x-3 py-3 px-4 rounded-md bg-orange-500">
        <span><i class="fa-solid fa-users-viewfinder"></i></span>
        <span>Mes comptes</span>
      </a>
      <a href="#" class="flex items-center text-black space-x-3 py-3 px-4 rounded-md bg-orange-500">
        <span><i class="fa-solid fa-money-bill-transfer"></i></span>
        <span>Transactions</span>
      </a>
      <a href="#" class="flex items-center text-black space-x-3 py-3 px-4 rounded-md bg-orange-500">
        <span><i class="fa-solid fa-user-plus"></i></span>
        <span>Compte</span>
      </a>
    </nav>
  </div>

  <!-- Bas : Déconnexion -->
  <div class="px-6">
    <button
      class="flex items-center space-x-3 w-full bg-orange-500 text-black py-3 px-4 rounded-md hover:bg-orange-600 transition">
      <span><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
      <span>Déconnexion</span>
    </button>
  </div>
</aside>
