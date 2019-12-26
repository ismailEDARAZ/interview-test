<template>
  <div>
    <div class="card card-categories">
        <div class="card-content" >
            <p class="title"> List des courses <a class="button is-info is-light" href="/courses/create">Ajouter un coure</a> </p>
            <table class="table" width='100%'>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Date create </th>
                        <th>Actions </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Date create </th>
                        <th>Actions </th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr v-for="course in courses" v-bind:key="course.id">
                        <td><img src=""></td>
                        <td>
                            <router-link :to="course.path">{{ course.name }}</router-link>
                        <td> {{ course.created_at }} </td>
                        <td>
                            <p class="buttons">
                                <a class="button is-small">
                                    <span>Afficher</span>
                                </a>
                            <a class="button is-primary is-small">
                                <span>Modifier</span>
                            </a>
                            <form @submit="deletCategory">
                                <button class="button is-danger is-outlined is-small" type="submit">
                                    <span>Supprimer</span>
                                </button>
                            </form>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</template>

<script>
export default {

    data() {
        return {
            courses: []
        }
    },
    methods: {
        getCourses(){
            axios.get('/api/courses')
                 .then(res=> {
                     console.log(res.data.data)
                     this.courses = res.data.data
                     })
                 .catch()
        }
    },
    created(){
        this.getCourses()
    }

}
</script>
