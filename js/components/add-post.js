const form_add_post = document.querySelector(".add-post"),
  button_submit_addpost = form_add_post.querySelector("#submit"),
  textarea = form_add_post.querySelector(".post-context"),
  add_post_action=document.querySelector(".add-post-action"),
  action=add_post_action.querySelector(".action"),
  text_action=action.querySelector("p"),
  button_action=action.querySelector('button');

// textarea auto size
function resizeTextarea(ev) {
  this.style.height = "24px";
  this.style.height = this.scrollHeight + 12 + "px";
}
textarea.addEventListener("input", resizeTextarea);
// textarea auto size END
//stop reload page when click button submit
form_add_post.onsubmit = (e) => {
  e.preventDefault();
};
function add_post() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/addpost.php", true);
  // xhr load
  xhr.onload = () => {
    // if done
    if (xhr.readyState == XMLHttpRequest.DONE) {
      //if 200
      if (xhr.status == 200) {
        let data = xhr.response;
        console.log(data);
        if(data == ' input empty'){
          //if input empty 
          add_post_action.style.display="flex";
          text_action.innerText=`Post Not Upload(${data})`;
          button_action.innerText='cancel';
          button_action.classList.add('error-input-button')
          button_action.onclick=()=>{
            add_post_action.style.display="none";
          }
        }else if(data == '  Something is Wrong'){
          add_post_action.style.display="flex";
          text_action.innerText=data;
          button_action.innerText='cancel';
          button_action.classList.add('error-input-button')
          button_action.onclick=()=>{
            add_post_action.style.display="none";
          }
        }else{
          add_post_action.style.display="flex";
          text_action.innerText='post upload';
          button_action.innerText='Done';
          button_action.classList.remove('error-input-button')
          button_action.classList.add('upload-button')
          button_action.onclick=()=>{
            location.reload();
          }
        }
      } //if 200 END
    } // if done END
  };
  // xhr load END
  //send data
  let formdata = new FormData(form_add_post);

  xhr.send(formdata);
}
button_submit_addpost.onclick = () => add_post();
