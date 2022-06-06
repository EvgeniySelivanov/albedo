const form = document.getElementById("regForm");
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
