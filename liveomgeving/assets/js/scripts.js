(function(window, undefined) {
  'use strict';

  /*
  NOTE:
  ------
  PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
  WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
      localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
      $('#tabs a[href="' + activeTab + '"]').tab('show');
    }
  });
	   $('.confirm-text').on('click', function () {
        Swal.fire({
            title: 'Gegevens wijzigen?',
            text: "Kan dit niet terugdraaien",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2F8BE6',
            cancelButtonColor: '#F55252',
			cancelButtonText: 'Annuleren',
            confirmButtonText: 'Opslaan',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                Swal.fire({
                    type: "Succes",
                    title: 'Wijzigingen opgeslagen!',
                    text: 'Uw gegevens zijn geupdate',
                    confirmButtonClass: 'btn btn-success',
                }).then(function () {
                    document.getElementById("Instellingen").submit();
                });
            } else {
                swal("Cancelled", "Wijziging geaunnuleerd :)", "error");
            }
        });
    });
	
	
})(window);

