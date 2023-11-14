// Get the slider navigation container and the individual buttons
const sliderNav = document.querySelector(".slider-navigation");
const btns = document.querySelectorAll(".nav-btn");
const slides = document.querySelectorAll(".img-slide");

// Function to navigate to a specific slide
const sliderNavHandler = function (manual) {
    btns.forEach((btn) => {
        btn.classList.remove("active");
    });

    slides.forEach((slide) => {
        slide.classList.remove("active");
    });

    btns[manual].classList.add("active");
    slides[manual].classList.add("active");
};

// Event listener for each button in the slider navigation
btns.forEach((btn, i) => {
    btn.addEventListener("click", () => {
        sliderNavHandler(i);
    });
});

// Function to handle next and previous buttons
const nextButton = document.querySelector(".fa-arrow-right");
const prevButton = document.querySelector(".fa-arrow-left");

nextButton.addEventListener("click", () => {
    const currentActiveIndex = Array.from(btns).findIndex((btn) =>
        btn.classList.contains("active")
    );
    const nextIndex = (currentActiveIndex + 1) % btns.length;
    sliderNavHandler(nextIndex);
});

prevButton.addEventListener("click", () => {
    const currentActiveIndex = Array.from(btns).findIndex((btn) =>
        btn.classList.contains("active")
    );
    const prevIndex = (currentActiveIndex - 1 + btns.length) % btns.length;
    sliderNavHandler(prevIndex);
});
