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
        <div class="col-md-8">

            <div class="notice notice-warning">
                <h3>Appuntamenti</h3>
            </div>

            <pre>
                <?php //var_dump($orari); ?>
            </pre>

            <div class="row align-items-start">
                <div class="col-md-12">
                    <h2>Aggiungi</h2>

                    <div class="row align-items-start">
                        <div class="col-lg-4">
                            <div id="dataappuntamento"></div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Data selezionata</label>
                                <input type="text" class="form-control input-lg" placeholder="data" name='dataselezionatatesto' id="dataselezionatatesto" required>
                            </div>

                            <div class="form-group">
                                <label for="selectorario">Orario</label>
                                <select class="form-control" id="selectorario">
                                    
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Cognome Nome</label>
                                <input type="text" class="form-control" placeholder="Cognome Nome" name='nome' required>
                            </div>

                            <div class="form-group">
                                <label>Note</label>
                                <input type="text" class="form-control" placeholder="Note" name='note'>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-start paddingTop20">
                        <div class="col-lg-12">
                            <input type="submit" value="Aggiungi" class='btn btn-block btn-info'>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row align-items-start paddingTop20">
                <div class="col-12">

                    <div class="notice notice-warning">
                        <h3>Lista</h3>
                    </div>

                    <div class="agenda">
                        <div class="table-responsive">
                            <table class="table table-condensed table-bordered background-giorno">
                                <tbody>
                                <tr>
                                    <td class="agenda-date" class="active" rowspan="1">
                                        <div class="dayofmonth">01</div>
                                        <div class="dayofweek bianco"><strong>Lunedì</strong></div>
                                        <div class="shortdate">Gennaio, 2018</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="agenda">
                        <div class="table-responsive">
                            <table class="table table-condensed table-bordered">
                                <thead>
                                <tr>
                                    <th>Orario</th>
                                    <th>Paziente</th>
                                    <th>Note</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Single event in a single day -->
                                <tr>
                                    <td class="agenda-orario">
                                        8:00-8:15
                                    </td>
                                    <td class="agenda-paziente">
                                        Rossi Mario
                                    </td>
                                    <td class="agenda-note">
                                        Vaccino
                                    </td>
                                    <td class="agenda-pulsante">
                                    <a class="btn btn-danger btn-sm" href='/appuntamenti/delete/<?= 1 ?>'><i class='fa fa-trash' aria-hidden='true'></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="agenda-orario">
                                        8:00-8:15
                                    </td>
                                    <td class="agenda-paziente">
                                        Rossi Mario
                                    </td>
                                    <td class="agenda-note">
                                        Vaccino
                                    </td>
                                    <td class="agenda-pulsante">
                                        <a class="btn btn-danger btn-sm" href='/appuntamenti/delete/<?= 1 ?>'><i class='fa fa-trash' aria-hidden='true'></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="agenda-orario">
                                        8:00-8:15
                                    </td>
                                    <td class="agenda-paziente">
                                        Rossi Mario
                                    </td>
                                    <td class="agenda-note">
                                        Vaccino
                                    </td>
                                    <td class="agenda-pulsante">
                                        <a class="btn btn-danger btn-sm" href='/appuntamenti/delete/<?= 1 ?>'><i class='fa fa-trash' aria-hidden='true'></i></a>
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

        <div class="col-md-4">

            <div class="row align-items-start">
                <div class="col-12">
                    <div class="notice notice-info">
                        <h3>Dottoressa</h3>
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
                        <h3>Collaboratrice</h3>
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
Html_default::SCRIPT(True, True);
?>

    <script>
        moment.locale('it');
                        
        function orario() {
          $.get("/orario", function(a) {
            orari = a.orari;
            $("#selectorario").empty();
            selected = false;

            var x = document.getElementById("selectorario");
            giornoselezionato = $('#dataappuntamento').datepicker('getFormattedDate');
            giornosettimana = moment(giornoselezionato,'DD/MM/YYYY').format('ddd');

            Object.values(orari).forEach(function(ora) {

                // Se giorno settimana uguale a giorno settimana dell'orario allora aggiungi
                if(giornosettimana == ora.giornosettimana) {
                    var option = document.createElement("option");
                    option.text = ora.ora + " : ";
                    option.value = ora.idorario
                    
                    // seleziona il primo attivo, libero
                    if ((ora.attivo==1) && (selected == false)) {
                        option.setAttribute('selected','selected');
                        selected = true;
                    }
                    if(ora.attivo==0) {
                        option.classList.add('selectNonAttivo');
                    }
                    x.add(option);
                }                

            });
          });
        }

        $('#dataappuntamento').datepicker({
            format: "dd/mm/yyyy",
            weekStart: 1,
            language: "it",
            todayBtn: "linked",
            daysOfWeekHighlighted: "0,6",
            todayHighlight: true
        });

        $('#dataappuntamento').on('changeDate', function() {
            $('#dataselezionatatesto').val(
                $('#dataappuntamento').datepicker('getFormattedDate')
            );
            orario();
        });

        $('#dataselezionatatesto').val(
            moment(Date.now()).format('DD/MM/YYYY')
        );
        orario();

    </script>


<?php
Html_default::END();
