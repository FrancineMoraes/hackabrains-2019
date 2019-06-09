<template lang="html">
 <section class="register">

     <Logo />
   <h1 class="is-primary">Registrar-se</h1>

   <form class="register-form" @submit.prevent="register">
     <b-field label="Nome">
            <b-input v-model="user.name"></b-input>
        </b-field>

        <b-field label="Email">
            <b-input v-model="user.mail" type="email"
                maxlength="30">
            </b-input>
        </b-field>

        <b-field label="Senha">
            <b-input v-model="user.password" type="password"
                password-reveal>
            </b-input>
        </b-field>

        <div class="text-center">
          <button class="button" type="submit">Concluir cadastro</button>
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
  },
  data() {
    return {
      user: {
        name: null,
        mail: null,
        password: null,
      }
    }
  },
  methods: {
    register() {

      if (this.user.mail == null || this.user.password == null || this.user.name == null) {
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
.register
  text-align center
  background-color #477cb2
  color: #fff
  h1
    font-size 1.5rem
    margin 16px auto 32px
  .register-form
    margin 0px auto 30px
    width 95%
    margin auto
    max-width 300px
    text-align left
    .text-center
      text-align center
    button
      margin-top 20px
</style>
