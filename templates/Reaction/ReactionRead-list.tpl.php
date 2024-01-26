<ul role="list" class="divide-y divide-gray-100">
    <?php for ($n = 0; $n < count( $data); $n++) { ?>
    <li class="flex justify-between gap-x-6 py-5">
        <div class="flex min-w-0 gap-x-4">

            <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                src="https://images.pexels.com/photos/3311574/pexels-photo-3311574.jpeg?auto=compress&cs=tinysrgb&w=600"></img>
            <div class=" min-w-0 flex-auto">
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">userid: <?= $data[$n]['userid']?></p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">postid: <?= $data[$n]['postid']?></p>
                <p class="pb-2 mt-1 truncate text-xl leading-5 text-gray-900"><?= $data[$n]['comment'] ?></p>


                <?php if ($data[$n]['like_dislike'] == 1) { ?>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Like</p>
                <?php } else { ?>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Dislike</p>
                <?php } ?>


            </div>
        </div>
        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time>
            </p>
        </div>
    </li>

    <?php } ?>




</ul>