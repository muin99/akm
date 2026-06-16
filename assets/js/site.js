const menuButton = document.querySelector("[data-menu-toggle]");
const menu = document.querySelector("[data-menu]");
const languageLink = document.querySelector("[data-lang]");

if (menuButton && menu) {
  menuButton.addEventListener("click", () => {
    const opened = menu.classList.toggle("is-open");
    menuButton.classList.toggle("is-open", opened);
    menuButton.setAttribute("aria-expanded", opened ? "true" : "false");
  });
}

if (languageLink) {
  languageLink.addEventListener("click", () => {
    const url = new URL(languageLink.href);
    const value = url.searchParams.get("lang") === "en" ? "en" : "bn";
    document.cookie = `km_lang=${value}; path=/; max-age=31536000; SameSite=Lax`;
  });
}

const filters = document.querySelectorAll("[data-filter]");
const mediaItems = document.querySelectorAll("[data-media-type]");

filters.forEach((button) => {
  button.addEventListener("click", () => {
    const wanted = button.dataset.filter;
    filters.forEach((item) => item.classList.toggle("is-selected", item === button));
    mediaItems.forEach((item) => {
      item.hidden = wanted !== "all" && item.dataset.mediaType !== wanted;
    });
  });
});

const revealObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) entry.target.classList.add("is-visible");
    });
  },
  { threshold: 0.14 }
);

document.querySelectorAll("[data-reveal]").forEach((item, index) => {
  item.setAttribute("data-aos", item.dataset.aos || "fade-up");
  item.setAttribute("data-aos-delay", item.dataset.aosDelay || String(Math.min(index * 35, 180)));
  revealObserver.observe(item);
});

if (window.AOS) {
  window.AOS.init({
    duration: 650,
    easing: "ease-out-cubic",
    once: true,
    offset: 80,
  });
}

if (window.lucide) {
  window.lucide.createIcons();
}
