var a = 1;

function Eye1(){
  if (a==1) {
    console.log("Tes")
    document.getElementById("password").type='password';
    document.getElementById('eye').src ='/image/close eye.png'
    let close = document.getElementById('eye');
    close.style.top = '470px'
    a=0;
  }else {
    document.getElementById('password').type='text';
    document.getElementById('eye').src ='/image/Open Eye.png'
    let open = document.getElementById('eye')
    open.style.top = '465px'
    a=1;
  }
}

function Eye2(){
  if (a==1) {
    document.getElementById("confirm-password").type='password';
    document.getElementById('eye-confirm-pass').src ='/image/close eye.png'
    let close = document.getElementById('eye-confirm-pass');
    close.style.top = '580px'
    a=0;
  }else {
    document.getElementById('confirm-password').type='text';
    document.getElementById('eye-confirm-pass').src ='/image/Open Eye.png'
    let open = document.getElementById('eye-confirm-pass')
    open.style.top = '575px'
    a=1;
  }
}

function validateName(){
  let inputName = document.querySelector("#nama-group")
  let valueName = inputName.value;
  let errorName = document.querySelector("#error-name")

  if (valueName == ""){
    errorName.innerHTML = "Group name cannot be empty!"
    inputName.style.border = "1px solid red"
    return false;
  }else {
    errorName.innerHTML = ""
    inputName.style.border = "1px solid white"
    return true;
  }
}

function validatePassword(){
  let inputPassword = document.querySelector("#password")
  let valuePassword = inputPassword.value;
  let errorPassword = document.querySelector("#error-password")

  if (valuePassword == ""){
    errorPassword.innerHTML = "Password cannot be empty!"
    inputPassword.style.border = "1px solid red"
    return false;
  }else if (valuePassword.length < 8){
    errorPassword.innerHTML = "Password must be 8 letters"
    inputPassword.style.border = "1px solid red"
    return false;
  } 
  else {
    errorPassword.innerHTML = ""
    inputPassword.style.border = "1px solid white"
    return true;
  }
}

function validateConfirmPassword(){
  let inputConfirmPassword = document.querySelector("#confirm-password")
  
  let valueConfirmPassword = inputConfirmPassword.value;

  let errorConfirmPassword = document.querySelector("#error-confirm-password")

  let inputPassword = document.querySelector("#password")
  let valuePassword = inputPassword.value;
  

  if (valueConfirmPassword == ""){
    errorConfirmPassword.innerHTML = "Confirm password cannot be empty!"
    inputConfirmPassword.style.border = "1px solid red"
    return false;
  }else if (valueConfirmPassword != valuePassword){
    errorConfirmPassword.innerHTML = "Confirm password must be the same with password"
    inputConfirmPassword.style.border = "1px solid red"
    return false;
  } 
  else {
    errorConfirmPassword.innerHTML = ""
    inputConfirmPassword.style.border = "1px solid white"
    return true;
  }
}

function eye(){
  let eye1 = document.querySelector("#eye")
  let eye2 = document.querySelector("#eye-confirm-pass")
  let isNameTrue = validateName();
  let isPassTrue = validatePassword();

  if (isNameTrue == false && isPassTrue == false){
    eye1.style.top = "490px"
    eye2.style.top = "620px"
  } else if (isNameTrue == true && isPassTrue == false) {
    eye1.style.top = "470px"
    eye2.style.top = "600px"
  } else if (isNameTrue == false && isPassTrue == true){
    eye1.style.top = "490px"
    eye2.style.top = "600px"
  } else {
    eye1.style.top = "470px"
    eye2.style.top = "580px"
  }
}

function validateStatus(){
  let binusianChecked = document.querySelector("#Binusian").checked;
  let nonBinusianChecked = document.querySelector("#Non-Binusian").checked;
  let errorStatus = document.querySelector("#error-status")


  if (!binusianChecked && !nonBinusianChecked){
    errorStatus.innerHTML = "This section is required"
    return false;
  }else {
    errorStatus.innerHTML = ""
    return true;
  } 
}

let nextButton = document.querySelector("#next-btn")
nextButton.addEventListener("click", function(e){
  e.preventDefault();
  
  eye();

  let isNameTrue = validateName();
  let isPassTrue = validatePassword();
  let inputConfirmPassword = validateConfirmPassword();
  let isStatusTrue = validateStatus();
  
  if (isNameTrue && isPassTrue && isStatusTrue && inputConfirmPassword) {
    let form = document.createElement("form");
    form.id = "dynamic-form";
    form.action = "Register 2.html"; // Set the action attribute to the next page
    form.method = "get"; // Choose the appropriate HTTP method (get or post)

    // Append input elements with their values to the form
    form.innerHTML = `
      <input type="hidden" name="group_name" value="${document.getElementById("nama-group").value}">
      <input type="hidden" name="password" value="${document.getElementById("password").value}">
      <input type="hidden" name="status" value="${document.querySelector('input[name="fav_language"]:checked').value}">
    `;

    // Append the form to the document body and submit it
    document.body.appendChild(form);
    form.submit();
  }
  }
  

  
)