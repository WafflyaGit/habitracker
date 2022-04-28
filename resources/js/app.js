require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuesax from 'vuesax'
import App from "./App.vue";
import router from './router/index'
import "./axios";
import {store} from './store'
import Editor from 'vue-editor-js/src'

window.Vue = require('vue').default;

// Style
import 'vuesax/dist/vuesax.css'

// Config
Vue.use(VueRouter);
Vue.mixin({ methods: { route: window.route } });
Vue.use(Vuesax, {
    colors: {
        primary:'rgba(91,60,196,100)',
        success:'rgb(23, 201, 100)',
        danger:'rgb(242, 19, 93)',
        warning:'rgb(255, 130, 0)',
        dark:'rgb(36, 33, 69)',
        text: 'rgb(255, 255, 255)'
    }
})
Vue.use(Editor)

// Pages
Vue.component('welcome-component', require('./pages/Welcome.vue').default);
Vue.component('folders-component', require('./pages/Folders.vue').default);

// Components
Vue.component('navbar-component', require('./components/NavBar.vue').default);
Vue.component('login-modal-component', require('./components/LoginModal.vue').default);
Vue.component('register-modal-component', require('./components/RegisterModal.vue').default);
Vue.component('create-folder-modal-component', require('./components/CreateFolderModal.vue').default);
Vue.component('delete-folder-modal-component', require('./components/DeleteFolderModal.vue').default);
Vue.component('edit-folder-modal-component', require('./components/EditFolderModal.vue').default);
Vue.component('profile-modal-component', require('./components/ProfileModal.vue').default);
Vue.component('folder-component', require('./components/Folder.vue').default);
Vue.component('create-task-component', require('./components/CreateTaskModal.vue').default);
Vue.component('calendar-component', require('./components/Calendar.vue').default);
Vue.component('markdown-component', require('./components/Markdown.vue').default);

// Layouts
Vue.component('layout-component', require('./layouts/Layout.vue').default);

const app = new Vue({
    store,
    render: h => h(App),
    el: '#app',
    router,
});
