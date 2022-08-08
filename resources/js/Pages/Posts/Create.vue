<script lang="ts" setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

const form = useForm({
    title: null,
    content: null,
});
</script>

<template>
    <AppLayout>
        <div class="px-12 py-4">
            <!-- post form -->
            <form
                class="card card-bordered bg-base-200 shadow-md"
                :action="route('posts.store')"
                method="POST"
                @submit.prevent="onSubmit"
            >
                <div class="card-body">
                    <h1 class="card-title">Create New Post</h1>
                    <div class="mt-2">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input
                                id="title"
                                type="text"
                                class="form-control"
                                name="title"
                                v-model="form.title"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea
                                id="content"
                                class="form-control"
                                name="content"
                                v-model="form.content"
                                required
                            ></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-actions flex justify-end">
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
