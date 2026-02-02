document.addEventListener("DOMContentLoaded", function () {
  const menu = document.querySelector("nav.pxl-header-nav ul#menu-menu-2");

  if (!menu) return;

  const slug = "contact-us";

  // Build contact URL safely
  const contactUrl = new URL("/" + slug + "/", window.location.href).href;

  // Check if already exists
  let li = menu.querySelector(".menu-item-contact");

  if (!li) {
    li = document.createElement("li");
    li.className =
      "menu-item menu-item-type-post_type menu-item-object-page menu-item-contact";

    li.innerHTML = `
            <a href="${contactUrl}">
                <span>Contact Us</span>
            </a>
        `;

    menu.appendChild(li);
  }

  // Normalize current path
  const currentPath = window.location.pathname
    .replace(/\/+$/, "")
    .toLowerCase();

  const contactPath = "/" + slug;

  // Add active classes when on Contact page
  if (currentPath === contactPath) {
    li.classList.add("current-menu-item", "current_page_item");
  }
});
