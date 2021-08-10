const form_add_comments = document.querySelector(".add-comment"),
  button_submit_addcomment = form_add_comments.querySelector("#submit"),
  textarea = form_add_comments.querySelector(".add-comment-context");
 
 

// textarea auto size
function resizeTextarea(ev) {
  this.style.height = "24px";
  this.style.height = this.scrollHeight + 12 + "px";
}
textarea.addEventListener("input", resizeTextarea);
// textarea auto size END
//stop reload page when click button submit
form_add_comments.onsubmit = (e) => {
  e.preventDefault();
};
function add_comment() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../php/addcomment.php", true);
  // xhr load
  xhr.onload = () => {
    // if done
    if (xhr.readyState == XMLHttpRequest.DONE) {
      //if 200
      if (xhr.status == 200) {
        let data = xhr.response;
        console.log(data);
        console.log(data);
        if(data == 'Upload'){
          location.reload();
        }else{
alert(data)
        }
        
      } //if 200 END
    } // if done END
  };
  // xhr load END
  //send data
  let formdata = new FormData(form_add_comments);

  xhr.send(formdata);
}
button_submit_addcomment.onclick = () => add_comment();
