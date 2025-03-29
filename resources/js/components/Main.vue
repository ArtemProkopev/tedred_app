<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";
</script>

<template>
    <header>
        <Header />
    </header>
    <main>
      <section>
        <h1>TEDRED GAMES</h1>
        <p>TedRed is a small developer with big ambitions</p>
        <p>We make games that spark your imagination like the games you played as a kid.</p>
      </section>

      <section class="news">
        <h2>News</h2>
        <div class="news-container">
          <div class="news-item" v-for="(news, index) in newsItems" :key="index">
            <h3>{{ news.title }}</h3>
            <p>{{ news.description }}</p>
            <button @click="readMore(index)">Show all</button>
          </div>
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

<script>
export default {
  data() {
    return {
      newsItems: [
        { title: 'Title 1', description: 'Description text 1' },
        { title: 'Title 2', description: 'Description text 2' },
        { title: 'Title 3', description: 'Description text 3' },
      ],
      gameItems: [
        { title: 'Feed The Gods', description: 'Feed The Gods is a casual card game...' },
        { title: 'Feed The Gods', description: 'Feed The Gods is a casual card game...' },
        { title: 'Feed The Gods', description: 'Feed The Gods is a casual card game...' },
      ],
    };
  },
  methods: {
    readMore(index) {
      // Логика для отображения полной информации о новости
    },
    viewGame(index) {
      // Логика для перехода на страницу игры
    },
  },
};
</script>

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
}

.header {
  margin-bottom: 20px;
}

.news-container, .game-item {
  display: flex;
  justify-content: center;
  margin: 10px 0;
}

.news-item {
  background-color: #ccc;
  margin: 0 10px;
  padding: 10px;
  border-radius: 5px;
  width: 200px;
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
}
</style>