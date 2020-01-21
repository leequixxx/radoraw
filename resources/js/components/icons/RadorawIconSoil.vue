<template>
    <svg
        class="radoraw-icon-soil"
        viewBox="0 -2 128 128"
    >
        <path
            d="M 128 133.80078 C 117.6 133.80078 107.40039 137.4 99.400391 144 L 99.199219 144.19922 C 93.199219 148.99922 85.799219 151.80078 78.199219 151.80078 L 8.1992188 151.80078 C 4.7992187 151.80078 2.1992188 154.40078 2.1992188 157.80078 L 2.1992188 248 C 2.1992188 251.4 4.7992187 254 8.1992188 254 L 248.19922 254 C 251.59922 254 254.19922 251.4 254.19922 248 L 254.19922 157.80078 C 253.99922 156.20078 253.39922 154.59961 252.19922 153.59961 C 250.99922 152.39961 249.6 151.80078 248 151.80078 L 178 151.80078 C 170.4 151.80078 162.8 149.19922 157 144.19922 L 156.59961 144 C 148.59961 137.4 138.4 133.80078 128 133.80078 z M 127.40625 149.71094 C 127.80078 149.69648 128.19961 149.72578 128.59961 149.80078 C 131.79961 150.20078 134.19961 153.39961 133.59961 156.59961 C 130.08623 181.02597 131.7387 194.25788 132.37695 197.97656 L 151 216.59961 C 153.4 218.99961 153.4 222.8 151 225 C 149.8 226.4 148.20078 226.80078 146.80078 226.80078 C 145.20078 226.80078 143.79961 226.2 142.59961 225 L 126.80078 209.19922 L 121 215 C 119.8 216.4 118.20078 216.80078 116.80078 216.80078 C 115.20078 216.80078 113.79961 216.2 112.59961 215 C 110.19961 212.6 110.19961 208.79961 112.59961 206.59961 L 120.40039 198.80078 C 119.40039 192.60078 118.40078 178.40078 121.80078 154.80078 C 122.15078 152.00078 124.64453 149.81211 127.40625 149.71094 z "
            class="radoraw-icon-soil__ground"
            :class="{ [`radoraw-icon-soil__ground_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            d="M68.2,42.3c-0.5-1.6-2.2-2.5-3.7-2c-1.6,0.5-2.5,2.2-2,3.7c0.9,2.9,1.1,7.9,0.5,13.5c-0.2,1.6,1,3.1,2.7,3.3 c0.1,0,0.2,0,0.3,0c1.5,0,2.8-1.2,3-2.7C69.4,54.4,69.8,47.3,68.2,42.3z"
            class="radoraw-icon-soil__stem"
            :class="{ [`radoraw-icon-soil__stem_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            d="M44.6 36.1c-4.4-.4-8.7 1-12 3.8-1.3 1.1-1.4 3-.4 4.2 2.8 3.4 6.8 5.4 11.2 5.8.5 0 1 .1 1.5.1 3.9 0 7.6-1.3 10.6-3.9 1.3-1.1 1.4-3 .4-4.2C53 38.5 49 36.5 44.6 36.1z"
            class="radoraw-icon-soil__leaf radoraw-icon-soil__leaf_side_left"
            :class="{ [`radoraw-icon-soil__leaf_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            d="M66 35.4c2.5-6.8 2.1-14.1-.9-20.6-3-6.5-8.5-11.5-15.2-14C48.3.2 46.6 1 46 2.6c-2.5 6.8-2.1 14.1.9 20.6 3 6.5 8.5 11.5 15.2 14 .3.1.7.2 1 .2C64.4 37.4 65.5 36.6 66 35.4z"
            class="radoraw-icon-soil__leaf radoraw-icon-soil__leaf_side_center"
            :class="{ [`radoraw-icon-soil__leaf_color_${color}`]: true }"
            :style="{ opacity }"
        />
        <path
            d="M80.3,38.1c-1.6,0-3.3-0.1-4.9-0.4c0,0,0,0,0,0c-2.1-0.4-3.6-2.4-3.2-4.6c1.3-7.4,5.4-13.8,11.5-18 c6.1-4.3,13.5-5.9,20.9-4.6c2.1,0.4,3.6,2.4,3.2,4.6c-1.3,7.4-5.4,13.8-11.5,18C91.5,36.3,86,38.1,80.3,38.1z M78.6,32 c5.1,0.4,10.1-1,14.3-3.9c4.2-2.9,7.2-7.2,8.5-12.1c-5.1-0.4-10.1,1-14.3,3.9C82.9,22.9,80,27.1,78.6,32z"
            class="radoraw-icon-soil__leaf radoraw-icon-soil__leaf_side_right"
            :class="{ [`radoraw-icon-soil__leaf_color_${color}`]: true }"
            :style="{ opacity }"
        />
    </svg>
</template>

<script>
  export default {
    name: 'RadorawIconSoil',

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

    .radoraw-icon-soil {
        &__ground {
            fill: $primary-color;

            transform: scale(0.5);

            &_color {
                &_primary {
                    fill: $primary-color;
                }
                &_secondary {
                    fill: $secondary-color;
                }
            }
        }

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

        &__leaf {
            fill: $secondary-color;

            &_side {
                &_left {
                    animation: radoraw-icon-soil-leaf 1s infinite;

                    transform-origin: right;
                }
                &_center {
                    animation: radoraw-icon-soil-leaf 1s 0.33s infinite;

                    transform-origin: bottom;
                }
                &_right {
                    animation: radoraw-icon-soil-leaf 1s 0.66s infinite;

                    transform-origin: left;
                }
            }

            &_color {
                &_primary {
                    fill: $primary-color;
                }
                &_secondary {
                    fill: $secondary-color;
                }
            }
        }
    }

    @keyframes radoraw-icon-soil-leaf {
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
