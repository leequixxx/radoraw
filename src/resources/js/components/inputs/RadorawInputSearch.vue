<template>
    <div class="radoraw-input-search">
        <input
            type="search"
            class="radoraw-input-search__input"
            :value="value"
            @input="$emit('input', $event.target.value)"
        >
        <radoraw-icon-search class="radoraw-input-search__icon" />
    </div>
</template>

<script>
  import RadorawIconSearch from '../icons/RadorawIconSearch';

  export default {
    name: 'RadorawInputSearch',
    components: { RadorawIconSearch },

    props: {
      value: {
        type: String,
      },
    },
  };
</script>

<style lang="scss" scoped>
    @import "../../../sass/vars";

    .radoraw-input-search {
        display: flex;

        border-bottom: 3px solid $secondary-color;

        cursor: text;

        &__input {
            height: 32px;

            padding-bottom: 5px;

            border: 0;
            outline: 0;

            color: $secondary-color;

            font-family: "Montserrat", sans-serif;
            font-size: 1.2rem;

            text-align: right;

            cursor: text;

            &::-webkit-search-cancel-button {
                display: none;
            }
        }
        &__icon {
            width: 24px;

            padding-left: 10px;
        }
    }
</style>
