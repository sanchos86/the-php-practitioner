<nav>
    <ul class="flex items-center">
        <?php foreach (Core\App::get('router')->routes['GET'] as $route => $controller) : ?>
            <li class="mr-4"><a class="underline text-blue-400 hover:text-purple-400" href="<?= '/' . $route; ?>">
                <?= ucfirst($route ?: 'home'); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
