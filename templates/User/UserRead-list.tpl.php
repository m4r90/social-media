<ul role="list" class="divide-y divide-gray-100">
    <?php for ($n = 0; $n < count( $data); $n++) { ?>
    <li class="flex justify-between gap-x-6 py-5">
        <div class="flex min-w-0 gap-x-4">
            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="<?= $data[$n]['avatar']?> alt="">
      <div class=" min-w-0 flex-auto">
            <p class="text-sm font-semibold leading-6 text-gray-900"><?= $data[$n]['username']?></p>
            <p class="text-sm font-semibold leading-6 text-gray-900"><?= $data[$n]['name']?> <?=$data[$n]['surname'] ?>
            </p>
            <p class="mt-1 truncate text-xs leading-5 text-gray-500"><?= $data[$n]['email'] ?></p>
            <p class="mt-1 truncate text-xs leading-5 text-gray-500"><?= $data[$n]['password'] ?></p>
        </div>
        </div>

    </li>

    <?php } ?>




</ul>