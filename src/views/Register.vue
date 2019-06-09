<template lang="html">
 <section class="register">

     <Logo />
   <h1 class="is-primary">Registrar-se</h1>

   <form class="register-form">
     <b-field label="Nome">
            <b-input v-model="name"></b-input>
        </b-field>

        <b-field label="Email">
            <b-input type="email"
                maxlength="30">
            </b-input>
        </b-field>

        <b-field label="Senha">
            <b-input type="password"
                password-reveal>
            </b-input>
        </b-field>

        <div class="text-center">
          <b-button type="is-primary">Concluir cadastro</b-button>
        </div>

   </form>

 </section>
</template>

<script>
import Logo from '@/components/Logo.vue'

export default {
  name: 'Register',
  components: {
    Logo
  }
}
</script>

<style lang="stylus" scoped>
.register
  text-align center
  h1
    font-size 1.5rem
    margin 16px auto 32px
  .register-form
    margin auto
    width 95%
    margin auto
    max-width 300px
    text-align left
    .text-center
      text-align center
    button
      margin-top 20px
</style>
