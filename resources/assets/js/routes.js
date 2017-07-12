import LoginForm from './components/LoginForm.vue';
import Computadores from './components/Computadores.vue';

const routes = [
  {path: '/', component: LoginForm},
  {path: '/computadores', component: Computadores}
]

export default routes;
