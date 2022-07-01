let togg1 = document.getElementById("togg1");
let togg2 = document.getElementById("togg2");
let togg3 = document.getElementById("togg3");
let d1 = document.getElementById("cam1");
let d2 = document.getElementById("cam2");
let d3 = document.getElementById("cam3");

togg1.addEventListener("click", () => {

    d1.style.display = "block";
    d2.style.display = "none";
    d3.style.display = "none";
  
})

togg2.addEventListener("click", () => {

    d2.style.display = "block";
    d1.style.display = "none";
    d3.style.display = "none";
  
})

togg3.addEventListener("click", () => {

    d3.style.display = "block";
    d2.style.display = "none";
    d1.style.display = "none";
  
})