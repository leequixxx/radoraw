<template>
    <div class="radoraw-select-isotope">
        <v-wait
            :for="loadings.FETCH"
        >
            <template slot="waiting">
                <div class="radoraw-select-isotope__loading">
                    <radoraw-loader />
                </div>
            </template>

            <div class="radoraw-select-isotope__container">
                <vue-carousel
                    ref="carousel"
                    :per-page="1"
                    :per-page-custom="[[1600, Math.min(3, data.length)], [1200, Math.min(2, data.length)], [768, 1]]"
                    :pagination-enabled="false"
                    :navigation-enabled="true"
                    v-if="!!data.length"
                >
                    <vue-carousel-slide
                        v-for="isotope in data"
                        :key="isotope.id"
                    >
                        <radoraw-select-item
                            :image="isotope.picture"
                            :active="isotopeIds.includes(isotope.id)"
                            @click="onSelect(isotope)"
                        >
                            <h3 class="radoraw-select-isotope__name">{{ isotope.name }} (<sup class="radoraw-select-isotope__mass">{{ Math.round(isotope.mass) }}</sup>{{ isotope.element.symbol }})</h3>
                        </radoraw-select-item>
                    </vue-carousel-slide>
                </vue-carousel>
                <p
                    class="radoraw-select-isotope__message"
                    v-if="!data.length && !error"
                >
                    Ничего не найдено
                </p>
                <p
                    class="radoraw-select-isotope__message radoraw-select-isotope__message_type_error"
                    v-if="!!error"
                >
                    {{ error }}
                </p>
            </div>
        </v-wait>
    </div>
</template>

<script>
  import RadorawSelectItem from './RadorawSelectItem';
  import RadorawLoader from '../RadorawLoader';

  import {
    Carousel as VueCarousel,
    Slide as VueCarouselSlide,
  } from 'vue-carousel';
  import { ACTIONS, RESOURCE, LOADINGS } from '../../consts/resources/isotopes';
  import RadorawInputUnits from '../inputs/RadorawInputUnits';

  const { mapActions, mapState } = Vuex;

  export default {
    name: 'RadorawSelectIsotope',
    components: {
      RadorawLoader,
      RadorawSelectItem,
      VueCarousel,
      VueCarouselSlide,
    },

    props: {
      value: {
        type: Array,
      },
    },

    computed: {
      ...mapState(RESOURCE, {
        data: state => state.data,
        error: state => state.error,
      }),
      loadings() {
        return LOADINGS;
      },

      isotopeIds() {
        return this.value.map(isotope => isotope.id);
      },
    },

    methods: {
      ...mapActions(RESOURCE, [
        ACTIONS.FETCH,
      ]),
      onSelect(isotope) {
          const isotopeId = isotope.id;
          if (this.isotopeIds.includes(isotopeId)) {
              this.$emit('input', this.value.filter(isotope => isotope.id !== isotopeId))
          } else {
              this.$emit('input', [...this.value, isotope]);
          }
      },
    },

    async mounted() {
      if (!this.data.length) {
        await this[ACTIONS.FETCH]();
      }

      if (this.$refs.carousel) {
        this.$refs.carousel.onResize();
      }
    },
  };
</script>

<style lang="scss" scoped>
    @import "../../../sass/vars";

    .radoraw-select-isotope {
        display: flex;
        justify-content: center;

        &__mass {
            margin-bottom: 10px;

            font-size: 0.9rem;

            vertical-align: super;
        }

        &__message {
            padding: 20px;

            height: 412px;

            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;
            font-weight: 600;

            &_type {
                &_error {
                    color: $error-text-color;
                }
            }
        }

        &__loading {
            display: flex;
            justify-content: center;
            align-items: center;

            height: 412px;
        }

        &__title {
            display: flex;
            justify-content: space-between;

            width: 100%;
        }

        &__name {
            width: 100%;
        }
    }
</style>
