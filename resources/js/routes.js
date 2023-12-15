import GenusIndex from './components/Genera/index.vue';
import GenusCreate from './components/Genera/create.vue';
import GenusShow from './components/Genera/show.vue';
import GenusEdit from './components/Genera/edit.vue';

import AnimalIndex from './components/Animals/index.vue';
import AnimalCreate from './components/Animals/create.vue';
import AnimalShow from './components/Animals/show.vue';
import AnimalEdit from './components/Animals/edit.vue';

import Login from './components/Auth/login.vue'; 
import Register from './components/Auth/register.vue'; 





export const routes = [
  {
    path: '/',
    component: GenusIndex,
    name: 'genus.index',
  },
  {
    path: '/genera/create',
    component: GenusCreate,
    name: 'genus.create',
  },
  {
    path: '/genera/:id',
    component: GenusShow,
    name: 'genus.show',
  },
  {
    path: '/genera/:id/edit',
    component: GenusEdit,
    name: 'genus.edit',
  },
  {
    path: '/animals',
    component: AnimalIndex,
    name: 'animals.index',
  },
  {
    path: '/animals/create',
    component: AnimalCreate,
    name: 'animal.create',
  },
  {
    path: '/animals/:id',
    component: AnimalShow,
    name: 'animal.show',
  },
  {
    path: '/animals/:id/edit',
    component: AnimalEdit,
    name: 'animal.edit',
  },
  {
    path: '/login', 
    component: Login,
    name: 'login',
  },
  {
    path: '/register', 
    component: Register,
    name: 'register',
  },
];
