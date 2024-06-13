!function($) {
    "use strict";

    var MorrisCharts = function() {};

    //creates line chart
    MorrisCharts.prototype.createLineChart = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Line({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            xLabelAngle: 90,
            gridLineColor: '#eef0f2',
            resize: true,
            lineColors: lineColors,
            parseTime: false
        });
    };
    
    MorrisCharts.prototype.init = function() {

        //create line chart
        var $data  = data_bb;
        this.createLineChart('morris-line-example', $data, 'y', ['a', 'b', 'c', 'd'], ['BB Berlebih', 'BB Normal', 'BB Kurang', 'Berak badan anak'], ['#C40C0C', '#1A4D2E', '#FFC100', '#151515']);
    },
    //init
    $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.MorrisCharts.init();
}(window.jQuery);