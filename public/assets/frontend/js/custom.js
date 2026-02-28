document.addEventListener("DOMContentLoaded", () => {

  /* =========================
     AUTH MODAL + TABS
  ==========================*/
  const openBtn = document.getElementById("openAuth");
  const modal = document.getElementById("authModal");
  const closeBtn = document.getElementById("closeAuth");

  const tabLogin = document.getElementById("tabLogin");
  const tabSignup = document.getElementById("tabSignup");

  const loginForm = document.getElementById("loginForm");
  const signupForm = document.getElementById("signupForm");

  if (openBtn && modal) {
    openBtn.addEventListener("click", (e) => {
      e.preventDefault();
      modal.classList.remove("hidden");
      modal.classList.add("flex");
    });
  }

  if (closeBtn && modal) {
    closeBtn.addEventListener("click", () => {
      modal.classList.add("hidden");
      modal.classList.remove("flex");
    });

    modal.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
      }
    });
  }

  if (tabLogin && tabSignup) {
    tabLogin.addEventListener("click", () => {
      loginForm.classList.remove("hidden");
      signupForm.classList.add("hidden");

      tabLogin.classList.add("border-[#2B4F6E]", "text-[#2B4F6E]");
      tabSignup.classList.remove("border-[#2B4F6E]", "text-[#2B4F6E]");
      tabSignup.classList.add("text-gray-400");
    });

    tabSignup.addEventListener("click", () => {
      signupForm.classList.remove("hidden");
      loginForm.classList.add("hidden");

      tabSignup.classList.add("border-[#2B4F6E]", "text-[#2B4F6E]");
      tabLogin.classList.remove("border-[#2B4F6E]", "text-[#2B4F6E]");
      tabLogin.classList.add("text-gray-400");
    });
  }

  /* =========================
     HERO SLIDER
  ==========================*/
  const slides = document.querySelectorAll("#slider .slide");
  const dotsContainer = document.getElementById("dots");
  let current = 0;
  let interval;

  if (slides.length && dotsContainer) {
    slides.forEach((_, i) => {
      const dot = document.createElement("button");
      dot.className =
        "w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all duration-300";
      dot.onclick = () => goTo(i);
      dotsContainer.appendChild(dot);
    });

    const dots = dotsContainer.children;

    function updateDots() {
      Array.from(dots).forEach((dot, i) => {
        dot.classList.toggle("bg-white", i === current);
        dot.classList.toggle("scale-125", i === current);
      });
    }

    function goTo(index) {
      slides[current].classList.remove("active");
      current = (index + slides.length) % slides.length;
      slides[current].classList.add("active");
      updateDots();
    }

    function next() {
      goTo(current + 1);
    }

    function startAuto() {
      interval = setInterval(next, 5200);
    }

    function stopAuto() {
      clearInterval(interval);
    }

    const sliderEl = document.getElementById("slider");
    sliderEl.addEventListener("mouseenter", stopAuto);
    sliderEl.addEventListener("mouseleave", startAuto);

    updateDots();
    startAuto();
  }

  /* =========================
     SWIPER REVIEW
  ==========================*/
  if (typeof Swiper !== "undefined") {
    new Swiper(".reviewSwiper", {
      loop: true,
      spaceBetween: 24,
      grabCursor: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        0: { slidesPerView: 1 },
        640: { slidesPerView: 1.2 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
      },
    });
  }

  /* =========================
     SCROLL TO TOP + PROGRESS
  ==========================*/
  const scrollBtn = document.getElementById("scrollToTopProgress");
  const progressCircle = document.getElementById("progressCircle");

  if (scrollBtn && progressCircle) {
    window.addEventListener("scroll", () => {
      const scrollTotal =
        document.documentElement.scrollHeight - window.innerHeight;
      const scrollPosition = window.scrollY;
      const scrollPercent = Math.min(scrollPosition / scrollTotal, 1);

      const offset = 100.53 * (1 - scrollPercent);
      progressCircle.style.strokeDashoffset = offset;

      if (window.scrollY > 300) {
        scrollBtn.classList.remove(
          "opacity-0",
          "scale-90",
          "pointer-events-none"
        );
        scrollBtn.classList.add(
          "opacity-100",
          "scale-100",
          "pointer-events-auto"
        );
      } else {
        scrollBtn.classList.add(
          "opacity-0",
          "scale-90",
          "pointer-events-none"
        );
        scrollBtn.classList.remove(
          "opacity-100",
          "scale-100",
          "pointer-events-auto"
        );
      }
    });

    scrollBtn.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

});

/* Profile tabs */
document.addEventListener("DOMContentLoaded", () => {
  const tabs = document.querySelectorAll(".tab-btn");
  const contents = document.querySelectorAll(".tab-content");

  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      tabs.forEach((t) => {
        t.classList.remove("tab-active");
        t.classList.add("tab-inactive");
      });

      tab.classList.remove("tab-inactive");
      tab.classList.add("tab-active");

      contents.forEach((c) => c.classList.remove("active"));

      const tabId = tab.getAttribute("data-tab");
      document.getElementById(tabId).classList.add("active");
    });
  });
});

/* Video Modal */
function openVideoModal() {
  const modal = document.getElementById("videoModal");
  modal.classList.add("show");
  document.body.style.overflow = "hidden";
}

function closeVideoModal() {
  const modal = document.getElementById("videoModal");
  modal.classList.remove("show");
  document.body.style.overflow = "auto";

  const iframe = document.querySelector("#videoModal iframe");
  if (iframe) iframe.src = iframe.src;
}

document.addEventListener("keydown", function (e) {
  if (e.key === "Escape") closeVideoModal();
});

document.getElementById("videoModal")?.addEventListener("click", function (e) {
  if (e.target === this) closeVideoModal();
});