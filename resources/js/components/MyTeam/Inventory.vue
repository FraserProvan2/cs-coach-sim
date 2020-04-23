<template>
  <div>
    <div class="d-flex w-100">
      <div class="w-50">
        <roster-amount></roster-amount>
        <synergy></synergy>
      </div>
      <div class="d-flex justify-content-end w-50">
        <input
          class="search-player"
          v-model="searchPlayer"
          placeholder="Search Player"
          :v-bind="filteredInventory"
        />
      </div>
    </div>
    <hr />

    <div class="card-list" v-if="filteredInventory">
      <div class="card-list-item" v-for="item in filteredInventory" :key="item.id">
        <player-card :itemId="item.id" :cardData="item.player" :inTeamData="item.in_team"></player-card>
      </div>
    </div>
    <div class="text-center my-4" v-else>
      You have no players
    </div>
  </div>
</template>

<script>
export default {
  props: ["inventoryData"],

  data: function() {
    return {
      inventory: JSON.parse(this.inventoryData),
      searchPlayer: ""
    };
  },

  mounted() {
    this.getInventory();

    window.bus.$on("team_update", () => {
      this.getInventory();
    });
  },

  methods: {
    getInventory() {
      axios.get("/my-team/fetch").then(response => {
        this.inventory = response.data;
      });
    }
  },
  computed: {
    filteredInventory() {
      let searchTerm = this.searchPlayer.toLowerCase();
      return this.inventory.filter(item => {
        return item.player.name.toLowerCase().includes(searchTerm);
      });
    }
  }
};
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

.search-player {
  margin-top: 14px;
  width: 200px;
  max-height: 29px;
  font-size: 14px;
}
</style>
