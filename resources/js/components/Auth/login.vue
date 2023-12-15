<template>
  <div class="container">
    <h2>Login</h2>
    
    <form @submit.prevent="login">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    async login() {
      try {
        const response = await axios.post('/api/login', {
          email: this.email,
          password: this.password,
        });

        // Handle successful login
        console.log(response.data);

        // Optionally, you can redirect to another page after login
        this.$router.push({ name: 'dashboard' });

      } catch (error) {
        // Handle login error, e.g., display error messages
        console.error('Login error:', error.response.data.errors);
      }
    },
  },
};
</script>
