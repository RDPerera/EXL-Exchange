$(document).ready(function () {
  $.ajax({
    //to perform an ajax request
    url: `/EXL-EXCHANGE/sellerAnalytics/getClicksData/${adID}`, //retrieve relevant data from this location
    method: "GET",
    success: function (data) {
      //executed when the ajax request succeeds
      var date = [];
      var clicks = [];
      for (var i in data) {
        date.push("" + data[i].date);
        clicks.push(data[i].clicks);
      }
      var chartdata = {
        labels: date,
        datasets: [
          {
            label: "AD Clicks",
            backgroundColor: "rgba(200, 200, 200, 0.75)",
            borderColor: "rgba(200, 200, 200, 0.75)",
            hoverBackgroundColor: "rgba(200, 200, 200, 1)",
            hoverBorderColor: "rgba(200, 200, 200, 1)",
            data: clicks,
          },
        ],
      };

      var ctx = $("#mycanvas"); //selecting the element with the id mycanvas
      var steps = 3;
      var barGraph = new Chart(ctx, {
        type: "line",
        data: chartdata,
        options: {
          title: {
            display: true,
            text: "Number of advertisement clicks with the time",
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
          },
        }
      });
    },
    error: function (data) {
      console.log(data);
    },
  });
});
