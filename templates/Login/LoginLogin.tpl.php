<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Social Media" />
    <meta name="author" content="Margo Rozhkova" />
    <title>Social Media</title>

</head>

<body>

    <h1>Login</h1>


    <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
    <div class="bg-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
                <h2 class="text-2xl font-bold text-gray-900">Collections</h2>

                <div class="mt-6 space-y-12 lg:grid lg:grid-cols-2 lg:gap-x-6 lg:space-y-0">
                    <div class="group relative">
                        <div
                            class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64">
                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg"
                                alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                                class="h-full w-full object-cover object-center">
                        </div>
                        <h3 class="mt-6 text-sm text-gray-500">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Desk and Office
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">Work from home accessories</p>
                    </div>
                    <div class="group relative">
                        <section class="bg-gray-50 dark:bg-gray-900">
                            <div
                                class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                                <a href="#"
                                    class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                                    <img class="w-8 h-8 mr-2"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                                    Flowbite
                                </a>
                                <div
                                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                                        <h1
                                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                                            Sign in to your account
                                        </h1>
                                        <form class="space-y-4 md:space-y-6" action="#">
                                            <div>
                                                <label for="email"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                                    email</label>
                                                <input type="email" name="email" id="email"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="name@company.com" required="">
                                            </div>
                                            <div>
                                                <label for="password"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                                <input type="password" name="password" id="password"
                                                    placeholder="••••••••"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required="">
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="remember" aria-describedby="remember" type="checkbox"
                                                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                                            required="">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="remember"
                                                            class="text-gray-500 dark:text-gray-300">Remember me</label>
                                                    </div>
                                                </div>
                                                <a href="#"
                                                    class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot
                                                    password?</a>
                                            </div>
                                            <button type="submit"
                                                class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                                                in</button>
                                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                                Don’t have an account yet? <a href="#"
                                                    class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign
                                                    up</a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>