<template>
    <div class="radoraw-stepper">
        <div class="radoraw-stepper__steps">
            <transition
                :name="transitionName"
                mode="out-in"
            >
                <div
                    v-for="(stepData, stepId) in steps"
                    v-if="stepId === step"
                    :key="stepId"
                    class="radoraw-stepper__step"
                >
                    <slot
                        :name="`step-${stepData.name}`"

                        :next="nextStep"
                        :prev="prevStep"
                    >
                    </slot>
                </div>
            </transition>
        </div>
        <div class="radoraw-stepper__navigation">
            <div
                v-for="(stepData, stepId) in steps"
                :key="stepId"
                class="radoraw-stepper__navigation-step"
            >
                <div
                    class="radoraw-stepper__navigation-edge"
                    :class="{ 'radoraw-stepper__navigation-edge_active': stepId <= step }"
                    v-if="stepId !== 0"
                ></div>
                <div class="radoraw-stepper__navigation-circle-with-text">
                    <div
                        class="radoraw-stepper__navigation-circle"
                        :class="{ 'radoraw-stepper__navigation-circle_active': stepId <= step }"
                    >
                        <div
                            class="radoraw-stepper__navigation-icon"
                            :class="{ 'radoraw-stepper__navigation-icon_active': stepId <= step }"
                        >
                            <slot
                                :name="`step-icon-${stepData.name}`"
                                :active="stepId <= step"
                            >
                            </slot>
                        </div>
                        <div
                            class="radoraw-stepper__navigation-number"
                            :class="{ 'radoraw-stepper__navigation-number_active': stepId <= step }"
                        >
                            {{ stepId + 1 }}
                        </div>
                    </div>
                    <span
                        class="radoraw-stepper__navigation-title"
                        :class="{ 'radoraw-stepper__navigation-title_active': stepId <= step }"
                    >{{ stepData.title }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

  const SLIDE = {
    LEFT: 'slide-left',
    RIGHT: 'slide-right',
  };

  export default {
    name: 'RadorawStepper',

    model: {
      prop: 'step',
      event: 'change',
    },

    props: {
      steps: {
        type: Array,
        default: () => [],
      },
      step: {
        type: Number,
        default: 0,
      },
    },

    methods: {
      setStep(step) {
        if (step < this.step) {
            this.transitionName = SLIDE.LEFT;
        } else {
            this.transitionName = SLIDE.RIGHT;
        }
        this.$emit('change', step);
      },
      nextStep() {
        this.setStep(Math.min(this.step + 1, this.steps.length - 1));
      },
      prevStep() {
        this.setStep(Math.max(this.step - 1, 0));
      },
    },

    data() {
      return {
        transitionName: SLIDE.RIGHT,
      };
    },
  };
</script>

<style lang="scss" scoped>
    @import "../../../sass/vars";

    .radoraw-stepper {
        &__navigation {
            display: none;
            justify-content: center;

            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;

            @media screen and (min-width: $media-lg) {
                display: flex;
            }

            @media screen and (max-height: 870px) {
                position: static;
            }
        }
        &__navigation-step {
            display: flex;
            align-items: center;
        }
        &__navigation-circle-with-text {
            display: flex;
            flex-direction: column;
            align-items: center;

            z-index: 1000;
        }
        &__navigation-title {
            display: block;

            padding-top: 10px;

            color: $primary-color;

            font-size: 1.5rem;

            text-align: center;

            opacity: 10%;

            transition: opacity 0.3s;
            transition-delay: 0.2s;

            &_active {
                opacity: 100%;
            }
        }
        &__navigation-circle {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            width: 128px;
            height: 128px;

            z-index: 1000;

            background-color: rgba($primary-color, 10%);

            border: 7px solid $background-color;
            border-radius: 100%;

            cursor: not-allowed;

            transition: background-color 0.3s;
            transition-delay: 0.2s;

            &_active {
                background-color: $primary-color;

                cursor: pointer;
            }
        }

        &__navigation-edge {
            display: block;
            position: relative;

            width: 200px;
            height: 15px;

            margin: 0 -5px;

            background-color: rgba($primary-color, 10%);

            &_active {
                &::before {
                    width: 100% !important;
                }
            }

            &::before {
                content: "";
                position: absolute;

                display: block;

                height: 100%;
                width: 0;

                background-color: $primary-color;

                transition: width 0.3s;
            }
        }
        &__navigation-icon {
            padding-bottom: 10px;
        }
        &__navigation-number {
            color: $secondary-color;

            font-size: 1.5rem;
            font-weight: 600;

            opacity: 50%;

            transition: opacity 0.3s;
            transition-delay: 0.2s;

            &_active {
                opacity: 100%;
            }
        }
    }
</style>
