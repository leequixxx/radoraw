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
                <vs-select
                    class="soil-select__select"
                    label="Выбор типа почвы"
                    icon="terrain"
                    width="100%"

                    :disabled="!!error"
                    :danger="!!error"
                    :danger-text="error ? error.message : ''"
                    :value="value"
                    @input="$emit('input', $event)"
                >
                    <vs-select-item
                        :key="soil.id"
                        :value="soil.id"
                        :text="soil.name"
                        v-for="soil in data"
                    />
                </vs-select>
            </div>
        </v-wait>
</template>

<script>
  import { LoopingRhombusesSpinner } from 'epic-spinners';

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
        'fetch',
      ]),
    },

    mounted() {
      this.fetch();
    },
  };
</script>
