<template>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">


    <router-link :to="{ name: 'Home' }" class="navbar-item">Hackabrains</router-link>
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
	.navbar-menu.is-active
	    position: absolute;
	    width: 100%;
	    text-align: center;

</style>
