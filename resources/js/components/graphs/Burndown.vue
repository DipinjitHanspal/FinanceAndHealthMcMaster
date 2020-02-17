<script>
import { Bar } from "vue-chartjs";

export default {
  data() {
    return {
      data: {
        //   The number of months needs to be calculated
        labels: [
          "September",
          "October",
          "November",
          "December",
          "January",
          "Februray"
        ],
        datasets: [
          {
            label: "Money spent",
            data: [500, 400, 400, 500, 500, 600],
            backgroundColor: "rgba(255, 35, 24, 1)"
            // backgroundColor: [
            //   "rgba(255, 99, 132, 0.2)",
            //   "rgba(54, 162, 235, 0.2)",
            //   "rgba(255, 206, 86, 0.2)",
            //   "rgba(75, 192, 192, 0.2)",
            //   "rgba(153, 102, 255, 0.2)",
            //   "rgba(255, 159, 64, 0.2)"
            // ],
            // borderColor: [
            //   "rgba(255, 99, 132, 1)",
            //   "rgba(54, 162, 235, 1)",
            //   "rgba(255, 206, 86, 1)",
            //   "rgba(75, 192, 192, 1)",
            //   "rgba(153, 102, 255, 1)",
            //   "rgba(255, 159, 64, 1)"
            // ],
            // borderWidth: 1
          },
          {
            label: "Money remaining",
            data: [4800, 4400, 4000, 3500, 3000, 2400],
            type: "line",
            backgroundColor: "rgba(25, 151, 255, 0.4)"
          }
        ]
      },
      options: {
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true
              }
            }
          ]
        },
        responsive: true
      }
    };
  },
  extends: Bar,
  components: {},
  mounted() {
    this.renderChart(this.data, this.options);
  }
};
</script>
