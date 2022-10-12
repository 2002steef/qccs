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
} 

if( profileMapHeight > contactHeight ){
    contact.style.height = contactHeight + "px";
} else if ( profileMapHeight > contactHeight ){
    profileMap.style.height = contactHeight + "px";
}

