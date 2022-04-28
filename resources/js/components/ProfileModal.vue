<template>
    <div class="center">
        <vs-dialog full-screen blur :loading="loading" v-model="active">
            <vs-row>
                <vs-col>
                    <vs-button style="font-size: 14px">Profile</vs-button>
                </vs-col>
                <vs-col style="background: rgba(91,60,196,0.1)" offset="2" w="8">
                    <div class="center content-inputs">
                        <vs-input v-model="value" placeholder="Name" />
                    </div>
                    <div class="center content-inputs">
                        <vs-input v-model="value" placeholder="Name" />
                    </div>
                    <div class="center content-inputs">
                        <vs-input v-model="value" placeholder="Name" />
                    </div>
                </vs-col>
            </vs-row>
        </vs-dialog>
    </div>
</template>

<script>
export default {
    data:() => ({
        active: false,
        loading: false
    }),
    methods: {
        submit() {

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
