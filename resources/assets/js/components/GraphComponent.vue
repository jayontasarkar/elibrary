<template>
    <div>
    	<bar-chart
		  :data="{datacollection}"
		  :options="{responsive: false, maintainAspectRatio: false}"
		  :width="400"
		  :height="200"
		>
		</bar-chart>
    </div>
</template>

<script>
import { Line } from 'vue-chartjs'

export default Line.extend({
  data () {
    return {
      datacollection: {
        labels: ['January', 'February'],
        datasets: [
          {
            label: 'Data One',
            backgroundColor: '#f87979',
            data: [40, 20]
          }
        ]
      }
    }
  },	
  props: ['data', 'options'],
  mounted () {
    this.renderChart(this.data, this.options)
  }
})
</script>