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
                v-bind:key="index" 
                class="card"
            >
                <div class="card-header">
                    <div class="avatar-circle"></div>
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
                    <ul>
                        <li v-for="(game, gameIndex) in card.favoriteGames" v-bind:key="gameIndex">
                            {{ game }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <Footer />
    </footer>
</template>

<script>
export default {
  data() {
    return {
      cards: [
        {
          firstName: "John",
          lastName: "Doe",
          role: "Frontend Developer",
          description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
          favoriteGames: ["The Witcher 3", "Cyberpunk 2077", "GTA V"]
        },
        {
          firstName: "Jane",
          lastName: "Smith",
          role: "UI/UX Designer",
          description: "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
          favoriteGames: ["Animal Crossing", "Stardew Valley", "Minecraft"]
        },
        {
          firstName: "Mike",
          lastName: "Johnson",
          role: "Backend Developer",
          description: "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
          favoriteGames: ["Dark Souls", "Elden Ring", "Sekiro"]
        },
        {
          firstName: "Sarah",
          lastName: "Williams",
          role: "Project Manager",
          description: "Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
          favoriteGames: ["The Sims 4", "Cities: Skylines", "Civilization VI"]
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
  background: white;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 25px;
  display: flex;
  flex-direction: column;
  aspect-ratio: 436/519; /* Maintain original proportion */
  transition: transform 0.2s;
  margin: 0 auto;
}

.card:hover {
  transform: scale(1.02);
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
  margin-right: 15px;
}

.name-role h3 {
  margin: 0;
  font-size: 1.2rem;
  color: #333;
}

.role {
  margin: 5px 0 0;
  font-size: 0.9rem;
  color: #666;
}

.card-content {
  flex-grow: 1;
  margin-bottom: 20px;
  color: #444;
  line-height: 1.5;
}

.card-footer {
  margin-top: auto;
}

.favorite-games-label {
  font-weight: bold;
  margin-bottom: 8px;
  color: #333;
}

ul {
  padding-left: 20px;
  margin: 0;
  color: #555;
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
