<script>
import { Bar } from "vue-chartjs";

export default {
  props: {
    arr: {
      type: Array
    }
  },
  data() {
    return {
      data: {
        //   The number of months needs to be calculated
        labels: ["Breakdown"],
        datasets: [
          {
            label: "Calories",
            data: [this.arr[0]],
            backgroundColor: "rgba(255, 35, 24, 1)"
          },
          {
            label: "Carbs",
            data: [this.arr[1]],
            backgroundColor: "rgba(25, 35, 24, 1)"
          },
          {
            label: "Fats",
            data: [this.arr[2]],
            backgroundColor: "rgba(255, 35, 244, 1)"
          },
          {
            label: "Sodium",
            data: [this.arr[3]],
            backgroundColor: "rgba(255, 235, 24, 1)"
          }
        ]
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          xAxes: [
            {
              stacked: true,
              ticks: {
                display: false
              },
              gridLines: {
                display: false
              }
            }
          ],
          yAxes: [
            {
              stacked: true,
              ticks: {
                display: false
              },
              gridLines: {
                display: false
              }
            }
          ]
        },
        responsive: true
        // aspectRatio : 4
      }
    };
  },
  extends: Bar,
  components: { Bar },
  mounted() {
    this.renderChart(this.data, this.options);
  }
};
</script>