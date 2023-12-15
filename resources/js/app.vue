<template>
    <div class="container">
      
                <Navbar></Navbar>
                  
                    
        
            
        <router-view> </router-view>
    </div>
</template>
<script>
    import Navbar from './components/navbar.vue';

export default {
  components: {
    Navbar,
  },
};
</script>