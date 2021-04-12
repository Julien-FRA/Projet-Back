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
        link.style.animation = `navLinksFade 0.5s ease forwards ${index / 5 + 0.5
          }s`;
      }
    });

    burger.classList.toggle("active");
  });
};
navSlide();

var profil = document.getElementById("profil");
var admin = document.getElementById("admin");

//Page profil

if (document.getElementById("profil")) {
  let btnInfos = document.getElementById("infos");
  let btnCmd = document.getElementById("cmd");
  let btnMdp = document.getElementById("mdp");

  let divInfo = document.getElementById("divinfo");
  let divCmd = document.getElementById("divcmd");
  let divMdp = document.getElementById("divmdp");

  btnInfos.addEventListener("click", () => {
    if (divInfo.style.display === "none") {
      divInfo.style.display = "flex";
      divCmd.style.display = "none";
      divMdp.style.display = "none";
    } else {
      divInfo.style.display = "none";
    }
  });

  btnCmd.addEventListener("click", () => {
    if (divCmd.style.display === "none") {
      divCmd.style.display = "flex";
      divMdp.style.display = "none";
      divInfo.style.display = "none";
    } else {
      divCmd.style.display = "none";
    }
  });

  btnMdp.addEventListener("click", () => {
    if (divMdp.style.display === "none") {
      divMdp.style.display = "flex";
      divInfo.style.display = "none";
      divCmd.style.display = "none";
    } else {
      divMdp.style.display = "none";
    }
  });
}

//Page admin

if (document.getElementById("admin")) {
  let btnProds = document.getElementById("produits");
  let btnClients = document.getElementById("clients");
  let btnCom = document.getElementById("com");
  let btnCommande = document.getElementById("commande");

  let divProds = document.getElementById("divProds");
  let divClients = document.getElementById("divClients");
  let divCom = document.getElementById("divCom");
  let divCommande = document.getElementById("divCommande");

  btnProds.addEventListener("click", () => {
    if (divProds.style.display === "none") {
      divProds.style.display = "block";
      divClients.style.display = "none";
      divCom.style.display = "none";
      divCommande.style.display = "none";
    } else {
      divProds.style.display = "none";
    }
  });

  btnClients.addEventListener("click", () => {
    if (divClients.style.display === "none") {
      divClients.style.display = "block";
      divProds.style.display = "none";
      divCom.style.display = "none";
      divCommande.style.display = "none";
    } else {
      divClients.style.display = "none";
    }
  });

  btnCom.addEventListener("click", () => {
    if (divCom.style.display === "none") {
      divCom.style.display = "block";
      divClients.style.display = "none";
      divProds.style.display = "none";
      divCommande.style.display = "none";
    } else {
      divCom.style.display = "none";
    }
  });

  btnCommande.addEventListener("click", () => {
    if (divCommande.style.display === "none") {
      divCommande.style.display = "block";
      divClients.style.display = "none";
      divProds.style.display = "none";
      divCom.style.display = "none";
    } else {
      divCommande.style.display = "none";
    }
  });
}
