const btnAppointment = $('#btn-appoint');
const selEspeciality = $("#sel-especiality");
const selSource = $("#sel-source_id");
const btnFindTime = $("#btn-find-time");

$(document).ready(function() {
    selEspeciality.change(toggleActionButton);
    btnAppointment.click(findSpecialties);
    selSource.change(toggleModalActionButton);
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

    console.log(selEspeciality.val());
}

$('#model-appointment').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var specialty = button.data('specialty_id');
    var professional = button.data('professional_id');
    var professional_name = button.data('professional_name');
    
    var modal = $(this);
    modal.find('.modal-title').text('Solicitar horário com ' + professional_name);
    
    $("#specialty_id").val(specialty);
    $("#professional_id").val(professional);
  });
