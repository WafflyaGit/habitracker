<template>
    <div class="center">
        <vs-dialog blur :loading="loading" v-model="active">
            <form class="con-form" @submit.prevent="submit">
                <h3 style="text-align: center">Edit <b>{{ SELECTED_FOLDER.name }}</b> Folder</h3>
                <vs-input warn v-model="editFolder.name" placeholder="Folder name">
                    <template #icon>
                        <i class='bx bxs-folder-plus'></i>
                    </template>
                    <template v-if="form.errors.name" #message-warn>
                        {{ form.errors.name[0] }}
                    </template>
                </vs-input>
                <vs-button block style="margin-top: 20px">
                    Edit
                </vs-button>
            </form>
        </vs-dialog>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    computed: {
        ...mapGetters(['SELECTED_FOLDER']),
        editFolder () {
            return {...this.SELECTED_FOLDER}
        }
    },
    data:() => ({
        form: {
            errors: {
                name: ''
            }
        },
        active: false,
        loading: false
    }),
    methods: {
        submit() {
            this.loading = true
            this.$store.dispatch('EDIT_FOLDER', this.editFolder)
                .then(() => this.loading = this.active = false)
                .catch((err) => this.form.errors = err)
        },
        open() {
            this.active = true;
        },
        close() {
            this.active = false;
        }
    }
}
</script>
