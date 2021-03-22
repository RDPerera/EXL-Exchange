$(document).ready(function () {
  $.ajax({
    //to perform an ajax request
    url: `/EXL-EXCHANGE/sellerAnalytics/getEarningsData/${username}`, //retrieve relevant data from this location
    method: "GET",
    success: function (data) {
      //executed when the ajax request succeeds
      var week = [];
      var earnings = [];
      for (var i in data) {
        week.push("" + data[i].theWeek);
        earnings.push(data[i].earnings);
      }
      var chartdata = {
        labels: week,
        datasets: [
          {
            label: "Earnings",
            backgroundColor: "rgba(0, 123, 255, 0.50)",
            borderColor: "rgba(0, 123, 255, 1)",
            hoverBackgroundColor: "rgba(200, 200, 200, 1)",
            hoverBorderColor: "rgba(200, 200, 200, 1)",
            data: earnings,
          },
        ],
      };

      var ctx = $("#earningsCanvas"); //selecting the element with the id
      var barGraph = new Chart(ctx, {
        type: "line",
        data: chartdata,
        options: {
          title: {
            display: true,
            text: "Earnings with the time",
          },
          scales: {
            yAxes: [
              {
                scaleLabel: {
                  display: true,
                  labelString: "Amount in LKR",
                },
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
            xAxes: [
              {
                scaleLabel: {
                  display: true,
                  labelString: "Year / Week",
                },
              },
            ],
          },
        },
      });
    },
    error: function (data) {
      console.log(data);
    },
  });
});
