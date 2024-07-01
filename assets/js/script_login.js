// const form = document.querySelector("form");
// eField = form.querySelector(".email"),
// eInput = eField.querySelector("input"),
// pField = form.querySelector(".password"),
// pInput = pField.querySelector("input");


// eInput.addEventListener('change', function() {
//   (eInput.value == "") ? eField.classList.add("shake", "error") : checkEmail();

//   setTimeout(()=>{ //remove shake class after 500ms
//     eField.classList.remove("shake");
//   }, 500);
  
//   eInput.onkeyup = ()=>{checkEmail();} //calling checkEmail function on email input keyup
// });

// pInput.addEventListener('change', function() {
//   (pInput.value == "") ? pField.classList.add("shake", "error") : checkPass();
//   // console.log('Input value changed:', nameInput.value);
//   // Call a function or perform actions when input value changes

//   setTimeout(()=>{ //remove shake class after 500ms
//     pField.classList.remove("shake");
//   }, 500);

//   pInput.onkeyup = ()=>{checkPass();} //calling checkPassword function on pass input keyup
// });

// function checkEmail(){ //checkEmail function
//   let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; //pattern for validate email
//   if(!eInput.value.match(pattern)){ //if pattern not matched then add error and remove valid class
//     eField.classList.add("error");
//     eField.classList.remove("valid");
//     let errorTxt = eField.querySelector(".error-txt");
//     //if email value is not empty then show please enter valid email else show Email can't be blank
//     (eInput.value != "") ? errorTxt.innerText = "Enter a valid email address" : errorTxt.innerText = "Email can't be blank";
//   }else{ //if pattern matched then remove error and add valid class
//     eField.classList.remove("error");
//     eField.classList.add("valid");
//   }
// }

// function checkPass(){ //checkPass function
//   if(pInput.value == ""){ //if pass is empty then add error and remove valid class
//     pField.classList.add("error");
//     pField.classList.remove("valid");
//   }else{ //if pass is empty then remove error and add valid class
//     pField.classList.remove("error");
//     pField.classList.add("valid");
//   }
// }

const form = document.querySelector("form");
const eField = form.querySelector(".email"),
      eInput = eField.querySelector("input"),
      pField = form.querySelector(".password"),
      pInput = pField.querySelector("input"),
      submitBtn = form.querySelector("input[type='submit']"); // Select submit button

// Function to check if both email and password are valid
function checkFormValidity() {
  if (eField.classList.contains("valid") && pField.classList.contains("valid")) {
    submitBtn.removeAttribute("disabled"); // Enable submit button
  } else {
    submitBtn.setAttribute("disabled", true); // Disable submit button
  }
}

eInput.addEventListener('change', function() {
  if (eInput.value == "") {
    eField.classList.add("shake", "error");
  } else {
    checkEmail();
  }

  setTimeout(() => {
    eField.classList.remove("shake");
  }, 500);

  eInput.onkeyup = () => {
    checkEmail();
    checkFormValidity(); // Check form validity on keyup
  };
});

pInput.addEventListener('change', function() {
  if (pInput.value == "") {
    pField.classList.add("shake", "error");
  } else {
    checkPass();
  }

  setTimeout(() => {
    pField.classList.remove("shake");
  }, 500);

  pInput.onkeyup = () => {
    checkPass();
    checkFormValidity(); // Check form validity on keyup
  };
});

function checkEmail() {
  let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  if (!eInput.value.match(pattern)) {
    eField.classList.add("error");
    eField.classList.remove("valid");
    let errorTxt = eField.querySelector(".error-txt");
    (eInput.value != "") ? errorTxt.innerText = "Enter a valid email address" : errorTxt.innerText = "Email can't be blank";
  } else {
    eField.classList.remove("error");
    eField.classList.add("valid");
  }
  checkFormValidity(); // Check form validity after checking email
}

function checkPass() {
  if (pInput.value == "") {
    pField.classList.add("error");
    pField.classList.remove("valid");
  } else {
    pField.classList.remove("error");
    pField.classList.add("valid");
  }
  checkFormValidity(); // Check form validity after checking password
}

// Initially disable submit button
submitBtn.setAttribute("disabled", true);
