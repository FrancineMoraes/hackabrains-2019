<template>
<div id="app">
  <Navbar />
  <router-view />
</div>
</template>

<script>
import Navbar from '@/components/Navbar'

export default {
  name: 'Home',
  components: {
    Navbar
  }
}
</script>

<style lang="stylus">
</style>
