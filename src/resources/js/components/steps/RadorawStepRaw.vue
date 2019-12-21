<template>
        <div class="radoraw-step-raw">
            <radoraw-icon-and-text>
            <radoraw-icon-raw
                class="radoraw-step-raw__icon"
                slot="icon"
            />
                Теперь, вам осталось выбрать необходимые сельхоз культуры.
            </radoraw-icon-and-text>

            <radoraw-select-raw
                :value="raws"
                @input="set"
            />

            <div
                class="radoraw-step-raw__navigation"
                :class="{ 'radoraw-step-raw__navigation_active': !!raws.length }"
            >
                <radoraw-button-group>
                    <radoraw-button @click="prev">
                        Назад
                    </radoraw-button>
                    <radoraw-button
                        :disabled="!raws.length"
                        @click="next"
                    >
                        Далее
                    </radoraw-button>
                </radoraw-button-group>
            </div>
        </div>
</template>

<script>
  import RadorawIconAndText from '../RadorawIconAndText';
  import RadorawIconRaw from '../icons/RadorawIconRaw';
  import RadorawSelectRaw from '../selects/RadorawSelectRaw';
  import RadorawButton from '../RadorawButton';
  import RadorawButtonGroup from '../RadorawButtonGroup';

  import { RESOURCE, MUTATIONS } from '../../consts/resources/client';

  const { mapMutations, mapState } = Vuex;

  export default {
    name: 'RadorawStepRaw',
    components: {
      RadorawIconRaw,
      RadorawSelectRaw,
      RadorawButtonGroup,
      RadorawButton,
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

    computed: {
      ...mapState(RESOURCE, {
        raws: state => state.raws,
      }),
    },

    methods: {
      ...mapMutations(RESOURCE, [
        MUTATIONS.SET_RAWS,
      ]),
      set(data) {
        return this[MUTATIONS.SET_RAWS](data);
      },
    },
  };
</script>

<style lang="scss" scoped>
    @import "../../../sass/vars";

    .radoraw-step-raw {
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

    .radoraw-step-raw-inputs {
        width: 100%;

        border-collapse: separate;
        border-spacing: 10px;

        &__label {
            padding-right: 10px;

            color: $primary-color;

            font-weight: 600;

            text-align: right;
        }

        &__button {
            display: flex;
            justify-content: center;

            padding: 20px;
        }
    }
</style>
