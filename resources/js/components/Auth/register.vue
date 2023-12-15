<template>
  <div class="container">
    <h2>{!! __('messages.register') !!}</h2>
    <form @submit.prevent="register">
      <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{!! __('messages.name') !!}</label>
        <div class="col-md-6">
          <input id="name" type="text" v-model="name" class="form-control" required>
        </div>
      </div>

      <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{!! __('messages.email') !!}</label>
        <div class="col-md-6">
          <input id="email" type="email" v-model="email" class="form-control" required>
        </div>
      </div>

      <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{!! __('messages.password') !!}</label>
        <div class="col-md-6">
          <input id="password" type="password" v-model="password" class="form-control" required>
        </div>
      </div>

      <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">{!! __('messages.register') !!}</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
    };
  },
  methods: {
    async register() {
      try {
        const response = await axios.post('/api/register', {
          name: this.name,
          email: this.email,
          password: this.password,
        });

        // Handle successful registration here
        console.log(response.data);

        // Optionally, you can redirect to another page after registration
        // this.$router.push({ name: 'dashboard' });

      } catch (error) {
        // Handle registration error, e.g., display error messages
        console.error('Registration error:', error.response.data.errors);
      }
    },
  },
};
</script>
