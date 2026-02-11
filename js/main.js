const sections = document.querySelectorAll(".about, .shows");

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add("active");
      observer.unobserve(entry.target); // only trigger once
    }
  });
}, {
  threshold: 0.3
});

sections.forEach(section => {
  observer.observe(section);
});
