<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse">
        <div class="navbar-nav">
            <router-link :to="{ name: 'genus.index' }"  class="nav-item nav-link">Genres</router-link>
            <router-link :to="{ name: 'login' }" class="nav-item nav-link">Login</router-link>
            <router-link :to="{ name: 'register' }" class="nav-item nav-link">Register</router-link>
  
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {};
</script>
