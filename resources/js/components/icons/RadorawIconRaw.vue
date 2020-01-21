<template>
    <svg
        class="radoraw-icon-raw"
        viewBox="0 0 256 256"
    >
        <path
            class="radoraw-icon-raw__stem"
            d="M9.5999 249.6C8.6399 249.6 7.9999 249.28 7.3599 248.64C6.0799 247.36 6.0799 245.44 7.3599 244.16L219.52 32C220.8 30.72 222.72 30.72 224 32C225.28 33.28 225.28 35.2 224 36.48L11.8399 248.64C11.1999 249.28 10.5599 249.6 9.5999 249.6Z"
            :class="{ [`radoraw-icon-raw__stem_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            class="radoraw-icon-raw__seed radoraw-icon-raw__seed_side_top radoraw-icon-raw__seed_step_6"
            d="M219.84 56C214.72 56 209.6 54.08 205.76 50.24C201.92 46.4 200 41.6 200 36.16C200 30.72 201.92 25.92 205.76 22.08C218.56 9.28 241.92 8 248 7.68C247.68 14.08 245.44 38.08 233.6 49.92C230.08 54.08 224.96 56 219.84 56Z"
            :class="{ [`radoraw-icon-raw__seed_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            class="radoraw-icon-raw__seed radoraw-icon-raw__seed_side_right radoraw-icon-raw__seed_step_5"
            d="M204.48 104.32C193.28 104.32 184 95.04 184 83.84C184 72.64 192.96 63.36 204.48 63.36C220.812 64.6888 233.541 72.5186 245.44 83.52C240.64 88.64 221.76 104.32 204.48 104.32V104.32Z"
            :class="{ [`radoraw-icon-raw__seed_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            class="radoraw-icon-raw__seed radoraw-icon-raw__seed_side_right radoraw-icon-raw__seed_step_4"
            d="M169.6 139.52C158.4 139.52 149.12 130.56 149.12 119.04C149.12 107.84 158.08 98.56 169.6 98.56C188.16 98.56 206.08 114.56 210.56 118.72C205.76 123.52 186.56 139.52 169.6 139.52Z"
            :class="{ [`radoraw-icon-raw__seed_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            class="radoraw-icon-raw__seed radoraw-icon-raw__seed_side_right radoraw-icon-raw__seed_step_3"
            d="M134.4 174.72C123.2 174.72 113.92 165.76 113.92 154.24C113.92 143.04 122.88 133.76 134.4 133.76C152.96 133.76 170.88 149.76 175.36 153.92C170.56 158.72 151.68 174.72 134.4 174.72Z"
            :class="{ [`radoraw-icon-raw__seed_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            class="radoraw-icon-raw__seed radoraw-icon-raw__seed_side_right radoraw-icon-raw__seed_step_2"
            d="M99.2 209.6C88 209.6 78.72 200.64 78.72 189.12C78.72 177.92 88 168.64 99.2 168.64C117.76 168.64 135.68 184.64 140.16 188.8C135.36 193.6 116.48 209.6 99.2 209.6Z"
            :class="{ [`radoraw-icon-raw__seed_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            class="radoraw-icon-raw__seed radoraw-icon-raw__seed_side_right radoraw-icon-raw__seed_step_5"
            d="M171.84 71.68C160.64 71.68 151.36 62.4 151.36 51.2C151.36 33.92 167.36 15.04 171.84 10.24C176.32 14.72 192 32.64 192 51.2C192.32 62.72 183.04 71.68 171.84 71.68Z"
            :class="{ [`radoraw-icon-raw__seed_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            class="radoraw-icon-raw__seed radoraw-icon-raw__seed_side_left radoraw-icon-raw__seed_step_4"
            d="M136.64 106.88C125.44 106.88 116.16 97.6 116.16 86.4C116.16 69.12 132.16 50.24 136.64 45.44C141.12 49.92 156.8 67.84 156.8 86.4C157.12 97.6 147.84 106.88 136.64 106.88Z"
            :class="{ [`radoraw-icon-raw__seed_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            class="radoraw-icon-raw__seed radoraw-icon-raw__seed_side_left radoraw-icon-raw__seed_step_3"
            d="M101.76 142.08C90.56 142.08 81.28 133.12 81.28 121.6C81.28 104.32 97.28 85.44 101.76 80.64C106.24 85.44 121.92 103.04 121.92 121.6C121.92 132.8 112.96 142.08 101.76 142.08Z"
            :class="{ [`radoraw-icon-raw__seed_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            class="radoraw-icon-raw__seed radoraw-icon-raw__seed_side_left radoraw-icon-raw__seed_step_2"
            d="M66.5601 176.96C55.3601 176.96 46.0801 168 46.0801 156.48C46.0801 139.2 62.0801 120.32 66.5601 115.52C71.0401 120.32 86.7201 137.92 86.7201 156.48C87.0401 168 77.7601 176.96 66.5601 176.96Z"
            :class="{ [`radoraw-icon-raw__seed_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            class="radoraw-icon-raw__seed radoraw-icon-raw__seed_side_left radoraw-icon-raw__seed_step_1"
            d="M64.3201 244.8C53.1201 244.8 43.8401 235.84 43.8401 224.32C43.8401 213.12 52.8001 203.84 64.3201 203.84C82.8801 203.84 100.8 219.84 105.28 224C100.48 228.8 81.6001 244.8 64.3201 244.8Z"
            :class="{ [`radoraw-icon-raw__seed_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            class="radoraw-icon-raw__seed radoraw-icon-raw__seed_side_left radoraw-icon-raw__seed_step_1"
            d="M31.68 212.16C20.48 212.16 11.2 203.2 11.2 191.68C11.2 174.4 27.2 155.52 31.68 150.72C36.16 155.52 51.84 173.12 51.84 191.68C51.84 202.88 42.88 212.16 31.68 212.16Z"
            :class="{ [`radoraw-icon-raw__seed_color_${color}`]: true }"
            :style="{ opacity }"
        />
    </svg>
</template>

<script>
  export default {
    name: 'RadorawIconRaw',

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

    .radoraw-icon-raw {
        &__stem {
            fill: $primary-color;

            &_color {
                &_primary {
                    fill: $primary-color;
                }
                &_secondary {
                    fill: $secondary-color;
                }
            }
        }

        &__seed {
            fill: $secondary-color;

            &_color {
                &_primary {
                    fill: $primary-color;
                }
                &_secondary {
                    fill: $secondary-color;
                }
            }

            &_side {
                &_top {
                    transform-origin: bottom;
                }
                &_left {
                    transform-origin: right;
                }
                &_right {
                    transform-origin: left;
                }
            }

            &_step {
                &_1 {
                    animation: radoraw-icon-raw-seed 1s infinite;
                }
                &_2 {
                    animation: radoraw-icon-raw-seed 1s 0.3s infinite;
                }
                &_3 {
                    animation: radoraw-icon-raw-seed 1s 0.6s infinite;
                }
                &_4 {
                    animation: radoraw-icon-raw-seed 1s 0.9s infinite;
                }
                &_5 {
                    animation: radoraw-icon-raw-seed 1s 1.2s infinite;
                }
                &_6 {
                    animation: radoraw-icon-raw-seed 1s 1.5s infinite;
                }
            }
        }
    }

    @keyframes radoraw-icon-raw-seed {
        from {
            transform: scale(1);
        }
        50% {
            transform: scale(1.02);
        }
        to {
            transform: scale(1);
        }
    }
</style>
