let masseuseSkills = document.getElementById('masseuseSkills');
let masseuseSkillsHeight = masseuseSkills.offsetHeight;
let aboutCompany = document.getElementById('aboutCompany');
let aboutCompanyHeight = aboutCompany.offsetHeight;
let contact = document.getElementById('contactProfile');
let contactHeight = contact.offsetHeight;
let adress = document.getElementById('adressProfile');
let adressHeight = adress.offsetHeight;
let profileMap = document.getElementById('profileMap');
let profileMapHeight = profileMap.offsetHeight;
// console.log(masseuseSkillsHeight + " en " + aboutCompanyHeight + " en " + contactHeight);
if (masseuseSkillsHeight > aboutCompanyHeight && masseuseSkillsHeight > contactHeight) {
    aboutCompany.style.height = masseuseSkillsHeight + "px";
} else if (masseuseSkillsHeight < aboutCompanyHeight && aboutCompanyHeight > contactHeight) {
    masseuseSkills.style.height = aboutCompanyHeight + "px";
} 

// if (contactHeight+adressHeight>profileMapHeight) {
//     adress.style.height = profileMapHeight/2+"px";
//     contact.style.height = profileMapHeight/2+"px";
// }

