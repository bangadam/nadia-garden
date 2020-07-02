<template>
    <div class="container">
        <h1>Item Lists</h1>
        <select v-model="categoryId" @change="fetchItems" required>
            <option selected disabled>-Select Category-</option>
            <option v-for="(item, index) in categories" :value="item.id" :key="item.id">
                {{item.name}}
            </option>
        </select>
        <ul>
            <li v-for="(item, index) in items" :key="item.id">
                <router-link :to="{name: 'edit-item', params: {id: item.id}}">
                    {{item.name}}
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    import {mapState} from 'vuex';

    export default {
        data() {
            return {
                categoryId: this.$store.state.categories[0].id,
                items: []
            }
        },
        computed: mapState({
            categories: 'categories'
        }),
        created() {
            this.fetchItems()
        },
        methods: {
            fetchItems() {
                axios.get(`/api/categories/${this.categoryId}/items`)
                .then(res => {
                    this.items = res.data
                })
            }
        },
    }
</script>
