<template>
  <div>
    <div class="card card-categories">
        <div class="card-content" >
            <p class="title"> {{ course.name }}}</p>

        </div>
    </div>
  </div>
</template>

<script>
export default {

    data() {
        return {
            course: {}
        }
    },
    methods: {
        getCourses(){
            axios.get('/api/categories/'+ this.$route.params.slug)
                 .then(res => {
                     console.log(res.data)
                     this.course = res.data
                 })
                 .catch(err => {
                     console.log(err.message)
                 })
        }
    },
    mounted(){
        this.getCourses()
    }

}
</script>
