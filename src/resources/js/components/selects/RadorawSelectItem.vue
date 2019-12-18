<template>
    <div
        class="radoraw-select-item"
    >
        <div
            class="radoraw-select-item__container"
            :class="{ 'radoraw-select-item__container_active': active }"
            @click="$emit('click', $event)"
        >
            <img
                class="radoraw-select-item__image"
                :src="image"
                alt="img"
            >
            <div
                class="radoraw-select-item__line"
                :class="{ 'radoraw-select-item__line_active': active }"
            >
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'RadorawSelectItem',

    props: {
      image: {
        type: String,
      },
      active: {
        type: Boolean,
        default: false,
      },
    },
  };
</script>

<style lang="scss" scoped>
    @import "../../../sass/vars";

    .radoraw-select-item {
        display: flex;
        justify-content: center;

        padding: 30px;

        &__container {
            position: relative;

            border: 0 solid $secondary-color;
            border-radius: 12px;

            cursor: pointer;

            transition: box-shadow .3s;

            &_active {
                border: 5px solid $secondary-color;
            }

            &:hover {
                box-shadow: 0 5px 10px rgba($dark-color, 25%);
            }
        }

        &__image {
            width: 100%;
            border-radius: 5px;
        }

        &__line {
            display: flex;
            align-items: center;

            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;

            padding: 0 25px;

            height: 90px;

            z-index: 1000;

            background-color: rgba($primary-color, 75%);
            color: $light-text-color;

            backdrop-filter: blur(5px);

            border-radius: 0 0 5px 5px;

            text-transform: capitalize;

            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;

            &_active {
                color: $secondary-color;

                font-weight: 600;
            }
        }
    }
</style>
