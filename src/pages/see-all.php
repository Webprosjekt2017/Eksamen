<div id="see_all_container">

    <!--NYTT START-->

    <div class="filterboks">
    <select class="filter" id="filter-type-onpage">
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
    <input class="filter" id="filter-name-onpage" type="text" placeholder="Kjenner du navnet?"/>
    </div>


    <!--NYTT SLUTT-->

    <h1>Vis alt</h1>
    <h3>Fjerdingen</h3>
    <div class="row">
        <div class="c4 column h-center-content">
            <div class="infokort">
                <img class="kortbilde" src="assets/imgs/kiwi.png" alt="Sifa Restaurant">
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
