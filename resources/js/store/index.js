import Vue from 'vue'
import Vuex from "vuex"
import auth from "./modules/auth";
import folder from "./modules/folder"

Vue.use(Vuex)

export const store = new Vuex.Store({
    modules: {
        auth,
        folder
    }
});
