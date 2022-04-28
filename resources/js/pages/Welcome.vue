<template>
    <layout style="color: white; margin-top: 200px">
        <vs-row offset="2" w="8">
            <vs-col>
                <h1 style="text-align: center; opacity: 0.7; font-size: 50px">Welcome to Habitracker!</h1>
                <h2 style="text-align: center; opacity: 0.7;">Use our habitracker to interact you activities into game</h2>
            </vs-col>
        </vs-row>
        <h1 style="text-align: center; opacity: 0.7; font-size: 50px">User cards bla bla bla!</h1>
        <vs-row style="margin-top: 50px;">
            <vs-col offset="2" w="10">
                <div class="cards">
                    <div class="task_card primary">
                        <i class="bx bxs-spreadsheet card_icon"></i>
                    </div>
                    <div class="task_card orange">
                        <i class="bx bxs-time card_icon"></i>
                    </div>
                    <div class="task_card green">
                        <i class="bx bxs-note card_icon"></i>
                    </div>
                    <div class="task_card red">
                        <i class="bx bxs-note card_icon"></i>
                    </div>
                </div>
            </vs-col>
        </vs-row>
    </layout>
</template>

<script>
import Layout from "../layouts/Layout";
export default {
    components: {Layout}
}
</script>

<style>
.card_icon {
    position: absolute;
    left: 0;
    margin: 15px;
    transform: scale(2)
}
.plus_card {
    background: rgba(91,60,196,40);
    margin-top: 50px;
    border-radius: 20px;
    height: 500px;
    width: 100%;
    text-align: center;
    cursor: pointer;
    opacity: 0.7;
}
.cards {
    margin-top: 50px;
}
.task_card {
    position: relative;
    display: inline-block;
    border-radius: 20px;
    height: 240px;
    margin-bottom: 20px;
    width: 200px;
    text-align: center;
    cursor: pointer;
    margin-left: 10px;
    opacity: 0.7;
}
.primary {
    background: linear-gradient(45deg, rgba(36, 33, 69, 60), rgba(91, 60, 196, 60));
}
.orange {
    background: linear-gradient(45deg, rgba(36, 33, 69, 60), rgba(255, 130, 0, 60));
}
.green {
    background: linear-gradient(45deg, rgba(36, 33, 69, 60), rgb(23, 201, 100));
}
.red {
    background: linear-gradient(45deg, rgba(36, 33, 69, 60), rgb(36, 33, 69));
}
.plus_card:hover {
    background: rgba(91,60,196,20);
}
.bxs-plus-circle {
    margin: 250px auto;
    transform: scale(5);
}

</style>
