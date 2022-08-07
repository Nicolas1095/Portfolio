$(document).ready(function () {
    gsap.set("#developer h1", {
        y: "-50px",
        opacity: 0.3,
    });
    gsap.set("#presentation_name h1", {
        y: "100px",
        opacity: 0.3,
    });
    gsap.set(".presentation .bar", { width: 0, opacity: 0.3, overwrite: true });
    let presentationWidth = $(".presentation h1").innerWidth();
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(TweenLite);
    gsap.to(".presentation .bar", {
        width: presentationWidth,
        opacity: 100,
        delay: 0.5,
        duration: 1,
    });
    gsap.to("#developer h1", {
        y: 0,
        margin: "8px",
        opacity: 1,
        duration: 1,
        delay: 1.5,
    });
    gsap.to("#presentation_name h1", {
        y: 0,
        opacity: 1,
        margin: "8px",
        duration: 1,
        delay: 1,
    });
    gsap.set(".btn_presentation", {
        opacity: 0,
    });
    gsap.to(".btn_presentation", {
        opacity: 1,
        duration: 1,
        delay: 2,
    });

    gsap.set("#certifications .cards_container .row", { perspective: 800 });
    gsap.set("#certifications .card", {
        y: "200%",
        transformStyle: "preserve-3d",
        rotationY: -90,
        overwrite: true,
    });
    ScrollTrigger.batch("#certifications", {
        interval: 0.1,
        onEnter: (batch) =>
            gsap.to("#certifications .card", {
                y: 0,
                duration: 0.5,
                overwrite: true,
                stagger: 0.25,
                onComplete() {
                    gsap.to("#certifications .card", {
                        delay: 0.1,
                        duration: 0.2,
                        rotationY: 0,
                    });
                },
            }),
        onLeave: (batch) =>
            gsap.to("#certifications .card", {
                y: "-200%",
                overwrite: true,
                rotationY: 90,
                duration: 0.001,
            }),
        onEnterBack: (batch) =>
            gsap.to("#certifications .card", {
                y: 0,
                duration: 0.5,
                overwrite: true,
                stagger: 0.25,
                onComplete() {
                    gsap.to("#certifications .card", {
                        delay: 0.1,
                        duration: 0.2,
                        rotationY: 0,
                    });
                },
            }),
        onLeaveBack: (batch) =>
            gsap.set("#certifications .card", {
                y: "200%",
                overwrite: true,
                rotationY: 90,
                duration: 0.001,
            }),
        start: "70px 90%",
        end: "120% 20%",
    });
    gsap.set("#proyects .card", { opacity: 0, y: -100, overwrite: true });
    ScrollTrigger.batch("#proyects", {
        interval: 0.1,
        onEnter: (batch) =>
            gsap.to("#proyects .card", {
                opacity: 1,
                y: 0,
                stagger: { each: 0.15, grid: [1, 3] },
                overwrite: true,
            }),
        onLeave: (batch) =>
            gsap.set("#proyects .card", {
                opacity: 0,
                y: -100,
                duration: 0.5,
                overwrite: true,
            }),
        onEnterBack: (batch) =>
            gsap.to("#proyects .card", {
                opacity: 1,
                y: 0,
                stagger: 0.15,
                overwrite: true,
            }),
        onLeaveBack: (batch) =>
            gsap.set("#proyects .card", {
                opacity: 0,
                duration: 0.5,
                y: 100,
                overwrite: true,
            }),
        start: "70px 90%",
        end: "120% 20%",
    });
    gsap.set("#skills .skill_category", {
        x: "-100vw",
        overwrite: true,
        duration: 0.001,
    });
    ScrollTrigger.batch("#skills", {
        onEnter: (batch) =>
            gsap.to("#skills .skill_category", {
                x: 0,
                duration: 1,
                overwrite: true,
                stagger: -0.3,
            }),
        onLeave: (batch) =>
            gsap.to("#skills .skill_category", {
                x: "100vw",
                overwrite: true,
            }),
        onEnterBack: (batch) =>
            gsap.to("#skills .skill_category", {
                x: 0,
                duration: 1,
                overwrite: true,
                stagger: 0.5,
            }),
        onLeaveBack: (batch) =>
            gsap.set("#skills .skill_category", {
                x: "-100vw",
                overwrite: true,
            }),
        start: "70px 90%",
        end: "120% 20%",
    });
    gsap.set(".nav-content .btn", {
        x: 1000,
        duration: 0.1,
    });
    $(".nav-button").click(function () {
        $(".nav-content").toggleClass("enabled");
        $(".nav-button").toggleClass("enabled");
        $(".nav-button i").toggleClass("fa-times");
        if ($(".nav-content").hasClass("enabled")) {
            gsap.to(".nav-content .btn", {
                x: 0,
                duration: 1,
                stagger: 0.1,
            });
        } else if (!$(".nav-content").hasClass("enabled")) {
            gsap.to(".nav-content .btn", {
                x: 1000,
                duration: 1,
                stagger: -0.1,
            });
        }
    });
    $("a").smoothScroll();
    $("#add_type").click(function () {
        $(".form_float").fadeIn();
        return false;
    });
    $(".close").click(function () {
        $(".close").parent().fadeOut();
        return false;
    });
});
