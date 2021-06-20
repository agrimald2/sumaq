require('./bootstrap');
window.Vue = require('vue');


import VueRouter from 'vue-router';

Vue.use(VueRouter);

const routes = [

    {
        path:'/inicio',
        component: require('./index.vue').default
    },
/***Category***/
    {
        path:'/category',
        component: require('./master_tables/mae_category/index.vue').default
    },

    {
        path:'/category/create',
        component: require('./master_tables/mae_category/create.vue').default
    },

    {
        path:'/category/edit/:categories_id',
        component: require('./master_tables/mae_category/edit.vue').default
    },
/***Collection***/
    {
        path:'/collection',
        component: require('./master_tables/mae_collections/index.vue').default
    },

    {
        path:'/collection/create',
        component: require('./master_tables/mae_collections/create.vue').default
    },

    {
        path:'/collection/edit/:colecctions_id',
        component: require('./master_tables/mae_collections/edit.vue').default
    },
/***Discount***/
    {
        path:'/discount',
        component: require('./master_tables/mae_discounts/index.vue').default
    },

    {
        path:'/discount/create',
        component: require('./master_tables/mae_discounts/create.vue').default
    },

    {
        path:'/discount/edit/:discounts_id',
        component: require('./master_tables/mae_discounts/edit.vue').default
    },
/***Material***/
    {
        path:'/material',
        component: require('./master_tables/mae_materials/index.vue').default
    },

    {
        path:'/material/create',
        component: require('./master_tables/mae_materials/create.vue').default
    },

    {
        path:'/material/edit/:materials_id',
        component: require('./master_tables/mae_materials/edit.vue').default
    },
/***Sucursal***/
    {
        path:'/sucursal',
        component: require('./master_tables/mae_sucursals/index.vue').default
    },

    {
        path:'/sucursal/create',
        component: require('./master_tables/mae_sucursals/create.vue').default
    },

    {
        path:'/sucursal/edit/:sucursals_id',
        component: require('./master_tables/mae_sucursals/edit.vue').default
    },

/***Provider***/
    {
        path:'/provider',
        component: require('./master_tables/mae_providers/index.vue').default
    },
    {
        path:'/provider/create',
        component: require('./master_tables/mae_providers/create.vue').default
    },
    {
        path:'/purchase_orders',
        component: require('./master_tables/mae_providers/purchase_order.vue').default
    },

/***Sales***/
    {
        path:'/sales/pedidos',
        component: require('./master_tables/tbl_sales/index.vue').default
    },
/***Products***/
    {
        path:'/products',
        component: require('./tbl_procesos/tbl_products/index.vue').default
    },
    {
        path:'/products/create',
        component: require('./tbl_procesos/tbl_products/create.vue').default
    },

/***Inventario***/
    {
        path:'/inventory',
        component: require('./tbl_procesos/tbl_inventories/index.vue').default
    },

]

const router = new VueRouter({
    routes: routes,
    mode: "history"
})

const app = new Vue({
    router
}).$mount('#app');