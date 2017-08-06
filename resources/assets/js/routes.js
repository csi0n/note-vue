/**
 * Created by csi0n on 6/23/17.
 */
export default [{
    path: '/',
    component: require('./components/Home.vue'),
    name: 'home',
    meta:{
        actions:['add','grid'],
        breadcrumb:[{'zh_name':'首页','name':'home'}]
    }
}, {
    path: '/login',
    component: require('./components/Login.vue'),
    name: 'login',
    meta:{
        actions:[],
        breadcrumb:[{'zh_name':'登录','name':'login'}]
    }
}, {
    path: '/register',
    component: require('./components/Register.vue'),
    name: 'register',
    meta:{
        actions:[],
        breadcrumb:[{'zh_name':'注册','name':'register'}]
    }
}, {
    path: '/note/add',
    component: require('./components/Note/Add.vue'),
    name: 'note.add',
    meta:{
        actions:[],
        breadcrumb:[{'zh_name':'首页','name':'home'},{'zh_name':'添加','name':'note.add'}]
    }
}, {
    path: '/note/:id/edit',
    component: require('./components/Note/Edit.vue'),
    name: 'note.edit',
    meta:{
        actions:[],
        breadcrumb:[{'zh_name':'首页','name':'home'},{'zh_name':'编辑','name':'note.edit'}]
    }
}]