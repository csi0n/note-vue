require('./bootstrap');
import Vue from "vue";
import VueRouter from "vue-router";
import ElementUI from "element-ui";
import 'element-ui/lib/theme-default/index.css';
import App from "./App.vue";
import routes from "./routes";
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(VueRouter);
Vue.use(ElementUI);
const router = new VueRouter({
    base: '/',
    mode: 'history',
    routes: routes,
    linkActiveClass: 'active'
});
const app = new Vue(Vue.util.extend({
    router
}, App)).$mount('#app');