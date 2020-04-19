<template>
    <div class="player-card" :style="{ backgroundImage: `url(${cardImg})` }">
        <img class="player-body-image" :src="getPlayerImage()" />
        <div class="player-name h6">{{ this.player.name }}</div>
        <div class="player-stat">
            Rating: 
            <span class="player-stat-value">{{ this.player.rating }}</span>
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
    import cardImg from "../../../img/mock-card.png";

    export default {
        props: ['cardData', 'card-data'],

        data: function () {
            return {
                cardImg,
                player: JSON.parse(this.cardData),
            }
        },

        methods: {
            getPlayerImage() {
                return `../images/players/${this.player.id}.png`; 
            }
        }
    }
</script>

<style scoped>

.player-card {
    background-size: cover;
    height: 230px;
    width: 170px;
}

.player-body-image {
    position: relative;
    max-width: 169px;
    max-height: 187px;
    bottom: -9px;
    clip-path: inset(0px 0px 62px 0px);
    opacity: 88%;
} 

.player-name {
    position: relative;
    bottom: 50px;
    text-align: center;
}

.player-stat {
    text-align: center;
    font-size: 10px;
    position: relative;
    bottom: 57px;
}

.player-stat-value {
font-weight: 600;
    font-size: 12px;
}

</style>