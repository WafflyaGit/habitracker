<template>
    <div class="center">
        <vs-dialog blur full-screen :loading="loading" v-model="active">
            <form class="con-form" @submit.prevent="submit">
                <vs-row>
                    <vs-col w="8">
                        <div class="cards">
                            <div class="choice_card primary choice_checked">
                                <i class="bx bxs-spreadsheet card_icon"></i>
                                <div class="card_choice_title">Schedule</div>
                            </div>
                            <div class="choice_card orange">
                                <i class="bx bxs-time card_icon"></i>
                                <div class="card_choice_title">Timer</div>
                            </div>
                            <div class="choice_card green">
                                <i class="bx bxs-note card_icon"></i>
                                <div class="card_choice_title">Note</div>
                            </div>
                            <div class="choice_card red">
                                <i class="bx bxs-note card_icon"></i>
                                <div class="card_choice_title">Something else</div>
                            </div>
                            <vs-button color="warning" icon transparent>
                                <i class='bx bxs-coin-stack'></i>
                                <div style="margin-left: 5px">10</div>
                            </vs-button>
                        </div>
                    </vs-col>
                    <vs-col>
                        <markdown></markdown>
                    </vs-col>
                </vs-row>
            </form>
        </vs-dialog>
    </div>
</template>

<script>
import Markdown from "./Markdown";
export default {
    components: {Markdown},
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

<style>
    .choice_card {
        position: relative;
        display: inline-block;
        border-radius: 20px;
        height: 45px;
        margin-bottom: 20px;
        width: 200px;
        text-align: center;
        cursor: pointer;
        margin-left: 10px;
        opacity: 0.7;
        font-size: 16px;
        font-weight: bold;
    }
    .card_choice_title {
        margin-top: 13px;
    }
    .choice_checked {
        border: 2px solid white;
    }
</style>
