<div class="card bg-white">
    <div class="card-header clearfix">
        <i data-feather="list" class="icon-16"></i> &nbsp;<?php echo app_lang("client_label_overview"); ?>
    </div>
    <div class="card-body rounded-bottom" id="client-label-widget">
        <div class="row">
            <div class="col-md-6">
                <canvas id="all-tasks-overview-chart-client-label" style="width: 100%; height: 300px;"></canvas>
            </div>
            <div class="col-md-6 pl20 <?php echo count($label_counts) > 8 ? "" : "pt-4"; ?>">
                <?php
                foreach ($label_counts as $client_label) {
                    ?>
                    <a href="<?php echo get_uri('/clients'); ?>" class="text-default">
                        <div class="pb-2">
                            <div class="color-tag border-circle me-3 wh10" style="background-color: <?php echo $client_label->color; ?>;"></div><?php echo $client_label->title ?>
                            <span class="strong float-end" style="color: <?php echo $client_label->color; ?>"><?php echo $client_label->count; ?></span>
                        </div>
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
$label_title = array();
$label_clients_count = array();
$label_color = array();
foreach ($label_counts as $client_label) {
    $label_title[] = $client_label->title;
    $label_clients_count[] = $client_label->count;
    $label_color[] = $client_label->color;
}
?>
<script type="text/javascript">
    //for task status chart
    var labels = <?php echo json_encode($label_title) ?>;
    var taskData = <?php echo json_encode($label_clients_count) ?>;
    var taskStatuscolor = <?php echo json_encode($label_color) ?>;
    var allTasksOverviewChart = document.getElementById("all-tasks-overview-chart-client-label");
    new Chart(allTasksOverviewChart, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [
                {
                    data: taskData,
                    backgroundColor: taskStatuscolor,
                    borderWidth: 0
                }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 87,
            tooltips: {
                callbacks: {
                    title: function (tooltipItem, data) {
                        return data['labels'][tooltipItem[0]['index']];
                    },
                    label: function (tooltipItem, data) {
                        return "";
                    },
                    afterLabel: function (tooltipItem, data) {
                        var dataset = data['datasets'][0];
                        var percent = Math.round((dataset['data'][tooltipItem['index']] / dataset["_meta"][Object.keys(dataset["_meta"])[0]]['total']) * 100);
                        return '(' + percent + '%)';
                    }
                }
            },
            legend: {
                display: false
            },
            animation: {
                animateScale: true
            }
        }
    });

    $(document).ready(function () {
        initScrollbar('#<?php echo $type; ?>-widget', {
            setHeight: 327
        });
    });

</script>