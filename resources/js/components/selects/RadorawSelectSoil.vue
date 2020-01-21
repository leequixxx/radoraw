<template>
    <div class="radoraw-select-soil">
        <v-wait
            :for="loadings.FETCH"
        >
            <template slot="waiting">
                <div class="radoraw-select-soil__loading">
                    <radoraw-loader />
                </div>
            </template>

            <div class="radoraw-select-soil__container">
                <vue-carousel
                    ref="carousel"
                    :per-page="1"
                    :per-page-custom="[[1600, Math.min(3, data.length)], [1200, Math.min(2, data.length)], [768, 1]]"
                    :pagination-enabled="false"
                    :navigation-enabled="true"
                    v-if="!!data.length"
                >
                    <vue-carousel-slide
                        v-for="soil in data"
                        :key="soil.id"
                    >
                        <radoraw-select-item
                            :image="soil.picture"
                            :active="value && value.id === soil.id"
                            @click="$emit('input', value && value.id === soil.id ? undefined : soil)"
                        >
                            <h3 class="radoraw-select-soil__name">{{ soil.name }}</h3>
                        </radoraw-select-item>
                    </vue-carousel-slide>
                </vue-carousel>
                <p
                    class="radoraw-select-soil__message"
                    v-if="!data.length && !error"
                >
                    Ничего не найдено
                </p>
                <p
                    class="radoraw-select-soil__message radoraw-select-soil__message_type_error"
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
  import { ACTIONS, RESOURCE, LOADINGS } from '../../consts/resources/soils';

  const { mapActions, mapState } = Vuex;

  export default {
    name: 'RadorawSelectSoil',
    components: {
      RadorawLoader,
      RadorawSelectItem,
      VueCarousel,
      VueCarouselSlide,
    },

    props: {
      value: {
        type: Object,
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
    },

    methods: {
      ...mapActions(RESOURCE, [
        ACTIONS.FETCH,
      ]),
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

    .radoraw-select-soil {
        display: flex;
        justify-content: center;

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
    }
</style>
