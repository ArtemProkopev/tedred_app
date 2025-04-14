<template>
    <header class="header">
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
        <h1><span>TedRed</span><br />Games</h1>
    </header>
</template>

<script>
export default {
    name: "Header",
};
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

.header {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between; /* Добавлено для равномерного распределения */
    background-color: #222;
    color: white;
    width: 100%;
    min-height: 300px; /* Изменено на min-height */
    height: auto; /* Добавлено для гибкости */
    background-image: url("@assets/images/header1.png");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    position: relative;
    padding: 20px 0;
    gap: 20px; /* Добавлено для контроля расстояния между элементами */
}

span {
    color: #ffc851;
    font-size: clamp(50px, 10vw, 100px); /* Добавлен clamp для плавного изменения */
}
h1 {
    font-family: "Molot", sans-serif;
    font-size: clamp(40px, 7vw, 70px); /* Добавлен clamp */
    text-align: center;
    margin: 0; /* Убрано фиксированное смещение */
    line-height: 0.8;
    padding-bottom: 20px; /* Добавлено для отступа снизу */
}

.logoLinks {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 0 80px;
    box-sizing: border-box;
}

.logo {
    display: flex;
    align-items: center;
}

.logo img {
    width: 50px;
    height: auto;
    margin-right: 10px;
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
}

@media (max-width: 480px) {
    .header {
        min-height: 250px;
    }
    
    .navigation ul {
        gap: 10px;
    }
}
</style>
