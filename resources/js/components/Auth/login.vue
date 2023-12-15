<template>
  <div class="container">
    <h2>Connexion</h2>
    
    <form @submit.prevent="login">
    
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" id="email" v-model="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" v-model="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>


    
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    login() {
      // Implement your login logic here
      // Example: You might make an API request to your server
      // using Axios or another HTTP library to authenticate the user.

      // After successful login, you might store user information in local storage
      // and redirect to another page.
      
      // For demonstration purposes, let's assume a successful login and redirection.
      localStorage.setItem('user', JSON.stringify({ name: 'John Doe', email: this.email }));
      this.$router.push({ name: 'dashboard' }); // Replace 'dashboard' with your desired route name
    },
  },
};
</script>

