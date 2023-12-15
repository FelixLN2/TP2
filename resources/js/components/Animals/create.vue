<template>
    <div class="container">
        <h2 class="text-center">{!! __('messages.title') !!}</h2>
        <div class="row">
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label>{!! __('messages.addname') !!}</label>
                        <input type="text" class="form-control" v-model="animal.nom">
                    </div>
                    <div class="form-group">
                        <label>{!! __('messages.adddescription') !!}</label>
                        <textarea type="text" rows="5" class="form-control" v-model="animal.description"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">{!! __('messages.upload') !!}</label>
                        <input type="file" name="image" class="form-control-file" @change="handleFileChange">
                    </div>

                    <input type="hidden" name="genus_id" v-model="animal.genus_id">
                    <button type="button" class="btn btn-primary" @click="createAnimal()">{!! __('messages.addanimal') !!}</button>
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
                    genus_id: this.$route.params.id,
                    image: null, 
                },
            }
        },
        methods: {
    createAnimal() {
      const formData = new FormData();
      formData.append('nom', this.animal.nom);
      formData.append('description', this.animal.description);
      formData.append('genus_id', this.animal.genus_id);
      formData.append('image', this.animal.image);
      
    if (this.animal.image) {
        formData.append('image', this.animal.image, this.animal.image.name);
    }
      this.axios
        .post('http://127.0.0.1:8000/api/animals', formData, {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        })
        .then((response) => {
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