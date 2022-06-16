
//registration
let buttonClick = document.getElementById("registration-btn")
let backgroundClick = document.getElementById("background")
buttonClick.addEventListener("click",(e)=>{
    document.querySelector(".blur").classList.add("active")
});
backgroundClick.addEventListener("click",(e)=>{
    document.querySelector(".blur").classList.remove("active")
    if (document.getElementById("reg").classList.contains("active")){
        document.getElementById("auth").classList.add("active")
        document.getElementById("reg").classList.remove("active")
    }
});

//get authorization
let changeReg = document.getElementById("changeReg")
changeReg.addEventListener("click", (e)=>{
    document.getElementById("auth").classList.remove("active")
    document.getElementById("reg").classList.add("active")
});