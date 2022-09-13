<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    </head>
    <body>
            <div class="row">
                <div class="col-xl col-background-blue align-middle">
                    <div class="container box-appointment">
                        <form>
                            <div class="row">
                                <div class="col-sm-3">Consulta de</div>
                                <div class="col">
                                    <select class="form-control" id="sel-especiality">
                                        <option value="" disabled selected>Selecione a especialidade</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-success" id="btn-appoint" disabled>AGENDAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl">
                    <div class="container">
                        <div class="row">
                            <div class="col"><h1 class="title-result-search">4 Cardiologistas encontrados</h1></div>
                        </div>
                    </div>
                    <div class="container box-center">
                        <div class="row">
                            <div class="col-sm-3 border-box">
                                <div class="row">
                                    <div class="col-sm-4"><img src="{{ asset('images/avatar.jpg') }}" alt="avatar" width="50px"></div>
                                    <div class="col title-name-doctor">Dr. Pedro Jovem</div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <center>
                                            <button type="button" class="btn btn-sm btn-success" id="btn-agendar-1"  data-toggle="modal" data-target="#model-appointment" data-specialty_id="1" data-professional_id="3" data-professional_name="Dr. Pedro Jovem">AGENDAR</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 border-box">
                                <div class="row">
                                    <div class="col-sm-3"><img src="{{ asset('images/avatar.jpg') }}" alt="avatar" width="50px"></div>
                                    <div class="col title-name-doctor">Dr. Pedro Jovem</div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <center>
                                            <button type="button" class="btn btn-sm btn-success" id="btn-agendar-1"  data-toggle="modal" data-target="#model-appointment" data-specialty_id="1" data-professional_id="3" data-professional_name="Dr. Pedro Jovem">AGENDAR</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 border-box">
                                <div class="row">
                                    <div class="col-sm-4"><img src="{{ asset('images/avatar.jpg') }}" alt="avatar" width="50px"></div>
                                    <div class="col title-name-doctor">Dr. Vinicius Maia</div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <center>
                                            <button type="button" class="btn btn-sm btn-success" id="btn-agendar-1"  data-toggle="modal" data-target="#model-appointment" data-specialty_id="1" data-professional_id="2" data-professional_name="Dr. Vinicius Maia">AGENDAR</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="model-appointment"  class="modal fade" tabindex="-1" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-lg"  modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agendar Consulta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" name="specialty_id" />
                                <input type="hidden" name="professional_id" />
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome completo">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="sel-source_id" name="source_id">
                                        <option value="" disabled selected>Como conheceu?</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="Nascimento">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button id="btn-find-time" type="button" class="btn btn-primary" disabled>SOLICITAR HORÁRIOS</button>
                        </div>
                    </div>
                </div>
            </div>
            
    </body>

    <script src="{{ asset('js/app_home.js') }}" defer></script>
</html>
