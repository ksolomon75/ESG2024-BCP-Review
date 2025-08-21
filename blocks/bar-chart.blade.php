{{--
Title: Bar Chart Block
Description:
Category: design
Icon: align-wide
Keywords: section content
Mode: auto
PostTypes: page block-pattern
SupportsAlign: false
SupportsAlignText: false
SupportsAlignContent: false
SupportsMode: true
SupportsMultiple: true
SupportsInnerBlocks: true
FullWith: true
EnqueueStyle:
EnqueueScript:
EnqueueAssets:
--}}

<div class="{{ $block['classes'] ?? '' }}" id="{{ $block['id'] ?? '' }}">
  <div class="quadrant-chart-container">
    <h3 class="mb-4 text-center font-normal">Double Materiality Assessment Results</h3>
    <div class="w-full">
      <h3 class="text-lg font-semibold mb-4 text-gray-700">Quadrant Legend</h3>
      <ul class="space-y-6 px-4 sm:px-0 xl:flex items-center gap-4 text-sm text-gray-700">
        <li class="flex items-start gap-3">
          <div class="w-8 h-8 rounded shadow" style="background:#DDF1C9; border:1px solid #b6d7a8;"></div>
          <div>
            <strong class="block text-gray-900">Double Material</strong>
            <span class="text-gray-600">Topics assessed above the threshold for both financial materiality (i.e.,
              potential
              to affect Alamos’ financial performance) and impact materiality (i.e., Alamos’ potential to cause
              significant
              social or environmental impacts).</span>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <div class="w-8 h-8 rounded shadow" style="background:#FFFFB2; border:1px solid #ffe066;"></div>
          <div>
            <strong class="block text-gray-900">Financially Material, Impact Immaterial</strong>
            <span class="text-gray-600">Topics assessed above the threshold for financial materiality, but below the
              threshold for impact materiality.</span>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <div class="w-8 h-8 rounded shadow" style="background:#FFECB2; border:1px solid #ffd966;"></div>
          <div>
            <strong class="block text-gray-900">Impact Material, Financially Immaterial</strong>
            <span class="text-gray-600">Topics assessed above the threshold for impact materiality, but below the
              threshold
              for financial materiality.</span>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <div class="w-8 h-8 rounded shadow" style="background:#FFB2B2; border:1px solid #ff6666;"></div>
          <div>
            <strong class="block text-gray-900">Double Immaterial <span class="text-xs text-gray-500">(Not shown in
                graphic)</span></strong>
            <span class="text-gray-600">Topics assessed below the threshold for both financial and impact materiality.
              These
              topics have been excluded from the visual representation.</span>
          </div>
        </li>
      </ul>
      <p class="my-8 px-4 sm:px-0 text-xs text-gray-500 italic">
        To meet the needs of ESG Report users, Alamos provides both curated ESG content and raw data. While our report
        complies with the GRI, SASB and TCFD recommendations, the depth of coverage for each sustainability topic has
        been
        strategically determined by our Materiality Assessment. Data points required by these frameworks but deemed less
        relevant to Alamos’ operations and stakeholders are included in the Data Tables, with direct links provided in
        the
        following GRI, SASB, and TCFD indices.
      </p>
    </div>
    <canvas id="quadrantChart"></canvas>
  </div>
