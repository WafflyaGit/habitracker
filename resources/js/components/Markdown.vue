<template>
    <editor header list table :config="config"></editor>
</template>

<script>
export default {
    data() {
        return {
            config: {
                image: {
                    endpoints: {
                        byFile: 'http://localhost:8090/image',
                        byUrl: 'http://localhost:8090/image-by-url',
                    },
                    field: 'image',
                    types: 'image/*',
                },
                tools: {
                    header: require('@editorjs/header'),
                    list: require('@editorjs/list'),
                    table: require('@editorjs/table'),
                    paragraph: require('@editorjs/paragraph'),
                }
            }
        }
    }
}
</script>
<style>
.cdx-block {
    opacity: 0.8;
}
.codex-editor {
    padding: 15px;
    background: linear-gradient(45deg, rgba(36, 33, 69, 60), rgb(13, 70, 35));
    border-radius: 15px;
}
.icon {
    color: rgba(255, 130, 0, 60);
    opacity: 0.8
}
.ce-block__content,
.ce-toolbar__content {
    max-width: 1200px;
    border-radius: 15px;
}
.ce-toolbox__button {
    color: white;
    opacity: 0.8;
}
</style>
