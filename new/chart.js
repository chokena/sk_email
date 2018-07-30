function drawChart(raw, id, col, title) {
    var element = document.getElementById(id).getContext('2d')
    var data = raw.map(e => e[col]);
    var labels = raw.map(e => e.date_log)
    return new Chart(element, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: title,
                    fillColor: "rgba(52, 209, 44, 0.9)",
                    strokeColor: "rgba(52, 209, 44, 0.9)",
                    pointColor: "rgba(52, 209, 44, 0.9)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(52, 209, 44, 0.9)",
                    data: data
                }
            ]
        },
        options: {
            responsive: true
        }
    });
} 