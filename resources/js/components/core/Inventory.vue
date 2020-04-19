<template>
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
</template>

<script>
export default {
  props: ["inventoryData"],

  data: function() {
    return {
      inventory: JSON.parse(this.inventoryData),
    };
  },

  updated() {
    this.getInventory();
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

<style>
.card-list {
  display: flex;
  flex-wrap: wrap;
}

.card-list-item {
  display: flex; 
  justify-content: center;
}
</style>
