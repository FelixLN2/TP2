<template>
  <div class="container">
    <h2 class="text-center">Genres</h2>
    <div class="row">
      <div class="col-md-12">
        <router-link :to="{ name: 'genus.create' }" class="btn btn-primary btn-sm float-right mb-2">Ajouter Genre</router-link>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nom</th>
              <th>Description</th>
  
            </tr>
          </thead>
          <tbody>
            <tr v-for="(genus, index) in genera" :key="genus.id">
              <td>{{ genus.id }}</td>
                <router-link :to="{ name: 'genus.show', params: { id: genus.id } }">{{ genus.nom }}</router-link>
              <td>{{ genus.description }}</td>
              <td>
                <router-link class="btn btn-success btn-sm" :to="{ name: 'genus.edit', params: { id: genus.id } }">Modifier</router-link>
                <button class="btn btn-danger btn-sm" @click="deleteGenus(genus.id)">Supprimer</button>
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
            messages: {},
            genera: []
        }
    },
    mounted() {
    axios.get('../../../lang/fr/messages.php')
      .then(response => {
        this.messages = response.data;
      })
    },
    created() {
       this.axios
            .get('http://localhost:8000/api/genera/')
            .then(response => {
                this.genera = response.data;
            })
            .catch(error => {
                console.log(error);
            });
    },
    methods: {
        deleteGenus(id) {
            this.axios.delete(`http://127.0.0.1:8000/api/genera/${id}`)
                .then(response => {
                    let i = this.genera.map(data => data.id).indexOf(id);
                    this.genera.splice(i, 1);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>