<script lang="ts" setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { marked } from "marked";
import { computed } from "vue";

const props = defineProps({
    post: Object,
});

const contentHtml = computed(() => marked(props.post.content));
</script>

<template>
    <AppLayout>
        <div class="px-12 py-4">
            <div class="flex justify-end gap-2">
                <button class="btn btn-secondary">Edit Post</button>
                <button class="btn btn-error">Delete</button>
            </div>
            <div class="mt-4">
                <article
                    class="prose prose-sm sm:prose lg:prose-lg xl:prose-xl"
                >
                    <h1>
                        {{ post.title }}
                    </h1>
                    <div class="mt-2" v-html="contentHtml"></div>
                </article>
            </div>
        </div>
    </AppLayout>
</template>
