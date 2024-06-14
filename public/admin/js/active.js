var links = document.querySelectorAll(".sidebar");
links.foreach(a => {
    ".sidebar".addEventListener("click",()=>{
        resetLinks();
        a.classList.add("active");
    })
})

function resetLinks(){
    links.forEach(a => {
        a.classList.remove("active")
    })
}


