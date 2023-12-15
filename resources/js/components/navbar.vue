<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse">
        <div class="navbar-nav">
            <router-link :to="{ name: 'genus.index' }"  class="nav-item nav-link">Genres</router-link><br />
            <router-link :to="{ name: 'apropos' }" class="nav-item nav-link">À propos</router-link><br />
            <router-link :to="{ name: 'recherche' }" class="nav-item nav-link">Autocomplétion</router-link><br />
            <!-- <router-link :to="{ name: 'login' }" class="nav-item nav-link">Connexion</router-link><br />
            <router-link :to="{ name: 'register' }" class="nav-item nav-link">Inscription</router-link><br /> -->
  
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {};
</script>
