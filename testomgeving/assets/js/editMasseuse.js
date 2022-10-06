function ClickEdit() {
   
    document.getElementById("editMasseuse").readOnly = false;
    document.getElementById("editMasseuseTel").readOnly = false;
    document.getElementById("editMasseuseMail").readOnly = false;
    document.getElementById("editMasseuseParagraafje").readOnly = false;
};
function ButtonShower(){
    var x = document.getElementById("btnSaveMasseuse");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
}
function btnSaveMasseuse(){
    document.getElementById("btnSaveMasseuse").submit();
}