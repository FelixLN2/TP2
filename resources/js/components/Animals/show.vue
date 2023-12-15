<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>{{ animal.nom }}</h1>
        <p class="lead">{{ animal.description }}</p>

   
        <div v-if="animal.image">
          <div class="mt-3">
            <label for="animal-image">Image:</label>
            <img :src="getAnimalImageUrl(animal.image)" alt="Animal Image" id="animal-image" class="img-thumbnail">
          </div>
        </div>


         <div class="buttons">
          <router-link :to="{ name: 'animal.edit', params: { id: animal.id } }" class="btn btn-info">
            {!! __('messages.modify') !!}
          </router-link>
          <button @click="deleteAnimal" class="btn btn-danger">
            {!! __('messages.delete') !!}
          </button>
        </div>

         
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      animal: {},
    };
  },
  mounted() {
    this.loadAnimal();
  },
  methods: {
    loadAnimal() {
      const animalId = this.$route.params.id;
      this.axios.get(`http://127.0.0.1:8000/api/animals/${animalId}`).then((response) => {
        this.animal = response.data;
      });
    },
    deleteAnimal() {
      const animalId = this.$route.params.id;
      this.axios.delete(`http://127.0.0.1:8000/api/animals/${animalId}`).then(() => {
 
        this.$router.push({ name: 'genus.index' });
      });
    },
    getAnimalImageUrl(imageFileName) {

      return `http://127.0.0.1:8000/images/upload/${imageFileName}`;
    },
  },
};
</script>
