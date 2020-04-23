<template>
  <div class="tokens">
    <i class="fas fa-coins mr-1"></i>
    <span>{{ this.tokenAmount }} </span>
  </div>
</template>

<script>
export default {
  data() {
    this.updateTokenAmount();

    window.bus.$on("token_update", () => {
      this.updateTokenAmount();
    });

    return {
      tokenAmount: 0
    }
  },

  methods: {
    updateTokenAmount() {
      axios.get('/tokens')
        .then(response => {
          this.tokenAmount = response.data;
        });
    }
  }
}
</script>

<style scoped>
.tokens {
  padding-right: 0.5rem;
  margin-top: 8px;
  color: #ffdc58;
}
</style>