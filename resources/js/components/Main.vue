<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";
import { ref, onMounted } from 'vue';
import { Splide } from '@splidejs/splide';
import '@splidejs/splide/dist/css/splide.min.css';

const newsItems = ref([
  { 
    title: 'Feed The Gods out now!',
    description: 'This day has finally come. Rise to greatness in Feed The G...',
    image: '@/assets/images/main/gamescard/title1.png'
  },  
  { 
    title: 'Feed The Gods Release Date',
    description: 'The Ancient One stir, hungry for devotion and sacrifi...',
    image: '@/assets/images/main/gamescard/title1.png'
  },
  {
    title: 'Dev Diary #4 - Release Date and future plans!',
    description: 'Wow, Its been a long time since we have been in tou...',
    image: '@/assets/images/main/gamescard/title1.png'
  },
  {
     title: 'The Playtests starts!', 
     description: 'Visit the Feed The Gods Steam store page starting today...',
     image: '@/assets/images/main/gamescard/title1.png'
  },
  {
    title: 'Play FEED THE GODS on Steam Next Fest!',
    description: 'The demo version of our chaotic party card battler Feed The Gods...',
    image: '@/assets/images/main/gamescard/title1.png'
  },
]);


const gameItems = ref([
  { title: 'Feed The Gods', description: 'Feed The Gods is a casual card game...' },
  { title: 'Feed The Gods', description: 'Feed The Gods is a casual card game...' },
  { title: 'Feed The Gods', description: 'Feed The Gods is a casual card game...' },
]);

onMounted(() => {
  const splideElement = document.querySelector('.splide');
  if (splideElement) {
    new Splide(splideElement, {
      type: 'loop',
      height: '9rem',
      trimSpace: 'move',
      perPage: 3,
      start: 0, 
      pagination: false,
      classes: {
        pagination: 'splide__pagination your-class-pagination',
        page: 'splide__pagination__page your-class-page',
      },
      breakpoints: {
        640: {
          height: '6rem',
        },
      },
    }).mount();
  } else {
    console.error('[splide] .splide element not found.');
  }
});
</script>

<template>
  <header>
    <Header />
  </header>
  <main>

    <h1>В ПРОЦЕССЕ</h1>
    <section class="mainTitleBlock">
      <section class="title-wrapper">
        <p class="quote quote-left">"</p>
        <div class="title-content">
          <p class="mainTitleText"><span>TedRed</span> is a small developer with big ambitions</p>
          <p class="supportMainTitleText">We make games that spark your imagination like the games you played as a kid.</p>
        </div>
        <p class="quote quote-right">"</p>
      </section>
    </section>


    <p class="titleText">News</p>
    <section class="splide" aria-label="Slide Container Example">
      <div class="splide__track">
        <ul class="splide__list">
          <li class="splide__slide" v-for="(item, index) in newsItems" :key="index">
            <div class="splide__slide__container">
              <img :src="item.image" alt="News Image">
            </div>
            <h3>{{ item.title }}</h3>
            <p>{{ item.description }}</p>
          </li>
        </ul>
      </div>
    </section>

    <section class="games">
      <h2>Our games</h2>
      <div class="game-item" v-for="(game, index) in gameItems" :key="index">
        <div class="game-image"></div>
        <h3>{{ game.title }}</h3>
        <p>{{ game.description }}</p>
        <p>Available on</p>
        <button @click="viewGame(index)">Game page</button>
      </div>
    </section>
  </main>

  <footer>
    <Footer />
  </footer>  
</template>

<style scoped>
@font-face {
    font-family: Lexend;
    src: url("@assets/fonts/LexendExa-Regular.woff");
}
@font-face {
    font-family: Molot;
    src: url("@assets/fonts/Molot.woff");
}

main {
    display: block;
    font-family: Lexend;
    color: white;
}

.mainTitleBlock {
  text-align: center;
  margin-top: 8%;
  position: relative;
}

.title-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 20px;
}

.mainTitleBlock .mainTitleText {
  font-size: 2.7rem;
  font-family: Molot;
  margin: 0;
}

.mainTitleBlock .mainTitleText span {
  color: #FFC851;
}

.mainTitleBlock .supportMainTitleText {
  font-size: 1.2rem;
  color: #8F8F8F;
}

.quote {
  font-size: 128px; 
  color: #AFAFAF;
  line-height: 0.5;
  margin: 0;
}

.quote-left {
  float: left;
  margin-right: 10px;
  margin-bottom: 50px;
}

.quote-right {
  float: right;
  margin-left: 10px; 
  margin-top: 100px;
}

.titleText {
  font-family: Molot;
  font-size: 64px;
  text-align: center;
}

.news-container {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 10px 0;
}

.news-items {
  display: flex;
}

.news-item {
  background-color: #ccc;
  margin: 0 10px;
  padding: 10px;
  border-radius: 5px;
  width: 200px;
  text-align: center;
}

.game-item {
  background-color: #ccc;
  margin: 0 10px;
  padding: 10px;
  border-radius: 5px;
  width: 60%;

  height: 300px;
}

.game-image {
  height: 100px;
  background-color: #bbb;
  margin-bottom: 10px;
}

.games {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  gap: 50px;
  margin-top: 100px;
}

.splide {
  margin: 20px auto;
  max-width: 800px; 
  margin-top: 100px;
}

.splide__slide {
  background: rgba(0, 0, 0, 0.8);
  padding: 20px; 
  color: white;
  text-align: center;
  transition: transform 0.3s;
}

.splide__slide:hover {
  transform: scale(1.05);
}

.splide__slide img {
  width: 100%;
  border-radius: 10px; 
  margin-bottom: 10px; 
}

.splide__arrow {
  color: white;
  border: none;
  width: 40px;
  height: 40px;
  display: flex; 
  align-items: center;
  justify-content: center; 
  padding: 60px;
}

.splide__arrow:hover {
  background: rgba(255, 255, 255, 0.8);
}

@media (max-width: 768px) {
  .quote {
    font-size: 64px;
  }
  
  .title-wrapper {
    gap: 10px;
  }
}
</style>
