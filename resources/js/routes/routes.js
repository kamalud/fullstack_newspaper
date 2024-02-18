
import  FrontHme from '../components/frontend/inc/home';
import  LoginPage from '../components/frontend/inc/login';
import  RegisterPage from '../components/frontend/inc/register';
import  ResetPage from '../components/frontend/inc/resetpassword';


import  SinglePost from '../components/frontend/page/post_details.vue';
import  category_post from '../components/frontend/page/category_post.vue';




import  AdminHOME from '../components/admin/inc/home';


import  AdminCategorylist from '../components/admin/category/list';
import  AdminCategoryadd from '../components/admin/category/add';
import  AdminCategoryShow from '../components/admin/category/edit';



import  AdminPostlist from '../components/admin/post/list';
import  AdminPostAdd from '../components/admin/post/add';
import  AdminPostEdit from '../components/admin/post/edit';


export const routes = [ 

  { path: '/', component: FrontHme,name:'home' },
  { path: '/login', component: LoginPage,name:'login' },
  { path: '/register', component: RegisterPage,name:'register' },
  { path: '/password/reset', component: ResetPage,name:'reset' },

  { path: '/post-details/:slug', component: SinglePost,name:'single' },
  { path: '/category_post/:slug', component: category_post,name:'category_post' },
    


    { path: '/admin/dasboard', component: AdminHOME,name:'adminhome' },
    { path: '/category-list', component: AdminCategorylist,name:'category-list' },
    { path: '/category-add', component: AdminCategoryadd,name:'category-add' },
    { path: '/category-show/:slug', component: AdminCategoryShow,name:'category-show' },


    { path: '/post-list', component: AdminPostlist,name:'post-list' },
    { path: '/post-add', component: AdminPostAdd,name:'post-add' },
    { path: '/post-edit/:slug', component: AdminPostEdit,name:'post-edit' },

  ]