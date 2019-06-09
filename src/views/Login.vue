<template>
<section class="login container">
  <Logo />
  <h1>Login</h1>
  <form class="login-form">

    <b-field label="Email" class="input-field">
      <b-input type="email" maxlength="30">
      </b-input>
    </b-field>

    <b-field label="Senha" class="input-field">
      <b-input type="password" value="" password-reveal>
      </b-input>
    </b-field>

    <div class="text-center">
      <b-button type="is-primary">Fazer Login</b-button>
    </div>

  </form>

</section>
</template>

<script>
import Logo from '@/components/Logo.vue'
export default {
  name: 'Login',
  components: {
    Logo
  }
}
</script>

<style lang="stylus" scoped>
.login
  text-align center
  h1
    font-size 1.5rem
    margin 16px auto 32px
  .login-form
    width 95%
    margin auto
    max-width 300px
    text-align left
    .text-center
      text-align center
    button
      margin-top 20px

</style>
