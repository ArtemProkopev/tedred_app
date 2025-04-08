<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";
</script>

<template>
    <header>
        <Header />
    </header>

    <main>
        <div class="cards-container">
            <div 
                v-for="(card, index) in cards" 
                :key="index" 
                class="card"
            >
                <div class="card-header">
                    <div class="avatar-circle" :style="{ backgroundImage: `url(${card.avatar})` }"></div>
                    <div class="name-role">
                        <h3>{{ card.firstName }} {{ card.lastName }}</h3>
                        <p class="role">{{ card.role }}</p>
                    </div>
                </div>
                
                <div class="card-content">
                    <p>{{ card.description }}</p>
                </div>
                
                <div class="card-footer">
                    <p class="favorite-games-label">Favorite games:</p>
                    <p>{{ card.favoriteGames }}</p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <Footer />
    </footer>
</template>

<script>
import avatar1 from "/resources/assets/images/avatars/avatar1.png";
import avatar2 from "/resources/assets/images/avatars/avatar2.png";
import avatar3 from "/resources/assets/images/avatars/avatar3.png";
import avatar4 from "/resources/assets/images/avatars/avatar4.png";

export default {
  data() {
    return {
      cards: [
        {
          firstName: "John",
          lastName: "Doe",
          role: "Frontend Developer",
          description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
          favoriteGames: "The Witcher 3, Cyberpunk 2077, GTA V",
          avatar: avatar1
        },
        {
          firstName: "Jane",
          lastName: "Smith",
          role: "UI/UX Designer",
          description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
          favoriteGames: "Animal Crossing, Stardew Valley, Minecraft",
          avatar: avatar2
        },
        {
          firstName: "Mike",
          lastName: "Johnson",
          role: "Backend Developer",
          description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
          favoriteGames: "Dark Souls, Elden Ring, Sekiro",
          avatar: avatar3
        },
        {
          firstName: "Sarah",
          lastName: "Williams",
          role: "Project Manager",
          description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
          favoriteGames: "The Sims 4, Cities: Skylines, Civilization VI",
          avatar: avatar4
        }
      ]
    }
  }
}
</script>

<style scoped>
@font-face {
    font-family: Molot;
    src: url("@assets/fonts/Molot.woff");
}

@font-face {
    font-family: Lexend;
    src: url("@assets/fonts/LexendExa-Regular.woff");
}

.cards-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 50px;
  max-width: 1200px;
  margin: 0 auto;
  padding: 100px;
}

.card {
  position: relative; /* Добавлено для корректного позиционирования псевдоэлемента */
  background: white;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 25px;
  display: flex;
  flex-direction: column;
  aspect-ratio: 436/519; /* Maintain original proportion */
  transition: transform 0.2s;
  margin: 0 auto;
  background-image: url('@assets/images/news/cardback.jpg');
  background-size: cover; 
  background-position: center;
}

.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.685); 
    z-index: 1; 
}

.card > * {
    position: relative; 
    z-index: 2; 
}

.card-header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.avatar-circle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background-color: #e0e0e0;
    background-size: cover; /* Обеспечивает правильное отображение изображения */
    background-position: center; /* Центрирует изображение */
    margin-right: 15px;
}

.name-role h3 {
    margin: 0;
    font-size: 1.2rem;
    color: white;
    font-family: Molot;
    letter-spacing: 0.1rem;
}

.role {
    margin: 5px 0 0;
    font-size: 12px;
    color: #B0B0B0;
    font-family: Lexend;
}

.card-content {
    flex-grow: 1;
    margin-bottom: 20px;
    color: #B0B0B0;
    line-height: 1.5;
    font-family: Lexend;
    font-size: 13px;
}

.card-footer {
    margin-top: auto;
    color: #B0B0B0;
    font-family: Lexend;
    font-size: 12px;
}

.favorite-games-label {
    font-weight: bold;
    margin-bottom: 8px;
    color: white;
    font-family: Molot;
    letter-spacing: 0.1rem;
    font-size: 20px;
}

ul {
    padding-left: 20px;
    margin: 0;
    color: #B0B0B0;
    font-family: Lexend;
}

li {
    margin-bottom: 5px;
}

/* Responsive adjustments */
@media (min-width: 768px) {
    .cards-container {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .card {
        min-height: 0; /* Allow cards to shrink */
    }
}

@media (min-width: 1200px) {
    .card {
        max-width: 436px;
        max-height: 519px;
    }
}
</style>


   
