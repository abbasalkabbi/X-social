// this is javascript send data from sign-up to php (sign-up)
// create new acount
const form_sign_up = document.querySelector("#sign-up"),
  button_submit = form_sign_up.querySelector("button");
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
      }
    }
  }; //ENd onload
  //xhr send data
  let formdata = new FormData(form_sign_up);
  xhr.send(formdata);
}

button_submit.onclick = () => sign_up();
