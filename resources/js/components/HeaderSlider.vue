<script setup>
import { ref, defineComponent } from 'vue';
import { Carousel, Pagination, Slide } from 'vue3-carousel'
import 'vue3-carousel/dist/carousel.css'

import first from "/resources/assets/images/slider/firstslide.png";
import second from "/resources/assets/images/slider/secondslide.png";
import third from "/resources/assets/images/slider/thirdslide.png";
import four from "/resources/assets/images/slider/fourslide.png";

const images = ref([
    first,
    second,
    third,
    four,
]);

</script>

<template>
    <header class="header">
        <div class="slider-container">
            <Carousel :autoplay="2500" :wrap-around="true" :itemsToShow="1" class="header-slider"> 
                <Slide v-for="(img, index) in images" :key="index">
                    <img class="slider-img" :src="img" :alt="index">
                </Slide>
            </Carousel>
        </div>
        
        <div class="header-content">
            <section class="logoLinks">
                <div class="logo">
                    <img src="@assets/images/logo.png" alt="TedRed Games Logo" />
                </div>
                <nav class="navigation">
                    <ul>
                        <li><router-link to="/">home</router-link></li>
                        <li><router-link to="/news">news</router-link></li>
                        <li><router-link to="/team">team</router-link></li>
                        <li><router-link to="/aboutus">about us</router-link></li>
                        <li><router-link to="/contact">contact</router-link></li>
                    </ul>
                </nav>
            </section>
        </div>
        <div class="title-wrapper">
            <h1><span class="tedred">TedRed</span><span class="games">Games</span></h1>
        </div>
    </header>
</template>

<style scoped>
@font-face {
    font-family: Molot;
    src: url("@assets/fonts/Molot.woff");
}
@font-face {
    font-family: Lexend;
    src: url("@assets/fonts/LexendExa-Regular.woff");
}

.header {
    position: relative;
    width: 100%;
    min-height: 80vh;
    overflow: hidden;
}

.slider-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.header-slider {
    height: 100%;
}

.header-slider .carousel__viewport {
    height: 100%;
}

.slider-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.header-content {
    position: relative;
    z-index: 2;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    padding: 2rem 0;
}

.logoLinks {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 0 80px;
    box-sizing: border-box;
}

.title-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    width: 100%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center; 
    z-index: 10;
}

h1 {
    font-family: "Molot", sans-serif;
    text-align: center;
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    line-height: 1;
}

.tedred {
    color: #ffc851;
    font-size: clamp(4rem, 12vw, 8rem);
    text-transform: uppercase;
}

.games {
    color: white;
    font-size: clamp(3rem, 9vw, 6rem);
    text-transform: uppercase;
    letter-spacing: 0.1em;
}

.logo {
    display: flex;
    align-items: center;
}

.logo img {
    width: 50px;
    height: auto;
    margin-right: 10px;
    filter: brightness(100%);
}

.navigation {
    padding: 20px;
}

.navigation ul {
    list-style: none;
    display: flex;
    gap: 20px;
    margin: 0;
    padding: 0;
    font-family: Lexend;
}

.navigation a {
    text-decoration: none;
    color: white;
    font-family: Lexend;
    transition: color 0.3s;
    font-size: clamp(10px, 2vw, 12px);
}

.navigation a:hover {
    color: #ffc851;
}

*, *::before, *::after {
    box-sizing: border-box;
}

@media (max-width: 768px) {
    .logoLinks {
        padding: 0 40px;
    }
    .header {
        height: 60vh;
    }
}

@media (max-width: 640px) {
    .logo {
        display: none;
    }
    
    .logoLinks {
        padding: 0 20px;
        justify-content: center;
    }
    
    .navigation ul {
        gap: 15px;
    }
    
    .tedred {
        font-size: clamp(3rem, 10vw, 5rem);
    }
    
    .games {
        font-size: clamp(2.5rem, 8vw, 4.5rem);
    }
}

@media (max-width: 480px) {
    .header {
        min-height: 60vh;
    }
    
    .navigation ul {
        gap: 10px;
    }
    
    .tedred {
        letter-spacing: 0.05em;
    }
    
    .games {
        letter-spacing: 0.1em;
    }
}
</style>