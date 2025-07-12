<section class="bg-gray-100 p-6 rounded-xl shadow flex justify-between items-center">
        <div>
          <h2 class="text-xl font-bold"><?= htmlspecialchars($infos["prenom"]." ".$infos["nom"]) ?></h2>
          <p class="text-lg"><?= htmlspecialchars($infos["numero_tel"]) ?></p>
          <p class="text-lg font-bold mt-2">
            Solde : <span class="text-black"><?= htmlspecialchars($infos["solde"]) ?> Fcfa</span>
          </p>
        </div>
        <div>
          <div class="bg-white rounded-full p-4 shadow-md">
            <span class="text-2xl">↔️</span>
          </div>
        </div>
      </section>

      <!-- Historique -->
      <section class="mt-10">
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-lg font-bold">Historiques des transferts</h3>
          <a href="#" class="text-sm text-gray-500 hover:underline">Voir tous les transactions</a>
        </div>

        <!-- Filtrage -->
        <div class="flex space-x-4 mb-4">
          <input class="bg-gray-200 px-4 py-2 rounded-md" placeholder="recherche par type"></input>
          <input type="date" class="bg-gray-200 px-4 py-2 rounded-md" placeholder="recherche par date"></input>
        </div>

        <!-- Tableau -->
        <div class="overflow-auto rounded-lg border border-gray-200">
          <table class="min-w-full bg-white text-left text-sm">
            <thead class="bg-gray-100 text-gray-700 font-semibold">
              <tr>
                <th class="py-3 px-6">Date</th>
                <th class="py-3 px-6">Type</th>
                <th class="py-3 px-6">Description</th>
                <th class="py-3 px-6">Montant</th>
              </tr>
            </thead>
            <tbody>
              <!-- Boucle sur les données -->
              <!-- Exemple statique -->
              <tr class="border-t">
                <td class="py-2 px-6">07/15/2024</td>
                <td class="py-2 px-6">Dépôt</td>
                <td class="py-2 px-6">Achat</td>
                <td class="py-2 px-6">25000 FCFA</td>
              </tr>
              <!-- Répète 8 fois -->
              <!-- Tu peux générer ça dynamiquement en JavaScript -->
              <tr class="border-t">
                <td class="py-2 px-6">07/15/2024</td>
                <td class="py-2 px-6">Dépôt</td>
                <td class="py-2 px-6">Achat</td>
                <td class="py-2 px-6">25000 FCFA</td>
              </tr>
              <tr class="border-t">
                <td class="py-2 px-6">07/15/2024</td>
                <td class="py-2 px-6">Dépôt</td>
                <td class="py-2 px-6">Achat</td>
                <td class="py-2 px-6">25000 FCFA</td>
              </tr>
              <tr class="border-t">
                <td class="py-2 px-6">07/15/2024</td>
                <td class="py-2 px-6">Dépôt</td>
                <td class="py-2 px-6">Achat</td>
                <td class="py-2 px-6">25000 FCFA</td>
              </tr>
              <!-- etc. -->
            </tbody>
          </table>
        </div>
      </section>