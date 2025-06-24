
<?php require ('views/partials/header.php'); ?>
<?php require ('views/partials/nav.php'); ?>
<?php require ('views/partials/banner.php'); ?>


<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
       <?php foreach ($notes as $note) : ?>
          <li> 
            <a href="/Section2/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline"> 
              <?= htmlspecialchars($note['body']) ?> 
            </a>
          </li>
       <?php endforeach; ?>
  </div>
      <p class="mb-6">
        <a href="/Section2/notes/create" class="text-blue-500 hover:underline">Create Note</a>
      </p>
</main>

<?php require ('views/partials/footer.php'); ?>