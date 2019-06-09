<template lang="html">
  <div class="modal" :class="{ 'is-active': active }">
  <div class="modal-background"></div>
  <div class="modal-content">
    <img class="load" :src="require('@/assets/loader-blue.png')" alt="">
    <p class="loading">Loading...</p>
  </div>
  <!-- <button class="modal-close is-large" aria-label="close"></button> -->
</div>
</template>

<script>
export default {
  name: 'Loader',
  data() {
    return {
      active: false
    }
  }
}
</script>

<style lang="stylus" scoped>
.modal
  overflow visible
  text-align center
  .load
    width 120px
    -webkit-animation: rotation 2s infinite linear;
    @-webkit-keyframes rotation {
    		from {
    				-webkit-transform: rotate(0deg);
    		}
    		to {
    				-webkit-transform: rotate(359deg);
    		}
    }
  .loading
    font-size 2rem
    color #c9c9c9
    -webkit-animation: fades 2s infinite linear;
    @-webkit-keyframes fades {
      0% { opacity: 0;}
      25% { opacity: 0.8; }
      50% { opacity: 0;}
      75% { opacity: 0.8; }
      100% {opacity: 0;}
    }

</style>
