// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Old", "New", "Current"],
    datasets: [{
      data: [50, 40, 10],
      backgroundColor: ['rgb(152, 189, 172)', 'rgb(106, 145, 114)', 'rgb(82, 114, 88)'],
    }],
  },
});
