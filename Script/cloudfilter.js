$(document).ready(function() {
    $(".clouds").addClass("show"); // Show all cards by default
});

const cloudInfo = {
    all: "Showing all cloud types. Clouds are categorized by the altitude at which they form and the conditions they signify.",
    high: "High clouds, such as Cirrus, Cirrostratus, and Cirrocumulus, form at altitudes above 20,000 feet. They are generally composed of ice crystals and often indicate fair weather but can signal changing weather patterns.",
    medium: "Medium clouds, like Altostratus and Altocumulus, typically form between 6,500 and 20,000 feet. They are usually composed of water droplets and may indicate precipitation if they thicken.",
    low: "Low clouds, including Stratus, Stratocumulus, and Nimbostratus, form below 6,500 feet. These clouds are often associated with overcast skies and can bring light to moderate precipitation."
};

function filterSelection(category) {
    $(".clouds").removeClass("show").addClass("hide"); // Hide all cards

    if (category === "all") {
        $(".clouds").removeClass("hide").addClass("show"); // Show all cards
    } else {
        $("." + category).removeClass("hide").addClass("show"); // Show only selected category
    }

    $("#cloudTypeInfo").html(`<p class="lead">${cloudInfo[category]}</p>`); // Update cloud info
}