</div>
<style>
  .quadrant-chart-container {
    width: 100%;
    height: 1000px;
    margin: 0 auto;
    background: #fff;
  }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('quadrantChart').getContext('2d');

    const chartData = [
      { x: 12, y: 12.95, label: 'Safe and Healthy Working Conditions' },
      { x: 8, y: 10.6, label: 'Equity, Diversity, Inclusion' },
      { x: 6, y: 9.5, label: 'Human Rights in the Workplace' },
      { x: 6, y: 12, label: 'Public Safety and Emergency Services' },
      { x: 9, y: 10.6, label: 'Human Rights and Security in Host Communities' },
      { x: 15, y: 12.2, label: 'Community Investment and Community Relations' },
      { x: 16, y: 1, label: 'Geopolitical Interests' },
      { x: 12, y: 12.4, label: 'Indigenous Relations' },
      { x: 9, y: 13.8, label: 'Business Practices and Ethics' },
      { x: 12, y: 9.2, label: 'Cybersecurity and Data Protection' },
      { x: 10, y: 13.8, label: 'Process Residuals and Other Wastes' },
      { x: 9, y: 15.4, label: 'Biodiversity and Land Use' },
      { x: 12, y: 11.9, label: 'Water Availability' },
      { x: 10, y: 15.4, label: 'Water Management' },
      { x: 2, y: 11.9, label: 'Air Quality and Pollutants' },
      { x: 16, y: 12.7, label: 'Climate Change and Climate Mitigation' },
      { x: 12, y: 5.8, label: 'Energy Management' }
    ];

    const quadrantBackgroundPlugin = {
      id: 'quadrantBackground',
      beforeDraw: function (chart) {
        const { ctx, chartArea } = chart;
        const { top, bottom, left, right, width, height } = chartArea;

        const xScale = chart.scales.x;
        const yScale = chart.scales.y;
        const xMidValue = 9;
        const yMidValue = 8;

        const midXPixel = xScale.getPixelForValue(xMidValue);
        const midYPixel = yScale.getPixelForValue(yMidValue);


        ctx.fillStyle = '#FFECB2';
        ctx.fillRect(left, top, midXPixel - left, midYPixel - top);

        ctx.fillStyle = '#DDF1C9';
        ctx.fillRect(midXPixel, top, right - midXPixel, midYPixel - top);

        ctx.fillStyle = '#FFB2B2';
        ctx.fillRect(left, midYPixel, midXPixel - left, bottom - midYPixel);

        ctx.fillStyle = '#FFFFB2';
        ctx.fillRect(midXPixel, midYPixel, right - midXPixel, bottom - midYPixel);

        ctx.strokeStyle = '#666';
        ctx.lineWidth = 1.5; 

        ctx.strokeRect(left, top, width, height);

        ctx.beginPath();
        ctx.moveTo(left, midYPixel);
        ctx.lineTo(right, midYPixel);
        ctx.stroke();

        ctx.beginPath();
        ctx.moveTo(midXPixel, top);
        ctx.lineTo(midXPixel, bottom);
        ctx.stroke();
      }
    };


    const quadrantLabelPlugin = {
      id: 'quadrantLabel',
      afterDraw: function (chart) {
        const { ctx, chartArea } = chart;
        const { top, bottom, left, right, width, height } = chartArea;
        const xScale = chart.scales.x;
        const yScale = chart.scales.y;
        const xMidValue = 9;
        const yMidValue = 8; 

        const midXPixel = xScale.getPixelForValue(xMidValue);
        const midYPixel = yScale.getPixelForValue(yMidValue);

        function drawLabelBox(text, x, y, align) {
          ctx.save();
          const padding = 8;
          const fontSize = 12;
          ctx.font = fontSize + 'px Arial';
          const textWidth = ctx.measureText(text).width;
          const boxWidth = textWidth + (padding * 2);
          const boxHeight = fontSize + (padding * 2);
          let boxX = x;
          if (align === 'right') {
            boxX = x - boxWidth;
          }
          ctx.fillStyle = 'white';
          ctx.fillRect(boxX, y, boxWidth, boxHeight);
          ctx.strokeStyle = '#ccc';
          ctx.strokeRect(boxX, y, boxWidth, boxHeight);
          // Draw text
          ctx.fillStyle = 'black';
          ctx.textAlign = 'left';
          ctx.textBaseline = 'middle';
          ctx.fillText(text, boxX + padding, y + (boxHeight / 2));
          ctx.restore();
        }

        drawLabelBox('Impact Material, Financially Immaterial', left + 10, top + 10, 'left');
        drawLabelBox('Double Material', right - 10, top + 10, 'right');
        drawLabelBox('Double Immaterial', left + 10, midYPixel + 10, 'left');
        drawLabelBox('Financially Material, Impact Immaterial', right - 10, midYPixel + 10, 'right');
        ctx.save();
        ctx.strokeStyle = '#333';
        ctx.fillStyle = '#333';
        ctx.lineWidth = 2;
        const xArrowYOffset = 60;
        const xArrowY = bottom + xArrowYOffset;
        ctx.beginPath();
        ctx.moveTo(left, xArrowY);
        ctx.lineTo(right + 30, xArrowY); 
        ctx.stroke();
        // Arrow head
        ctx.beginPath();
        ctx.moveTo(right + 30, xArrowY);
        ctx.lineTo(right + 20, xArrowY - 5);
        ctx.lineTo(right + 20, xArrowY + 5);
        ctx.closePath();
        ctx.fill();

        ctx.font = 'bold 14px Arial';
        ctx.textAlign = 'center';
        const xArrowLabel = 'Financial Materiality →';
        const xArrowLabelX = (left + right) / 2;
        ctx.fillText(xArrowLabel, xArrowLabelX, xArrowY + 25);
        ctx.restore();

        ctx.save();
        ctx.strokeStyle = '#333';
        ctx.fillStyle = '#333';
        ctx.lineWidth = 2;
        const yArrowXOffset = 60; 
        const yArrowX = left - yArrowXOffset;
        ctx.beginPath();
        ctx.moveTo(yArrowX, bottom);
        ctx.lineTo(yArrowX, top - 30);
        ctx.stroke();
        // Arrow head
        ctx.beginPath();
        ctx.moveTo(yArrowX, top - 30);
        ctx.lineTo(yArrowX - 5, top - 20);
        ctx.lineTo(yArrowX + 5, top - 20);
        ctx.closePath();
        ctx.fill();
        ctx.save();
        ctx.font = 'bold 14px Arial';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        const yArrowLabel = 'Impact Materiality →';
        const yArrowLabelY = (top + bottom) / 2;
        ctx.translate(yArrowX - 25, yArrowLabelY);
        ctx.rotate(-Math.PI / 2);
        ctx.fillText(yArrowLabel, 0, 0);
        ctx.restore();
        ctx.restore();
      }
    };

    const chart = new Chart(ctx, {
      type: 'scatter',
      data: {
        datasets: [{
          data: chartData,
          backgroundColor: 'rgba(0, 0, 0, 0.5)',
          pointRadius: 6
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 70,
            bottom: 100,
            right: 120,
            top: 70    
          }
        },
        plugins: {
          legend: {
            display: false
          },
          tooltip: {
            enabled: true,
            callbacks: {
              title: function (tooltipItems) {
                return tooltipItems[0].raw.label;
              },
              label: function (context) {
                return '';
              },
            },
            backgroundColor: 'rgba(255, 255, 255, 1)', 
            titleColor: '#333',
            bodyColor: '#666',
            titleFont: {
              weight: 'bold',
              size: 14
            },
            bodyFont: {
              size: 12
            },
            padding: 10,
            cornerRadius: 4,
            displayColors: false
          },
          datalabels: {
            color: '#333',
            font: {
              weight: 'bold',
              size: 10
            },
            backgroundColor: function (context) {
              return 'rgba(255, 255, 255, 1)'; 
            },
            borderRadius: 3,
            borderWidth: 1,
            borderColor: '#ccc',
            padding: 6,
            anchor: function (context) {
              const dataIndex = context.dataIndex;

              const anchorMap = [
                'start',   // 0: Safe and Healthy Working Conditions
                'center',  // 1: Equity, Diversity, Inclusion
                'center',  // 2: Human Rights in the Workplace
                'end',     // 3: Public Safety and Emergency Services
                'center',  // 4: Human Rights and Security in Host Communities
                'right',   // 5: Community Investment and Community Relations
                'start',   // 6: Geopolitical Interests
                'end',     // 7: Indigenous Relations
                'end',     // 8: Business Practices and Ethics
                'center',  // 9: Cybersecurity and Data Protection
                'center',  // 10: Process Residuals and Other Wastes
                'center',  // 11: Biodiversity and Land Use
                'end',     // 12: Water Availability
                'center',  // 13: Water Management
                'center',  // 14: Air Quality and Pollutants
                'center',  // 15: Climate Change and Climate Mitigation
                'start',   // 16: Energy Management
              ];

              return anchorMap[dataIndex] || 'start';
            },
            align: function (context) {
              const dataIndex = context.dataIndex;

              const alignMap = [
                'left',    // 0: Safe and Healthy Working Conditions
                'left',    // 1: Equity, Diversity, Inclusion
                'bottom',  // 2: Human Rights in the Workplace
                'bottom',  // 3: Public Safety and Emergency Services
                'right',   // 4: Human Rights and Security in Host Communities
                'bottom',  // 5: Community Investment and Community Relations
                'bottom',  // 6: Geopolitical Interests
                'right',   // 7: Indigenous Relations
                'left',    // 8: Business Practices and Ethics
                'bottom',  // 9: Cybersecurity and Data Protection
                'right',   // 10: Process Residuals and Other Wastes
                'left',    // 11: Biodiversity and Land Use
                'left',    // 12: Water Availability
                'right',   // 13: Water Management
                'bottom',  // 14: Air Quality and Pollutants
                'top',   // 15: Climate Change and Climate Mitigation
                'bottom',  // 16: Energy Management
              ];

              return alignMap[dataIndex] || 'bottom';
            },
            offset: function (context) {
              const dataIndex = context.dataIndex;

              // Custom offsets for each data point
              const offsetMap = [
                10,   // 0: Safe and Healthy Working Conditions
                10,  // 1: Equity, Diversity, Inclusion
                10,  // 2: Human Rights in the Workplace
                15,   // 3: Public Safety and Emergency Services
                10,  // 4: Human Rights and Security in Host Communities
                10,  // 5: Community Investment and Community Relations
                10,   // 6: Geopolitical Interests
                10,   // 7: Indigenous Relations
                10,   // 8: Business Practices and Ethics
                10,  // 9: Cybersecurity and Data Protection
                10,  // 10: Process Residuals and Other Wastes
                10,  // 11: Biodiversity and Land Use
                10,   // 12: Water Availability
                10,  // 13: Water Management
                10,  // 14: Air Quality and Pollutants
                10,  // 15: Climate Change and Climate Mitigation
                10,   // 16: Energy Management
              ];

              return offsetMap[dataIndex] || 10;
            },
            formatter: function (value, context) {
              const label = value.label;

              // If label is too long, truncate it with ellipsis for display
              const maxLength = 35;
              if (label.length > maxLength) {
                return label.substring(0, maxLength) + '...';
              }

              return label;
            },
            display: true,
            clamp: true,
            textStrokeColor: 'white',
            textStrokeWidth: 1,
            z: 100,
            listeners: {
              enter: function (context) {
                var chart = context.chart;
                var datasetIndex = context.datasetIndex;
                var dataIndex = context.dataIndex;
                chart.setActiveElements([
                  { datasetIndex: datasetIndex, index: dataIndex }
                ]);
                chart.tooltip.setActiveElements([
                  { datasetIndex: datasetIndex, index: dataIndex }
                ], { x: context.x, y: context.y });
                chart.update();
              },
              leave: function (context) {
                var chart = context.chart;
                chart.setActiveElements([]);
                chart.tooltip.setActiveElements([], { x: 0, y: 0 });
                chart.update();
              }
            }
          }
        },
        scales: {
          x: {
            type: 'linear',
            position: 'bottom',
            min: 0,
            max: 18,
            grid: {
              display: false
            },
            ticks: {
              display: false
            },
            title: {
              display: true,
              text: '',
              font: {
                size: 16,
                weight: 'bold'
              },
              padding: {
                top: 10,
                bottom: 10
              }
            },
            border: {
              display: true
            }
          },
          y: {
            min: 0,
            max: 16,
            grid: {
              display: false
            },
            ticks: {
              display: false
            },
            title: {
              display: true,
              text: '',
              font: {
                size: 16,
                weight: 'bold'
              },
              padding: {
                top: 10,
                bottom: 10
              }
            },
            border: {
              display: true
            }
          }
        }
      },
      plugins: [quadrantBackgroundPlugin, quadrantLabelPlugin,
        {
          id: 'labelConnectorPlugin',
          afterDatasetsDraw: function (chart) {
            const ctx = chart.ctx;

            chart.data.datasets.forEach((dataset, datasetIndex) => {
              const meta = chart.getDatasetMeta(datasetIndex);

              meta.data.forEach((element, index) => {
                const dataPoint = dataset.data[index];

                if (!dataPoint.label) return;

                const x = element.x;
                const y = element.y;

                let targetX, targetY;

                const anchorMap = [
                  'start',   // 0: Safe and Healthy Working Conditions
                  'center',  // 1: Equity, Diversity, Inclusion
                  'center',  // 2: Human Rights in the Workplace
                  'end',     // 3: Public Safety and Emergency Services
                  'center',  // 4: Human Rights and Security in Host Communities
                  'center',  // 5: Community Investment and Community Relations
                  'start',   // 6: Geopolitical Interests
                  'end',     // 7: Indigenous Relations
                  'end',     // 8: Business Practices and Ethics
                  'center',  // 9: Cybersecurity and Data Protection
                  'center',  // 10: Process Residuals and Other Wastes
                  'center',  // 11: Biodiversity and Land Use
                  'end',     // 12: Water Availability
                  'center',  // 13: Water Management
                  'center',  // 14: Air Quality and Pollutants
                  'center',  // 15: Climate Change and Climate Mitigation
                  'start',   // 16: Energy Management
                ];

                const alignMap = [
                  'bottom',  // 0: Safe and Healthy Working Conditions
                  'left',    // 1: Equity, Diversity, Inclusion
                  'left',    // 2: Human Rights in the Workplace
                  'top',     // 3: Public Safety and Emergency Services
                  'left',    // 4: Human Rights and Security in Host Communities
                  'right',   // 5: Community Investment and Community Relations
                  'bottom',  // 6: Geopolitical Interests
                  'top',     // 7: Indigenous Relations
                  'top',     // 8: Business Practices and Ethics
                  'right',   // 9: Cybersecurity and Data Protection
                  'right',   // 10: Process Residuals and Other Wastes
                  'left',    // 11: Biodiversity and Land Use
                  'top',     // 12: Water Availability
                  'right',   // 13: Water Management
                  'left',    // 14: Air Quality and Pollutants
                  'left',    // 15: Climate Change and Climate Mitigation
                  'bottom',  // 16: Energy Management
                ]; const anchor = anchorMap[index] || 'start';
                const align = alignMap[index] || 'bottom';

                if (anchor === 'start' && align === 'bottom') {
                  // Bottom labels
                  targetX = x;
                  targetY = y + 5; // Reduced from 7 to match new offset
                } else if (anchor === 'end' && align === 'top') {
                  // Top labels
                  targetX = x;
                  targetY = y - 5; // Reduced from 7 to match new offset
                } else if (anchor === 'center' && align === 'left') {
                  // Left labels
                  targetX = x - 7;
                  targetY = y;
                } else if (anchor === 'center' && align === 'right') {
                  // Right labels
                  targetX = x + 7;
                  targetY = y;
                } else {
                  // Default
                  targetX = x;
                  targetY = y + 5; // Reduced from 7 to match new offset
                }

                // Draw connector line
                ctx.save();
                ctx.beginPath();
                ctx.moveTo(x, y);
                ctx.lineTo(targetX, targetY);
                ctx.strokeStyle = 'rgba(150, 150, 150, 0.5)';
                ctx.lineWidth = 1;
                ctx.stroke();
                ctx.restore();
              });
            });
          }
        },
        ChartDataLabels
      ]
    });
  });
</script>
