<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php view('partials/banner.php') ?>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <p class="mb-7">
        <a href="/notes" class="text-blue-500 underline">go back...</a>
      </p>
      <p>
        <?= htmlspecialchars($note['body']) ?> 
      </p>

      <footer class="mt-6">
        <a href="/note/edit?id=<?=$note['id']?>" class="text-grey-400 text-sm border border-current px-3 py-1 rounded">Edit</a>
      </footer>

      <!-- <form class="mt-7" method="POST" action="/note">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= $note['id']?>">
        <button class="text-sm text-red-500">Delete</button>
      </form> -->
    </div>
  </main>
<?php view('partials/footer.php') ?>