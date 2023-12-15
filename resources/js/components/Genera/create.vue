<template>
    <div class="container">
        <h2 class="text-center">{!! __('messages.title') !!}</h2>
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
                        <label>{!! __('messages.adddescription') !!}</label>
                        <textarea type="text" rows="5" class="form-control" v-model="genus.description"></textarea>
                    </div>
                 

                    
                    <button type="button" class="btn btn-primary" @click="createGenus()">{!! __('messages.addgenus') !!}</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script> 
    export default {
        data() {
            return {
                genus: {},
            }
        },
        methods: {
        createGenus() {
    this.axios
        .post('http://127.0.0.1:8000/api/genera/create', this.genus)
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