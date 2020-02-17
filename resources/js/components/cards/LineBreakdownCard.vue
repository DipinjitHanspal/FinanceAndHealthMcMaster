<template>
    <div>
        <HorizontalStackedBar :arr="this.arr"/>
    </div>
</template>

<script>
    import HorizontalStackedBar from "../graphs/HorizontalStackedBar.vue"
    export default {
        props: {
            arr: {
                type: Array
            },
        },
        components: {
            HorizontalStackedBar,
        },
        created () {
            console.log(this.arr);
        },
    }
</script>

<style lang="scss" scoped>

</style>