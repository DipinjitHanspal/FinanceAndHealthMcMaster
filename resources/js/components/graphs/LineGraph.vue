<script>
import { Line } from "vue-chartjs";

export default {
  data() {
    return {
      data: {
        //   The number of months needs to be calculated
        labels: ["September", "October", "November", "December", "January", "Februray"],
        datasets: [
          {
            label: "Money spent",
            data: [500, 400, 400, 500, 500, 600],
            backgroundColor: "rgba(255, 35, 24, 1)",
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
  extends: Line,
  components: {},
  mounted() {
    this.renderChart(this.data, this.options);
  }
};
</script>
