<template>
    <transition name="fade">
        <div class="radoraw-modal" v-show="visible">
            <transition name="fade">
                <div
                    class="radoraw-modal__backdrop"
                    v-if="visible"
                    @click="$emit('close', $event)"
                >
                </div>
            </transition>

            <transition
                name="slide-down"
            >
                <div
                    class="radoraw-modal__modal"
                    v-if="visible"
                >
                    <div class="radoraw-modal__header">
                        <h3 class="radoraw-modal__title">
                            <slot name="title"></slot>
                        </h3>
                        <button
                            class="radoraw-modal__button-close"
                            @click="$emit('close', $event)"
                        >
                            &times;
                        </button>
                    </div>
                    <div class="radoraw-modal__content">
                        <slot></slot>
                    </div>
                </div>
            </transition>
        </div>
    </transition>
</template>

<script>
  import RadorawInputUnits from './inputs/RadorawInputUnits';
  export default {
    name: 'RadorawModal',
    components: { RadorawInputUnits },
    props: {
      visible: {
        type: Boolean,
        default: false,
      },
    },
  };
</script>

<style lang="scss" scoped>
    @import "../../sass/vars";

    .radoraw-modal {
        display: flex;
        justify-content: center;
        align-items: center;

        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;

        z-index: 9999;

        &__modal {
            height: 50%;
            width: 50%;

            background-color: $background-color;
            box-shadow: 0 10px 15px rgba($dark-color, 25%);

            border-radius: 10px;

            z-index: 10000;

            @media screen and (max-width: $media-md) {
                height: 50%;
                width: 70%;
            }

            @media screen and (max-width: $media-sm) {
                height: 60%;
                width: 85%;
            }

            @media screen and (max-width: $media-xs) {
                height: 80%;
                width: 95%;
            }

        }

        &__backdrop {
            position: absolute;

            width: 100%;
            height: 100%;

            background-color: rgba($dark-color, 95%);

            cursor: pointer;

            z-index: 9999;
        }

        &__header {
            display: flex;
            justify-content: space-between;
        }

        &__title {
            padding: 10px;

            color: $text-color;

            font-size: 1.5rem;
            font-weight: 600;
        }

        &__button-close {
            height: 30px;
            width: 30px;

            margin-top: -10px;
            margin-right: -10px;

            background-color: $background-color;

            border: 2px solid $primary-color;
            border-radius: 20px;

            outline: none;

            font-size: 12px;
            font-weight: 600;

            cursor: pointer;

            user-select: none;

            transition: all 0.2s;

            &:active {
                background-color: $primary-color;
                color: $background-color;
            }
        }

        &__content {
            padding: 10px;
        }
    }
</style>