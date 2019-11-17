const APP_URL = process.env.MIX_APP_URL;
const RESOURCE = 'api/soils';

export default {
  namespaced: true,

  state: {
    data: [],
    error: undefined,
  },

  mutations: {
    set(state, data) {
      state.data = data;
    },
    error(state, error) {
      state.error = error;
    }
  },

  actions: {
    async fetch({ commit, dispatch }) {
        try {
            dispatch('wait/start', 'soils.fetch', { root: true });

            const data = await axios.get(`${APP_URL}/${RESOURCE}`).then(({ data }) => data.data);

            commit('set', data);
        } catch (error) {
            commit('error', error);
        } finally {
            dispatch('wait/end', 'soils.fetch', { root: true });
        }
    },
  },
};
