if(localStorage.getItem('currentTab')){
var  currentTab=Number(localStorage.getItem('currentTab'));
}  
else{var currentTab = 0;}


showTab(currentTab); // Display the current tab

function showTab(n) {
  var x = document.getElementsByClassName("tab");

  x[n].style.display = "block";
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  fixStepIndicator(n);
}

function nextPrev(btn, n) {

  var x = document.getElementsByClassName("tab");

  if (n == 1 && !validateForm()) return false;
  x[currentTab].style.display = "none";

/**Удалить сведения о номере формы и запистать номер формы +1 */
  localStorage.removeItem('currentTab');
  localStorage.setItem('currentTab',currentTab+Number(n));

  currentTab = Number(localStorage.getItem('currentTab'));
  console.log(`x.lenght=${x.length}` );
   if (currentTab >= Number(x.length)-1) {
 
    localStorage.clear();
    localStorage.setItem('currentTab',currentTab-1);
    return false;
  }


  fetch(btn.closest('form').action, {
    method: 'POST',
    body: new FormData(btn.closest('form'))
  })
    .then(response => response.text())
    .then(data => {
      if (data) {
        document.getElementById('id').value = data;
        document.getElementById('share_tw').href = document.getElementById('share_tw').href + data;
        document.getElementById('share_fb').href = document.getElementById('share_fb').href + data;

      }
      showTab(currentTab);
    });
    

}

function validateForm() {
  emailAddress = document.getElementById('email');
  var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
  var check = pattern.test(emailAddress.value);

  // This function deals with validation of the form fields
  var x, y, i, valid = true;

  x = document.getElementsByClassName("tab");

  y = x[currentTab].getElementsByClassName("required");

  for (i = 0; i < y.length; i++) {
    if (y[i].value == "") {
      y[i].className += " invalid";
      valid = false;
    }
  }
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }


  return valid; // return the valid status
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



let emailParticipant = document.getElementById('email');

emailParticipant.addEventListener('blur', (e) => {
  const formData = new FormData();
  formData.append('email', emailParticipant.value);
  fetch('/isset-participant', {
    method: 'POST',
    body: formData
  })
    .then(response => response.text())
    .then(data => {
      // alert(data)
    });
})
