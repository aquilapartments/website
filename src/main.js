import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import './assets/custom.css'
import VueCarousel from 'vue-carousel';
import VueSimpleMarkdown from 'vue-simple-markdown'
import 'vue-simple-markdown/dist/vue-simple-markdown.css'

Vue.config.productionTip = true
Vue.use(VueCarousel)
Vue.use(BootstrapVue)
Vue.use(VueSimpleMarkdown)

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
