<template>
    <div>
        <keep-alive>
            <p>test</p>
        </keep-alive>
        <!-- <router-view /> -->
    </div>
</template>

<script>
  import Dashboard from './Dashboard.vue'
export default{
    components:{
      Dashboard
    }
  }

</script>