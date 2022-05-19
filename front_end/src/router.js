import Accueil from './views/AccueilView.vue';
import Contact from './views/ContactView.vue';
import Create from './views/CreateView.vue';
import ProfilView from './views/ProfilView.vue';
import {createRouter,createWebHashHistory,createWebHistory} from 'vue-router';


const routes =
[{
    name:'Accueil',
    component:Accueil,
    path:'/'
},
{
    name:'Contact',
    component:Contact,
    path:'/Contact'
},
{
    name:'Create',
    component:Create,
    path:'/Create'

},
{
    path: "/Profil",
    name: "Profil" ,
    component : ProfilView
  }
];


const router =createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
})

export default router;