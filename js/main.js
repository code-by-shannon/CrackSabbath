document.querySelectorAll(".toggle").forEach((header) => {
    header.addEventListener("mouseenter", () => {
      header.parentElement.classList.add("active");
    }, { once: true });
  });
  