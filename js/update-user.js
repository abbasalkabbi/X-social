const user_edit_form=document.querySelector('.user-edit'),
button =user_edit_form.querySelector(".save");

user_edit_form.onsubmit = (e) => {
    e.preventDefault();
};
console.log(user_edit_form);
//function update()
function update(){
  let xhr=new XMLHttpRequest();
  xhr.open("POST","../php/update.php",true);// open
 
  xhr.onload=()=>{
      // if done
    if (xhr.readyState == XMLHttpRequest.DONE) {
  //if 200
          if (xhr.status == 200) {
              let data =xhr.response;
              console.log(data);
          }//if 200 END
     }
    // if done END
  }
  let form_date= new FormData(user_edit_form);//hendle input
  xhr.send(form_date);//send date
}
button.onclick=()=> update();