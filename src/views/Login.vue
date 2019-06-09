<template>
<section class="login">
  <Logo />
  <h1>Login</h1>
  <form class="login-form" @submit.prevent="login">

    <b-field label="Email" class="input-field">
      <b-input v-model="user.mail" type="email" maxlength="30">
      </b-input>
    </b-field>

    <b-field label="Senha" class="input-field">
      <b-input v-model="user.password" type="password" value="" password-reveal>
      </b-input>
    </b-field>

    <div class="text-center">
      <button class="button" type="submit">Fazer Login</button>
    </div>

    <!-- <div class="text-center">
      <b-button class="facebook">
        Facebook</b-button>
    </div> -->

  </form>

</section>
</template>

<script>
import Logo from '@/components/Logo.vue'
export default {
  name: 'Login',
  components: {
    Logo
  },
  data() {
    return {
      user: {
        mail: null,
        password: null
      }
    }
  },
  methods: {
    login() {

      if (this.user.mail == null || this.user.password == null) {
        this.$swal({
          type: 'error',
          title: 'Você deve preencher todos os campos!'
        })
      } else {
        console.log(this.user)
      }

    }
  }
}
</script>

<style lang="stylus" scoped>
.login
  text-align center
  background-color #477cb2
  color #fff
  padding-bottom 30px
  min-height 90vh
  h1
    font-size 1.5rem
    margin 16px auto 32px
  .login-form
    width 95%
    margin 0px auto
    max-width 300px
    text-align left
    .text-center
      text-align center
      button
        margin-top 20px
        width 60%
      .facebook
        background-color darkblue
        color white
        border 1px solid #477cb2

</style>
