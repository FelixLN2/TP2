<template>
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'AnimalCreate' }" class="btn btn-primary btn-sm float-right mb-2">Ajouter animal</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                      
                        <th>Nom</th>
                        <th>Description</th>
            
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(animal, key) of animals">
                            <td>{{ key+1 }}</td>
                            <td>{{ animal.nom }}</td>
                            <td>{{ animal.description }}</td>
                     
                            <td>
                                <router-link class="btn btn-success btn-sm" :to="{ name: 'AnimalEdit', params: { id: animal.id } }">Modifier Animal</router-link>
                                <button class="btn btn-danger btn-sm" @click="deleteAnimal(animal.id)">Supprimer Animal</button>
                            </td>
                            <td>
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
                animals: {}
            }
        },
        created() {
            this.getAnimals();
        },
        methods: {
            getAnimals() {
              this.axios.get('http://127.0.0.1:8000/api/animal').then(response => {
                this.animals = response.data;
            }).catch(error=>{
                console.log(error)
            })
            },
            deleteAnimal(id) {
                this.axios
                    .delete(`http://127.0.0.1:8000/api/animal/${id}`)
                    .then(response => {
                        let i = this.animals.map(data => data.id).indexOf(id);
                        this.animals.splice(i, 1)
                    });
            }
        }
    }
</script>