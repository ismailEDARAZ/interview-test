<template>
  <div>
    <div class="card card-categories">
        <div class="card-content" >
            <p class="title"> {{ category.name }}</p>

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
    created(){
        console.log('affichage category')
        axios.get(`/api/categories/${this.$route.params.slug}` )
                 .then(res => {
                     console.log(res.data)
                     this.category = res.data
                 })
                 .catch(err => {
                     console.log(err.message)
                 })
    }

}
</script>
