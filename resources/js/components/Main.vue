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
    image: '@/assets/images/main/title1.png'
  },  
  { 
    title: 'Feed The Gods Release Date',
    description: 'The Ancient One stir, hungry for devotion and sacrifi...',
    image: '@/assets/images/main/title1.png'
  },
  {
    title: 'Dev Diary #4 - Release Date and future plans!',
    description: 'Wow, Its been a long time since we have been in tou...',
    image: '@/assets/images/main/title1.png'
  },
  {
     title: 'The Playtests starts!', 
     description: 'Visit the Feed The Gods Steam store page starting today...',
     image: '@/assets/images/main/title1.png'
  },
  {
    title: 'Play FEED THE GODS on Steam Next Fest!',
    description: 'The demo version of our chaotic party card battler Feed The Gods...',
    image: '@/assets/images/main/title1.png'
  },
]);


const gameItems = ref([
  {
    title: 'Feed The Gods',
    description: 'Feed The Gods is a casual card battler for 2-6 players. In this chaotic game, you and your friends will use powerful cards to win.',
    image: '@assets/images/main/gameimg.png'
  },
  {
    title: 'The Secret Ties of Strandcliff',
    description: 'A detective game where you have to play with information while being a successful ram. Communicate with visitors to your establishment, eavesdrop on their conversations, collect information.',
    image: '@assets/images/main/gameimg.png'
  },
  {
    title: 'Feed The Gods',
    description: 'Feed The Gods is a casual card battler for 2-6 players. In this chaotic game, you and your friends will use powerful cards to win.',
    image: '@assets/images/main/gameimg.png'
  },
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
        arrows: 'splide__arrows custom-arrows',
        arrow: 'splide__arrow custom-arrow',
        prev: 'splide__arrow--prev custom-prev',
        next: 'splide__arrow--next custom-next',
      },
      breakpoints: {
        640: {
          height: '6rem',
        },
      },
    }).mount();
  }
});
</script>

<template>
  <header>
    <Header />
  </header>
  <main>
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
            <h3 class="splideTitle">{{ item.title }}</h3>
            <p class="splideDescription">{{ item.description }}</p>
          </li>
        </ul>
      </div>
    </section>

    <section class="games">
    <h2 class="titleText">Our <span>games</span></h2>
    <div class="game-item" v-for="(game, index) in gameItems" :key="index">
      <div class="game-content">
        <div class="game-image">
          <img :src="game.image" alt="Game Image">
        </div>
        <div class="game-text">
          <h3 class="gamesTitle">{{ game.title }}</h3>
          <p class="gamesDescription">{{ game.description }}</p>
          <p class="available">Available on</p>
        </div>
      </div>
      <button @click="viewGame(index)" class="pageButton">Game page</button>
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
  height: 400px;
  display: flex;
  flex-direction: column;
  position: relative;
}

.game-content {
  display: flex;
  flex: 1;
}

.game-image {
  width: 240px;
  height: 80%;
  background-color: #bbb;
  margin-right: 10px; 
}

.game-text {
  flex: 1; 
}

.pageButton {
  position: absolute;
  bottom: 10px;
  right: 10px;
}

.games {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  gap: 50px;
  margin-top: 100px;
}

.games span {
  color: #FFC851;
}

.gamesTitle {
  font-family: Molot;
  font-size: 36px;
  letter-spacing: 0.1rem;
}

.gamesDescription {
  font-size: 15px;
  color: #BAB8B8;
}


.splide {
  position: relative;
  margin: 20px auto;
  max-width: 1000px; 
  margin-top: 100px;
}

.splide__slide {
  background: rgba(0, 0, 0, 0.8);
  padding: 20px; 
  color: white;
  text-align: center;
  transition: transform 0.3s;
  max-width: 500px;
}

.splide__slide:hover {
  transform: scale(1.05);
}

.splide__slide img {
  width: 100%;
  border-radius: 10px; 
  margin-bottom: 10px; 
}

.custom-arrow {
  background: transparent;
  border: none;
  transform: translateY(-50%);
}

.custom-prev {
  left: -100px !important;
}

.custom-next {
  right: -100px !important; 
}

.splide__arrow--prev {
  left: 0;
}

.splide__arrow--next {
  right: 0;
}

.splideTitle {
  font-family: Molot;
  font-size: 20px;
  letter-spacing: 0.1rem;
}

.splideDescription {
  font-size: 14px;
  color: #8E8E8E;
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
