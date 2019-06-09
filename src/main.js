import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import './registerServiceWorker'
import 'buefy/dist/buefy.css'
import Buefy from 'buefy'
import VueSweetalert2 from 'vue-sweetalert2'
import * as VueGoogleMaps from 'vue2-google-maps'
import 'vue-awesome/icons'
import Icon from 'vue-awesome/components/Icon'
import VueGmaps from 'vue-gmaps'

Vue.use(VueSweetalert2)
Vue.use(Buefy)
Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyCVlTWn7lC5WqRlyz82YaJZrYE9A-CJV4A',
    libraries: 'places', 
	}
})

Vue.config.productionTip = false
Vue.component('v-icon', Icon)

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
