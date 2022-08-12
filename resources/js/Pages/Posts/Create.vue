<script lang="ts" setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import TipTapEditor from "@/Components/TipTapEditor.vue";

defineProps({
    status: Number,
});

const form = useForm({
    title: null,
    content: null,
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
                <label class="flex justify-end">
                    <button
                        type="submit"
                        :class="{
                            loading: form.processing,
                        }"
                        class="btn btn-primary"
                    >
                        Create
                    </button>
                </label>
                <div class="mt-4 flex flex-col gap-4">
                    <input
                        v-model="form.title"
                        type="text"
                        placeholder="Title"
                        class="input input-bordered w-full"
                    />
                    <div class="mt-2">
                        <TipTapEditor v-model="form.content" />
                    </div>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
