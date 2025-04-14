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

main {
  flex: 1;
}

footer {
  position: relative;
  width: 100%;
}

.cards-container {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
  box-sizing: border-box;
  min-height: calc(100vh - 200px);
}

.card {
  position: relative;
  background: white;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 15px;
  display: flex;
  flex-direction: column;
  aspect-ratio: 1/1.1;
  transition: transform 0.2s;
  background-image: url('@assets/images/news/cardback.jpg');
  background-size: cover; 
  background-position: center;
  width: 100%;
  box-sizing: border-box;
  max-height: 400px;
  overflow: hidden;
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
    margin-bottom: 10px;
}

.avatar-circle {
    width: 45px;
    height: 45px;
    min-width: 45px;
    border-radius: 50%;
    background-color: #e0e0e0;
    background-size: cover;
    background-position: center;
    margin-right: 12px;
}

.name-role h3 {
    margin: 0;
    font-size: 1rem;
    color: white;
    font-family: Molot;
    letter-spacing: 0.1rem;
    word-break: break-word;
}

.role {
    margin: 3px 0 0;
    font-size: 0.7rem;
    color: #B0B0B0;
    font-family: Lexend;
}

.card-content {
    flex-grow: 1;
    margin-bottom: 10px;
    color: #B0B0B0;
    line-height: 1.4;
    font-family: Lexend;
    font-size: 0.75rem;
    overflow-y: auto;
    word-break: break-word;
    padding-right: 5px;
}

.card-content::-webkit-scrollbar {
    width: 4px;
}

.card-content::-webkit-scrollbar-track {
    background: transparent;
}

.card-content::-webkit-scrollbar-thumb {
    background: #555;
    border-radius: 2px;
}

.card-content::-webkit-scrollbar-thumb:hover {
    background: #888;
}

.card-footer {
    margin-top: auto;
    color: #B0B0B0;
    font-family: Lexend;
    font-size: 0.7rem;
    padding-top: 8px;
}

.favorite-games-label {
    font-weight: bold;
    margin-bottom: 3px;
    color: white;
    font-family: Molot;
    letter-spacing: 0.1rem;
    font-size: 0.9rem;
}

@media (max-width: 767px) {
    .cards-container {
        grid-template-columns: 1fr;
        padding: 15px;
        gap: 15px;
    }
    
    .card {
        padding: 12px;
        aspect-ratio: unset;
        height: auto;
        min-height: 200px;
        max-height: none;
    }
    
    .avatar-circle {
        width: 40px;
        height: 40px;
        min-width: 40px;
    }
}

@media (min-width: 768px) and (max-width: 1199px) {
  .cards-container {
    max-width: 800px;
  }
}

@media (min-width: 1200px) {
    .cards-container {
        padding: 30px;
        gap: 30px;
    }
}

@media (hover: hover) {
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
}
</style>