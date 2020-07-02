<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form @submit.prevent="saveCategory">
                            <a @click="addCategory">+ Add Category</a>
                            <div v-for="(item, index) in categories" :key="item.id">
                                <input type="text" :value="item.name" :ref="item.name" @input="update($event, 'name',
                                 index)">
                                <input type="number" :value="item.display_order" @input="update($event,
                                'display_order', index)">
                                <a @click="removeCategory(index)" class="remove">Delete</a>
                                <div>
                                    <img v-if="item.image" :src="`/images/${item.image}`" width="100">
                                    <label v-else>Image: </label>
                                    <input type="text" :value="item.image" @change="update($event, 'image', index)">
                                </div>
                                <hr>
                            </div>
                            <button type="submit">Save</button>
                            <div>{{ feedback }}</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['initialCategories'],
        computed: {
            categories() {
                return this.$store.state.categories;
            },
            feedback() {
                return this.$store.state.feedback;
            }
        },
        methods: {
            removeCategory(index) {
                if (confirm('Are you sure delete this item?')) {
                    this.$store.dispatch('removeCategories', index);
                }
            },
            addCategory() {
                this.$store.commit('ADD_CATEGORIES', {
                    id: 0,
                    name: '',
                    image: '',
                    display_order: this.categories.length + 1
                })

                this.$nextTick(() => {
                    window.scrollTo(0, document.body.scrollHeight)
                    this.$refs[''][0].focus()
                })
            },
            saveCategory() {
                this.$store.dispatch('saveCategories');
            },
            update($event, property, index) {
                this.$store.commit('UPDATE_CATEGORY', {
                    index, property, value: $event.target.value
                })
            }
        },
    }
</script>

<style scoped>
    img {
        vertical-align: middle;
    }

    hr {
        margin-bottom: 30px;
    }
</style>
