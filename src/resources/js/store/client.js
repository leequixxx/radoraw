import * as RESOURCE from '../consts/resources/client';

export default {
  namespaced: true,

  state: {
    soil: undefined,
    isotopesWithRadioactivityValues: [],
  },

  mutations: {
    [RESOURCE.MUTATIONS.SET_SOIL](state, data) {
      state.soil = data;
    },
    [RESOURCE.MUTATIONS.SET_ISOTOPES_WITH_RADIOACTIVITY_VALUES](state, data) {
      state.isotopesWithRadioactivityValues = data;
    },
  },
}
