<template>
    <div class="center examplex">
        <vs-navbar not-line center-collapsed v-model="active">
            <template #left>
                <vs-navbar-item>
                    Habitracker
                </vs-navbar-item>
            </template>

            <vs-navbar-item v-if="AUTHENTICATED" v-for="folder in FOLDERS" :key="folder.id" :active="SELECTED_FOLDER.id === folder.id" @click="select(folder)">
                {{ folder.name }}
            </vs-navbar-item>

            <vs-button gradient v-if="AUTHENTICATED" @click="$refs.createFolder.open()">
                <i class='bx bxs-folder-plus'></i>
            </vs-button>

            <vs-button color="primary" icon transparent v-if="AUTHENTICATED && FOLDERS.length > 0" @click="$refs.editFolder.open()">
                <i class='bx bxs-edit'></i>
            </vs-button>

            <vs-button color="danger" icon transparent v-if="AUTHENTICATED && FOLDERS.length > 0" @click="$refs.deleteFolder.open()">
                <i class='bx bxs-trash'></i>
            </vs-button>

            <vs-button color="danger" style="display: none" v-if="FOLDERS.length > 0">
                <i class='bx bxs-trash'></i>
            </vs-button>

            <template #right v-if="!AUTHENTICATED">
                <vs-button flat @click="$refs.loginForm.open()">Login</vs-button>
                <vs-button>Get Started</vs-button>
            </template>
            <template #right v-else>
                <vs-button color="warning" icon transparent>
                    <i class='bx bxs-coin-stack'></i>
                    <div style="margin-left: 5px">10</div>
                </vs-button>
                <vs-button @click="$refs.profile.open">Profile</vs-button>
                <vs-button flat @click="logout">Logout</vs-button>
            </template>
        </vs-navbar>
        <div class="square">
            <div class="child">

            </div>
            <div class="child">

            </div>
            <div class="child">

            </div>
        </div>

        <login-modal ref="loginForm"></login-modal>
        <create-folder-modal ref="createFolder"></create-folder-modal>
        <delete-folder-modal ref="deleteFolder"></delete-folder-modal>
        <edit-folder-modal ref="editFolder"></edit-folder-modal>
        <profile-modal ref="profile"></profile-modal>
    </div>
</template>

<script>
import LoginModal from "./LoginModal";
import CreateFolderModal from "./CreateFolderModal";

import {mapGetters} from "vuex";
import DeleteFolderModal from "./DeleteFolderModal";
import EditFolderModal from "./EditFolderModal";
import ProfileModal from "./ProfileModal";
export default {
    components: {ProfileModal, EditFolderModal, DeleteFolderModal, CreateFolderModal, LoginModal},
    computed: {
        ...mapGetters(['AUTHENTICATED', 'FOLDERS', 'SELECTED_FOLDER'])
    },
    created() {
        this.$store.dispatch('GET_FOLDERS');
    },
    data:() => ({
        active: null,
    }),
    methods: {
        logout() {
            this.$store.dispatch("LOG_OUT");
        },
        select(folder) {
            this.$store.dispatch('CHOOSE_FOLDER', folder);
        }
    }
}
</script>
