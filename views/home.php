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

<div class="row align-items-start">
  <div class="col-8">
    <h1>Appuntamenti</h1>
    

    <div class="row align-items-start">
        <div class="col-12">
            <h2>Lista</h2>

            <div class="notice notice-success">
        <strong>Notice</strong> notice-success
    </div>
    <div class="notice notice-danger">
        <strong>Notice</strong> notice-danger
    </div>
    <div class="notice notice-info">
        <strong>Notice</strong> notice-info
    </div>
    <div class="notice notice-warning">
        <strong>Notice</strong> notice-warning
    </div>
    <div class="notice notice-lg">
        <strong>Big notice</strong> notice-lg
    </div>
    <div class="notice notice-sm">
        <strong>Small notice</strong> notice-sm
    </div>
        </div>
    </div>


  </div>
  <aside class="col-4 barralaterale">
    <h1>Da fare</h1>
    <div class="row align-items-start">
        <div class="col-12">
            <h4>Dottoressa</h4>
        </div>
    </div>
    <div class="row align-items-start">
        <div class="col-12">
            <h4>Collaboratrice</h4>
        </div>
    </div>

  </aside>
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
