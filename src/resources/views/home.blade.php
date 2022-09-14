@extends('layouts.base')
@section('title', 'Solicitação de Agendamento')

@section('content')
<div class="row">
    <div class="col-lg-12 col-background-blue align-middle">
        <div class="row center">
            <form>
                <div class="row position-top">
                    <div class="col-md-4 top-text">Consulta de</div>
                    <div class="col-md-5">
                        <select class="form-control" id="sel-especiality">
                            <option value="" disabled selected>Selecione a especialidade</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-success" id="btn-appoint" disabled>AGENDAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="div-appoint-result" class="row">
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12"><h1 class="title-result-search" id="title-appoint-result"></h1></div>
            </div>
        </div>
        <div id="" class="row center">
            <div id="div-data-result-specialty" class="col-md-12">
                
            </div>
        </div>
    </div>
    
</div>

<div id="modal-appointment"  class="modal fade" tabindex="-1" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Agendar Consulta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-appoint" action="/" method="post">
                <div class="modal-body">
                        <input type="hidden" id="specialty_id" name="specialty_id" />
                        <input type="hidden" id="professional_id" name="professional_id" />
                        <div class="form-group">
                            <input type="text" class="form-control required" id="name" name="name" placeholder="Nome completo">
                        </div>
                        <div class="form-group">
                            <select class="form-control required" id="sel-source_id" name="source_id">
                                <option value="" disabled selected>Como conheceu?</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control required" id="birthdate" name="birthdate" placeholder="Nascimento">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control required" id="cpf" name="cpf" placeholder="CPF">
                        </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-find-time" type="button" class="btn btn-primary" onclick="doSaveAppointment()">SOLICITAR HORÁRIOS</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/httpResources.js') }}" defer></script>
<script src="{{ asset('js/app_home.js?=') }}<?= time(); ?>" defer></script>
@endsection
