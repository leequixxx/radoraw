<template>
    <div class="radoraw-step-result">
        <radoraw-icon-and-text>
            <radoraw-icon-result
                    class="radoraw-step-result__icon"
                    slot="icon"
            />
            Оценка в соответствии с РДУ-99
        </radoraw-icon-and-text>
        <v-wait
            :for="loadings.CALCULATE_RESULT"
        >
            <template slot="waiting">
                <div class="radoraw-step-result__loading">
                    <radoraw-loader />
                </div>
            </template>

            <div class="radoraw-step-result__table-container">
              <table class="radoraw-step-result__table">
                <thead>
                  <tr>
                    <th width="25%" rowspan="2">Культура</th>
                    <th width="15%" :colspan="isotopes.length">РДУ-99</th>
                    <th width="15%" :colspan="isotopes.length">Фактическое содержание</th>
                    <th width="15%" :colspan="isotopes.length">Соответствие РДУ-99</th>
                    <th width="30%" rowspan="2">Рекомендации по использованию</th>
                  </tr>
                  <tr>
                    <template v-for="index in 3">
                      <th
                        v-for="isotope in isotopes"
                        :key="`${index}-${isotope.id}`"
                      >
                        <sup class="radoraw-step-result__mass">
                          {{ Math.round(isotope.mass) }}
                        </sup>
                        {{ isotope.element.symbol }}
                      </th>
                    </template>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="row in data"
                    :key="row.raw.id"
                  >
                    <td>{{ row.raw.name }}</td>
                    <td
                      v-for="isotope in row.isotopes"
                      :key="`max-${isotope.isotope.id}`"
                    >
                      {{ !!isotope.level ? isotope.max_level.toFixed(2) : '-' }}
                    </td>
                    <td
                      v-for="isotope in row.isotopes"
                      :key="`current-${isotope.isotope.id}`"
                    >
                      {{ !!isotope.level ? isotope.level.toFixed(2) : '-' }}
                    </td>
                    <td
                      v-for="isotope in row.isotopes"
                      :key="`acceptable-${isotope.isotope.id}`"
                    >
                      {{ isotope.acceptable ? '+' : '-' }}
                    </td>
                    <td>{{ row.action }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </v-wait>
        <div
                class="radoraw-step-result__navigation"
        >
            <radoraw-button
                    @click="prev"
            >
              Назад
            </radoraw-button>
        </div>
    </div>
</template>

<script>
  import RadorawIconAndText from '../RadorawIconAndText';
  import RadorawIconResult from '../icons/RadorawIconResult';
  import RadorawButton from '../RadorawButton';
  import RadorawLoader from '../RadorawLoader';

  import { RESOURCE, ACTIONS, LOADINGS } from '../../consts/resources/client';

  const { mapActions, mapState } = Vuex;

  export default {
    name: 'RadorawStepResult',
    components: {
      RadorawButton,
      RadorawIconResult,
      RadorawIconAndText,
      RadorawLoader,
    },

    props: {
      prev: {
        type: Function,
      },
    },

    computed: {
      ...mapState(RESOURCE, {
        isotopes: state => state.isotopesWithRadioactivityValues.map(isotopeWithRadioactivityValue => isotopeWithRadioactivityValue.isotope),
        data: state => state.result.data,
        error: state => state.result.error,
      }),
      loadings() {
        return LOADINGS;
      },
    },

    methods: {
      ...mapActions(RESOURCE, [
        ACTIONS.CALCULATE_RESULT,
      ]),
    },

    async mounted() {
      await this[ACTIONS.CALCULATE_RESULT]();
    },
  };
</script>

<style lang="scss" scoped>
    @import '../../../sass/vars';

    .radoraw-step-result {
        &__icon {
            width: 128px;
        }

        &__navigation {
            display: flex;
            justify-content: center;
            margin-top: 10px;

            &_active {
                margin-top: 7px;
            }
        }


        &__loading {
            display: flex;
            justify-content: center;
            align-items: center;

            height: 412px;
            width: 100%;
        }

        &__table-container {
          min-height: 412px;
        }
        &__table {
          width: 100%;

          border: 1px solid $dark-color;
          border-right: none;
          border-bottom: none;
          border-collapse: separate;

          th, td {
            padding: 5px;

            border-right: 1px solid $dark-color;
            border-bottom: 1px solid $dark-color;
          }
        }

        &__mass {
            margin-bottom: 10px;

            font-size: 0.7rem;

            vertical-align: super;
        }

    }
</style>
