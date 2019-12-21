import * as RESOURCE from '../consts/resources/client';

export default {
  namespaced: true,

  state: {
    soil: undefined,
    isotopesWithRadioactivityValues: [],
    raws: [],
    result: {
      data: [],
      error: undefined,
    },
  },

  mutations: {
    [RESOURCE.MUTATIONS.SET_SOIL](state, data) {
      state.soil = data;
    },
    
    [RESOURCE.MUTATIONS.SET_ISOTOPES_WITH_RADIOACTIVITY_VALUES](state, data) {
      state.isotopesWithRadioactivityValues = data;
    },
    [RESOURCE.MUTATIONS.SET_ISOTOPE_WITH_RADIOACTIVITY_VALUE](state, data) {
      state.isotopesWithRadioactivityValues[data.index].value = data.value;
    },
    
    [RESOURCE.MUTATIONS.SET_RAWS](state, data) {
      state.raws = data;
    },

    [RESOURCE.MUTATIONS.SET_RESULT](state, data) {
      state.result.data = data;
    },
    [RESOURCE.MUTATIONS.SET_RESULT_ERROR](state, data) {
      state.result.error = data;
    }
  },

  actions: {
    async [RESOURCE.ACTIONS.CALCULATE_RESULT]({ state, commit, dispatch }) {
      try {
          dispatch('wait/start', RESOURCE.LOADINGS.CALCULATE_RESULT, { root: true });

          const data = await axios.post(RESOURCE.URL, {
            soil: state.soil.id,
            raws: state.raws.map(raw => raw.id),
            isotopes: state.isotopesWithRadioactivityValues.map(isotopeWithRadioactivityValue => ({ id: isotopeWithRadioactivityValue.isotope.id, value: isotopeWithRadioactivityValue.value })),
          }).then(({ data }) => data.data);

          commit(RESOURCE.MUTATIONS.SET_RESULT, data);
      } catch (error) {
          commit(RESOURCE.MUTATIONS.SET_RESULT_ERROR, error);
      } finally {
          dispatch('wait/end', RESOURCE.LOADINGS.CALCULATE_RESULT, { root: true });
      }
  },
  },
}
