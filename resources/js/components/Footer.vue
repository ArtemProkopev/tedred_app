<template>
    <footer class="mainFooter">
            <article class="footerContent">
                <section class="footerColumn leftColumn">
                    <h3 class="footerLogo">TEDRED GAMES</h3>
                    <div class="copyright">
                        © 2025 Tedred Games. All rights reserved.
                    </div>
                </section>

                <section class="footerColumn rightColumn forRight">
                    <section class="navigationConnect">
                        <section class="footerColumn">
                            <p class="footerTitle">NAVIGATION</p>
                            <ul class="footerLinks">
                                <li><a href="#">news</a></li>
                                <li><a href="#">about us</a></li>
                                <li><a href="#">team</a></li>
                                <li><a href="#">contact</a></li>
                            </ul>
                        </section>

                        <section class="footerColumn">
                            <p class="footerTitle">CONNECT</p>
                            <section class="socialLinks">
                                <a href="#" class="socialIcon"
                                    ><img
                                        src="@assets/images/instagram.svg"
                                        alt="Instagram"
                                /></a>
                                <a href="#" class="socialIcon"
                                    ><img
                                        src="@assets/images/discord.svg"
                                        alt="Discord"
                                /></a>
                                <a href="#" class="socialIcon"
                                    ><img
                                        src="@assets/images/steam.svg"
                                        alt="Steam"
                                /></a>
                            </section>
                        </section>
                    </section>
                </section>
            </article>
        </footer>
</template>

<style>
.mainFooter {
    background: #0a0a0a;
    padding: 60px 0 30px;
    margin-top: 80px;
    border-top: 2px solid #ffc851;
    width: 100%;
}

.footerContent {
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    gap: 40px;
    padding: 0 20px;
}

.footerColumn {
    flex: 1;
    min-width: 200px;
}

.footerLogo {
    font-family: "Molot";
    color: #ffc851;
    font-size: 32px;
    line-height: 1;
    margin-bottom: 20px;
    text-transform: uppercase;
}

.copyright {
    color: rgba(255, 255, 255, 0.6);
    font-family: "Lexend";
    font-size: 12px;
    line-height: 1.4;
}

.footerTitle {
    color: #fff;
    font-family: "Molot";
    font-size: 18px;
    margin-bottom: 15px;
    text-transform: uppercase;
}

.footerLinks {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.footerLinks li {
    margin-bottom: 12px;
}

.footerLinks a {
    color: rgba(255, 255, 255, 0.8);
    font-family: "Lexend";
    font-size: 14px;
    text-decoration: none;
    transition: color 0.3s;
}

.footerLinks a:hover {
    color: #ffc851;
}

.socialLinks {
    display: flex;
    gap: 15px;
}

.socialIcon img {
    width: 24px;
    height: 24px;
    filter: brightness(0.8);
    transition: filter 0.3s;
}

.socialIcon img:hover {
    filter: brightness(1);
}

*, *::before, *::after {
    box-sizing: border-box;
}

</style>