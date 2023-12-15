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
      
      },
            }
        },
        mounted() {
            
        },
        methods: {
           
            updateGenus() {
                this.axios
                    .patch(`http://127.0.0.1:8000/api/genera/${id}`, this.genus)
                    .then((response) => {
                        this.$router.push({ name: 'genus.index' });
                    });
            },
  
  },
};
</script>