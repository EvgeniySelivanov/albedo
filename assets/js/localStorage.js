const form = document.getElementById("regFormPart1");

const formFields = form.elements;


function changeHandler() {
  localStorage.setItem(this.name, this.value);
  console.log(this.name, this.value);
}
function checkStorage() {
  for (let i = 0; i < formFields.length; i++) {
    formFields[i].value = localStorage.getItem(formFields[i].name);
  }
  attachEvents();
}
function attachEvents() {
  for (let i = 0; i < formFields.length; i++) {
    formFields[i].addEventListener("change", changeHandler);
  }
}

checkStorage();
/*----------------------------------------------------------------------------*/ 
 const form2 = document.getElementById("regFormPart2"); 
 const formFields2 = form2.elements; 
 function changeHandler2() {
  localStorage.setItem(this.name, this.value);
  console.log(this.name, this.value);
}
function checkStorage2() {
  for (let i = 0; i < formFields2.length; i++) {
    formFields2[i].value = localStorage.getItem(formFields2[i].name);
  }
  attachEvents2();
}
function attachEvents2() {
  for (let i = 0; i < formFields2.length; i++) {
    formFields2[i].addEventListener("change", changeHandler2);
  }
}

checkStorage2(); 
