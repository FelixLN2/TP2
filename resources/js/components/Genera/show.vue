<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>{{ genus.nom }}</h1>
        <p class="lead">{{ genus.description }}</p>

        <div class="buttons">
          <router-link :to="{ name: 'genus.edit', params: { id: genus.id } }" class="btn btn-info">
            Modifier
          </router-link><br />
          <button @click="deleteGenus" class="btn btn-danger">
            Supprimer
          </button>
        </div>

        <router-link :to="{ name: 'animal.create', query: { id: genus.id } }" class="btn btn-info">
          Ajouter Animal
        </router-link><br />

<h2>Animaux de genreId {{ genusId }}</h2>

    
    <ul>
      <li v-for="animal in animals" :key="animal.id"  v-if="animal.genus_id == genusId" >
         <router-link :to="{ name: 'animal.show', params: { id: animal.id } }">
              {{ animal.nom }} - {{ animal.description }}
            </router-link>   
      </li>
    </ul>
       

        
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      genus: {},
      genusId: null,
      animals:[],
      
    };
  },
  created() {
    this.fetchGenus();
    this.fetchAnimals();
    this.genusId = this.$route.params.id;
  },
  methods: {
    fetchGenus() {
      const id = this.$route.params.id;
      this.axios
        .get(`http://127.0.0.1:8000/api/genera/${id}`)
        .then((response) => {
          this.genus = response.data;
        })
        .catch((error) => {
          console.error('Error fetching genus:', error);
        });
    },
    deleteGenus() {
      const id = this.genus.id;
      this.axios
        .delete(`http://127.0.0.1:8000/api/genera/${id}`)
        .then(() => {
          // Redirect to the index page after deletion
          this.$router.push({ name: 'genus.index' });
        })
        .catch((error) => {
          console.error('Error deleting genus:', error);
        });
    },
    fetchAnimals() {
    const genusId = this.genusId;
    this.axios
      .get(`http://127.0.0.1:8000/api/animals`)
      .then((response) => {
        this.animals = response.data;
      })
      .catch((error) => {
        console.error('Error fetching animals:', error);
      });
  },
  },
};
</script>


