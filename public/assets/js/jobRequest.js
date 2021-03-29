(function () {
  const second = 1000,
    minute = second * 60,
    hour = minute * 60,
    day = hour * 24;

  var t =
      document.getElementById("date").value +
      "T" +
      document.getElementById("time").value,
    countDown = new Date(t).getTime(),
    x = setInterval(function () {
      var now = new Date().getTime(),
        t =
          document.getElementById("date").value +
          "T" +
          document.getElementById("time").value,
        countDown = new Date(t).getTime(),
        distance = countDown - now;
      var total =
        parseFloat(document.getElementById("ad-pay").value) +
        parseFloat(document.getElementById("basic-payment").innerText);
      (document.getElementById("dead-line").innerText =
        document.getElementById("date").value +
        " " +
        document.getElementById("time").value),
        (document.getElementById("add-payment").innerText =
          "Rs." + document.getElementById("ad-pay").value),
        (document.getElementById("total-payment").innerText =
          "Rs." + total.toFixed(2)),
        (document.getElementById("countdown").style.color = "#333"),
        (document.getElementById("days").innerText = Math.floor(
          distance / day
        )),
        (document.getElementById("hours").innerText = Math.floor(
          (distance % day) / hour
        )),
        (document.getElementById("minutes").innerText = Math.floor(
          (distance % hour) / minute
        )),
        (document.getElementById("seconds").innerText = Math.floor(
          (distance % minute) / second
        ));
      // later when date is reached change color to red
      if (countDown < now) {
        distance = now - countDown;
        (document.getElementById("countdown").style.color = "red"),
          (document.getElementById("days").innerText =
            "-" + Math.floor(distance / day)),
          (document.getElementById("hours").innerText = Math.floor(
            (distance % day) / hour
          )),
          (document.getElementById("minutes").innerText = Math.floor(
            (distance % hour) / minute
          )),
          (document.getElementById("seconds").innerText = Math.floor(
            (distance % minute) / second
          ));
      }
    }, 0);
})();

$(document).ready(function () {
  fetchChat();
  fetchStatus();
  updateScroll();
  var scrolled = false;
  setInterval(function () {
    $("#chat-body").on("scroll", function () {
      scrolled = true;
    });
    if (!scrolled) {
      updateScroll();
    }
    fetchChat();
    fetchStatus();
  }, 100);

  $(document).on("click", ".message-submit", function () {
    var chat_message = $("#message").val();
    if (true) {
      $.ajax({
        url: "adChat/send",
        method: "POST",
        data: { message: chat_message },
        success: function (data) {
          $("#message").val("");
          scrolled = false;
        },
      });
    }
  });

  function updateScroll() {
    var element = document.getElementById("chat-body");
    element.scrollTop = element.scrollHeight;
  }
  function fetchChat() {
    $.ajax({
      url: "adChat/index",
      method: "POST",
      success: function (data) {
        $("#chat-container").html(data);
      },
    });
  }
  function fetchStatus() {
    $.ajax({
      url: "adChat/adstatus",
      method: "POST",
      success: function (data) {
        $("#chat-header").html(data);
      },
    });
  }
});
