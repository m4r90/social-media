<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Social Media" />
    <meta name="author" content="Margo Rozhkova" />
    <title>Social Media</title>

    <!-- global scripts go here -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">

    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">

                    <div class="flex-shrink-0">
                        <img class="h-20 w-20"
                            src="https://assets.playgroundai.com/d4eaae7f-fd42-4c87-ae21-19a46b25c6e9.png" alt="logo">
                    </div>
                    <div class="hidden items-center md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Posts</a>
                            <a href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Users</a>
                        </div>
                    </div>

                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">

                            <!-- Profile dropdown -->
                            <div <div class="relative group">
                                <button class="flex items-center focus:outline-none">
                                    <img src="https://placekitten.com/40/40" alt="Profile" class="h-8 w-8 rounded-full">
                                </button>

                                <!-- Dropdown menu -->
                                <div
                                    class="absolute hidden mt-2 space-y-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700">Settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700">Sign out</a>
                                </div>
                            </div>

                            <script>
                            // JavaScript to show/hide the dropdown menu on hover
                            const dropdownButton = document.querySelector('.group');

                            dropdownButton.addEventListener('mouseenter', () => {
                                dropdownButton.querySelector('.absolute').classList.remove('hidden');
                            });

                            dropdownButton.addEventListener('mouseleave', () => {
                                dropdownButton.querySelector('.absolute').classList.add('hidden');
                            });
                            </script>




                            <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->

                        </div>
                    </div>


                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->

        </nav>

        <!-- <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl text-center font-bold tracking-tight text-gray-900">Title</h1>
            </div>
        </header> -->
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <!-- Your content -->