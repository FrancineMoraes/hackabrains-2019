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
@keyframes move{
    from{
      transform: translateX(-100%);
      opacity: 0;
    }
    
    to{
      transform: translateX(0);
      opacity: 1;
    }
  }
</style>
