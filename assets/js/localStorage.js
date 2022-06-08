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
const formTwo = document.getElementById("regFormPart2"); 
const formFieldsTwo = formTwo.elements;
 function changeHandlerTwo() {
  localStorage.setItem(this.name, this.value);

}
function checkStorageTwo() {
  for (let i = 0; i < formFieldsTwo.length; i++) {
    formFieldsTwo[i].value = localStorage.getItem(formFieldsTwo[i].name);
  }
  attachEventsTwo();
}
function attachEventsTwo() {
  for (let i = 0; i < formFieldsTwo.length; i++) {
    formFieldsTwo[i].addEventListener("change", changeHandlerTwo);
  }
}

checkStorageTwo();  
