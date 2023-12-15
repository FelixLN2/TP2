<template>
    <div class="container">
        <h2 class="text-center">{!! __('messages.modifygenus') !!} {{ genus.nom }}</h2>
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
                        <input type="text" class="form-control" v-model="genus.nom">
                    </div>
                    <div class="form-group">
                        <label>{!! __('messages.description') !!}</label>
                        <textarea type="text" rows="5" class="form-control" v-model="genus.description"></textarea>
                    </div>
                    
                    <button type="button" class="btn btn-primary" @click="updateGenus()"> {!! __('messages.modifygenus') !!} </button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
  data() {
    return {
      genus: {
        nom: '',
        description: '',
        user_id: '',
      },
    };
  },
  created() {
    // Fetch genus data when the component is created
    this.fetchGenus();
  },
  methods: {
    fetchGenus() {
      // Use the route parameter to get the genus ID
      const genusId = this.$route.params.id;

      // Make an API request to get the current data of the genus
      this.axios
        .get(`http://127.0.0.1:8000/api/genera/${genusId}`)
        .then((response) => {
          // Set the fetched data to the component's data
          console.log('Server response:', response.data);
          this.genus = response.data;
        })
        .catch((error) => {
          console.error('Error fetching genus:', error);
        });
    },

    updateGenus() {
      const formData = new FormData();
      formData.append('nom', this.genus.nom);
      formData.append('description', this.genus.description);

      // Use the route parameter to get the genus ID
      const genusId = this.$route.params.id;

      console.log('Genus Data:', this.genus);
     this.axios
    .patch(`http://127.0.0.1:8000/api/genera/edit/${genusId}`, this.genus)
    .then((response) => {
        console.log('Server response:', response.data);
      this.$router.push({ name: 'genus.index' });
    })
    .catch((error) => {
      console.log(error);
    });
    },
  },
};
</script>