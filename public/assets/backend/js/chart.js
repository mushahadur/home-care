   // Initialize Chart
    document.addEventListener("DOMContentLoaded", function() {
      const ctx = document.getElementById("revenueChart").getContext("2d");

      // Check if dark mode is active for chart colors
      const isDark = document.documentElement.classList.contains("dark");
      const textColor = isDark ? "#e5e7eb" : "#4b5563";
      const gridColor = isDark ? "#374151" : "#e5e7eb";

      new Chart(ctx, {
        type: "line",
        data: {
          labels: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
          datasets: [{
              label: "Direct",
              data: [
                45000, 52000, 48000, 58000, 62000, 59000, 65000, 68000, 72000,
                75000, 78000, 82000,
              ],
              borderColor: "#2563eb",
              backgroundColor: "rgba(37, 99, 235, 0.1)",
              tension: 0.4,
              fill: true,
            },
            {
              label: "Organic",
              data: [
                38000, 42000, 45000, 48000, 51000, 54000, 58000, 61000, 64000,
                67000, 70000, 73000,
              ],
              borderColor: "#10b981",
              backgroundColor: "rgba(16, 185, 129, 0.1)",
              tension: 0.4,
              fill: true,
            },
            {
              label: "Referral",
              data: [
                25000, 28000, 31000, 34000, 37000, 40000, 43000, 46000, 49000,
                52000, 55000, 58000,
              ],
              borderColor: "#8b5cf6",
              backgroundColor: "rgba(139, 92, 246, 0.1)",
              tension: 0.4,
              fill: true,
            },
            {
              label: "Social",
              data: [
                15000, 18000, 21000, 24000, 27000, 30000, 33000, 36000, 39000,
                42000, 45000, 48000,
              ],
              borderColor: "#f97316",
              backgroundColor: "rgba(249, 115, 22, 0.1)",
              tension: 0.4,
              fill: true,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            },
            tooltip: {
              mode: "index",
              intersect: false,
            },
          },
          scales: {
            y: {
              beginAtZero: true,
              grid: {
                color: gridColor,
              },
              ticks: {
                color: textColor,
                callback: function(value) {
                  return "$" + value / 1000 + "K";
                },
              },
            },
            x: {
              grid: {
                display: false,
              },
              ticks: {
                color: textColor,
              },
            },
          },
        },
      });
    });