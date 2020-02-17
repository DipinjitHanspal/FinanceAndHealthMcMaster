<script>
import { Pie } from "vue-chartjs";

export default {
  props: {
    arr : {
      type: Array
    }
  },
  methods: {
    generateBgColors: function(length) {
      var i;
      var colors = [];
      for (i = 0; i < length; i++) {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        r = r * g / b;
        g = g * b / r;
        b = b * r / g;
        var a = Math.random();
        colors.push(`rgba(${r},${g},${b},${a})`)
      }
      return colors;
    }
  },
  data() {
    return {
      data: {
        //   The number of months needs to be calculated
        labels: ["Protein", "Carbohydrates", "Fats"],
        datasets: [
          {
            data: this.arr,
            // backgroundColor: "rgba(255, 35, 24, 1)",
            backgroundColor: this.generateBgColors(this.arr.length)
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
          }
        ]
      },
      options: {
        // scales: {
        //   yAxes: [
        //     {
        //       ticks: {
        //         beginAtZero: true
        //       }
        //     }
        //   ]
        // },
        responsive: true
      }
    };
  },
  extends: Pie,
  components: { Pie },
  computed: {
    // arr() {
    //   return this.arr;
    // }
  },
  mounted() {
    console.log(this.arr);
    console.log(this.arr.length);
    console.log(this.generateBgColors(this.arr.length));
    this.renderChart(this.data, this.options);
  }
};
</script>
