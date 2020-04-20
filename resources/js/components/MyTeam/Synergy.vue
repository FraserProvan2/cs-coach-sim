<template>
  <div class="d-flex w-50 justify-content-end synergy">
    <i class="fas fa-dna synergy-icon"></i>
    <div>{{ this.synergy }}%</div>
  </div>
</template>

<script>
export default {
  data() {
    this.updateSynergy();

    window.bus.$on("team_update", () => {
      this.updateSynergy();
    });

    return {
      synergy: 0
    };
  },

  methods: {
    updateSynergy() {
      axios.get("/my-team/synergy").then(response => {
        this.synergy = response.data;
      });
    }
  }
};
</script>

<style scoped>
.synergy {
  color: #b5d5ff;
}

.synergy-icon {
  margin-top: 4px;
  margin-right: 3px;
}
</style>