<script lang="ts" setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

defineProps({
    status: String,
});

const form = useForm({
    email: null,
    password: null,
});

function submit() {
    form.post(route("login"));
}

const errors = computed(() => usePage().props.value.errors);

const hasErrors = computed(
    () => Object.keys(errors.value as object).length > 0
);
</script>

<template>
    <GuestLayout>
        <div class="min-h-screen flex items-center justify-center">
            <div class="flex-grow-0 max-w-md w-full">
                <form @submit.prevent="submit">
                    <div class="card card-bordered bg-base-200 shadow-xl">
                        <div class="card-body">
                            <div
                                class="items-center gap-2 px-4 py-2 flex shadow-sm justify-center"
                            >
                                <Link
                                    href="/"
                                    class="flex-0 btn btn-ghost px-2"
                                >
                                    <div
                                        class="font-title text-primary inline-flex transition-all duration-200 text-4xl lg:text-5xl"
                                    >
                                        <span class="capitalize">Apokon</span>
                                        <span
                                            class="text-base-content uppercase"
                                            >CMS</span
                                        >
                                    </div>
                                </Link>
                            </div>
                            <div class="mt-4" v-if="hasErrors">
                                <div class="alert alert-error">
                                    <ul>
                                        <li v-for="(error, field) in errors">
                                            {{ error }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-4" v-if="status">
                                <div class="alert alert-info">
                                    {{ status }}
                                </div>
                            </div>
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text">Email</span>
                                </label>
                                <input
                                    v-model="form.email"
                                    type="email"
                                    placeholder="Email here..."
                                    class="input input-bordered w-full"
                                />
                            </div>
                            <div class="mt-4 form-control w-full">
                                <label class="label">
                                    <span class="label-text">Password</span>
                                </label>
                                <input
                                    v-model="form.password"
                                    type="password"
                                    placeholder="Password here..."
                                    class="input input-bordered w-full"
                                />
                            </div>
                            <div class="mt-4 card-actions justify-end">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>
