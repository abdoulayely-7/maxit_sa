<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Maxitsa Money Transfer</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/4487bad28c.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-100 font-sans">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <?php
    require_once '../templates/layout/partial/sidebar.html.php';
    ?>

    <!-- Main Content -->
    <main class="flex-1 p-10 bg-white rounded-l-3xl shadow-lg">
      <?php
        echo $containForLayout;
      ?>
    </main>
  </div>
</body>

</html>