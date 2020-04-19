<template>
  <div class="player-card" :style="{ backgroundImage: `url(${getCardImage()})` }">
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
  </div>
</template>

<script>
export default {
  props: ["cardData", "card-data"],

  data: function() {
    return {
      player: JSON.parse(this.cardData)
    };
  },

  methods: {
    getCardImage() {
      return `../images/cards/${this.player.type}.png`;
    },
    getPlayerImage() {
      return `../images/players/${this.player.id}.png`;
    }
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
</style>
