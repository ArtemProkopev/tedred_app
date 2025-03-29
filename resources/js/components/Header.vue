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
                    <li><a href="#games">games</a></li>
                    <li><a href="#team">team</a></li>
                    <li><a href="#about">about us</a></li>
                    <li><router-link to="/contact">contact</router-link></li>
                </ul>
            </nav>
        </section>
        <h1><span>TedRed</span><br />Games</h1>
        <p>hghghg</p>
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
    background-color: #222;
    color: white;
    width: 100%;
    height: 300px;
    background-image: url("@assets/images/header1.png");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    position: relative;
}

span {
    color: #ffc851;
    font-size: 100px;
}
h1 {
    font-family: "Molot", sans-serif;
    font-size: 70px;
    text-align: center;
    margin-top: 10px;
    line-height: 0.8;
}

.logoLinks {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 0 80px 0 80px;
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
    padding-left: 20px;
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

*, *::before, *::after {
    box-sizing: border-box;
}

</style>
