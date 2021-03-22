//to get the clicks data
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
            label: "Ad Clicks",
            backgroundColor: "rgba(0, 123, 255, 0.50)",
            borderColor: "rgba(0, 123, 255, 1)",
            hoverBackgroundColor: "rgba(200, 200, 200, 1)",
            hoverBorderColor: "rgba(200, 200, 200, 1)",
            data: clicks,
          },
        ],
      };

      var ctx = $("#clicksCanvas"); //selecting the element with the id 
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


//to get the requests data
$(document).ready(function () {
  $.ajax({
    //to perform an ajax request
    url: `/EXL-EXCHANGE/sellerAnalytics/getRequestsData/${adID}`, //retrieve relevant data from this location
    method: "GET",
    success: function (data) {
      //executed when the ajax request succeeds
      var week = [];
      var requests = [];
      for (var i in data) {
        week.push("" + data[i].theWeek);
        requests.push(data[i].requests);
      }
      var chartdata = {
        labels: week,
        datasets: [
          {
            label: "Job Requests",
            backgroundColor: "rgba(0, 123, 255, 0.50)",
            borderColor: "rgba(0, 123, 255, 1)",
            hoverBackgroundColor: "rgba(200, 200, 200, 1)",
            hoverBorderColor: "rgba(200, 200, 200, 1)",
            data: requests,
          },
        ],
      };

      var ctx = $("#requestsCanvas"); //selecting the element with the id 
      var barGraph = new Chart(ctx, {
        type: "line",
        data: chartdata,
        options: {
          title: {
            display: true,
            text: "Number of job requests with the time",
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
