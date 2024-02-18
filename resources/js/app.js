
require('./bootstrap');

window.Vue = require('vue').default;


import Form from 'vform'
window.Form = Form


import Vuex from 'vuex'
Vue.use(Vuex)
import storedata from './store/store'

const store = new Vuex.Store(
  storedata
)

import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en'
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUI, { locale })

import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes/routes'


import Swal from 'sweetalert2'
window.Swal = Swal

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

window.Toast = Toast;





import {moment} from './filter/filter' ;

import CKEditor from '@ckeditor/ckeditor5-vue2';
Vue.use( CKEditor );


Vue.component('frontend', require('./components/frontend.vue').default);
Vue.component('date-time', require('./components/frontend/inc/date.vue').default);
Vue.component('side-ber', require('./components/frontend/inc/sideber.vue').default);
Vue.component('menu-ber', require('./components/frontend/page/menu.vue').default);
Vue.component('footerpart', require('./components/frontend/inc/footer.vue').default);

const router = new VueRouter({
    mode:'history',
    routes // short for `routes: routes`
  })

const app = new Vue({
    el: '#app',
    router,
    store
});
