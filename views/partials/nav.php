<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img class="size-8" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
          </div>
                 <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-4">
              <a href="/" class="<?= navClass('/') ?>">Home</a>
              <a href="/about" class="<?= navClass('/about') ?>">About</a>
              <a href="/contact" class="<?= navClass('/contact') ?>">Contact</a>
            <?php if ($_SESSION['user'] ?? false) : ?>
              <a href="/notes" class="<?= navClass('/notes') ?>">My Notes</a>
            <?php endif ?>
          </div>
        </div>

        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
              </svg>
            </button>

                        <!-- Profile dropdown -->
            <div class="relative ml-3">
              <?php if ($_SESSION['user'] ?? false) : ?>
                <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-hidden focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                </button>
              <?php else : ?>
              <a href="/register" class="<?= navClass('/register') ?>">Register</a>
              <a href="/login" class="<?= navClass('/login') ?>">Login</a>
              <?php endif; ?>
            </div>

            <?php if ($_SESSION['user'] ?? false) : ?>
              <div class="ml-3">
                <form method="POST" action="/logout">
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="text-white">Log Out</button>
                </form>
              </div>
            <?php endif; ?>  
  </nav>