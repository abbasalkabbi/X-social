// this is javascript send data from sign-up to php (sign-up)
// create new acount
const form_sign_in = document.querySelector("#sign-in"),
  button_submit = form_sign_in.querySelector("button");
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
      }
    }
  }; //ENd onload
  //xhr send data
  let formdata = new FormData(form_sign_in);
  xhr.send(formdata);
}

button_submit.onclick = () => sign_in();
