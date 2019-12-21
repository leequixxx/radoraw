<template>
    <div class="radoraw-select-raw">
        <v-wait
            :for="loadings.FETCH"
        >
            <template slot="waiting">
                <div class="radoraw-select-raw__loading">
                    <radoraw-loader />
                </div>
            </template>

            <div class="radoraw-select-raw__container">
                <vue-carousel
                    ref="carousel"
                    :per-page="1"
                    :per-page-custom="[[1600, Math.min(3, data.length)], [1200, Math.min(2, data.length)], [768, 1]]"
                    :pagination-enabled="false"
                    :navigation-enabled="true"
                    v-if="!!data.length"
                >
                    <vue-carousel-slide
                        v-for="raw in data"
                        :key="raw.id"
                    >
                        <radoraw-select-item
                            :image="raw.picture"
                            :active="rawIds.includes(raw.id)"
                            @click="onSelect(raw)"
                        >
                            <h3 class="radoraw-select-raw__name">{{ raw.name }}</h3>
                        </radoraw-select-item>
                    </vue-carousel-slide>
                </vue-carousel>
                <p
                    class="radoraw-select-raw__message"
                    v-if="!data.length && !error"
                >
                    Ничего не найдено
                </p>
                <p
                    class="radoraw-select-raw__message radoraw-select-raw__message_type_error"
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
  import { ACTIONS, RESOURCE, LOADINGS } from '../../consts/resources/raws';

  const { mapActions, mapState } = Vuex;

  export default {
    name: 'RadorawSelectRaw',
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

      rawIds() {
        return this.value.map(raw => raw.id);
      },
    },

    methods: {
      ...mapActions(RESOURCE, [
        ACTIONS.FETCH,
      ]),
      onSelect(raw) {
          const rawId = raw.id;
          if (this.rawIds.includes(rawId)) {
              this.$emit('input', this.value.filter(raw => raw.id !== rawId))
          } else {
              this.$emit('input', [...this.value, raw]);
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

    .radoraw-select-raw {
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
