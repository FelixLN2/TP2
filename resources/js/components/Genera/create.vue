<template>
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'genus.index' }" class="btn btn-primary btn-sm float-right mb-2">Retour</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label>Ajouter nom :</label>
                        <input type="text" class="form-control" v-model="genus.nom">
                    </div>
                    <div class="form-group">
                        <label>Ajouter description :</label>
                        <textarea type="text" rows="5" class="form-control" v-model="genus.description"></textarea>
                    </div>
                 

                    
                    <button type="button" class="btn btn-primary" @click="createGenus()">Ajouter Genre</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script> 
    export default {
        data() {
            return {
                genus: {nom:'',
                        description:'',
                        user_id:1,
            },
            }
        },
        methods: {
        createGenus() {
            const formData = new FormData();
      formData.append('nom', this.genus.nom);
      formData.append('description', this.genus.description);
      formData.append('user_id', this.genus.user_id);

    this.axios
        .post('http://127.0.0.1:8000/api/genera/create', formData)
        .then((response) => {
        this.$router.push({ name: 'genus.index' });
        })
        .catch((error) => {
        console.log(error);
        });
    },

  },
};
</script>