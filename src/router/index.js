import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/about-taormina',
    name: 'about',
    component: () => import('../views/About.vue')
  },
  {
    path: '/accomodation',
    name: 'accomodation',
    component: () => import('../views/Accomodation.vue')
  },
  {
    path: '/contact',
    name: 'contact',
    component: () => import('../views/Contact.vue')
  }
]

const router = new VueRouter({
  routes
})

export default router
