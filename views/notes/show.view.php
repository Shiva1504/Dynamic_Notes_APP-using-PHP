<?php require ('views/partials/header.php'); ?>
<?php require ('views/partials/nav.php'); ?>
<?php require ('views/partials/banner.php'); ?>


<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="mb-6"> <a href="/Section2/notes" class="text-blue-500 underline"> go back</a> </p>

              <p>
                <?= htmlspecialchars($note['body']) ?> 
            </p>
  </div>
</main>

<?php require ('view/partials/footer.php'); ?>