import { createRouter, createWebHistory } from 'vue-router';
import AccueilView from '../views/AccueilView.vue';
import CreateView from '../views/CreateView.vue';
import ContactView from '../views/ContactView.vue';
import ProfilView from '../views/ProfilView.vue';


const routes = [
  {
    path: '/',
    name: 'Accueil',
    component: AccueilView
  },
  {
    path: '/Contact',
    name: 'Contact',
    component: ContactView
  },
  {
    path: "/Create",
    name: "Create" ,
    component : CreateView
  },
  {
    path: "/Profil",
    name: "Profil" ,
    component : ProfilView
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
