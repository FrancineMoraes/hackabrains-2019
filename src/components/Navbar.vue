<template>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <router-link :to="{ name: 'Main' }" class="navbar-item">
      <img class="logo" :src="require('@/assets/acessofacil.png')" alt="">
    </router-link>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">


    <router-link :to="{ name: 'Main' }" class="navbar-item">Home</router-link>
    <router-link :to="{ name: 'Login' }" class="navbar-item">Login</router-link>
    <router-link :to="{ name: 'Register' }" class="navbar-item">Registrar-se</router-link>

  </div>
</nav>
</template>

<script>
export default {
  name: 'Navbar'
}
</script>
<style lang="stylus" scoped>
  .navbar
    background #477cb2
    color white
    .navbar-item
      transition 200ms ease all
      color white
      &:hover
        background lighten(#477cb2, 20%)
  .navbar-menu
    background #477cb2
    text-align center
	.navbar-menu.is-active
	    position absolute
	    width 100%
	    text-align center
      background-color #477cb2 !important

</style>
