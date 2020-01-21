<template>
    <div class="radoraw-step-soil">
        <radoraw-icon-and-text>
            <radoraw-icon-soil
                    class="radoraw-step-soil__icon"
                    slot="icon"
            />
            Для начала, вам необходимо выбрать тип почвы, на котором произростали культуры.
        </radoraw-icon-and-text>
        <radoraw-select-soil
                :value="soil"
                @input="set"
        />
        <div
                class="radoraw-step-soil__navigation"
                :class="{ 'radoraw-step-soil__navigation_active': !soil }"
        >
            <radoraw-button
                    :disabled="!soil"
                    @click="next"
            >Далее
            </radoraw-button>
        </div>
    </div>
</template>

<script>
  import RadorawIconAndText from '../RadorawIconAndText';
  import RadorawIconSoil from '../icons/RadorawIconSoil';
  import RadorawSelectSoil from '../selects/RadorawSelectSoil';
  import RadorawInputSearch from '../inputs/RadorawInputSearch';
  import RadorawButton from '../RadorawButton';
  import RadorawButtonGroup from '../RadorawButtonGroup';

  import { RESOURCE, MUTATIONS } from '../../consts/resources/client';

  const { mapMutations, mapState } = Vuex;

  export default {
    name: 'RadorawStepSoil',
    components: {
      RadorawButtonGroup,
      RadorawButton,
      RadorawInputSearch,
      RadorawSelectSoil,
      RadorawIconSoil,
      RadorawIconAndText,
    },

    props: {
      next: {
        type: Function,
      },
    },

    computed: {
      ...mapState(RESOURCE, {
        soil: state => state.soil,
      }),
    },

    methods: {
      ...mapMutations(RESOURCE, [
        MUTATIONS.SET_SOIL,
      ]),
      set(data) {
        return this[MUTATIONS.SET_SOIL](data);
      },
    },
  };
</script>

<style lang="scss" scoped>
    .radoraw-step-soil {
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
    }
</style>
