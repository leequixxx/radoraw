<template>
    <div class="app">
        <radoraw-container>
            <radoraw-stepper :steps="steps" v-model="step">
                <radoraw-step-soil
                    slot="step-soil"
                    slot-scope="{ next }"
                    :next="next"
                ></radoraw-step-soil>
                <radoraw-step-isotope
                    slot="step-isotope"
                    slot-scope="{ next, prev }"
                    :next="next"
                    :prev="prev"
                ></radoraw-step-isotope>
                <radoraw-step-raw
                    slot="step-raw"
                    slot-scope="{ next, prev }"
                    :next="next"
                    :prev="prev"
                >
                </radoraw-step-raw>
                <radoraw-step-result
                    slot="step-result"
                    slot-scope="{ prev }"
                    :prev="prev"
                >
                </radoraw-step-result>

                <radoraw-icon-soil
                    slot="step-icon-soil"
                    slot-scope="{ active }"
                    class="radoraw-step-icon"
                    color="secondary"
                    :opacity="active ? '100%' : '50%'"
                />
                <radoraw-icon-isotope
                    slot="step-icon-isotope"
                    slot-scope="{ active }"
                    class="radoraw-step-icon"
                    color="secondary"
                    :opacity="active ? '100%' : '50%'"
                />
                <radoraw-icon-raw
                    slot="step-icon-raw"
                    slot-scope="{ active }"
                    class="radoraw-step-icon"
                    color="secondary"
                    :opacity="active ? '100%' : '50%'"
                />
                <radoraw-icon-result
                    slot="step-icon-result"
                    slot-scope="{ active }"
                    class="radoraw-step-icon"
                    color="secondary"
                    :opacity="active ? '100%' : '50%'"
                />
            </radoraw-stepper>
        </radoraw-container>
    </div>
</template>

<script>
  import RadorawContainer from './RadorawContainer';
  import RadorawStepSoil from './steps/RadorawStepSoil';
  import RadorawStepIsotope from './steps/RadorawStepIsotope';
  import RadorawStepRaw from './steps/RadorawStepRaw';
  import RadorawStepResult from './steps/RadorawStepResult';
  import RadorawStepper from './stepper/RadorawStepper';
  import RadorawIconSoil from './icons/RadorawIconSoil';
  import RadorawIconIsotope from './icons/RadorawIconIsotope';
  import RadorawIconRaw from './icons/RadorawIconRaw';
  import RadorawIconResult from './icons/RadorawIconResult';

  export default {
    name: 'RadorawApp',
    components: {
      RadorawIconResult,
      RadorawIconRaw,
      RadorawIconIsotope,
      RadorawIconSoil,
      RadorawStepper,
      RadorawStepSoil,
      RadorawStepIsotope,
      RadorawStepRaw,
      RadorawStepResult,
      RadorawContainer,
    },

    data() {
      return {
        step: 0,
        steps: [
            {
              name: 'soil',
              title: 'Выбор почвы',
            },
            {
              name: 'isotope',
              title: 'Выбор изотопа',
            },
            {
                name: 'raw',
                title: 'Выбор культуры',
            },
            {
                name: 'result',
                title: 'Оценка',
            },
        ],
      };
    },
  };
</script>

<style lang="scss" scoped>
    .radoraw-step-icon {
        width: 64px;
    }
</style>
