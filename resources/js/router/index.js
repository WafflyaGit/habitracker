import VueRouter from "vue-router";
import Welcome from "../pages/Welcome";
import Folders from "../pages/Folders";

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/welcome',
            component: Welcome
        },
        {
            path: '/folders',
            component: Folders
        }
    ]
})
