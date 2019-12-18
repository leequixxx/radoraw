<template>
    <svg
        class="radoraw-icon-radioactive"
        viewBox="0 0 512 512"
    >
        <path
            class="radoraw-icon-radioactive__circle"
            d="M7.9,256C7.9,119,119,7.9,256,7.9C393,7.9,504.1,119,504.1,256S393,504.1,256,504.1C119,504.1,7.9,393,7.9,256z"
            :class="{ [`radoraw-icon-radioactive__circle_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            class="radoraw-icon-radioactive__petals"
            d="M257.3 60.8l0 195.2 180.8-73.6c-1.4-3.4-2.8-6.7-4.4-10C402.5 106.4 335.2 60.8 257.3 60.8zM91 358.5l166.2-102.3L99.7 140.7C54.2 202.9 48.1 288.9 91 358.5zM436.3 333.8l-179-77.8-4.5 195.2C329.8 453 403.8 408.8 436.3 333.8z"
            :class="{ [`radoraw-icon-radioactive__petals_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            class="radoraw-icon-radioactive__circle"
            d="M216.8,256c0-21.6,17.5-39.2,39.2-39.2c21.6,0,39.2,17.5,39.2,39.2c0,21.6-17.5,39.2-39.2,39.2C234.4,295.2,216.8,277.6,216.8,256z"
            :class="{ [`radoraw-icon-radioactive__circle_color_${color}`]: true }"
            :style="{ opacity }"
        />
    </svg>
</template>

<script>
  export default {
    name: 'RadorawIconRadioactive',
    props: {
      color: {
        type: String,
        default: 'default',
        validator: value => ['primary', 'secondary', 'default'].includes(value),
      },
      opacity: {
        type: String,
        default: '100%',
      },
    },
  };
</script>

<style lang="scss" scoped>
    @import "../../../sass/vars";

    .radoraw-icon-radioactive {
        transform: rotateZ(270deg);
        transform-origin: center;

        &__petals {
            fill: $primary-color;

            &_color {
                &_primary {
                    fill: $primary-color
                }
                &_secondary {
                    fill: $secondary-color;
                }
            }
        }

        &__circle {
            fill: $secondary-color;

            &_color {
                &_primary {
                    fill: $secondary-color;
                }
                &_secondary {
                    fill: $primary-color;
                }
            }
        }
    }
</style>