<template>
    <div class="radoraw-button-group">
        <slot></slot>
    </div>
</template>

<script>
  export default {
    name: 'RadorawButtonGroup',
  };
</script>

<style lang="scss" scoped>
    .radoraw-button-group {
        display: flex;
        > .radoraw-button {
            border-left-width: 0;
            border-right-width: 0;
            border-radius: 0;

            &:first-child {
                border-left-width: initial;
                border-radius: 10px 0 0 10px;
            }
            &:last-child {
                border-right-width: 2px;
                border-radius: 0 10px 10px 0;
            }

            &_outline {
                &:first-child {
                    border-left-width: 5px;
                }
                &:last-child {
                    border-right-width: 5px;
                }
            }
        }
    }
</style>
