<template>
    <div id="transactions">
        <Row v-for="log in logs" :key="log.id" :name="log.name" :data="log.data"/>
    </div>
</template>

<script>
import Row from "./Row.vue"
export default {
    computed: {
        logs() {
            return axios.get('/api/transactions')
        },
    },
    components: {
        Row,
    },
}
</script>

<style scoped>
#transactions { 
    
}
</style>