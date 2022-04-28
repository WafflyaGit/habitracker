export default {
    state: {
        folders: [],
        selectedFolder: {
            id: null,
            name: ''
        }
    },
    getters: {
        FOLDERS: state => {
            return state.folders
        },
        SELECTED_FOLDER: state => {
            return state.selectedFolder
        }
    },
    mutations: {
        SET_FOLDERS: (state, payload) => {
            return state.folders = payload
        },
        SET_SELECTED_FOLDER: (state, payload) => {
            return state.selectedFolder = payload
        }
    },
    actions: {
        GET_FOLDERS: async (context) => {
            return await new Promise((resolve, reject) => {
                axios.get(route('folders.index'))
                    .then(res => {
                        context.commit('SET_FOLDERS', res.data.data)
                        context.commit('SET_SELECTED_FOLDER', res.data.data[res.data.data.length - 1])
                        resolve()
                    })
                    .catch(err => reject(err.response.data.errors))
            })
        },
        CREATE_FOLDER: async (context, { name }) => {
            return await new Promise((resolve, reject) => {
                axios.post(route('folders.store'), { name })
                    .then(res => resolve(context.dispatch('GET_FOLDERS')))
                    .catch(err => reject(err.response.data.errors))
            })
        },
        DELETE_FOLDER: async (context, { id }) => {
            return await new Promise((resolve, reject) => {
                axios.delete(route('folders.destroy', id))
                    .then((res) => resolve(context.dispatch('GET_FOLDERS')))
                    .catch((err) => reject(err.response.data.errors))
            });
        },
        EDIT_FOLDER: async (context, { id, name }) => {
            return await new Promise((resolve, reject) => {
                axios.put(route('folders.update', id), { name })
                    .then(() => resolve(context.dispatch('GET_FOLDERS')))
                    .catch((err) => reject(err.response.data.errors))
            })
        },
        CHOOSE_FOLDER: async (context, payload) => {
            await context.commit('SET_SELECTED_FOLDER', payload);
        }
    }
}
