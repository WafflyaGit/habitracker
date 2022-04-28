import axios from "axios";

export default {
    state: {
        user: null,
        authenticated: false,
        token: localStorage.getItem('token'),
    },
    getters: {
        USER: state => {
            return state.user
        },
        TOKEN: state => {
            return state.token
        },
        AUTHENTICATED: state => {
            if (localStorage.getItem('token')) {
                return state.authenticated = !! localStorage.getItem('token')
            }

            return state.authenticated
        }
    },
    mutations: {
        SET_TOKEN: (state, payload) => {
            state.authenticated = true;
            localStorage.setItem('token', payload)
            location.reload();
        },
        REMOVE_TOKEN: state => {
            state.authenticated = false;
            localStorage.removeItem('token')
            location.reload();
        }
    },
    actions: {
        LOG_IN: async (context, { email, password }) => {
            return await new Promise((resolve, reject) => {
                axios.post(route('login'), { email, password })
                    .then(response => resolve(context.commit('SET_TOKEN', response.data)))
                    .catch(errors => reject(errors.response.data.errors))
            })
        },
        REGISTER: async (context, { name, sur_name, email, password, password_confirmation }) => {
            return await new Promise((resolve, reject) => {
                axios.post(route('login'), { name, sur_name, email, password, password_confirmation })
                    .then(() => resolve())
                    .catch(errors => reject(errors.response.data.errors))
            })
        },
        LOG_OUT: async (context) => {
            await context.commit('REMOVE_TOKEN');
        },
    }
}
