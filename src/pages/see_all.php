<div id="see_all_container">
    <h1>Vis alt</h1>
    <h3>Campus</h3><!--Overskrift som kommer mellom hver campus-bit-->
    <div class="row">
        <div class="c4 column h-center-content"><!--Infokort start-->
            <div class="infokort">
                <img class="kortbilde" src="assets/imgs/kiwi.png" S>
                <h4 class="title">Tittel</h4>
                <div class="row tags">
                        <!--Denne gjentas for hver tagg-->
                        <span>Tags</span>
                </div>
                <p class="desc">liten, kort og søt beskrivelse
                    <br/>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <a class="fanzy" href="https://kiwi.no/">Gå til hjemmesiden</a>
                <hr/>
                <div class="row">
                    <div class="c2 v-align-content"><!--Open drop-downmeny-->
                        <div class="open">
                            <div class="status">Open now</div>
                            <div class="toggleBtn" onclick="showTimes(this)" data-open="false"></div>
                            <div class="times">
                                <div class="row">
                                    <div class="c2">Mon - Fri</div>
                                    <div class="c2">10 - 22</div>
                                </div>
                                <div class="row">
                                    <div class="c2">Sat</div>
                                    <div class="c2">12 - 01</div>
                                </div>
                                <div class="row">
                                    <div class="c2">Sun</div>
                                    <div class="c2">Closed</div>
                                </div>
                            </div>
                        </div>
                    </div> <!--Slutt på dropdown-->
                    <div class="c2">
                        <p>Avstand</p>
                    </div>
                </div>
            </div>
        </div><!--infokort slutt-->
    </div><!--Row slutt-->

    <hr/>
    <!--Kommer OVER hvert campus, untatt det første on ikke under siste-->
</div>
<!--Slutt wrapper for alt innhold-->
<script>
    nav.sel = 2;
    filterPage = 1;
</script>
