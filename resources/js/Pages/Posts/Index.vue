<script lang="ts" setup>
import { Link } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    posts: Array<Post>,
});
</script>

<template>
    <AppLayout>
        <div class="px-12 py-4">
            <div class="flex justify-end">
                <Link
                    class="btn btn-primary gap-2"
                    :href="route('posts.create')"
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
                            d="M12 4v16m8-8H4"
                        />
                    </svg>
                    New Post
                </Link>
            </div>
            <div class="mt-4 grid gap-4">
                <div
                    v-for="post in posts"
                    :key="post.id"
                    class="card card-bordered bg-base-200 shadow-md"
                >
                    <figure v-if="post.cover_image_url !== null">
                        <img
                            class="object-cover object-center h-48 w-full"
                            :src="post.cover_image_url"
                            :alt="post.title"
                        />
                    </figure>
                    <div class="card-body">
                        <h1 class="card-title">{{ post.title }}</h1>
                        <div class="mt-2 card-actions flex justify-end">
                            <Link
                                :href="route('posts.show', post.slug)"
                                class="btn btn-primary"
                            >
                                Read More
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
