<script lang="ts" setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import TipTapEditor from "@/Components/TipTapEditor.vue";

defineProps({
    status: Number,
});

const form = useForm({
    title: null,
    content: null,
    cover_image: null,
});

function submit() {
    form.post(route("posts.store"));
}
</script>

<template>
    <AppLayout>
        <div class="px-12 py-4">
            <!-- post form -->
            <form @submit.prevent="submit">
                <div class="flex justify-end">
                    <button
                        type="submit"
                        :class="{
                            loading: form.processing,
                        }"
                        class="btn btn-primary"
                        :disabled="form.processing"
                    >
                        Create
                    </button>
                </div>
                <div class="mt-4 flex flex-col gap-4">
                    <div v-if="form.hasErrors">
                        <div class="alert alert-error">
                            <div>
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
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                                <ul>
                                    <li v-for="error in form.errors">
                                        {{ error }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- upload image -->
                    <div>
                        <label class="label">
                            <span class="label-text">Cover Image</span>
                        </label>
                        <div class="flex flex-row gap-4">
                            <input
                                type="file"
                                class="input input-ghost file:btn"
                                @input="
                                    form.cover_image = $event.target.files[0]
                                "
                                ref="fileInput"
                            />
                            <button
                                type="button"
                                class="btn"
                                @click="
                                    form.cover_image = null;
                                    $refs.fileInput.value = null;
                                "
                                :disabled="form.cover_image === null"
                            >
                                Remove
                            </button>
                        </div>
                    </div>
                    <div class="mt-4 form-control">
                        <label class="label">
                            <span class="label-text">Title</span>
                        </label>
                        <input
                            v-model="form.title"
                            type="text"
                            placeholder="Title"
                            class="input input-bordered w-full"
                        />
                    </div>
                    <div class="mt-2">
                        <TipTapEditor v-model="form.content" />
                    </div>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
