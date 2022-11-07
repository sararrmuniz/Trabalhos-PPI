window.onload = function (){
    const subt = document.querySelectorAll("h2");

    for(let sub of subt){
        sub.onclick = () => sub.nextElementSibling.style.display = "none";
        sub.ondblclick = () => sub.nextElementSibling.style.display = "block";
    }
}