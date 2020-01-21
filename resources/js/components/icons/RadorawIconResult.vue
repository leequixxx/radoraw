<template>
    <svg
        class="radoraw-icon-result"
        viewBox="0 -16 256 285"
    >
        <path
            class="radoraw-icon-result__blank"
            d="M217.044 11.1304H172.523C172.523 5.0087 167.514 0 161.392 0H94.6095C88.4878 0 83.4791 5.0087 83.4791 11.1304H38.9574C29.7748 11.1304 22.2617 18.6435 22.2617 27.8261V239.304C22.2617 248.487 29.7748 256 38.9574 256H217.044C226.227 256 233.74 248.487 233.74 239.304V27.8261C233.74 18.6435 226.227 11.1304 217.044 11.1304ZM94.6095 11.1304H161.392V44.5217H94.6095V11.1304ZM94.6095 55.6522H161.392C167.514 55.6522 172.523 50.6435 172.523 44.5217H200.349V222.609H55.653V44.5217H83.4791C83.4791 50.6435 88.4878 55.6522 94.6095 55.6522ZM222.61 239.304C222.61 242.365 220.105 244.87 217.044 244.87H38.9574C35.8965 244.87 33.3922 242.365 33.3922 239.304V27.8261C33.3922 24.7652 35.8965 22.2609 38.9574 22.2609H83.4791V33.3913H44.5226V233.739H211.479V33.3913H172.523V22.2609H217.044C220.105 22.2609 222.61 24.7652 222.61 27.8261V239.304ZM133.566 83.4783V94.6087H72.3487V83.4783H133.566ZM133.566 116.87V128H72.3487V116.87H133.566ZM183.653 83.4783V94.6087H161.392V83.4783H183.653ZM183.653 116.87V128H161.392V116.87H183.653ZM133.566 150.261V161.391H72.3487V150.261H133.566ZM133.566 183.652V194.783H72.3487V183.652H133.566ZM183.653 150.261V161.391H161.392V150.261H183.653ZM183.653 183.652V194.783H161.392V183.652H183.653Z"
            :class="{ [`radoraw-icon-result__blank_color_${color}`]: true }"
            :style="{ opacity }"
        />
    </svg>
</template>

<script>
  export default {
    name: 'RadorawIconResult',

    props: {
      color: {
        type: String,
        default: 'default',
        validator: value => ['primary', 'secondary', 'default'].includes(value),
      },
      opacity: {
        type: String,
        default: '100%',
      }
    },
  };
</script>

<style lang="scss" scoped>
    @import "../../../sass/vars";

    .radoraw-icon-result {
        &__blank {
            fill: $primary-color;

            transform-origin: center;

            animation: radoraw-icon-result-blank 1s infinite;

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

    @keyframes radoraw-icon-result-blank {
        from {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
        to {
            transform: scale(1);
        }
    }
</style>
