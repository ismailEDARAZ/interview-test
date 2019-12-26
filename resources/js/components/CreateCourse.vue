<template>
  <div>
    <div class="card card-categories">
        <div class="card-content" >
            <p class="title"> Create new course </p>
                <form @submit="AddPost" enctype="multipart/form-data">
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input class="input" name="name" type="text" placeholder="Name course" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Description</label>
                        <div class="control">
                            <textarea class="textarea" name='description' placeholder="Description" required></textarea>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <div class="select is-small">
                            <select name="category">
                                <option>Choisir une category</option>
                                <option v-for="item in categories" :value="item.id" v-bind:key="item.id"> 
                                    {{ item.name }} 
                                </option>
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="file is-small has-name">
                            <label class="file-label">
                            <input class="file-input" type="file" name="image" required>
                            <span class="file-cta">
                                <span class="file-icon"><i class="fas fa-upload"></i></span>
                                <span class="file-label"> Choisir une photo </span>
                            </span>
                            <span class="file-name">
                                Screen Shot 2017-07-29 at 15.54.25.png
                            </span>
                            </label>
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-link">Add course</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
  </div>
</template>

<script>
export default {

    data() {
        return {
            courses: {},
            categories: []
        }
    },
    methods: {
        AddPost(){
            axios.post('/api/courses')
                 .then()
                 .catch()
        },
        getCategories(){
            axios.get('/api/categories')
                 .then(res => this.categories = res.data)
                 .catch(err => console.log(res.err))
        }
    },
    created(){
        this.AddPost();
        this.getCategories();
    }

}
</script>
