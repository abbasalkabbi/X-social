// this is javascript send data from sign-up to php (sign-up)
// create new acount
const form_sign_up = document.querySelector("#sign-up"),
  button_submit = form_sign_up.querySelector("button");
// get div input  in form
let firstname = document.querySelector("#firstname"),
  lastname = document.querySelector("#lastname"),
  email = document.querySelector("#email"),
  password = document.querySelector("#password"),
  error_sign = document.querySelector(".error-sign");

form_sign_up.onsubmit = (e) => {
  e.preventDefault();
};
function sign_up() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/signup.php", true); // xhr open
  //STart xhr .onload
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
        switch (data) {
          case "firstname":
            //add class
            firstname.classList.add("error-input");
            //remove class
            lastname.classList.remove("error-input");
            email.classList.remove("error-input");
            password.classList.remove("error-input");
            break;
          case "lastname":
            //add class
            lastname.classList.add("error-input");
            //remove class
            firstname.classList.remove("error-input");
            email.classList.remove("error-input");
            password.classList.remove("error-input");
            break;
          case "email":
            //add class
            email.classList.add("error-input");
            //remove class
            firstname.classList.remove("error-input");
            lastname.classList.remove("error-input");
            password.classList.remove("error-input");
            break;
          case "password":
            //add class
            password.classList.add("error-input");
            //remove class
            firstname.classList.remove("error-input");
            lastname.classList.remove("error-input");
            email.classList.remove("error-input");
            break;
          case "successful":
            error_sign.style.display = "none";
            firstname.classList.remove("error-input");
            lastname.classList.remove("error-input");
            email.classList.remove("error-input");
            password.classList.remove("error-input");
            location.reload();
            break;
        }
        //end switch
        if (data != "successful") {
          error_sign.style.display = "flex";
          error_sign.querySelector("h1").innerText = data;
        }
      }
    }
  }; //ENd onload
  //xhr send data
  let formdata = new FormData(form_sign_up);
  xhr.send(formdata);
}

button_submit.onclick = () => sign_up();
