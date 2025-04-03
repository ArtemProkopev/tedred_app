<template>
    <section class="logoLinks">
        <div class="logo">
            <img src="@assets/images/logo.png" alt="TedRed Games Logo" />
        </div>
        <nav class="navigation">
            <ul>
                <li><router-link to="/">home</router-link></li>
                <li><router-link to="/news">news</router-link></li>
                <li><a href="#team">team</a></li>
                <li><a href="#about">about us</a></li>
                <li><router-link to="/contact">contact</router-link></li>
            </ul>
        </nav>
    </section>
    <header class="header">
        <div class="person"></div>
        <p>NEWS OF<br /><span>TEDRED</span></p>
    </header>
</template>

<script>
export default {
    name: "NewsHeader",
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

span {
    color: #ffc851;
    font-size: 120px;
    z-index: 2; 
    position: relative;
}

p {
    font-family: "Molot", sans-serif;
    font-size: 80px;
    text-align: center;
    margin: 0; 
    line-height: 0.8;
    justify-content: center; 
}

.header {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    background-color: #222;
    color: white;
    width: 100%;
    height: 500px;
    background-image: url("@assets/images/backgroundmain.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    position: relative;
    overflow: hidden;
    justify-content: center;
}

.logoLinks {
    position: absolute; 
    top: 20px;
    left: 50%; 
    transform: translateX(-50%); 
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 80%;
    padding: 0; 
    z-index: 10;
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

.navigation ul {
    list-style: none;
    display: flex;
    gap: 20px;
}

.navigation a {
    text-decoration: none;
    color: white;
    font-family: "Lexend", sans-serif;
    transition: color 0.3s;
    font-size: 10px;
}

.navigation a:hover {
    color: #ffc851;
}

.person {
    background-image: url("@assets/images/news/green.png");
    width: 30%;
    height: 45vh;
    top: 30%;
    left: 25%;
    background-size: contain;
    background-repeat: no-repeat;
    position: absolute;
    z-index: 100;
}
</style>