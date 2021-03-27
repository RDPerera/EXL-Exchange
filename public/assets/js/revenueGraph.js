$(document).ready(function () {
    $.ajax({
      //to perform an ajax request
      url: `/EXL-EXCHANGE/adminDashboard/getRevenueData`, //retrieve relevant data from this location
      method: "GET",
      success: function (data) {
        //executed when the ajax request succeeds
        var week = [];
        var revenue = [];
        console.log(data[0].theWeek);
        for (var i in data) {
          week.push("" + data[i].theWeek);
          revenue.push(data[i].revenue);
        }
        var chartdata = {
          labels: week,
          datasets: [
            {
              label: "The EXL Exchange Revenue",
              backgroundColor: "rgba(0, 123, 255, 0.50)",
              borderColor: "rgba(0, 123, 255, 1)",
              hoverBackgroundColor: "rgba(200, 200, 200, 1)",
              hoverBorderColor: "rgba(200, 200, 200, 1)",
              data: revenue,
            },
          ],
        };
  
        var ctx = $("#revenueCanvas"); //selecting the element with the id
        var barGraph = new Chart(ctx, {
          type: "line",
          data: chartdata,
          options: {
            title: {
              display: true,
              text: "EXL Exchange revenue with the time",
            },
            scales: {
              yAxes: [
                {
                  scaleLabel: {
                    display: true,
                    labelString: "Revenue in LKR",
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
  