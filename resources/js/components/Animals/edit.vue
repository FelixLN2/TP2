<template>
    <div class="container">
        <h2 class="text-center">{!! __('messages.modifyanimal') !!} {{ animal.nom }}</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'AnimalIndex' }" class="btn btn-primary btn-sm float-right mb-2">{!! __('messages.back') !!}</router-link>
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
                    image:'',
                
                }

            }
        },
        mounted() {
           
        },
        methods: {
           
            updateAnimal() {
                this.axios
                    .patch(`http://127.0.0.1:8000/api/animals/${this.$route.params.id}`, this.animal)
                    .then((response) => {
                        this.$router.push({ name: 'genus.show' });
                    });
            },
    handleFileChange(event) {
      // Access the file from the event
      const file = event.target.files[0];
      // Do something with the file, e.g., set it in your data property
      this.animal.image = file;
    },
  },
};
</script>