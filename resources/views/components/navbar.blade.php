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
    
    /* Mobile menu styles */
    .hamburger {
        display: none;
        flex-direction: column;
        justify-content: space-between;
        width: 30px;
        height: 21px;
        cursor: pointer;
        z-index: 100;
        margin-left: auto; /* Push to right side */
    }
    
    .hamburger div {
        width: 100%;
        height: 3px;
        background-color: white;
        transition: all 0.3s ease;
    }
    
    .mobile-nav {
        position: fixed;
        top: 0;
        right: -100%;
        width: 70%;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.9);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: right 0.3s ease;
        z-index: 99;
    }
    
    .mobile-nav.open {
        right: 0;
    }
    
    .mobile-nav a {
        margin: 15px 0;
        font-size: 1.5rem;
    }
    
    /* Menu open styles */
    .hamburger.open div:first-child {
        transform: rotate(45deg) translate(5px, 6px);
    }
    
    .hamburger.open div:nth-child(2) {
        opacity: 0;
    }
    
    .hamburger.open div:last-child {
        transform: rotate(-45deg) translate(5px, -6px);
    }
    
    /* Responsive breakpoint */
    @media (max-width: 768px) {
        .desktop-nav {
            display: none;
        }
        
        .hamburger {
            display: flex;
        }
        
        nav {
            justify-content: space-between;
        }
    }
</style>

<nav id="navbar"
    class="w-full flex items-center px-10 text-white fixed top-0 left-0 right-0 shadow-md z-50 transition-transform duration-300 my-2"
    style="font-family: 'DM Serif Text', serif;">
    
    <!-- Desktop Navigation -->
    <div class="desktop-nav flex justify-between flex-grow">
        <a href="#location" class="text-lg font-semibold nav-item pb-4 mx-4">Location</a>
        <a href="#gallery" class="text-lg font-semibold nav-item mx-4">Gallery</a>
        <a href="#aboutUs" class="text-lg font-semibold nav-item mx-4">About Us</a>
    </div>
    
    <!-- Hamburger Menu Button -->
    <div class="hamburger" id="hamburger">
        <div></div>
        <div></div>
        <div></div>
    </div>
    
    <!-- Mobile Navigation -->
    <div class="mobile-nav" id="mobileNav">
        <a href="#location" class="text-lg font-semibold nav-item">Location</a>
        <a href="#gallery" class="text-lg font-semibold nav-item">Gallery</a>
        <a href="#aboutUs" class="text-lg font-semibold nav-item">About Us</a>
    </div>
</nav>

<script>
    let lastScrollTop = 0;
    const navbar = document.getElementById("navbar");
    const sections = document.querySelectorAll("section");
    const navLinks = document.querySelectorAll(".nav-item");
    const hamburger = document.getElementById("hamburger");
    const mobileNav = document.getElementById("mobileNav");

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

    // Hamburger menu toggle
    hamburger.addEventListener("click", function() {
        hamburger.classList.toggle("open");
        mobileNav.classList.toggle("open");
    });
    
    // Close mobile menu when clicking a link
    const mobileLinks = mobileNav.querySelectorAll("a");
    mobileLinks.forEach(link => {
        link.addEventListener("click", function() {
            hamburger.classList.remove("open");
            mobileNav.classList.remove("open");
        });
    });

    window.addEventListener("scroll", setActiveNav);
</script>