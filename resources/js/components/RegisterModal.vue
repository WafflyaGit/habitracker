<template>
    <div class="center">
        <vs-dialog blur :loading="loading" v-model="active">
            <form class="con-form" @submit.prevent="submit">
                <h3 style="text-align: center">Sign Up</h3>
                <vs-input warn v-model="form.name" placeholder="Name">
                    <template #icon>
                        <i class='bx bx-user'></i>
                    </template>
                    <template v-if="form.errors.name" #message-warn>
                        {{ form.errors.name[0] }}
                    </template>
                </vs-input>
                <vs-input warn v-model="form.surname" placeholder="Surname">
                    <template #icon>
                        <i class='bx bx-user'></i>
                    </template>
                    <template v-if="form.errors.surname" #message-warn>
                        {{ form.errors.surname[0] }}
                    </template>
                </vs-input>
                <vs-input warn v-model="form.email" placeholder="Email">
                    <template #icon>
                        @
                    </template>
                    <template v-if="form.errors.email" #message-warn>
                        {{ form.errors.email[0] }}
                    </template>
                </vs-input>
                <vs-input warn type="password" v-model="form.password" placeholder="Password">
                    <template #icon>
                        <i class='bx bxs-lock'></i>
                    </template>
                    <template v-if="form.errors.password" #message-warn>
                        {{ form.errors.password[0] }}
                    </template>
                </vs-input>
                <vs-input warn type="password" v-model="form.password_confirmation" placeholder="Password Confirmation">
                    <template #icon>
                        <i class='bx bxs-lock'></i>
                    </template>
                    <template v-if="form.errors.password_confirmation" #message-warn>
                        {{ form.errors.password_confirmation[0] }}
                    </template>
                </vs-input>
                <vs-button block style="margin-top: 20px" @click="submit">
                    Sign Up
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
            surname: '',
            email: '',
            password: '',
            password_confirmation: '',
            errors: {
                email: null,
                password: null,
                password_confirmation: null,
                name: null,
                surname: null,
            },
        },
        active: false,
        loading: false
    }),
    methods: {
        submit() {
            this.loading = true;
            this.$store.dispatch('REGISTER', this.form)
                .then(() => {
                    this.loading = this.active = false;
                })
                .catch(errors => this.form.errors = errors)
                .finally(() => this.loading = false);
        },
        open() {
            this.active = true;
        },
        close() {
            this.active = false;
        },
    }
}
</script>

<style lang="stylus">
getColor(vsColor, alpha = 1)
    unquote("rgba(var(--vs-"+vsColor+"), "+alpha+")")
getVar(var)
unquote("var(--vs-"+var+")")

.not-margin
    margin 0
    font-weight normal
    padding 10px
.con-form
    width 100%
    .flex
        display flex
        align-items center
        justify-content space-between
        margin-top 10px
        a
            font-size .8rem
            opacity .7
            &:hover
                opacity 1
    .vs-checkbox-label
        font-size .8rem
    .vs-input-content
        margin 15px 0
        width calc(100%)
        height 14px
        .vs-input
            width 100%
            font-size: 14px
    .h3
        text-align center
.footer-dialog
    display flex
    align-items center
    justify-content center
    flex-direction column
    width calc(100%)
    .new
        margin 0
        margin-top 20px
        padding: 0
        font-size .7rem
        a
            color getColor('text') !important
            margin-left 6px
            &:hover
                text-decoration none
    .vs-button
        margin 0
</style>
