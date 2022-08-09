<script lang="ts" setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <div>
        <div class="drawer drawer-mobile">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content">
                <!-- Page content here -->
                <div class="sticky top-0 z-30 bg-opacity-90 backdrop-blur">
                    <div class="navbar bg-base-100">
                        <div class="flex lg:flex-1">
                            <label
                                for="my-drawer-2"
                                class="btn btn-ghost btn-square drawer-button lg:hidden"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                </svg>
                            </label>
                        </div>
                        <div class="flex-1 lg:hidden">
                            <Link href="/" class="flex-0 btn btn-ghost px-2">
                                <div
                                    class="font-title text-primary inline-flex text-lg transition-all duration-200 md:text-3xl"
                                >
                                    <span class="capitalize">Apokon</span>
                                    <span class="text-base-content uppercase"
                                        >CMS</span
                                    >
                                </div>
                            </Link>
                        </div>
                        <div class="flex-none">
                            <div class="dropdown dropdown-end">
                                <label
                                    tabindex="0"
                                    class="btn btn-ghost btn-circle avatar"
                                >
                                    <div class="w-10 rounded-full">
                                        <img
                                            src="https://placeimg.com/80/80/people"
                                        />
                                    </div>
                                </label>
                                <ul
                                    tabindex="0"
                                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52"
                                >
                                    <li>
                                        <a class="justify-between">
                                            Profile
                                            <span class="badge">New</span>
                                        </a>
                                    </li>
                                    <li><a>Settings</a></li>
                                    <li>
                                        <Link :href="route('logout')" method="post">Logout</Link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <main>
                    <slot></slot>
                </main>
            </div>
            <div class="drawer-side">
                <label for="my-drawer-2" class="drawer-overlay"></label>
                <ul
                    class="menu p-4 overflow-y-auto w-80 bg-base-200 text-base-content"
                >
                    <div
                        class="z-20 bg-base-200 bg-opacity-90 backdrop-blur sticky top-0 items-center gap-2 px-4 py-2 hidden lg:flex shadow-sm"
                    >
                        <Link href="/" class="flex-0 btn btn-ghost px-2">
                            <div
                                class="font-title text-primary inline-flex text-lg transition-all duration-200 md:text-3xl"
                            >
                                <span class="capitalize">Apokon</span>
                                <span class="text-base-content uppercase"
                                    >CMS</span
                                >
                            </div>
                        </Link>
                    </div>
                    <!-- Sidebar content here -->
                    <li class="menu-title">
                        <span>Collections</span>
                    </li>
                    <li class="mt-4">
                        <Link
                            :href="route('posts.index')"
                            :class="{
                                active: route().current('posts.*'),
                            }"
                            >Posts</Link
                        >
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
