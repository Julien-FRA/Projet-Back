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

//Page admin

let btnProds = document.getElementById("produits");
let btnClients = document.getElementById("clients");
let btnCom = document.getElementById("com");

let divProds = document.getElementById("divProds");
let divClients = document.getElementById("divClients");
let divCom = document.getElementById("divCom");

btnProds.addEventListener("click", () => {
  if (divProds.style.display === "none") {
    divProds.style.display = "block";
    divClients.style.display = "none";
    divCom.style.display = "none";
  } else {
    divProds.style.display = "none";
  }
});

btnClients.addEventListener("click", () => {
  if (divClients.style.display === "none") {
    divClients.style.display = "block";
    divProds.style.display = "none";
    divCom.style.display = "none";
  } else {
    divClients.style.display = "none";
  }
});

btnCom.addEventListener("click", () => {
  if (divCom.style.display === "none") {
    divCom.style.display = "block";
    divClients.style.display = "none";
    divProds.style.display = "none";
  } else {
    divPhotos.style.display = "none";
  }
});

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
