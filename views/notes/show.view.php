<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>


<main>
<div class="mx-auto max-w-3xl p-6 mt-10 bg-white rounded-xl shadow-md border border-gray-200">
  <!-- Go Back Link -->
  <p class="mb-4">
    <a href="/Section2/notes" class="text-blue-600 hover:text-blue-800 font-medium underline">
      ← Go back to Notes
    </a>
  </p>

  <!-- Note Body -->
  <div class="prose prose-lg text-gray-800 mb-6">
    <?= nl2br(htmlspecialchars($note['body'])) ?>
  </div>

  <!-- Action Buttons -->
  <div class="flex items-center gap-4">
    <a href="/Section2/edit?id=<?= $note['id'] ?>"
       class="inline-block rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
      Edit
    </a>

    <form method="POST" class="inline-block">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="id" value="<?= $note['id'] ?>">
      <button type="submit"
              class="text-sm font-medium text-red-600 hover:text-red-800 focus:outline-none">
        Delete
      </button>
    </form>
  </div>
</div>

</main>

<?php require base_path('views/partials/footer.php'); ?>