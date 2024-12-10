let tableBody;

async function filterState(category) {
    if (!tableBody) return; // Check if tableBody exists
    tableBody.innerHTML = "<tr><td colspan='6' class='text-center'>Loading...</td></tr>";
    await fetchWeatherData(category);
}

async function fetchWeatherData(stateCode) {
    try {
        const response = await fetch(`https://api.data.gov.my/weather/forecast/?contains=${stateCode}@location__location_id`);
        const data = await response.json();
        populateTable(data);
    } catch (error) {
        console.error("Error fetching weather data:", error);
        if (tableBody) {
            tableBody.innerHTML = "<tr><td colspan='6' class='text-center'>Error fetching data. Please try again later.</td></tr>";
        }
    }
}

function populateTable(data) {
    if (!tableBody) return; // Check if tableBody exists
    tableBody.innerHTML = ""; // Clear previous rows

    const today = new Date().toISOString().split("T")[0]; // Today's date in YYYY-MM-DD format

    if (data && data.length > 0) {
        data.forEach(forecast => {
            const row = document.createElement("tr");

            // Highlight today's forecast
            if (forecast.date === today) {
                row.classList.add("table-success");
            }

            row.innerHTML = `
                <td>${forecast.location.location_name}</td>
                <td>${forecast.location.location_id}</td>
                <td>${forecast.date}</td>
                <td>${forecast.summary_forecast}</td>
                <td>${forecast.min_temp}°C</td>
                <td>${forecast.max_temp}°C</td>
            `;
            tableBody.appendChild(row);
        });
    } else {
        tableBody.innerHTML = "<tr><td colspan='6' class='text-center'>No data available for the selected location.</td></tr>";
    }
}

document.addEventListener("DOMContentLoaded", function() {
    tableBody = document.querySelector("#forecast-table tbody");
});
