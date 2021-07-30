// this is javascript send data from sign-up to php (sign-up)
// create new acount
const form_sign_in = document.querySelector("#sign-in"),
  button_submit = form_sign_in.querySelector("button");
// get div input
let email = document.querySelector("#email"),
  password = document.querySelector("#password");
form_sign_in.onsubmit = (e) => {
  e.preventDefault();
};
function sign_in() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/signin.php", true); // xhr open
  //STart xhr .onload
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
        switch (data) {
          case "error":
            //add class
            email.classList.add("error-input");
            password.classList.add("error-input");
            break;
          case "password":
            //add
            password.classList.add("error-input");
            //remove
            email.classList.remove("error-input");
            break;
          case "successful":
            email.classList.remove("error-input");
            password.classList.remove("error-input");
            location.reload();
            break;
        }
      }
    }
  }; //ENd onload
  //xhr send data
  let formdata = new FormData(form_sign_in);
  xhr.send(formdata);
}

button_submit.onclick = () => sign_in();
