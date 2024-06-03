<div id="invoice-overview-widget-container">
    <div class="card bg-white">
        <div class="card-header">
            <i data-feather="file-text" class="icon-16"></i> &nbsp;<?php echo app_lang("client_address_overview"); ?>
        </div>
        <div class="card-body rounded-bottom" id="invoice-overview-container">
            <?php foreach ($client_data as $state_data): ?>
                <?php $percent = round($state_data->yes_count / $state_data->total * 100) ?>
                <div class="d-flex p-2 ">
                    <div class="w40p text-truncate">
                        <?php echo $state_data->state ? $state_data->state : "Undefined"; ?>
                    </div>
                     <div class="w20p">
                        <div class='progress widget-progress-bar' title='<?php echo $percent; ?>%'>
                            <div  class='progress-bar bg-danger' role='progressbar' style="width: <?php echo $percent; ?>%;" aria-valuenow='<?php echo $percent; ?>%' aria-valuemin='0' aria-valuemax='100'></div>
                        </div>
                    </div>
                    <div class="w15p text-center"><?php echo $state_data->yes_count; ?></div>
                    <div class="w25p text-end"><?php echo $state_data->total; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        initScrollbar('#invoice-overview-container', {
            setHeight: 327
        });
    });
</script>