<template>
  <div class="player-card" :style="{ backgroundImage: `url(${getCardImage()})` }">

    <canvas 
      class="card-canvas" 
      width="155" 
      height="200"
      @click="addOrRemoveFromTeam()"
    >
    </canvas>
    
    <img class="player-body-image" :src="getPlayerImage()" />

    <div class="player-name h6">{{ this.player.name }}</div>

    <div class="player-stat">
      Rating:
      <span class="player-stat-value">{{ this.player.rating.toFixed(2) }}</span>
    </div>

    <div class="player-stat">
      KPR:
      <span class="player-stat-value">{{ this.player.kpr }}</span>
    </div>

    <div class="player-stat">
      HS%:
      <span class="player-stat-value">{{ this.player.headshots }}</span>
    </div>

    <div v-if="inTeam">
      <i class="fas fa-fw fa-check player-selected"></i>
    </div>
  </div>
</template>

<script>
export default {
  props: ["cardData", "card-data", "in-team-data"],

  data: function() {
    return {
      player: this.cardData,
      inTeam: this.inTeamData
    };
  },

  methods: {
    getCardImage() {
      return `../images/cards/${this.player.type}.png`;
    },
    getPlayerImage() {
      return `../images/players/${this.player.id}.png`;
    },
    addOrRemoveFromTeam() {
      axios.post('/my-team/roster/add-or-remove', { 
          id: this.player.id 
        })
        .then(response => {
          this.inTeam = response.data;
        
          if (response.data === 1) {
            window.notifySuccess(this.player.name + " added to Roster.");
          } else {
            window.notifySuccess(this.player.name + " removed from Roster.");
          }

          window.bus.$emit('team_update', {});
        }).catch(error => {
           window.notifyError(error.response.data);
        });
    },
  }
};
</script>

<style scoped>
.player-card {
  background-size: cover;
  height: 217px;
  width: 155px;
}

.player-body-image {
  position: relative;
  max-width: 159px;
  max-height: 169px;
  bottom: -9px;
  clip-path: inset(0px 0px 62px 0px);
  opacity: 88%;
}

.player-name {
  position: relative;
  bottom: 54px;
  text-align: center;
}

.player-stat {
  text-align: center;
  font-size: 10px;
  position: relative;
  bottom: 62px;
}

.player-stat-value {
  font-weight: 600;
  font-size: 12px;
}

.card-canvas {
  position: absolute;
  z-index: 100;
  cursor: pointer;
}

.player-selected {
  position: relative;
    bottom: 235px;
    left: 19px;
    font-size: 15px;
    color: #277ffb;
    background: #b5d4ffcf;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    text-align: center;
    line-height: 31px;
    vertical-align: middle;
    -webkit-box-shadow: 1px 4px 17px -6px rgba(0,0,0,0.75);
    -moz-box-shadow: 1px 4px 17px -6px rgba(0,0,0,0.75);
    box-shadow: 1px 4px 17px -6px rgba(0,0,0,0.75);
}
</style>
