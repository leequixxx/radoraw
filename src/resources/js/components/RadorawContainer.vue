<template>
    <div class="container">
        <slot></slot>
    </div>
</template>

<script>
  export default {
    name: 'RadorawContainer',
  };
</script>

<style lang="scss" scoped>
    @import "../../sass/vars";

    .container {
        margin: 0 170px;

        @media screen and (max-width: $media-md) {
            margin: 0 50px;
        }

        @media screen and (max-width: $media-xs) {
            margin: 0 10px;
        }
    }
</style>
