window.onload = function ()
{
    var canvasP = document.getElementById("myChart");
    var ctxP = canvasP.getContext('2d');
    var myPieChart = new Chart(ctxP, {
       type: 'doughnut',
       data: {
          labels: ["Productivity", "Insurance & Investment", "Savings", "Charity/Taxes/Other Expenses"],
          datasets: [{
             data: [productivity, investments, savings, charities],
             backgroundColor: ["rgb(177, 25, 30)", "rgb(76, 185, 85)", "rgb(31, 100, 243)", "rgb(230, 243, 61)"],
          }]
       },
       options: {
          legend: {
             display: false,
             position: "bottom"
          }
       }
    });

    canvasP.onclick = function(e) {
       var slice = myPieChart.getElementAtEvent(e);
       if (!slice.length) return; // return if not clicked on slice
       var label = slice[0]._model.label;
       switch (label) {
            // add case for each label/slice
            case 'Productivity':
                window.location.href = linkProductivity;
                break;
            case 'Insurance & Investment':
                window.location.href= linkInvestments;
                break;
            case 'Savings':
                window.location.href = linkSavings;
                break;
            case 'Charity/Taxes/Other Expenses':
                window.location.href= linkCharities;
                break;
       }
    }
}