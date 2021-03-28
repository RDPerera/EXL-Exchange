$(document).ready(function () {
    $.ajax({
      //to perform an ajax request
      url: `/EXL-EXCHANGE/adminDashboard/getRevenueData`, //retrieve relevant data from this location
      method: "GET",
      success: function (data) {
        //executed when the ajax request succeeds
        var week = [];
        var revenue = [];

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
  
  $(document).ready(function () {
    $.ajax({
      //to perform an ajax request
      url: `/EXL-EXCHANGE/adminDashboard/getVisitorByCountry`, //retrieve relevant data from this location
      method: "GET",
      success: function (data) {
        //executed when the ajax request succeeds
        var country = [];
        var visitors = [];

        for (var i in data) {
          country.push("" + data[i].country);
          visitors.push(data[i].visitors);
        }

        var chartdata = {
          labels: country,
          datasets: [
            {
              backgroundColor: [
                'rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)', 
              ],
              data: visitors,
              hoverOffset: 4
            },
           
          ],
          
        };
  
        var ctx = $("#byCountryCanvas"); //selecting the element with the id
        var pieGraph = new Chart(ctx, {
          type: "pie",
          data: chartdata,
          options: {
            title: {
              display: true,
              text: "This month's visitors by country",
            },
          },
        });
      },
      error: function (data) {
        console.log(data);
      },
    });
  });
  

  $(document).ready(function () {
    $.ajax({
      //to perform an ajax request
      url: `/EXL-EXCHANGE/adminDashboard/getVistorByDate`, //retrieve relevant data from this location
      method: "GET",
      success: function (data) {
        //executed when the ajax request succeeds
        var date = [];
        var visitors = [];

        for (var i in data) {
          date.push("" + data[i].date);
          visitors.push(data[i].visitors);
        }
        var chartdata = {
          labels: date,
          datasets: [
            {
              label: "Site Visitors",
              backgroundColor: "rgba(0, 123, 255, 0.50)",
              borderColor: "rgba(0, 123, 255, 1)",
              hoverBackgroundColor: "rgba(200, 200, 200, 1)",
              hoverBorderColor: "rgba(200, 200, 200, 1)",
              data: visitors,
            },
          ],
        };
  
        var ctx = $("#visitorCanvas"); //selecting the element with the id
        var barGraph = new Chart(ctx, {
          type: "line",
          data: chartdata,
          options: {
            title: {
              display: true,
              text: "EXL Exchange site visitors with the time",
            },
            scales: {
              yAxes: [
                {
                  scaleLabel: {
                    display: true,
                    labelString: "Number of site visitors",
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
                    labelString: "Date",
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