function validateName () {
  let inputName = document.querySelector("#team-name")
  let valueName = inputName.value;
  let errorName = document.querySelector("#error-teamName")

  if (valueName == ""){
    errorName.innerHTML = "Team name cannot be empty"
    inputName.style.border = "2px solid red"
    return false;
  } else {
    errorName.innerHTML = ""
    inputName.style.border = "2px solid black"
    return true;
  }
}

function validatePassword () {
  let inputPassword = document.querySelector("#password")
  let valuePassword = inputPassword.value;
  let errorPassword = document.querySelector("#error-password")

  if (valuePassword == ""){
    errorPassword.innerHTML = "Password cannot be empty"
    inputPassword.style.border = "2px solid red"
    return false;
  } else {
    errorPassword.innerHTML = ""
    inputPassword.style.border = "2px solid black"
    return true;
  }
}



let loginButton = document.querySelector("#login-button")
loginButton.addEventListener("click", function(e){
  e.preventDefault();

  let isNameTrue = validateName();
  let isPassTrue = validatePassword();

  if (isNameTrue && isPassTrue){
    let submitForm = document.querySelector("#login-form")
    submitForm.submit();
  }
  
  
})