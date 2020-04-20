<template>
  <div class="d-flex">
    <div v-for="index in 5" :key="index">
      <div :class="getClass(index)"></div>
    </div>

    <i v-if="this.rosterAmount === 5" class="fas fa-check check-icon"></i>
    <i v-else class="fas fa-times"></i>
  </div>
</template>

<script>

export default {
  
  data: function() {
    this.updateRosterAmount();

    window.bus.$on('team_update', () => {
     this.updateRosterAmount();
    });

    return {
      rosterAmount: 0
    };
  },

  methods: {
    updateRosterAmount() {
      axios.get('/my-team/roster/amount')
        .then(response => {
          this.rosterAmount = response.data;
        });
    },
    getClass(index) {
      let classVal = "roster-space";

      if (index <= this.rosterAmount) {
        classVal += " filled";
      }

      return classVal;
    },
  }
}

</script>

<style scoped>
.roster-space {
  background: #75828e;
  width: 10px;
  height: 10px;
  margin-right: 5px;
  margin-top: 2.5px;
}

.filled {
  background: #f99d1c;
}

.check-icon {
  color: #f99d1c;
}

</style>