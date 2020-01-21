import { loadImage } from '../util';

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
        async [resource.ACTIONS.FETCH]({ commit, dispatch }, params = {}) {
            try {
                dispatch('wait/start', resource.LOADINGS.FETCH, { root: true });

                const data = await axios.get(resource.URL, { params }).then(({ data }) => data.data);

                if (data) {
                  try {
                    await Promise.all(data.filter(obj => !!obj.picture).map(obj => loadImage(obj.picture)));
                  } finally {
                  }
                }

                commit(resource.MUTATIONS.SET, data);
            } catch (error) {
                commit(resource.MUTATIONS.ERROR, error);
            } finally {
                dispatch('wait/end', resource.LOADINGS.FETCH, { root: true });
            }
        },
    },
});
