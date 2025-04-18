document.addEventListener('DOMContentLoaded', function () {
    var isAnimationOk = window.matchMedia('(prefers-reduced-motion: no-preference)').matches;
    var scrub = true;

    if (isAnimationOk) {
        setupAnimations();
    }

    function setupAnimations() {
        gsap.to(".hero__title-bg--front", {
            yPercent: -5,
            color: 'yellow',
            scale: 2,
            scrollTrigger: {
                trigger: ".hero",
                start: "top top",
                end: "bottom 75%",
                scrub: scrub,
            }
        });

        gsap.to(".hero__title-bg--back", {
            yPercent: 100,
            scrollTrigger: {
                trigger: ".hero",
                start: "top top",
                end: "bottom 75%",
                scrub: scrub,
            }
        });
    }
});
