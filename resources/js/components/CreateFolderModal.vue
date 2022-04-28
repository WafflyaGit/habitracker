<template>
    <div class="center">
        <vs-dialog blur :loading="loading" v-model="active">
            <form class="con-form" @submit.prevent="submit">
                <h3 style="text-align: center">Create New Folder</h3>
                <vs-input warn v-model="form.name" placeholder="Folder name">
                    <template #icon>
                        <i class='bx bxs-folder-plus'></i>
                    </template>
                    <template v-if="form.errors.name" #message-warn>
                        {{ form.errors.name[0] }}
                    </template>
                </vs-input>
                <vs-button block style="margin-top: 20px">
                    Create
                </vs-button>
            </form>
        </vs-dialog>
    </div>
</template>

<script>
export default {
    data:() => ({
        form: {
            name: '',
            errors: {
                name: ''
            }
        },
        active: false,
        loading: false
    }),
    methods: {
        submit() {
            this.loading = true;
            this.$store.dispatch('CREATE_FOLDER', this.form)
                .then(() => {
                    this.active = this.loading = false;
                    this.form.name = '';
                })
                .catch(err => this.form.errors = err)
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
