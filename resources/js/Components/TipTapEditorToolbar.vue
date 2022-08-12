<script lang="ts" setup>
import { Editor } from "@tiptap/vue-3";

defineProps({
    editor: {
        type: Editor,
        required: true,
    },
});
</script>

<template>
    <div class="flex flex-row overflow-x-scroll w-full gap-2">
        <div class="btn-group">
            <button
                @click="editor.chain().focus().toggleBold().run()"
                type="button"
                class="btn"
                :class="{ 'btn-active': editor.isActive('bold') }"
            >
                <font-awesome-icon icon="fa-solid fa-bold" />
            </button>

            <button
                @click="editor.chain().focus().toggleItalic().run()"
                type="button"
                class="btn"
                :class="{ 'btn-active': editor.isActive('italic') }"
            >
                <font-awesome-icon icon="fa-solid fa-italic" />
            </button>
            <button
                @click="editor.chain().focus().toggleStrike().run()"
                type="button"
                class="btn"
                :class="{ 'btn-active': editor.isActive('strike') }"
            >
                <font-awesome-icon icon="fa-solid fa-strikethrough" />
            </button>
        </div>
        <!-- Headings -->
        <div class="btn-group">
            <button
                @click="
                    editor.chain().focus().toggleHeading({ level: 1 }).run()
                "
                type="button"
                class="btn gap-0.5"
                :class="{
                    'btn-active': editor.isActive('heading', { level: 1 }),
                }"
            >
                <font-awesome-icon icon="fa-solid fa-heading" />
                <font-awesome-icon icon="fa-solid fa-1" />
            </button>

            <button
                @click="
                    editor.chain().focus().toggleHeading({ level: 2 }).run()
                "
                type="button"
                class="btn gap-0.5"
                :class="{
                    'btn-active': editor.isActive('heading', { level: 2 }),
                }"
            >
                <font-awesome-icon icon="fa-solid fa-heading" />
                <font-awesome-icon icon="fa-solid fa-2" />
            </button>
            <button
                @click="
                    editor.chain().focus().toggleHeading({ level: 3 }).run()
                "
                type="button"
                class="btn gap-0.5"
                :class="{
                    'btn-active': editor.isActive('heading', { level: 3 }),
                }"
            >
                <font-awesome-icon icon="fa-solid fa-heading" />
                <font-awesome-icon icon="fa-solid fa-3" />
            </button>
        </div>

        <!-- The button to open modal -->
        <label for="my-modal-4" class="btn modal-button">
            <font-awesome-icon icon="fa-solid fa-image" />
        </label>

        <!-- Put this part before </body> tag -->
        <input type="checkbox" id="my-modal-4" class="modal-toggle" />
        <label for="my-modal-4" class="modal cursor-pointer">
            <label class="modal-box relative" for="">
                <label
                    for="my-modal-4"
                    class="btn btn-sm btn-circle absolute right-2 top-2"
                    >✕</label
                >
                <h3 class="text-2xl font-bold">Upload Image</h3>
                <div class="py-4">
                    <div class="min-h-16">
                        <input type="file" class="input input-ghost w-full" />
                    </div>
                </div>
            </label>
        </label>
    </div>
</template>