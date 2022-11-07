document.addEventListener('DOMContentLoaded', function(){
    const nodeH1 = document.querySelector("h1");
    nodeH1.addEventListener("click", function(){
        nodeH1.textContent = "Dono do currículo";
    });
});

document.addEventListener('DOMContentLoaded', function(){
    const nodesH2 = document.querySelectorAll("h2");
    for(let node of nodesH2)
        node.addEventListener("click", () => node.textContent = "Obrigado!");
});