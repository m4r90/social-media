<header>
		<h3 class="alert alert-success" role="alert">
			Admin <?= $data['id'] ?>
		</h3>
	</header>
	<form id="admin_<?= $action ?>" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">




<ul role="list" class="divide-y divide-gray-100">

    <li class="flex justify-between gap-x-6 py-5">
    <div class="flex min-w-0 gap-x-4">
      <img class="h-20 w-20 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
      <div class="min-w-0 flex-auto">
        <p class="text-2xl font-semibold leading-10 text-gray-900"><?= $data['name']?> <?=$data['surname'] ?></p>
        <p class="mt-1 truncate text-2xl leading-10 text-gray-500"><?= $data['email'] ?></p>
        <p class="mt-1 truncate text-2xl leading-10 text-gray-500"><?= $data['password'] ?></p>
      </div>
    </div>
    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
      <p class="text-2xl leading-6 text-gray-900">Co-Founder / CEO</p>
      <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
    </div>
    </li>
		</ul>	