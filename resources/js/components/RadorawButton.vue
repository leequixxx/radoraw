<template>
    <button
        class="radoraw-button"
        :class="{ [`radoraw-button_color_${color}`]: true, 'radoraw-button_uppercase': uppercase, 'radoraw-button_outline': outline }"

        :type="type"
        :name="name"
        :disabled="disabled"

        @click="$emit('click', $event)"
    >
        <slot></slot>
    </button>
</template>

<script>
  export default {
    name: 'RadorawButton',

    props: {
      type: {
        type: String,
        required: false,
      },
      name: {
        type: String,
        required: false,
      },
      disabled: {
        type: Boolean,
        default: false,
      },
      color: {
        type: String,
        default: 'default',
        validator: value => ['primary', 'secondary', 'primary-secondary', 'secondary-primary', 'default'].includes(value),
      },
      uppercase: {
        type: Boolean,
        default: false,
      },
      outline: {
        type: Boolean,
        default: false,
      },
    },
  };
</script>

<style lang="scss" scoped>
    @import "../../sass/vars";

    .radoraw-button {
        padding: 10px 30px;

        background-color: $primary-color;
        color: $secondary-color;

        border: 2px solid darken($primary-color, 5%);
        border-radius: 10px;

        outline: none;

        font-family: 'Montserrat', sans-serif;
        font-size: 1rem;
        font-weight: 600;

        text-transform: capitalize;

        cursor: pointer;

        transition: background-color 0.2s, opacity 0.2s;

        &:active {
            background-color: darken($primary-color, 5%);
        }
        &:disabled {
            opacity: 50%;
        }

        &_color {
            &_primary {
                background-color: $primary-color;
                color: $light-text-color;

                border: 2px solid darken($primary-color, 5%);

                &:active {
                    background-color: darken($primary-color, 5%);
                }
            }
            &_secondary {
                background-color: $secondary-color;
                color: $light-text-color;

                border: 2px solid darken($secondary-color, 5%);

                &:active {
                    background-color: darken($secondary-color, 5%);
                }
            }
            &_primary-secondary {
                background-color: $primary-color;
                color: $secondary-color;

                border: 2px solid darken($primary-color, 5%);

                &:active {
                    background-color: darken($primary-color, 5%);
                }
            }
            &_secondary-primary {
                background-color: $secondary-color;
                color: lighten($primary-color, 5%);

                border: 2px solid darken($secondary-color, 5%);

                &:active {
                    background-color: darken($secondary-color, 5%);
                }
            }
        }

        &_outline {
            background-color: transparent;

            border-width: 5px;
        }

        &_uppercase {
            text-transform: uppercase;
        }

        &_outline#{&}_color {
                &_primary {
                    color: $primary-color;

                    &:active {
                        color: $light-text-color;
                    }
                }
                &_secondary {
                    color: $secondary-color;

                    &:active {
                        color: $light-text-color;
                    }
                }
        }
    }
</style>
