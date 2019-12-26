<template>
  <div>
    <div class="card card-categories">
        <div class="card-content" >
            <p class="title"> List des categories <button class="button is-info is-light">Ajouter une category</button> </p>
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
                    <tr v-for="category in categories" v-bind:key="category.id">
                        <td>
                            <img src="https://via.placeholder.com/150" width="100px">
                        </td>
                        <td>
                            <router-link :to="category.path">{{ category.name }}</router-link>
                        </td>
                        <td> {{ category.created_at }} </td>
                        <td>
                            <p class="buttons">
                                <button class="button is-small">
                                    <span>Afficher</span>
                                </button>
                                <button class="button is-primary is-small">
                                    <span>Modifier</span>
                                </button>
                                <button class="button is-danger is-outlined is-small">
                                    <span>Supprimer</span>
                                    <span class="icon is-small"><i class="fas fa-times"></i></span>
                                </button>
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
            categories: []
        }
    },

    craeted(){

            axios.get('/api/categories')
                 .then(res=> {
                     console.log(res.data.data)
                     this.categories = res.data.data
                     })
                 .catch()

    }
}
</script>
