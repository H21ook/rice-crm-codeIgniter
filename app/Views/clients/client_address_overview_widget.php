<div id="invoice-overview-widget-container">
    <div class="card bg-white">
        <div class="card-header">
            <i data-feather="file-text" class="icon-16"></i> &nbsp;<?php echo app_lang("client_address_overview"); ?>
        </div>
        <div class="card-body rounded-bottom" id="invoice-overview-container">
            <?php foreach ($client_data as $state_data): ?>
                <div class="d-flex p-2 justify-content-between">
                    <div class="w40p text-truncate">
                        <!-- <div style="background-color: #F5325C;" class="color-tag border-circle wh10"></div> -->
                        <?php echo $state_data->state ? $state_data->state : "Undefined"; ?>
                    </div>
                    <div class="w15p text-center"><?php echo $state_data->count; ?></div>
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