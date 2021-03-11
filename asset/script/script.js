//Menu burger

let navSlide = () => {
  let burger = document.querySelector(".burger");
  let navMenu = document.querySelector(".nav-menu");
  let navlinks = document.querySelectorAll(".nav-menu li");

  burger.addEventListener("click", () => {
    navMenu.classList.toggle("active");

    navlinks.forEach((link, index) => {
      if (link.style.animation) {
        link.style.animation = "";
      } else {
        link.style.animation = `navLinksFade 0.5s ease forwards ${
          index / 5 + 0.5
        }s`;
      }
    });

    burger.classList.toggle("active");
  });
};
navSlide();

//Page profil

let btnInfos = document.getElementById("infos");
let btnCmd = document.getElementById("cmd");
let btnPhotos = document.getElementById("photos");
let btnMdp = document.getElementById("mdp");

let divInfo = document.getElementById("divinfo");
let divCmd = document.getElementById("divcmd");
let divPhotos = document.getElementById("divphotos");
let divMdp = document.getElementById("divmdp");

btnInfos.addEventListener("click", () => {
  if (divInfo.style.display === "none") {
    divInfo.style.display = "flex";
    divCmd.style.display = "none";
    divPhotos.style.display = "none";
    divMdp.style.display = "none";
  } else {
    divInfo.style.display = "none";
  }
});

btnCmd.addEventListener("click", () => {
  if (divCmd.style.display === "none") {
    divCmd.style.display = "flex";
    divPhotos.style.display = "none";
    divMdp.style.display = "none";
    divInfo.style.display = "none";
  } else {
    divCmd.style.display = "none";
  }
});

btnPhotos.addEventListener("click", () => {
  if (divPhotos.style.display === "none") {
    divPhotos.style.display = "flex";
    divMdp.style.display = "none";
    divInfo.style.display = "none";
    divCmd.style.display = "none";
  } else {
    divPhotos.style.display = "none";
  }
});

btnMdp.addEventListener("click", () => {
  if (divMdp.style.display === "none") {
    divMdp.style.display = "flex";
    divInfo.style.display = "none";
    divCmd.style.display = "none";
    divPhotos.style.display = "none";
  } else {
    divMdp.style.display = "none";
  }
});
// const btnInfo = document.getElementById("infos");
// const btnCmd = document.getElementById("cmd");
// const btnMdp = document.getElementById("mdp");
// const btnPhoto = document.getElementById("photos");

// btnInfo.addEventListener("click", AfficherMasquer);
// btnCmd.addEventListener("click", AfficherMasquer);
// btnMdp.addEventListener("click", AfficherMasquer);
// btnPhoto.addEventListener("click", AfficherMasquer);

// divInfo = document.getElementById("divinfo");
// divPhoto = document.getElementById("divphoto");
// divMdp = document.getElementById("divmdp");
// divCmd = document.getElementById("divcmd");

// function AfficherMasquer() {
//     if (divPhoto.style.display == "none") divPhoto.style.display = "block";
//     else divPhoto.style.display = "none";
// }
