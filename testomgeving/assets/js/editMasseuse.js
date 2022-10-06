function ClickEdit() {
    var x = document.getElementById("btnSaveMasseuse");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
    document.getElementById("editMasseuse").readOnly = false;
    document.getElementById("editMasseuseTel").readOnly = false;
    document.getElementById("editMasseuseMail").readOnly = false;
    document.getElementById("editMasseuseParagraafje").readOnly = false;
    document.getElementById("editMasseusePostcode").readOnly = false;
    document.getElementById("editMasseuseStraat").readOnly = false;
    document.getElementById("editMasseusePlaats").readOnly = false;
    document.getElementById("editMasseuseHN").readOnly = false;
    document.getElementById("editMasseuseHNT").readOnly = false;
};
function ButtonShower(){
    var x = document.getElementById("btnSaveMasseuse");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
    document.getElementById("editMasseuse").readOnly = true;
    document.getElementById("editMasseuseTel").readOnly = true;
    document.getElementById("editMasseuseMail").readOnly = true;
    document.getElementById("editMasseuseParagraafje").readOnly = true;
    document.getElementById("editMasseusePostcode").readOnly = true;
    document.getElementById("editMasseuseStraat").readOnly = true;
    document.getElementById("editMasseusePlaats").readOnly = true;
    document.getElementById("editMasseuseHN").readOnly = true;
    document.getElementById("editMasseuseHNT").readOnly = true;
    document.getElementById("btnSaveMasseuse").submit();
}