<script lang="ts" setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/inertia-vue3";

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
                        :disabled="form.processing"
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
                    <textarea
                        v-model="form.content"
                        class="textarea textarea-bordered"
                        rows="10"
                        placeholder="Content"
                    ></textarea>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
