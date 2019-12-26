import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import AppHome from '../AppHome.vue';
import CategoriesComponent from '../components/CategoriesComponent.vue';
import CoursesComponent from '../components/CoursesComponent.vue';
import ShowCourse from '../components/ShowCourse.vue';
import ShowCategory from '../components/ShowCategory.vue';

const routes = [
    { path: '/', component: AppHome, name: 'appHome' },
    { path: '/categories', component: CategoriesComponent, name: 'Categories' },
    { path: '/courses/:slug', component: ShowCourse, name: 'ShowCourse' },
    { path: '/categories/:slug', component: ShowCategory, name: 'ShowCategory' },
    { path: '/courses', component: CoursesComponent, name: 'Courses' }
];

const router = new VueRouter({
    routes,
    hashbang : false,
    mode : 'history'
  });

  export default router;
