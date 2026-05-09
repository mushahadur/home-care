// Mobile sidebar toggle
    const sidebar = document.getElementById("sidebar");
    const openBtn = document.getElementById("open-sidebar");
    const closeBtn = document.getElementById("close-sidebar");
    const backdrop = document.getElementById("mobile-menu-backdrop");

    openBtn?.addEventListener("click", () => {
      sidebar.classList.remove("-translate-x-full");
      backdrop.classList.remove("hidden");
    });

    closeBtn?.addEventListener("click", () => {
      sidebar.classList.add("-translate-x-full");
      backdrop.classList.add("hidden");
    });

    backdrop?.addEventListener("click", () => {
      sidebar.classList.add("-translate-x-full");
      backdrop.classList.add("hidden");
    });

    // Dark / Light mode toggle
    const themeToggle = document.getElementById("theme-toggle");
    const themeIcon = document.getElementById("theme-icon");

    // Check saved preference or system preference
    if (
      localStorage.theme === "dark" ||
      (!("theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
      document.documentElement.classList.add("dark");
      themeIcon.classList.remove("fa-moon");
      themeIcon.classList.add("fa-sun");
    } else {
      document.documentElement.classList.remove("dark");
      themeIcon.classList.remove("fa-sun");
      themeIcon.classList.add("fa-moon");
    }

    themeToggle.addEventListener("click", () => {
      if (document.documentElement.classList.contains("dark")) {
        document.documentElement.classList.remove("dark");
        localStorage.theme = "light";
        themeIcon.classList.remove("fa-sun");
        themeIcon.classList.add("fa-moon");
      } else {
        document.documentElement.classList.add("dark");
        localStorage.theme = "dark";
        themeIcon.classList.remove("fa-moon");
        themeIcon.classList.add("fa-sun");
      }
    });


      document.addEventListener("DOMContentLoaded", function() {
      // Get elements
      const dropdownToggle = document.getElementById("dropdownToggle");
      const dropdownMenu = document.getElementById("dropdownMenu");
      let isOpen = false;

      // Toggle dropdown function
      function toggleDropdown(show) {
        if (show) {
          dropdownMenu.classList.remove(
            "opacity-0",
            "scale-95",
            "pointer-events-none",
          );
          dropdownMenu.classList.add(
            "opacity-100",
            "scale-100",
            "pointer-events-auto",
          );
          dropdownToggle.setAttribute("aria-expanded", "true");
          isOpen = true;
        } else {
          dropdownMenu.classList.add(
            "opacity-0",
            "scale-95",
            "pointer-events-none",
          );
          dropdownMenu.classList.remove(
            "opacity-100",
            "scale-100",
            "pointer-events-auto",
          );
          dropdownToggle.setAttribute("aria-expanded", "false");
          isOpen = false;
        }
      }

      // Click toggle button
      dropdownToggle.addEventListener("click", function(e) {
        e.stopPropagation();
        toggleDropdown(!isOpen);
      });

      // Click outside to close
      document.addEventListener("click", function(event) {
        const container = document.getElementById("userDropdownContainer");
        if (!container.contains(event.target) && isOpen) {
          toggleDropdown(false);
        }
      });

      // Close on escape key
      document.addEventListener("keydown", function(e) {
        if (e.key === "Escape" && isOpen) {
          toggleDropdown(false);
        }
      });

      // Handle window resize - close dropdown on resize for better UX
      window.addEventListener("resize", function() {
        if (isOpen) {
          toggleDropdown(false);
        }
      });
    });