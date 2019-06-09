<template>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand is-centered">
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
	.navbar-brand
		background-color transparent
</style>
