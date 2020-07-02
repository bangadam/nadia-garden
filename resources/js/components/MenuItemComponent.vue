<template>
    <div class="container">
        <h1>Add Item</h1>
        <form class="item-form" @submit.prevent="save" novalidate>
            <div>
                <input type="text" placeholder="name" v-model="item.name" required>
                $ <input type="number" placeholder="Price" min="0" step=".01" v-model="item.price" required>
            </div>
            <div>
                <textarea v-model="item.description" placeholder="Item Description" required rows="10"></textarea>
            </div>
            <div>
                <select v-model="item.category_id">
                    <option selected disabled>-Select a Category-</option>
                    <option v-for="(item, index) in categories" :key="item.id" :value="item.id">
                        {{item.name}}
                    </option>
                </select>
            </div>
            <img v-if="id && item.image" :src="`/storage/images/${item.image}`" width="200">
            <dropzone :options="dropzoneOptions" id="dz" ref="dropzone"></dropzone>
            <button type="submit">Save</button>
            <ul>
                <li v-for="(item, index) in errors" :key="index">{{item}}</li>
            </ul>
        </form>
    </div>
</template>

<script>
    import vue2DropZone from 'vue2-dropzone';
    import 'vue2-dropzone/dist/vue2Dropzone.min.css';
    import {mapState} from 'vuex';

    function newItem() {
        return {
            name: '',
            price: 0.00,
            image: '',
            category_id: '',
            description: ''
        }
    }

    export default {
        components: {
            dropzone: vue2DropZone
        },
        props: ['id'],
        data() {
            return {
                dropzoneOptions: {
                    url: '/api/menu-items/add-image',
                    thumbnailWidth: 200,
                    headers: {
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                    },
                    success(file, res) {
                        file.filename = res;
                    }
                },
                item: {
                    name: '',
                    price: 0.00,
                    image: '',
                    category_id: '',
                    description: ''
                },
                errors: []
            }
        },
        computed: mapState({
          categories: 'categories'
        }),
        beforeRouteLeave(to, from, next) {
            this.item = newItem()
            next()
        },
        created() {
            if (this.id) {
                axios.get('/api/menu-items/' + this.id)
                    .then(res => this.item = res.data);
            }
        },
        methods: {
            save() {
                let files = this.$refs.dropzone.getAcceptedFiles();
                if (files.length > 0 && files[0].filename) {
                    this.item.image = files[0].filename
                }
                let url = '/api/menu-items/add-item';
                if (this.id) {
                    url = '/api/menu-items/' + this.id;
                }
                axios.post(url, this.item)
                    .then(res => {
                        this.$router.push('/')
                    })
                    .catch(error => {
                        let messages = Object.values(error.response.data.errors)
                        console.log(error)
                        this.errors = [].concat.apply([], messages)
                    })
            }
        }
    }
</script>
