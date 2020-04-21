<template>
  <div class="d-flex synergy mt-1">
    <div>Synergy:</div>

    <b-progress :max="100">
      <b-progress-bar class="text-dark" :value="this.synergy" :label="`${this.synergy}%`"></b-progress-bar>
    </b-progress>
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

<style>
.synergy {
  color: #b5d5ff;
}

.progress {
  margin-top: 5px;
  margin-left: 5px;
  margin-right: 5px;
  margin-bottom: 0px!Important;
  width: 90%;
  background-color: #6d7680;
}

.progress-bar {
  background-color: #b5d5ff !important;
}
</style>