const btnAppointment        = $('#btn-appoint');
const selEspeciality        = $("#sel-especiality");
const selSource             = $("#sel-source_id");
const btnFindTime           = $("#btn-find-time");
const divAppointResult      = $("#div-appoint-result");
const titleAppointResult    = $("#title-appoint-result");
const divDataResult         = $("#div-data-result-specialty");
const birthdate             = $("#birthdate");
const cpf                   = $("#cpf");

$(document).ready(function() {
    divAppointResult.hide();
    selEspeciality.change(toggleActionButton);
    btnAppointment.click(findSpecialties);
    findSpecialidades();
    findPatientSource();
    birthdate.mask('99/99/9999');
    cpf.mask("999.999.999-99");
})

function toggleModalActionButton( event ) {
    if( btnFindTime.is(":disabled") && selSource.val() != "" )
    btnFindTime.prop( 'disabled', false);
}

function toggleActionButton( event ) {
    if( btnAppointment.is(":disabled") && selEspeciality.val() != "" )
        btnAppointment.prop( 'disabled', false);
}

function findSpecialties( event ) {
    if( selEspeciality == "" ) {
        alert("Selecione uma especialidade.");
        return;
    }

    findProfessionals();
}

function findProfessionals(){
    divAppointResult.hide('slow');
    post("/api/professionals/list", {especialidade_id : selEspeciality.val()}, professionalsResultHandler);
}

function findPatientSource() {
    get('/api/patient/source/list', patientSourceHandler);
}

function findSpecialidades() {
    get("/api/specialties/list", specialtiesResultHandler);
}

function specialtiesResultHandler( data ) {
    let html    = [];

    html.push('<option value="" disabled selected>Selecione a especialidade</option>');
    for (var key in data) {
        html.push("<option value='"+data[key].especialidade_id+"'>"+data[key].nome+"</option>");
    }

    selEspeciality.empty().html(html.join(''));
}

function professionalsResultHandler( data ) {
    let quantity        = data.length;
    let specialtyName   = "";

    for( var key in data[0].especialidades ) {
        if( data[0].especialidades[key].especialidade_id == selEspeciality.val() ) {
            specialtyName = data[0].especialidades[key].nome_especialidade;
            break;
        }
    }

    let title = quantity + " Resultado(s) para " + specialtyName;
    titleAppointResult.val(title);
    divDataResult.empty().html(mountHtmlSpecialists( data, selEspeciality.val() ) )
    divAppointResult.show('slow');
}

function patientSourceHandler(data) {
    let html    = [];
    
    html.push('<option value="" disabled selected>Como conheceu?</option>');
    for (var key in data) {
        html.push("<option value='"+data[key].origem_id+"'>"+data[key].nome_origem+"</option>");
    }

    selSource.empty().html(html.join(''));
}


function mountHtmlSpecialists( data, especialidade_id ) {
    let countItems  = 0;
    let _html       = '';

    for( var key in data ){
        if( ++countItems === 1 ) {
            _html += '<div class="row">';
        }

        _html += '  <div class="col-md-3 border-box">';
        _html += '      <div class="row">';
        _html += '          <div class="col-md-4"><img src="/images/avatar.jpg" alt="avatar" width="50px"></div>';
        _html += '          <div class="col-md-8 title-name-doctor">'+data[key].tratamento+' '+data[key].nome+'</div>';
        _html += '      </div>';
        _html += '      <div class="row">';
        _html += '           <div class="col-md-12">';
        _html += '              <center><button type="button" class="btn btn-sm btn-success" onclick="doAppointment('+especialidade_id+', \''+data[key].tratamento+' '+data[key].nome+'\','+data[key].profissional_id+')" >AGENDAR</button></center>';
        _html += '           </div>';
        _html += '      </div>';
        _html += '  </div>';
        
        if( countItems === 3 ) {
            _html += '</div>';
            countItems = 0;
        }
        
    }

    if( countItems < 3 && countItems != 0 ) _html += '</div>';

    return _html;
}

function doAppointment( specialtyId, professionalName, professionalId ) {
    $('#specialty_id').val(specialtyId);
    $('#professional_id').val(professionalId);
    $('#modalLabel').empty().html("Agendar consulta com " + professionalName);
    $('#modal-appointment').modal('toggle');
}

function doSaveAppointment() {
    console.log($('#specialty_id').val());
    if( $('#specialty_id').val().length == 0 ) {
        alert("Houve um problema ao selecionar a especialidade, favor refaça a operação completa.");
        return;
    }
    if( $('#professional_id').val().length == 0 ) {
        alert("Houve um problema ao selecionar o médico(a), favor refaça a operação completa.");
        return;
    }
    if( $('#name').val().length == 0 ) {
        alert("Todos os campos do formulário são obrigatórios.");
        return;
    }
    if( $('#cpf').val().length == 0 ) {
        alert("Todos os campos do formulário são obrigatórios.");
        return;
    }
    if( $('#birthdate').val().length == 0 ) {
        alert("Todos os campos do formulário são obrigatórios.");
        return;
    }
    if( $('#sel-source_id').val().length == 0 ) {
        alert("Todos os campos do formulário são obrigatórios.");
        return;
    }

    post("/api/appointment/save", {
                                specialty_id : $('#specialty_id').val(), 
                                professional_id : $('#professional_id').val(), 
                                source_id : $('#sel-source_id').val(), 
                                name : $("#name").val(), 
                                cpf : $("#cpf").val(), 
                                birthdate : $("#birthdate").val() 
                            });

    clearAndCloseModal();
}

function clearAndCloseModal() {
    $('#specialty_id').val('');
    $('#professional_id').val('');
    $('#sel-source_id').val($("#source_id option:first").val());
    $("#name").val('');
    $("#cpf").val('');
    $("#birthdate").val('');

    $('#modal-appointment').modal('toggle');
}