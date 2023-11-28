var tlhoanthanh = (dh_hoanthanh / tongdh) * 100;
var tlhuy = (dh_huy / tongdh) * 100;
var CHARTTILEDON = $("#chart_tiledon");
var chartTiledon = new Chart(CHARTTILEDON, {
  type: "pie",
  options: {
    legend: {
      display: true,
      position: "left",
    },
  },
  data: {
    labels: ["Hoàn thành", "Bị huỷ"],
    datasets: [
      {
        data: [tlhoanthanh, tlhuy],
        borderWidth: 0,
        backgroundColor: ["#723ac3", "#864DD9"],
      },
    ],
  },
});

var chartTiledon = {
  responsive: true,
};

//---------------------------------------------------

var CHARTDOANHTHU = $("#chart_doanhthu");
var chartDoanhthu = new Chart(CHARTDOANHTHU, {
  type: "line",
  options: {
    legend: { labels: { fontColor: "#777", fontSize: 12 } },
    scales: {
      xAxes: [
        {
          display: true,
          gridLines: {
            color: "transparent",
          },
        },
      ],
      yAxes: [
        {
          ticks: {
            max: 300000000,
            min: 0,
          },
          display: true,
          gridLines: {
            color: "transparent",
          },
        },
      ],
    },
  },
  data: {
    labels: monthJson,
    datasets: [
      {
        label: "Doanh thu theo tháng",
        fill: true,
        lineTension: 0,
        backgroundColor: "rgba(134, 77, 217, 0.88)",
        borderColor: "rgba(134, 77, 217, 088)",
        borderCapStyle: "butt",
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: "miter",
        borderWidth: 1,
        pointBorderColor: "rgba(134, 77, 217, 0.88)",
        pointBackgroundColor: "#fff",
        pointBorderWidth: 1,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(134, 77, 217, 0.88)",
        pointHoverBorderColor: "rgba(134, 77, 217, 0.88)",
        pointHoverBorderWidth: 2,
        pointRadius: 1,
        pointHitRadius: 10,
        data: revenueJson,
        spanGaps: false,
      },
    ],
  },
});

var BARCHARTEXMPLE = $("#chart_loaiphong");
var barChartExample = new Chart(BARCHARTEXMPLE, {
  type: "bar",
  options: {
    scales: {
      xAxes: [
        {
          display: true,
          gridLines: {
            color: "transparent",
          },
        },
      ],
      yAxes: [
        {
          display: true,
          gridLines: {
            color: "transparent",
          },
        },
      ],
    },
  },
  data: {
    labels: itrNameJson,
    datasets: [
      {
        label: "Doanh thu theo loại phòng nội thất",
        backgroundColor: [
          '#EF8C99',
          '#EF8C99',
          '#EF8C99',
          '#EF8C99',
          '#EF8C99',
          '#EF8C99',
          '#EF8C99',
        ],
        hoverBackgroundColor: [
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
        ],
        borderColor: [
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
        ],
        borderWidth: 0.5,
        data:itrDataJson,
      }
    ],
  },
});

var BARCHARTEXMPLE = $("#chart_loaihang");
var barChartExample = new Chart(BARCHARTEXMPLE, {
  type: "bar",
  options: {
    scales: {
      xAxes: [
        {
          display: true,
          gridLines: {
            color: "transparent",
          },
        },
      ],
      yAxes: [
        {
          display: true,
          gridLines: {
            color: "transparent",
          },
        },
      ],
    },
  },
  data: {
    labels: typeNameJson,
    datasets: [
      {
        label: "Doanh thu theo loại sản phẩm nội thất",
        backgroundColor: [
          '#EF8C99',
          '#EF8C99',
          '#EF8C99',
          '#EF8C99',
          '#EF8C99',
          '#EF8C99',
          '#EF8C99',
        ],
        hoverBackgroundColor: [
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
        ],
        borderColor: [
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
          "#864DD9",
        ],
        borderWidth: 0.5,
        data: typeDataJson,
      }
    ],
  },
});
