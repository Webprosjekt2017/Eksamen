<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge"/>
    <meta name="viewport" content="width=1024"/>
    <title>Se Alt</title>
    <!-- STYLESHEET-->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="stylesheet" href="assets/css/map.css"/>
    <link rel="stylesheet" href="assets/css/nav.css"/>
    <link rel="stylesheet" href="assets/css/footer.css"/>
    <link rel="stylesheet" href="assets/css/home.css"/>
    <link rel="stylesheet" href="assets/css/see_all.css"/>  <!-- SCRIPTS-->

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="assets/js/nav.js"></script>
    <script src="assets/js/map.js"></script>
    <script src="assets/js/filter.js"></script>
</head>
<body><a class="skipToMainContent" href="#main">Hopp over navigasjonsmeny</a>
<nav><a href="/">
        <div class="logo"><img src="assets/imgs/Logo.png" alt="Matvrak Logo"/>
            <h1>Matvrak</h1>
        </div>
    </a>
    <div class="navLinkWrapper">
        <div id="navDrawerKnob">
            <div class="arrow"></div>
        </div>
        <a class="navLink" href="home" tabindex="1">Hjem</a><a class="navLink" href="map" tabindex="2">Kart</a><a
                class="navLink" href="all">Vis Alt</a><a class="navLink" href="about" tabindex="3">Om Oss</a><a
                class="navLink" href="contact" tabindex="4">Kontakt oss</a>
    </div>
    <div class="filterWrapper">
        <select class="filter" id="filter-type">
            <option value="0">Hva ser du etter?</option>
            <option value="Bar">Bar</option>
            <option value="Restaurant">Restaurant</option>
            <option value="Dagligvare">Dagligvare</option>
            <option value="Kaffebar">Kaffebar</option>
            <option value="Vegansk">Vegansk</option>
            <option value="Tyrkisk">Tyrkisk</option>
            <option value="Sushi">Sushi</option>
            <option value="Mikrobrygg">Mikrobrygg</option>
        </select>
        <input class="filter" id="filter-name" type="text" placeholder="Kjenner du navnet?"/>
    </div>
