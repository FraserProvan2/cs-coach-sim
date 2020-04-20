<template>
  <div>
    <div class="w-100">
      <roster-amount></roster-amount>
    </div>
    <hr>

    <div class="card-list">
      <div 
        class="card-list-item"
        v-for="(item, index) in inventory"
        :key="index"
      >
        <player-card 
          :cardData="item.player"
          :inTeamData="item.in_team"
        ></player-card>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["inventoryData"],

  data: function() {
    window.bus.$on('team_update', () => {
      this.getInventory();
    });
    
    return {
      inventory: JSON.parse(this.inventoryData),
    };
  },

  methods: {
    getInventory() {
        axios.get('/my-team/fetch')
          .then(response => {
            this.inventory = response.data;
          });
    }
  }
}
</script>

<style scoped>
.card-list {
  display: flex;
  flex-wrap: wrap;
}

.card-list-item {
  display: flex; 
  justify-content: center;
}
</style>
