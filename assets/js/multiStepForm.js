let currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

let regForm = document.getElementById('regForm');

function showTab(n) {
  var x = document.getElementsByClassName("tab");
  document.querySelectorAll('.tab').forEach(tab => tab.classList.add('hidden'));

  x[n].classList.remove('hidden');
  if (n == 0) {
    document.getElementById("prevBtn").classList.add('hidden');
  } else {
    document.getElementById("prevBtn").classList.remove('hidden');
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  fixStepIndicator(n);
}

async function nextPrev(btn,n) {

  let x = document.getElementsByClassName("tab");
  if (n == 1 && !await validateForm()) return false;




  fetch(regForm.action, {
    method: 'POST',
    body: new FormData(regForm)
  })
    .then(response => response.json()) 
    .then(data => {

      if (!data.error) {
        saveParticipant(+data.id, regForm);  // save to localStorage
        x[currentTab].classList.add('hidden');
        currentTab = currentTab + n;


        if (currentTab >= x.length) {
          return false;
        }
        showTab(currentTab);
        localStorage.setItem('step', currentTab);
        if (currentTab >= x.length - 1) {
          removeParticipant()
        }
      }
      /**Вывод ошибок после проверки на стороне сервера */
      else {
        alert(data.error);
      }
    });

}

async function validateForm() {
  let valid = true;
  if (currentTab == 0) {
    let emailAddress = document.getElementById('email');
    let firstName = document.getElementById('firstName');
    let lastName = document.getElementById('lastName');
    let phone=document.getElementById('phone');
    let patternName = new RegExp(/^[a-zA-Z\-]+$/);
    let patternPhone=new RegExp(/\+\d{2}(?<code>\d{3})\s?\d{3}(?:[- ]?\d{2}){2}/g);
    let pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);

    if (!pattern.test(emailAddress.value)) {
      valid = false;
      emailAddress.classList.add('invalid');
      alert('Mail invalid');
    }
    if (!patternName.test(firstName.value)) {
      valid = false;
      firstName.classList.add('invalid');
      
      alert('First name invalid');
    }
    if (!patternName.test(lastName.value)) {
      valid = false;
      lastName.classList.add('invalid');
      
      alert('Last name invalid');
    }
    if (!patternPhone.test(phone.value)) {
      valid = false;
      phone.classList.add('invalid');
      
      alert('Phone invalid');
    }
  }

  document.querySelectorAll('.required').forEach(element => {
    if (!element.value) {
      element.classList.add('invalid');
      
      valid = false;
    }
  });



  if (valid) {
    document.querySelectorAll(".step")[currentTab].classList.add("finish");
  }

  return valid;
}


function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}


function removeClassError(e) {
  e.target.classList.remove('invalid');
}
const requiredElements = document.querySelectorAll('.required');
requiredElements.forEach(element => element.addEventListener('input', removeClassError));


function saveParticipant(data, form) {
  document.getElementById('id').value = data;
  let share_tw_href = document.getElementById('share_tw').href;
  let share_fb_href = document.getElementById('share_fb').href;

  document.getElementById('share_tw').href = share_tw_href.slice(0, share_tw_href.lastIndexOf('/') + 1) + data;
  document.getElementById('share_fb').href = share_fb_href.slice(0, share_fb_href.lastIndexOf('%2F') + 3) + data;

  let user_data = Object.fromEntries(new FormData(form));
  user_data.id = data;
  localStorage.setItem('user_data', JSON.stringify(user_data));

}

function removeParticipant() {
  localStorage.removeItem('step');
  localStorage.removeItem('user_data');
}

function loadParticipant() {
  let user_data = JSON.parse(localStorage.getItem('user_data')); // isset   null
  if (user_data) {
    document.getElementById('id').value = user_data.id;
    document.getElementById('share_tw').href = document.getElementById('share_tw').href + user_data.id;
    document.getElementById('share_fb').href = document.getElementById('share_fb').href + user_data.id;
    currentTab = Number(localStorage.getItem('step') ?? 0);
    showTab(currentTab);
    delete user_data.filename;
    for (const key in user_data) {
      if (Object.hasOwnProperty.call(user_data, key)) {
        const element = user_data[key];
        document.querySelector(`[name="${key}"]`).value = element;
      }
    }
  }
}

loadParticipant();