<template>
    <div class="container">
        <h1>Menu Editor</h1>
        <div class="menu">
            <router-link :to="{name: 'categories'}">Categories</router-link>
            <router-link :to="{name: 'itemLists'}">Items List</router-link>
            <router-link :to="{name: 'add-item'}">Add Item</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    import VueRouter from 'vue-router';
    import CategoryManager from './CategoriesManagerComponent.vue';
    import MenuItem from './MenuItemComponent.vue';
    import MenuItemLists from './MenuItemListsComponent.vue';
    import store from '../store/index';

    export default {
        store,
        props: ['categories'],
        created() {
            this.$store.commit('SET_CATEGORIES', _.cloneDeep(this.categories))
        },
        router: new VueRouter({
            mode: 'history',
            base: 'menu-editor',
            routes: [
                {
                    path: '/categories',
                    name: 'categories',
                    component: CategoryManager
                },
                {
                    path: '/',
                    name: {name: 'categories'}
                },
                {
                    path: '/add-item',
                    name: 'add-item',
                    component: MenuItem
                },
                {
                    path: '*',
                    redirect: '/'
                },
                {
                    path: '/items',
                    name: 'itemLists',
                    component: MenuItemLists
                },
                {
                    path: '/edit-item/:id',
                    name: 'edit-item',
                    component: MenuItem,
                    props: true
                }
            ]
        })
    }
</script>

<style scoped>
    .menu {
        margin-bottom: 20px;
    }
    a {
        border: 1px solid black;
        padding:10px;
        margin: 0;
        color: black;
    }

    .router-link-active {
        font-weight: bold;
        border-bottom: none;
    }
</style>
