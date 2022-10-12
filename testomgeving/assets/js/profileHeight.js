let masseuseSkills = document.getElementById('masseuseSkills');
let masseuseSkillsHeight = masseuseSkills.offsetHeight;
let aboutCompany = document.getElementById('aboutCompany');
let aboutCompanyHeight = aboutCompany.offsetHeight;
let contact = document.getElementById('contactProfile');
let contactHeight = contact.offsetHeight;
let profileMap = document.getElementById('profileMap');
let profileMapHeight = profileMap.offsetHeight;
// console.log(masseuseSkillsHeight + " en " + aboutCompanyHeight + " en " + contactHeight);
if (masseuseSkillsHeight > aboutCompanyHeight) {
    aboutCompany.style.height = masseuseSkillsHeight + "px";
} else if (masseuseSkillsHeight < aboutCompanyHeight ) {
    masseuseSkills.style.height = aboutCompanyHeight + "px";
} else if(contactHeight < profileMapHeight){
    contact.style.height = profileMapHeight + "px";
}

// if (contactHeight+adressHeight>profileMapHeight) {
//     adress.style.height = profileMapHeight/2+"px";
//     contact.style.height = profileMapHeight/2+"px";
// }

