<template>
    <orbit-spinner
        :animation-duration="1000"
        :size="64"
        color="#cd0000"
    />
</template>

<script>
  import { OrbitSpinner } from 'epic-spinners';

  export default {
    name: 'RadorawLoader',
    components: {
      OrbitSpinner,
    },
  };
</script>
