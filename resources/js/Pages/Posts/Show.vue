<script lang="ts" setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref, Teleport } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    post: Object,
});

const showModal = ref(false);

const deletePostForm = useForm({});

function deletePost() {
    deletePostForm.delete(route("posts.destroy", { id: props.post.slug }));
}
</script>

<template>
    <AppLayout>
        <div class="px-12 py-4">
            <div class="flex justify-end gap-2">
                <button class="btn btn-secondary">Edit</button>
                <!-- The button to open modal -->
                <button class="btn btn-error" @click="showModal = true">
                    Delete
                </button>

                <Teleport to="body">
                    <div>
                        <input
                            type="checkbox"
                            id="my-modal-4"
                            class="modal-toggle"
                            v-model="showModal"
                        />
                        <label for="my-modal-4" class="modal cursor-pointer">
                            <label class="modal-box relative" for="">
                                <label
                                    for="my-modal-4"
                                    class="btn btn-sm btn-circle absolute right-2 top-2"
                                    >✕</label
                                >
                                <h3 class="text-lg font-bold">
                                    Are you sure you want to delete this post?
                                </h3>
                                <div class="py-4 flex justify-center gap-4">
                                    <button
                                        type="button"
                                        class="btn"
                                        @click="showModal = false"
                                        :disabled="deletePostForm.processing"
                                    >
                                        Cancel
                                    </button>
                                    <form @submit.prevent="deletePost">
                                        <button
                                            type="submit"
                                            class="btn btn-error"
                                            :class="{
                                                loading:
                                                    deletePostForm.processing,
                                            }"
                                            :disabled="
                                                deletePostForm.processing
                                            "
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </label>
                        </label>
                    </div>
                </Teleport>
            </div>
            <div class="mt-4">
                <article
                    class="prose prose-sm sm:prose lg:prose-lg xl:prose-xl"
                >
                    <div v-if="post.cover_image_url !== null">
                        <img :src="post.cover_image_url" :alt="post.slug" />
                    </div>
                    <h1>
                        {{ post.title }}
                    </h1>
                    <div class="mt-2" v-html="props.post.content"></div>
                </article>
            </div>
        </div>
    </AppLayout>
</template>
