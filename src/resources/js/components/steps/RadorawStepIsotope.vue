<template>
        <div class="radoraw-step-isotope">
            <radoraw-icon-and-text>
                <radoraw-icon-isotope
                    class="radoraw-step-isotope__icon"
                    slot="icon"
                />
                Для продолжения, выберите изотопы, которыми произошло заражение.
            </radoraw-icon-and-text>
            <radoraw-select-isotope
                :value="isotopes"
                @input="set"
            />
            <transition
                name="fade"
                mode="in-out"
            >
                <p
                    class="radoraw-step-isotope__message"
                    v-if="!!isotopes.length"
                >
                    Также, необходимо указать значения радиоактивности изотопов.
                </p>
            </transition>
            <div
                class="radoraw-step-isotope__navigation"
                :class="{ 'radoraw-step-isotope__navigation_active': !!isotopes.length }"
            >
                <radoraw-button-group>
                    <radoraw-button @click="prev">
                        Назад
                    </radoraw-button>
                    <radoraw-button
                        class="radoraw-button-with-icon"
                        :disabled="!isotopes.length"
                        @click="modals.isotopesWithRadioactivityValues = !modals.isotopesWithRadioactivityValues"
                    >
                        <radoraw-icon-radioactive class="radoraw-button-with-icon__icon" />
                    </radoraw-button>
                    <radoraw-button
                        :disabled="!isotopes.length || !!isotopesWithRadioactivityValues.filter(isotopesWithRadioactivityValue => isotopesWithRadioactivityValue.value <= 0).length"
                        @click="next"
                    >
                        Далее
                    </radoraw-button>
                </radoraw-button-group>
            </div>

            <radoraw-modal :visible="modals.isotopesWithRadioactivityValues" @close="modals.isotopesWithRadioactivityValues = !modals.isotopesWithRadioactivityValues">
                <template slot="title">
                    Значения радиоактивности
                </template>

                <dl>
                    <dt>
                        Cesium
                    </dt>
                    <dd>
                        <radoraw-input-units>Ku/Km2</radoraw-input-units>
                    </dd>
                </dl>
            </radoraw-modal>
        </div>
</template>

<script>
  import RadorawIconAndText from '../RadorawIconAndText';
  import RadorawIconIsotope from '../icons/RadorawIconIsotope';
  import RadorawSelectIsotope from '../selects/RadorawSelectIsotope';
  import RadorawInputSearch from '../inputs/RadorawInputSearch';
  import RadorawButton from '../RadorawButton';
  import RadorawButtonGroup from '../RadorawButtonGroup';

  import { RESOURCE, MUTATIONS } from '../../consts/resources/client';
  import RadorawIconRadioactive from '../icons/RadorawIconRadioactive';
  import RadorawModal from '../RadorawModal';

  const { mapMutations, mapState } = Vuex;

  export default {
    name: 'RadorawStepIsotope',
    components: {
      RadorawModal,
      RadorawIconRadioactive,
      RadorawIconIsotope,
      RadorawButtonGroup,
      RadorawButton,
      RadorawInputSearch,
      RadorawSelectIsotope,
      RadorawIconAndText,
    },

    props: {
      prev: {
        type: Function,
      },
      next: {
        type: Function,
      },
    },

    data() {
      return {
        modals: {
          isotopesWithRadioactivityValues: false,
        },
      };
    },
    computed: {
      ...mapState(RESOURCE, {
        isotopesWithRadioactivityValues: state => state.isotopesWithRadioactivityValues,
      }),
      isotopes() {
        return this.isotopesWithRadioactivityValues.map(isotopesWithRadioactivityValue => isotopesWithRadioactivityValue.isotope);
      },
    },

    methods: {
      ...mapMutations(RESOURCE, [
        MUTATIONS.SET_ISOTOPES_WITH_RADIOACTIVITY_VALUES,
      ]),
      set(data) {
        const isotopesWithRadioactivityValues = data.map(isotope => {
          let isotopesWithRadioactivityValue = this.isotopesWithRadioactivityValues.find(isotopesWithRadioactivityValue => isotopesWithRadioactivityValue.isotope.id === isotope.id);
          if (!isotopesWithRadioactivityValue) {
            isotopesWithRadioactivityValue = {
              isotope,
              value: 0,
            };
          }

          return isotopesWithRadioactivityValue;
        });

        return this[MUTATIONS.SET_ISOTOPES_WITH_RADIOACTIVITY_VALUES](isotopesWithRadioactivityValues);
      },
    },
  };
</script>

<style lang="scss" scoped>
    @import "../../../sass/vars";

    .radoraw-step-isotope {
        &__icon {
            width: 128px;
        }

        &__message {
            padding-bottom: 5px;

            color: lighten($text-color, 5%);

            font-size: 0.9rem;

            text-align: center;
        }

        &__navigation {
            display: flex;
            justify-content: center;
            margin-top: 10px;

            &_active {
                margin-top: 7px;
            }
        }
    }

    .radoraw-button-with-icon {
        padding: 0 30px;

        &__icon {
            width: 24px;
        }
    }
</style>
