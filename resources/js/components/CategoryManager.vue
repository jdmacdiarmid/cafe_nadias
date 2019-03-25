<template>
    <form @submit.prevent="saveCategories">
        <a @click="addCategory" class="add">+ Add Category</a>
        <div v-for="(category, index) in categories" :key="category.id">
            <input type="text" v-model="category.name" value="" :ref="category.name">
            <input type="number" v-model="category.display_order">
            <a @click="removeCategory(index)" class="remove">Delete</a>
            <div>
                <img v-if="category.image" :src="`/images/${category.image}`" width="100" alt="">
                <label v-else>Image: </label>
                <input type="text" v-model.lazy="category.image">
            </div>
            <hr>
        </div>
        <button type="submit">Save</button>
        <div>{{ feedback }}</div>
    </form>
</template>

<script>
    const axios = require('axios').default;

    export default {
        props: ['initialCategories'],
        data() {
            return {
                categories: _.cloneDeep(this.initialCategories),
                feedback: '',
            };
        },
        methods: {
            removeCategory(index) {

                let msg = 'Delete Category: ' + this.categories[index].name + '\n\n';
                    msg += 'Are you sure?';
                if (confirm(msg)) {
                    let id = this.categories[index].id;
                    if (id > 0){
                        axios.delete('/api/categories/' + id);
                    }
                    this.categories.splice(index, 1);
                }
            },
            addCategory() {
                this.categories.push({
                    id: 0,
                    name: '',
                    image: '',
                    display_order: this.categories.length + 1
                });
                this.$nextTick(() => {
                   window.scrollTo(0, document.body.scrollHeight);
                   this.$refs[''][0].focus();
                });
            },
            saveCategories() {
                axios.post('/api/categories/upsert', {
                    categories: this.categories
                })
                .then((res) => {
                    if (res.data.success) {
                        this.feedback = 'Changes saved';
                        // To sync database and to make sure we have any new categories.
                        this.categories = res.data.categories;
                    }
                });
            }

        }
    }
</script>

<!-- scoped key word applies styling this component only -->
<style scoped>
    img {
        vertical-align: middle;
    }
    hr {
        margin-bottom: 30px;
    }

</style>