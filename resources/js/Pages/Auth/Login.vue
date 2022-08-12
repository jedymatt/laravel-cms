<script lang="ts" setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

defineProps({
    status: String,
});

const useTestUser = usePage().props.value.appEnv !== "production";

const testUser = {
    email: "test@example.com",
    password: "password",
};

const form = useForm(
    useTestUser
        ? testUser
        : {
              email: "",
              password: "",
          }
);

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
            <div class="max-w-md w-full">
                <TestUserBanner />
                <form @submit.prevent="submit">
                    <div class="card card-bordered bg-base-200 shadow-lg">
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
                                            <li
                                                v-for="(error, field) in errors"
                                            >
                                                {{ error }}
                                            </li>
                                        </ul>
                                    </div>
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
                                    required
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
                                    required
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
