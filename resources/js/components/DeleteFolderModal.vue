<template>
    <vs-dialog :loading="loading" width="550px" not-center v-model="active">
        <template #header>
            <h4 class="not-margin" style="text-align: center">
                Delete <b>{{ SELECTED_FOLDER.name }}</b> Folder?
            </h4>
        </template>

        <template #footer>
            <div class="con-footer">
                <vs-row justify="flex-end">
                    <vs-col w="1">
                        <vs-button gradient danger @click="confirm">
                            Ok
                        </vs-button>
                    </vs-col>
                    <vs-col w="2">
                        <vs-button transparent primary @click="close">
                            Cancel
                        </vs-button>
                    </vs-col>
                </vs-row>
            </div>
        </template>
    </vs-dialog>
</template>

<script>
import {mapGetters} from "vuex";
export default {
    computed: {
        ...mapGetters(['SELECTED_FOLDER'])
    },
    data:() => ({
        active: false,
        loading: false
    }),
    methods: {
        open() {
            this.active = true
        },
        close() {
            this.active = false
        },
        confirm() {
            this.active = this.loading = false
            this.$store.dispatch('DELETE_FOLDER', this.SELECTED_FOLDER);
        },
    }
}
</script>
