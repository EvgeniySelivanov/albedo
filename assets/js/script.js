const testForm = document.querySelector(".ajax-form");
testForm?.addEventListener("submit", (e) => {
  e.preventDefault();
  //testForm.previousElementSibling?.remove();//удали предидущий элемент если он есть

if(testForm.previousElementSibling){
  testForm.previousElementSibling?.remove();
}




  const data = new FormData(testForm); //собирает все данные формы
  data.append("action", "ajaxSendMail"); //добавили данные

  axios
    .post("/index.php", data)
    .then(function (response) {
      //console.log(response.data);
     const {text,success}=response.data;
     const html=`<div class="alert alert-${success ?'success':'danger'}">${text}</div>`;
     testForm.insertAdjacentHTML('beforebegin',html);

    })
    .catch(function (error) {
      console.log(error);
    });
});
