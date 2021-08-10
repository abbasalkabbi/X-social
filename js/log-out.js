const logout_button=document.querySelector(".log-out")

logout_button.onclick=()=>log_out();
function log_out() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/logout.php", true); // xhr open
    //STart xhr .onload
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          console.log(data);
          if(data == 'log out'){
            location.reload();
          }
        }
      }
    }; //ENd onload
    //xhr send data
   
    xhr.send();
  }
  

  