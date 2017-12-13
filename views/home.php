<?php
require("html_default.php");

/* -----------------------------
 *           HTML
 * -----------------------------
 */
Html_default::HEAD("Appuntamenti - ".strtoupper(File::FILENAME(__FILE__)));
Html_default::OPENCONTAINER();
Html_default::MENU(File::FILENAME(__FILE__));
Html_default::JUMBOTRON("Studio medico", "Home");

/* -----------------------------
 *       CORPO FILE
 * -----------------------------
 */
Html_default::SHOW_NOTICES(Flashmessage::READ(Autaut::LOGGATO(), File::FILENAME(__FILE__)));

?>

<div class="row align-items-start h-100">
  <div class="col-8">
    <h1>Appuntamenti</h1>
    

    <div class="row align-items-start">
        <div class="col-12">
            <h2>Lista</h2>
        </div>
    </div>


  </div>
  <div class="col-4 h-100 barralaterale">
    <h1>Da fare</h1>
    <div class="row align-items-start">
        <div class="col-12">
            <h2>Dottoressa</h2>
        </div>
    </div>
    <div class="row align-items-start">
        <div class="col-12">
            <h2>Collaboratrice</h2>
        </div>
    </div>

  </div>
</div>

<?php
/* -----------------------------
 *      FINE CORPO FILE
 * -----------------------------
 */


/* -----------------------------
 *      FINE HTML
 * -----------------------------
 */
Html_default::CLOSECONTAINER();
Html_default::SCRIPT(True);
Html_default::END();
