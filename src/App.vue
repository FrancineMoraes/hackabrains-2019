<template>
<div id="app">
  <Loader :isActive='true' />
  <Navbar />
  <router-view />
</div>
</template>

<script>
import Navbar from '@/components/Navbar'
import Loader from '@/components/Loader'

export default {
  name: 'Home',
  components: {
    Navbar,
    Loader
  }
}
</script>

<style lang="stylus">
</style>
