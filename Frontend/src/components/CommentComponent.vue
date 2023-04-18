<script setup>

</script>

<template>
    <article class="p-6 mb-6 text-base bg-slate-300 rounded-lg dark:bg-slate-800">
        <div class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <p class="inline-flex items-center mr-3">
                    <img
                        class="mr-2 w-10 h-10 rounded-full"
                        src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                        alt="Michael Gough">
                </p>
                <div>
                    <p class="text-sm md:text-base">Michael Gough</p>
                    <p class="text-xs md:text-sm text-slate-600 dark:text-slate-400"><time pubdate datetime="2022-02-08"
                            title="February 8th, 2022">Feb. 8, 2022</time></p>
                </div>
            </div>
            <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                class="inline-flex items-center p-2 text-sm font-medium text-center text-slate-400 bg-slate-300 rounded-lg hover:bg-slate-100 focus:ring-4 focus:outline-none focus:ring-slate-50 dark:bg-slate-900 dark:hover:bg-slate-700 dark:focus:ring-slate-600"
                type="button">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                    </path>
                </svg>
                <span class="sr-only">Comment settings</span>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownComment1"
                class="hidden z-10 w-36 bg-slate-300 rounded divide-y divide-slate-100 shadow dark:bg-slate-700 dark:divide-slate-600">
                <ul class="py-1 text-sm text-slate-700 dark:text-slate-200"
                    aria-labelledby="dropdownMenuIconHorizontalButton">
                    <li>
                        <a href="#"
                            class="block py-2 px-4 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">Edit</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-4 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">Remove</a>
                    </li>
                </ul>
            </div>
        </div>
        <p class="text-slate-700 dark:text-slate-300">Very straight-to-point article. Really worth time reading. Thank you! But tools are just the
            instruments for the UX designers. The knowledge of the design tools are as important as the
            creation of the design strategy.</p>
    </article>
</template>

<style>

</style>
