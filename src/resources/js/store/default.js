export const createStoreObject = (resource, defaultData = []) => ({
    namespaced: true,

    state: {
        data: defaultData,
        error: undefined,
    },

    mutations: {
        [resource.MUTATIONS.SET](state, data) {
            state.data = data;
        },
        [resource.MUTATIONS.ERROR](state, error) {
            state.error = error;
        }
    },

    actions: {
        async [resource.ACTIONS.FETCH]({ commit, dispatch }) {
            try {
                dispatch('wait/start', resource.LOADINGS.FETCH, { root: true });

                const data = await axios.get(resource.URL).then(({ data }) => data.data);

                commit(resource.MUTATIONS.SET, data);
            } catch (error) {
                commit(resource.MUTATIONS.ERROR, error);
            } finally {
                dispatch('wait/end', resource.LOADINGS.FETCH, { root: true });
            }
        },
    },
});
