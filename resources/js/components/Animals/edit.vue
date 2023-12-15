<template>
    <div class="container">
        <h2 class="text-center">{!! __('messages.modifyanimal') !!} {{ animal.nom }}</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'genus.index' }" class="btn btn-primary btn-sm float-right mb-2">{!! __('messages.back') !!}</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label>{!! __('messages.addname') !!}</label>
                        <input type="text" class="form-control" v-model="animal.nom">
                    </div>
                    <div class="form-group">
                        <label>{!! __('messages.description') !!}</label>
                        <textarea type="text" rows="5" class="form-control" v-model="animal.description"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">{!! __('messages.upload') !!}</label>
                        <input type="file" name="image" class="form-control-file" @change="handleFileChange">
                    </div> 
                    <button type="button" class="btn btn-primary" @click="updateAnimal()"> {!! __('messages.modifyanimal') !!} </button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                animal: {
                    nom: '',
                    description: '',
                    genus_id: '',
                    image: null, 
                    user_id:1,
                
                },

            };
        },

  created() {
    // Fetch genus data when the component is created
    this.fetchAnimal();
  },
  methods: {
    fetchAnimal() {

      const animalId = this.$route.params.id;


      this.axios
        .get(`http://127.0.0.1:8000/api/animals/${animalId}`)
        .then((response) => {
          // Set the fetched data to the component's data
          console.log('Server response:', response.data);
          this.animal = response.data;
       
        })
        .catch((error) => {
          console.error('Error fetching animal:', error);
        });
    },
           
    updateAnimal() {
        const formData = new FormData();
        formData.append('nom', this.animal.nom);
        formData.append('description', this.animal.description);
        formData.append('genus_id', this.$route.query.id);
        formData.append('user_id', this.animal.user_id);
        if (this.animal.image) {
        formData.append('image', this.animal.image);
        }

        
        const animalId = this.$route.params.id;

        console.log('Animal Data:', this.animal);
        console.log('Form Data:', formData);

        this.axios
            .post(`http://127.0.0.1:8000/api/animals/edit/${animalId}`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            })
            .then((response) => {
                console.log('Server response:', response.data);
                this.$router.push({ name: 'genus.index' });
            })
        .catch((error) => {
          console.log(error);
        });
    },
    handleFileChange(event) {
      const file = event.target.files[0];
      this.animal.image = file;
    },
  },
};
</script>