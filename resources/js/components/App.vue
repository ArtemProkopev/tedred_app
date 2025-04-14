<script setup>
import { RouterView } from "vue-router";
</script>

<template>
    <div>
        <main>
            <RouterView />
        </main>
    </div>
</template>

<style scoped>
main {
    background-position: left center; 
    display: block;
    min-height: 100vh;
    background-color: black;
    background-image: url("@assets/images/back.png");
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: left center;
    background-size: cover;
}

@media (min-aspect-ratio: 16/9) {
    main {
        background-position: center center;
    }
}

@media (max-width: 768px) {
    main {
        background-size: 150% auto;
        background-position: left center;
    }
}
</style>
