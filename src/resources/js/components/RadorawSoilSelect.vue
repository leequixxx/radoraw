<template>
        <v-wait
            for="soils.fetch"
            transition="fade"
        >
            <template slot="waiting">
                <looping-rhombuses-spinner
                    :animation-duration="1200"
                    :size="48"
                    color="#1f74ff"
                />
            </template>
            <div class="soli-select">
                <ul>
                    <li
                        v-for="soil in data"
                        :key="soil.id"
                    >
                        {{ soil.name }}
                    </li>
                </ul>
                <span>{{ error }}</span>
            </div>
        </v-wait>
</template>

<script>
  import { LoopingRhombusesSpinner } from 'epic-spinners';
  import { ACTIONS } from '../consts/resources/soils';

  const { mapActions, mapState } = Vuex;

  export default {
    name: 'RadorawSoilSelect',

    components: {
      LoopingRhombusesSpinner,
    },

    props: {
      value: {
        type: Object,
      },
    },

    computed: {
      ...mapState('soils', {
        data: state => state.data,
        error: state => state.error,
      }),
    },

    methods: {
      ...mapActions('soils', [
        ACTIONS.FETCH,
      ]),
    },

    mounted() {
      this.fetch();
    },
  };
</script>