</nav>
<div id="see_all_container">
    <h1>Vis alt</h1>
    <h3>Fjerdingen</h3>
    <div class="row">

        <div class="c4 column h-center-content">
            <div class="infokort">

                <h4 class="title">REMA 1000</h4>

                <div class="row tags">
                    <span>Dagligvare</span>
                </div>

                <p class="desc"></p>
                <a href="https://www.rema.no/butikker/Oslo/rema-1000-christian-krohgsgate/1499929">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">07 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">07 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">07 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">07 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">07 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">08 - 22</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>~152 min</p>
                </div>
            </div>
        </div>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <h4 class="title">Sea Sushi Bar AS</h4>

                <div class="row tags">
                    <span>Restaurant</span>
                </div>

                <p class="desc"></p>
                <a href="http://seasushibar.no">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Søndag</div>
                                <div class="c2">13 - 22</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>~152 min</p>
                </div>
            </div>
        </div>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <h4 class="title">Grytelokket</h4>

                <div class="row tags">
                    <span>Fastfood</span>
                    <span>Restaurant</span>
                </div>

                <p class="desc"></p>
                <a href="http://grytelokket.no">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">11 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">11 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">11 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">11 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">11 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">11 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Søndag</div>
                                <div class="c2">12 - 03</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>~152 min</p>
                </div>
            </div>
        </div>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <h4 class="title">Marmaris Pizza & Grill</h4>

                <div class="row tags">
                    <span>Fastfood</span>
                    <span>Restaurant</span>
                </div>

                <p class="desc"></p>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">10 - 05</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">10 - 05</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">10 - 05</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">10 - 05</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">10 - 05</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">10 - 06</div>
                            </div>
                            <div class="row">
                                <div class="c2">Søndag</div>
                                <div class="c2">10 - 06</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>~152 min</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="c4 column h-center-content">
            <div class="infokort">

                <h4 class="title">Coop Prix</h4>

                <div class="row tags">
                    <span>Dagligvare</span>
                </div>

                <p class="desc"></p>
                <a href="https://coop.no/butikker/prix/hausmannsgate/">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">Stengt</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">Stengt</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">Stengt</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">Stengt</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">Stengt</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">Stengt</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>~152 min</p>
                </div>
            </div>
        </div>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <img class="kortbilde" src="assets/imgs/" alt="Sifa Restaurant">
                <h4 class="title">Sifa Restaurant</h4>

                <div class="row tags">
                    <span>Restaurant</span>
                </div>

                <p class="desc"></p>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">08 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">08 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">08 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">08 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">08 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">08 - 23</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>~152 min</p>
                </div>
            </div>
        </div>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <img class="kortbilde" src="assets/imgs/" alt="Kebabish Original">
                <h4 class="title">Kebabish Original</h4>

                <div class="row tags">
                    <span>Restaurant</span>
                    <span>Tyrkisk</span>
                </div>

                <p class="desc"></p>
                <a href="kebabishoriginal.no">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">13 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">13 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">13 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">13 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">Stengt</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">Stengt</div>
                            </div>
                            <div class="row">
                                <div class="c2">Søndag</div>
                                <div class="c2">Stengt</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>~152 min</p>
                </div>
            </div>
        </div>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <img class="kortbilde" src="assets/imgs/" alt="Gaasa As">
                <h4 class="title">Gaasa As</h4>

                <div class="row tags">
                    <span>Bar</span>
                    <span>Mikrobrygg</span>
                </div>

                <p class="desc"></p>
                <a href="gaasa.no">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">16 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">16 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">16 - 01</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">16 - 01</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">16 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">16 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Søndag</div>
                                <div class="c2">16 - 23</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>~152 min</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="c4 column h-center-content">
            <div class="infokort">

                <img class="kortbilde" src="assets/imgs/" alt="Crowbar & Bryggeri">
                <h4 class="title">Crowbar & Bryggeri</h4>

                <div class="row tags">
                    <span>Bar</span>
                </div>

                <p class="desc"></p>
                <a href="crowbryggeri.com">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">15 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">15 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">15 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">15 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">15 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">13 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Søndag</div>
                                <div class="c2">15 - 03</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>~152 min</p>
                </div>
            </div>
        </div>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <img class="kortbilde" src="assets/imgs/" alt="Starbucks">
                <h4 class="title">Starbucks</h4>

                <div class="row tags">
                    <span>Kaffebar</span>
                </div>

                <p class="desc"></p>
                <a href="starbucks.no">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">07 - 20</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">07 - 20</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">07 - 20</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">07 - 20</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">07 - 20</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">09 - 20</div>
                            </div>
                            <div class="row">
                                <div class="c2">Søndag</div>
                                <div class="c2">10 - 19</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>~152 min</p>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <h3>Vulkan</h3>
    <hr/>

    <h3>Brenneriveien</h3>
    <div class="row">

        <div class="c4 column h-center-content">
            <div class="infokort">

                <img class="kortbilde" src="assets/imgs/" alt="SYNG">
                <h4 class="title">SYNG</h4>

                <div class="row tags">
                    <span>Bar</span>
                </div>

                <p class="desc"></p>
                <a href="syng.no">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">14 - 01</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">14 - 01</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">14 - 01</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">14 - 01</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">14 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">12 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Søndag</div>
                                <div class="c2">12 - 01</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>Ukjent avstand</p>
                </div>
            </div>
        </div>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <img class="kortbilde" src="assets/imgs/" alt="Bislett Kebab House">
                <h4 class="title">Bislett Kebab House</h4>

                <div class="row tags">
                    <span>Restaurant</span>
                </div>

                <p class="desc"></p>
                <a href="bislettkebabhouse.no">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">10 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">10 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">10 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">10 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">10 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">10 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Søndag</div>
                                <div class="c2">Stengt</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>Ukjent avstand</p>
                </div>
            </div>
        </div>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <img class="kortbilde" src="assets/imgs/" alt="Vegan Loving Hut Oslo">
                <h4 class="title">Vegan Loving Hut Oslo</h4>

                <div class="row tags">
                    <span>Restaurant</span>
                    <span>Vegansk</span>
                </div>

                <p class="desc"></p>
                <a href="veganlovinghut.no">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">12 - 20</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">12 - 20</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">12 - 20</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">12 - 20</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">12 - 20</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">12 - 20</div>
                            </div>
                            <div class="row">
                                <div class="c2">Søndag</div>
                                <div class="c2">13 - 20</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>Ukjent avstand</p>
                </div>
            </div>
        </div>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <img class="kortbilde" src="assets/imgs/" alt="NAM KANG">
                <h4 class="title">NAM KANG</h4>

                <div class="row tags">
                    <span>Restaurant</span>
                    <span>Sushi</span>
                </div>

                <p class="desc"></p>
                <a href="namkang.no">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Søndag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>Ukjent avstand</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="c4 column h-center-content">
            <div class="infokort">

                <img class="kortbilde" src="assets/imgs/" alt="Funky Fresh Foods">
                <h4 class="title">Funky Fresh Foods</h4>

                <div class="row tags">
                    <span>Restaurant</span>
                </div>

                <p class="desc"></p>
                <a href="funkyfreshfoods.no">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">11 - 20</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">11 - 20</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">11 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">12 - 22</div>
                            </div>
                            <div class="row">
                                <div class="c2">Søndag</div>
                                <div class="c2">12 - 20</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>Ukjent avstand</p>
                </div>
            </div>
        </div>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <img class="kortbilde" src="assets/imgs/" alt="Kiwi">
                <h4 class="title">Kiwi</h4>

                <div class="row tags">
                    <span>Dagligvare</span>
                </div>

                <p class="desc"></p>
                <a href="kiwi.no">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">07 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">07 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">07 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">07 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">07 - 23</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">07 - 23</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>Ukjent avstand</p>
                </div>
            </div>
        </div>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <img class="kortbilde" src="assets/imgs/" alt="Mitsu Kafe & Sushi">
                <h4 class="title">Mitsu Kafe & Sushi</h4>

                <div class="row tags">
                    <span>Restaurant</span>
                    <span>Sushi</span>
                </div>

                <p class="desc"></p>
                <a href="mitsukafe.no">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">10 - 21</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">10 - 21</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">10 - 21</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">10 - 21</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">10 - 21</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">12 - 21</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>Ukjent avstand</p>
                </div>
            </div>
        </div>

        <div class="c4 column h-center-content">
            <div class="infokort">

                <img class="kortbilde" src="assets/imgs/" alt="Glød">
                <h4 class="title">Glød</h4>

                <div class="row tags">
                    <span>Bar</span>
                </div>

                <p class="desc"></p>
                <a href="sau.no">Gå til hjemmeside</a>
                <hr/>

                <div class="c2 v-align-content">
                    <div class="open">
                        <div class="status">Open Now</div>
                        <div class="toggleBtn" onClick="showTimes(this)" data-open="false"></div>

                        <div class="times">
                            <div class="row">
                                <div class="c2">Mandag</div>
                                <div class="c2">14 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Tirsdag</div>
                                <div class="c2">14 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Onsdag</div>
                                <div class="c2">14 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Torsdag</div>
                                <div class="c2">14 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Fredag</div>
                                <div class="c2">14 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Lørdag</div>
                                <div class="c2">14 - 03</div>
                            </div>
                            <div class="row">
                                <div class="c2">Søndag</div>
                                <div class="c2">Stengt</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c2">
                    <p>Ukjent avstand</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    nav.sel = 2;
    filterPage = 1;
</script>
<footer>
    <div class="row">
        <div class="c3 column v-center-content">
            <h4>Informasjon</h4>
            <ul>
                <li><a href="about"></a></li>
            </ul>
        </div>
        <div class="c3 column v-center-content"></div>
        <div class="c3 column v-center-content"></div>
    </div>
</footer>