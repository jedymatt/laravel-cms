<script lang="ts" setup>
import { Editor as EditorType } from "@tiptap/core";
import { computed, ref } from "vue";

defineProps({
    editor: {
        type: EditorType,
        required: true,
    },
});

const currentHeaderLevel = ref(1);

const headerLevel = computed(() => {
    return (currentHeaderLevel.value % 6) + 1;
});

</script>

<template>
    <div
        class="flex flex-row overflow-hidden p-2 w-full border-b border-base-content"
    >
        <div class="btn-group">
        <button
        data-tip="Bold"
            @click="editor.chain().focus().toggleBold().run()"
            type="button"
            class="btn btn-square"
            :class="{ 'btn-outline': editor.isActive('bold')}"
        >
            <font-awesome-icon icon="fa-solid fa-bold" />
        </button>

        <button
            @click="editor.chain().focus().toggleItalic().run()"
            type="button"
            class="rounded-md px-4 py-1 hover:bg-base-300"
            :class="{ 'bg-base-300': editor.isActive('italic') }"
        >
            <font-awesome-icon icon="fa-solid fa-italic" />
        </button>
        <button
            @click="editor.chain().focus().setToggle({ level: headerLevel }).run();"
            type="button"
            class="rounded-md px-4 py-1 hover:bg-base-300"
            :class="{ 'bg-base-300': editor.isActive('heading') }"
        >
            <font-awesome-icon icon="fa-solid fa-heading" />
        </button>
        <button
            @click="editor.chain().focus().toggleStrike().run()"
            type="button"
            class="rounded-md px-4 py-1 hover:bg-base-300"
            :class="{ 'bg-base-300': editor.isActive('strike') }"
        >
            <font-awesome-icon icon="fa-solid fa-strikethrough" />
        </button>
        <button
            @click=""
            type="button"
            class="rounded-md px-4 py-1 hover:bg-base-300"
        >
            <font-awesome-icon icon="fa-solid fa-image" />
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
                <h3 class="text-lg font-bold">
                    Upload Image
                </h3>
                <p class="py-4">
                   <div class="min-h-16">
                        Select File
                        <input type="file" name="imag" id="image" />
                   </div>
                </p>
            </label>
        </label>
    </div>
</template>
