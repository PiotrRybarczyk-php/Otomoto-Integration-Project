function copy(e) {
    let inputContainer = document.querySelector("#input-container");
    const input = document.createElement('input');
    input.value = e.target.dataset.link;
    console.log(e.target.dataset)
    document.body.appendChild(input);
    input.select();
    document.execCommand("copy");
    document.body.removeChild(input);
    e.target.style.background = "#3333";
    
    setTimeout(function(){
      e.target.style.background = "#0866C6";
    }, 500);

}
function copyInit(){
  document.querySelectorAll(".copy").forEach(button => button.addEventListener("click", copy));
}