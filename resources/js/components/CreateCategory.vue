<template>
  <div>
    <div class="card card-categories">
        <div class="card-content" >
            <p class="title"> Create new category </p>
                <form @submit="addCategory" enctype="multipart/form-data">
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input class="input" name="name" type="text" placeholder="Name course">
                        </div>
                    </div>

                    <div class="file has-name">
                        <label class="file-label">
                        <input class="file-input" type="file" name="image">
                        <span class="file-cta">
                            <span class="file-icon"> <i class="fas fa-upload"></i></span>
                            <span class="file-label"> Choisir une photo</span>
                        </span>
                        <span class="file-name">
                            Screen Shot 2017-07-29 at 15.54.25.png
                        </span>
                        </label>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-link">Add category</button>
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
            category: {}
        }
    },
    methods: {
        addCategory(){
            axios.post('/api/categories')
                 .then()
                 .catch()
        }
    },
    mounted(){
        this.addCategory()
    }

}
</script>
