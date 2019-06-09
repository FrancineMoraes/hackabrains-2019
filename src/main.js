import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import './registerServiceWorker'
import 'buefy/dist/buefy.css'
import Buefy from 'buefy'
import VueSweetalert2 from 'vue-sweetalert2'
import 'vue-awesome/icons'
import Icon from 'vue-awesome/components/Icon'

Vue.use(VueSweetalert2)
Vue.use(Buefy)

Vue.config.productionTip = false

// Vue.component('v-icon', Icon)

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
