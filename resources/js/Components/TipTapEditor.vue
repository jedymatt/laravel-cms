<template>
    <div>
        <div class="flex flex-row gap-2">
            <TipTapEditorToolbar :editor="editor" />
        </div>
        <div class="mt-4 textarea textarea-bordered w-full">
            <EditorContent :editor="editor" />
        </div>
    </div>
</template>

<script lang="ts" setup>
import StarterKit from "@tiptap/starter-kit";
import { Editor, EditorContent } from "@tiptap/vue-3";
import Image from "@tiptap/extension-image";
import { watch } from "vue";
import TipTapEditorToolbar from "./TipTapEditorToolbar.vue";

const props = defineProps({
    modelValue: {
        type: String,
        default: "",
    },
});

const emit = defineEmits(["update:modelValue"]);
// StarterKit.

const editor = new Editor({
    extensions: [StarterKit, Image],
    content: props.modelValue,
    editorProps: {
        attributes: {
            class: "prose focus:outline-none",
        },
    },
    onUpdate: ({ editor }) => {
        emit("update:modelValue", editor.getHTML());
    },
});

watch(
    () => props.modelValue,
    (value) => {
        const isSame = editor.getHTML() === value;

        if (isSame) {
            return;
        }

        editor.commands.setContent(value, false);
    }
);
</script>
