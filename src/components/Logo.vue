<template lang="html">
  <img class="logo" :src="require('@/assets/logo.png')" alt="">
</template>

<script>
export default {
  name: 'Logo'
}
</script>

<style lang="stylus" scoped>
.logo
  width 50%
  border-radius 50%
  padding 20px
  margin 20px auto
  max-width 100px
  background-color blueviolet
</style>
