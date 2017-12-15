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

                    <div id="dataappuntamento"></div>

                </div>
            </div>

            <div class="row align-items-start">
                <div class="col-12">
                    <div class="agenda">
                        <div class="table-responsive">
                            <table class="table table-condensed table-bordered">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Event</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Single event in a single day -->
                                <tr>
                                    <td class="agenda-date" class="active" rowspan="1">
                                        <div class="dayofmonth">26</div>
                                        <div class="dayofweek">Saturday</div>
                                        <div class="shortdate text-muted">July, 2014</div>
                                    </td>
                                    <td class="agenda-time">
                                        5:30 AM
                                    </td>
                                    <td class="agenda-events">
                                        <div class="agenda-event">
                                            <i class="glyphicon glyphicon-repeat text-muted" title="Repeating event"></i> 
                                            Fishing
                                        </div>
                                    </td>
                                </tr>

                                <!-- Multiple events in a single day (note the rowspan) -->
                                <tr>
                                    <td class="agenda-date" class="active" rowspan="3">
                                        <div class="dayofmonth">24</div>
                                        <div class="dayofweek">Thursday</div>
                                        <div class="shortdate text-muted">July, 2014</div>
                                    </td>
                                    <td class="agenda-time">
                                        8:00 - 9:00 AM
                                    </td>
                                    <td class="agenda-events">
                                        <div class="agenda-event">
                                            Doctor's Appointment
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="agenda-time">
                                        10:15 AM - 12:00 PM
                                    </td>
                                    <td class="agenda-events">
                                        <div class="agenda-event">
                                            Meeting with executives
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="agenda-time">
                                        7:00 - 9:00 PM
                                    </td>
                                    <td class="agenda-events">
                                        <div class="agenda-event">
                                            Aria's dance recital
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>



        <!-- ***************** ASIDE ************************* -->

        <aside class="col-4 sidebar">

            <div class="row align-items-start">
                <div class="col-12">
                    <div class="notice notice-info">
                        <strong>Dottoressa</strong>
                        <form action="/todo/dottoressa/add" method="post">
                            <div class='form-group'>
                                <input type="text" class="form-control" name="todo" placeholder="Scrivi qui il compito"><br/>
                                <input type="submit" value="Aggiungi" class='btn btn-block btn-info'>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="row align-items-start">
                <div class="col-12">
                    <table id='tabella' class='table table-bordered table-hover'>
                        <thead>
                        <tr>
                            <th>Da fare</th>
                            <th class="tdicon">#</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach($todosDottoressa as $todo) {
                            $id = $todo['id'];
                            $descrizione = Utilita::DB2HTML($todo['descrizione']);
                            ?>
                            <tr>
                                <td><?= $descrizione ?></td>
                                <td class="tdicon"><a class="btn btn-danger btn-sm" href='/todo/dottoressa/delete/<?= $id ?>'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row align-items-start">
                <div class="col-12">
                    <div class="notice notice-info">
                        <strong>Collaboratrice</strong>
                        <form action="/todo/collaboratrice/add" method="post">
                            <div class='form-group'>
                                <input type="text" class="form-control" name="todo" placeholder="Scrivi qui il compito"><br/>
                                <input type="submit" value="Aggiungi" class='btn btn-block btn-info'>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="row align-items-start">
                <div class="col-12">
                    <table id='tabella' class='table table-bordered table-hover'>
                        <thead>
                        <tr>
                            <th>Da fare</th>
                            <th class="tdicon">#</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach($todosCollaboratrice as $todo) {
                            $id = $todo['id'];
                            $descrizione = Utilita::DB2HTML($todo['descrizione']);
                            ?>
                            <tr>
                                <td><?= $descrizione ?></td>
                                <td class="tdicon"><a class="btn btn-danger btn-sm" href='/todo/collaboratrice/delete/<?= $id ?>'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
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
Html_default::SCRIPT(True, True);
?>

    <script>

        $('#dataappuntamento').datepicker({
            format: "dd/mm/YYYY",
            weekStart: 1,
            language: "it",
            todayBtn: "linked",
            daysOfWeekHighlighted: "0,6",
            todayHighlight: true
        });

    </script>


<?php
Html_default::END();
