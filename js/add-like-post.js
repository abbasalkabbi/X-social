const form_like_post=document.querySelector('.footer-post'),
button_submit_like=form_like_post.querySelector(".like")
console.log("ff")
form_like_post.onsubmit = (e) => {
  e.preventDefault();
};
button_submit_like.onclick=()=> add_like(form_like_post)



  function add_like(form) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/addlikepost.php", true);
    // xhr load
    xhr.onload = () => {
      // if done
      if (xhr.readyState == XMLHttpRequest.DONE) {
        //if 200
        if (xhr.status == 200) {
          let data = xhr.response;
          console.log(data);
          if(data =="like"){
              form.querySelector(".like").classList.add('like-active')
              form.querySelector(".like").innerText="liked"

          }else{
            form.querySelector(".like").classList.remove('like-active');
            form.querySelector(".like").innerText="like"
          }
          
        } //if 200 END
      } // if done END
    };
    // xhr load END
    //send data
    let formdata = new FormData(form);
  
    xhr.send(formdata);
  }

  