<style>
    .nav-hidden {
        transform: translateY(-100%);
        transition: transform 0.3s ease-in-out;
    }

    .nav-item {
        position: relative;
        padding-bottom: 4px;
    }

    .nav-item::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 3px;
        background-color: white;
        transition: width 0.3s ease-in-out;
    }

    .nav-item:hover::after,
    .nav-item.active::after {
        width: 100%;
    }
</style>
<nav id="navbar"
    class="w-full flex justify-between items-center px-10 text-white fixed top-0 left-0 right-0 shadow-md z-50 transition-transform duration-300"
    style="font-family: 'DM Serif Text', serif;">
    <a href="#location" class="text-lg font-semibold nav-item pb-4">Location</a>
    <a href="#gallery" class="text-lg font-semibold mx-auto nav-item">Gallery</a>
    <a href="#aboutUs" class="text-lg font-semibold nav-item">About Us</a>
</nav>
<script>
    let lastScrollTop = 0;
    const navbar = document.getElementById("navbar");
    const sections = document.querySelectorAll("section");
    const navLinks = document.querySelectorAll(".nav-item");

    window.addEventListener("scroll", function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop) {
            navbar.classList.add("nav-hidden");
        } else {
            navbar.classList.remove("nav-hidden");
        }
        lastScrollTop = scrollTop;
    });

    function setActiveNav() {
        let currentSection = "";

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;

            if (window.scrollY >= sectionTop - sectionHeight / 3) {
                currentSection = section.getAttribute("id");
            }
        });

        navLinks.forEach(link => {
            link.classList.remove("active");
            if (link.getAttribute("href").substring(1) === currentSection) {
                link.classList.add("active");
            }
        });
    }

    window.addEventListener("scroll", setActiveNav);
</script>
