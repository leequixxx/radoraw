<template>
    <label class="radoraw-input-units">
        <input
            type="number"
            class="radoraw-input-units__input"
            :value="value"
            :disabled="disabled"
            :min="min"
            :max="max"
            :step="step"
            @input="$emit('input', $event.target.value)"
        >
        <span class="radoraw-input-units__units"><slot></slot></span>
    </label>
</template>

<script>
  export default {
    name: 'RadorawInputUnits',

    props: {
      value: {
        type: [Number, String],
      },
      disabled: {
        type: Boolean,
        default: false,
      },
      min: {
        type: Number,
      },
      max: {
        type: Number,
      },
      step: {
        type: Number,
      },
    },
  };
</script>

<style lang="scss" scoped>
    @import "../../../sass/vars";

    .radoraw-input-units {
        display: flex;

        &__input {
            width: 100%;
            height: 16px;

            padding-bottom: 5px;

            border: 0;
            border-bottom: 2px solid $primary-color;
            outline: 0;

            background-color: transparent;
            color: $primary-color;

            font-family: "Montserrat", sans-serif;
            font-size: 0.9rem;

            cursor: text;

            -moz-appearance: textfield;

            &::-webkit-outer-spin-button,
            &::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            &:disabled {
                opacity: 50%;
            }
        }
        &__units {
            margin-top: 2px;
            padding-left: 5px;

            color: $primary-color;

            font-size: 0.8rem;
        }
    }
</style>
