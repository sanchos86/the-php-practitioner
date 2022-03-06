<? require 'head.php'; ?>
<? require 'nav.php'; ?>
<header>
    <h1 class="text-center text-4xl font-medium">Tasks</h1>
</header>
<main>
    <ol>
        <?php foreach ($tasks as $key => $task) : ?>
            <li>
                <span><?= $key + 1; ?>.</span>
                <?php if ($task->completed) : ?>
                    <span class="line-through"><?= $task->task; ?></span>
                <?php else : ?>
                    <span><?= $task->task; ?></span>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ol>
    <hr class="my-4">
    <form method="post">
        <div class="mb-2">
            <label>
                Task:
                <input type="text" name="task" class="border-gray-400 rounded border ml-1">
            </label>
        </div>
        <div class="mb-2">
            <label>
                Completed:
                <input type="checkbox" name="completed" class="ml-1">
            </label>
        </div>
        <div>
            <button type="submit" class="bg-green-400 rounded py-1 px-3 text-white">Submit</button>
        </div>
    </form>
</main>
<? require 'footer.php'; ?>
