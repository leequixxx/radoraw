<template>
    <header class="radoraw-icon-and-text">
        <div class="radoraw-icon-and-text__icon">
            <slot name="icon"></slot>
        </div>
        <div class="radoraw-icon-and-text__text-container">
            <p class="radoraw-icon-and-text__text"><slot></slot></p>
        </div>
    </header>
</template>

<script>
  export default {
    name: 'RadorawIconAndText',
  };
</script>

<style lang="scss" scoped>
    .radoraw-icon-and-text {
        padding: 20px;

        &__icon {
            display: flex;
            justify-content: center;
        }

        &__text-container {
            display: flex;
            justify-content: center;

            padding: 10px;
        }

        &__text {
            width: 500px;
            max-width: 100%;

            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;

            line-height: 1.8rem;
            text-align: center;
        }
    }
</style>
