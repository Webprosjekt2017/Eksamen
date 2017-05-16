<div class="row vertical contact_wrapper">

    <div class="c1 h-center-content" id="contact_info">
        <div class="contact_form">
            <form id="contact" action="/example.php">
                <span class="tooltiptext" id="tt1"><span>Fornavn</span></span>
                <input type="text" name="firstname" placeholder="Fornavn" data-tooltip="tt1">
                <br><br>
                <span class="tooltiptext" id="tt2"><span>Epost</span></span>
                <input type="text" name="e-mail" placeholder="Epost" data-tooltip="tt2">
                <br><br>
                <span class="tooltiptext" id="tt3"><span>Emne</span></span>
                <input type="text" name="subject" placeholder="Emne" data-tooltip="tt3">
                <br><br>
                <textarea form="contact" name="message" placeholder="Hva kan vi hjelpe deg med?" id="message_box"></textarea>
                <br><br>
                <input type="submit" value="Send">
            </form>
            <!-- END Form -->
        </div>
    </div>

    <div class="c1 contact_info">
        <div class="row">
            <div class="c2" id="info_text_left">
                <h3>Adresse: </h3>
                <h3>E-Post: </h3>
                <h3>Tlf: </h3>
            </div>


            <div class="c2" id="info_text_right">
                <h3>Christian Kroghs Gate 32A</h3>
                <h3>matvrak@westerdals.no</h3>
                <h3>99 99 99 99</h3>
            </div>
        </div>
    </div>
</div>
<script>
    nav.sel = 4;
</script>
