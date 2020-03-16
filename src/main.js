import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import './assets/custom.css'
import VueCarousel from 'vue-carousel';

Vue.config.productionTip = false
Vue.use(VueCarousel)
Vue.use(BootstrapVue)

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
