<script lang="ts" setup>
import { Editor } from "@tiptap/vue-3";
import { ref, Teleport } from "vue";

const showImageModal = ref(false);

const props = defineProps({
    editor: {
        type: Editor,
        required: true,
    },
});

function toggleTextAlign(alignment: "left" | "center" | "right") {
    props.editor.isActive({ textAlign: alignment })
        ? props.editor.chain().focus().unsetTextAlign().run()
        : props.editor.chain().focus().setTextAlign(alignment).run();
}

function addImage(e: Event) {
    const file: File = (e.target as HTMLInputElement).files[0];

    if (!file) {
        return;
    }

    showImageModal.value = false;

    props.editor
        .chain()
        .focus()
        .setImage({ src: URL.createObjectURL(file) })
        .run();
}
</script>

<template>
    <div class="flex flex-row w-full gap-2">
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

        <!-- Alignments -->
        <div class="btn-group">
            <button
                @click="toggleTextAlign('left')"
                class="btn"
                :class="{
                    'btn-active': editor.isActive({ textAlign: 'left' }),
                }"
                type="button"
            >
                <font-awesome-icon icon="fa-solid fa-align-left" />
            </button>
            <button
                @click="toggleTextAlign('center')"
                class="btn"
                :class="{
                    'btn-active': editor.isActive({ textAlign: 'center' }),
                }"
                type="button"
            >
                <font-awesome-icon icon="fa-solid fa-align-center" />
            </button>
            <button
                @click="toggleTextAlign('right')"
                class="btn"
                :class="{
                    'btn-active': editor.isActive({ textAlign: 'right' }),
                }"
                type="button"
            >
                <font-awesome-icon icon="fa-solid fa-align-right" />
            </button>
        </div>

        <!-- The button to open modal -->
        <button class="btn" type="button" @click="showImageModal = true">
            <font-awesome-icon icon="fa-solid fa-image" />
        </button>

        <!-- Put this part before </body> tag -->
        <Teleport to="body">
            <div>
                <input
                    type="checkbox"
                    id="my-modal-4"
                    class="modal-toggle"
                    v-model="showImageModal"
                />
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
                                <input
                                    @change="addImage($event)"
                                    type="file"
                                    class="input input-ghost w-full"
                                />
                            </div>
                        </div>
                    </label>
                </label>
            </div>
        </Teleport>
    </div>
</template>
