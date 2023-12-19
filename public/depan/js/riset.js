// get dropdown dari page
const dropdowns = document.querySelectorAll(".riset_dropdown");

// loop semua elemen
dropdowns.forEach((dropdown) => {
  // ambil inner element
  const select = dropdown.querySelector(".riset_dropdown-title");
  const caret = dropdown.querySelector(".caret");
  const menu = dropdown.querySelector(".riset_dropdown-menu");
  const options = dropdown.querySelector(".riset_dropdown-menu li");

  // method buat dropdown yg banyak dalam 1 page
  select.addEventListener("click", () => {
    // rotate panah
    caret.classList.toggle("caret-rotate");
    // open menu
    menu.classList.toggle("riset_dropdown-menu-open");
  });
});
