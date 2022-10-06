function ClickEdit() {
   
    document.getElementById("editMasseuse").readOnly = false;
    document.getElementById("editMasseuseTel").readOnly = false;
    document.getElementById("editMasseuseMail").readOnly = false;
    document.getElementById("editMasseuseParagraafje").readOnly = false;
    if (this.value=="Edit") this.value = "Opslaan";
    else this.value = "Edit";
};