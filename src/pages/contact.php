<?php
require_once('includes/config.php');
?>

<?php if (isset($_POST['message'])) {
    /*
     * Åpne en tilkobling til databasen, og legg inn meldingen som ble sendt.
     * Gi brukeren en toast om at meldingen ble sendt.
     */
    $conn = new PDO('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_DATABASE . ';charset=utf8', Config::DB_USER, Config::DB_PASSWORD);
    $stmt = $conn->prepare('INSERT INTO `contact` (firstname, email, subject, message) VALUES (:fname, :email, :subject, :message)');

    $stmt->execute([
        'fname' => $_POST['firstname'],
        'email' => $_POST['email'],
        'subject' => $_POST['subject'],
        'message' => $_POST['message']
    ]);

    echo('<script type="text/javascript">
            toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-bottom-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };

            toastr.success("Meldingen har blitt sendt!", "");</script>');
} ?>

<div class="row vertical contact_wrapper" id="main">
    <div class="c1 h-center-content" id="contact_info">
        <div class="contact_form">
            <form id="contact" action="" role="form" method="post">
                <span class="tooltiptext" id="tt1"><span>Fornavn</span></span>
                <input type="text" name="firstname" placeholder="Fornavn" data-tooltip="tt1" required>
                <br><br>
                <span class="tooltiptext" id="tt2"><span>Epost</span></span>
                <input type="text" name="email" placeholder="Epost" data-tooltip="tt2" required>
                <br><br>
                <span class="tooltiptext" id="tt3"><span>Emne</span></span>
                <input type="text" name="subject" placeholder="Emne" data-tooltip="tt3" required>
                <br><br>
                <textarea form="contact" name="message" placeholder="Hva kan vi hjelpe deg med?" id="message_box"
                          required></textarea>
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
