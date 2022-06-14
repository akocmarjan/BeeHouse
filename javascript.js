document.querySelector("#show-login").addEventListener("click", function(){
    document.querySelector(".popup").classList.add("active");
    document.querySelector(".popup-bg").classList.add("active");
});

document.querySelector(".popup .close-btn").addEventListener("click", function(){
    document.querySelector(".popup").classList.remove("active");
    document.querySelector(".popup-bg").classList.remove("active");
});
document.querySelector("#cont").addEventListener("click", function(){
    document.querySelector(".notif-popup").classList.add("hide");
});





