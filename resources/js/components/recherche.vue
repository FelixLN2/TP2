<template>
    <div>
      <label>Recherche de Genre: </label>
      <input type="text" class="form-control" v-model="search" @input="fetchSuggestions" />
      <ul>
        <li v-for="suggestion in suggestions" :key="suggestion.id" @click="selectSuggestion(suggestion)">
          <router-link :to="{ name: 'genus.show', params: { id: suggestion.id } }">
            {{ suggestion.label }}
          </router-link>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        suggestions: [],
        search: '',
      };
    },
    methods: {
      fetchSuggestions() {
        const path = '/api/genus/autocomplete';
  
        axios
          .get(path, { params: { search: this.search } })
          .then((response) => {
            this.suggestions = response.data.map((item) => ({
              label: item.nom,
              id: item.id,
            }));
          })
          .catch((error) => {
            console.error('Error fetching suggestions:', error);
          });
      },
      selectSuggestion(suggestion) {
        console.log('Selected suggestion:', suggestion);
        // Navigate to Genere\show.vue with the selected suggestion's ID
        this.$router.push({ name: 'genus.show', params: { id: suggestion.id } });
      },
    },
  };
  </script>
  