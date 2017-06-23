/**
 * Created by csi0n on 6/23/17.
 */
export default [{
    path: '/',
    component: require('./components/Home.vue'),
    name: 'home'
}, {
    path: '/login',
    component: require('./components/Login.vue'),
    name: 'login'
}, {
    path: '/register',
    component: require('./components/Register.vue'),
    name: 'register'
}, {
    path: '/note/add',
    component: require('./components/Note/Add.vue'),
    name: 'note.add'
}, {
    path: '/note/:id/edit',
    component: require('./components/Note/Edit.vue'),
    name: 'note.edit'
}]