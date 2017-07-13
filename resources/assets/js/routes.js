import LoginForm from './components/LoginForm.vue';
import Computadores from './components/Computadores.vue';

const routes = [
  {
    path: '/',
    component: LoginForm,
    //Somente quem está deslogado tem acesso ao form de login
    meta: {permission: 'any', fail: '/computadores'}
  },
  {
    path: '/computadores',
    component: Computadores,
    meta: {permission: 'admin', fail: '/'}
  }
]

export default routes;
